<?php
 
namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
 
class ImageController extends Controller
{

    public function displaySorted($sortby)
    {
        return Image::orderby($sortby)->get();
    }

    public function archive($file)
    {
        $zip = new \ZipArchive();
        if ($zip->open(__DIR__ . "/../../../public/archives/" . pathinfo($file, PATHINFO_FILENAME) . ".zip", \ZIPARCHIVE::CREATE) == true){
            if(file_exists(__DIR__ . "/../../../public/img/" . $file)){
                $zip->addFile(__DIR__ . "/../../../public/img/" . $file, $file);
                $zip->close();
            }            
        } 
    }
    
    public function store()
    {
        $uploaddir = __DIR__ . "/../../../public/img/";

        if(empty($_FILES)){
            return redirect('/upload')->with('status', 'Ошибка загрузки файлов');
        }

        $files = $_FILES["sendFile"];

        if (!$this->validErrors($files["error"])) {
            return redirect('/upload')->with('status', 'Ошибка загрузки файлов');
        }
        if ( count($files['name']) > 5 ) {
            return redirect('/upload')->with('status', 'Вы можете загрузить не более 5 файлов');
        }
        if(!$this->validTypes($files['name'])){
            return redirect('/upload')->with('status', 'Некоректный формат изображений');
        }

        foreach ($files['name'] as $key => $file) {
            $image = new Image;
            $image->datetime = date("Y-m-d H:i:s");

            $ext = mb_strtolower( pathinfo($file, PATHINFO_EXTENSION));

            $image->name = $image->translite( basename($file) );
            if(file_exists($uploaddir . $image->name)){
                $image->name = $image->translite(md5($image->name . $image->datetime)) . '.' . $ext;
            }
            
            move_uploaded_file($files["tmp_name"][$key], $uploaddir . $image->name);

            $this->archive($image->name);
            $image->save();
        }
    }

    protected function validTypes(array $paths) : bool 
    {
        $allowedExts = array('png', 'jpeg', 'jpg', 'gif', 'webp');
        foreach ($paths as $path) {
            $ext = mb_strtolower( pathinfo($path, PATHINFO_EXTENSION));
            if( !in_array($ext, $allowedExts) )
            {
                return false;
            }
        } 
        return true;   
    }

    protected function validErrors(array $errors) : bool {
        foreach ($errors as $error) {
            if($error != 0){
                return false;
            }
        }
        return true;
    }
}