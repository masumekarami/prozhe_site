<?php

namespace App\Http\Controllers;

use App\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;



class GalleryController extends Controller
{
    public function index()
    {
//        $gallery = DB::table('gallerys')->get();
//
//        return view('gallerys.gallery',compact('gallery'));

        $result = Input::get('GalleryId');
        if (empty($result)) {
            echo "No Result Found";
        } else {
            $detail = Gallery::where('id', $result)->first();
            $result = $detail->image_url;
            return $result;

        }
    }

    public function show()
    {
        $gallery = DB::table('galleries')->get();
        return view('gallerys.index',compact('gallery'));

    }

}
