<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Models\Image;

Route::get('/', function () {
    return redirect('/upload');
});

Route::get('/upload', function () {

    return view('main');
});

Route::post('/upload', function () {
    $handler = new ImageController;
    $handler->store();
    return view('main');
});

Route::get('/gallery', function () {
    
    $images = Image::all();
    return view('gallery', ['images'=> $images]);
});

Route::get('/gallery-sort', function () {
    $handler = new ImageController;

    if(!empty($_GET['sortby'])){
        $sortedImages = $handler->displaySorted($_GET['sortby']);
        return view('galleryItems', ['images' => $sortedImages]);
    }
});

