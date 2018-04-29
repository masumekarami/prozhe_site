<?php

namespace App\Http\Controllers;

use App\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;



class GalleryController extends Controller
{
    public function index() {
        $gallery = Gallery::all();
        $upload='http://project.local:8090';
        return view('gallerys.index', compact('gallery','upload'));
    }

    public function show($id) {
        return response()->json(Gallery::whereId($id)->first(['image_url', 'video_url']));
    }

}
