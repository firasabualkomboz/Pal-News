<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index()
    {
       return ArticleResource::collection(Article::all());
    }

    public function store(ArticleRequest $request)
    {

        $data = $request->all();
        if($request->hasFile('photo') && $request->file('photo')->isValid()){
            $data['photo'] = $request->file('photo')->store('/','uploads');
        }

        $article = Article::create($data);
        $article->tags()->sync($request->post('tag'));
        return response()->json($article,201);
    }


}
