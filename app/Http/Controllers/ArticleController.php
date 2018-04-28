<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class ArticleController extends Controller
{
    public function index()
    {
        $result = Input::get('ArticelId');
        if (empty($result)) {
            echo "No Result Found";
        } else {
            $detail = Article::where('id', $result)->first();
            $result = $detail->description;
            return $result;

        }
    }

    public function show()
    {
        $article = DB::table('articles')->get();
        return view('articles.article', compact('article'));

    }

}