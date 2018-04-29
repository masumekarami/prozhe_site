<?php

namespace App\Http\Controllers;

use App\About;
use App\SocialNetwork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AboutController extends Controller
{
    public function index()
    {
        $about = DB::table('abouts')->get();
        $post = DB::table('social_networks')->get();

        $upload='http://project.local:8090';

        return view('AboutMe.about',compact('about','upload','post'));


    }



}
