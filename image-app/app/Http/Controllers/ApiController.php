<?php
 
namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
 
class ApiController extends Controller
{
    public function index()
    {
        return Image::all();
    }

    public function show($id)
    {
        return Image::where('id' , $id)->get();
    }
}