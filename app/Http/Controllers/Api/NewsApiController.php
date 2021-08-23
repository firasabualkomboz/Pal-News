<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Servces\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class NewsApiController extends Controller
{
    public function index()
    {

        $news =  Http::get('https://newsapi.org/v2/everything?q=bitcoin');


        return view('admin.api.news.index',[

          'news' => $news,

        ]);
    }
}
