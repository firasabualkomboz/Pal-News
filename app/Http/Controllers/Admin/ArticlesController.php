<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{

    public function index()
    {
        $articles = Article::with('tags','category')
        ->paginate(5);

        return view('admin.articles.index',[
            'articles' => $articles,
        ]);

    }


    public function create()
    {
        $categories = Category::all();
        $tags       = Tag::all();

        if ($categories -> count() ==0)
        {
            return redirect()->route('admin.categories.create');
        }
        if ($tags -> count() == 0 )
        {
            return redirect()->route('admin.tags.create');
        }

        return view('admin.articles.create',[
            'categories' => $categories,
            'tags'       => $tags,
        ]);

    }


    public function store(ArticleRequest $request)
    {

        $photo_path = null;
        if($request->hasFile('photo') && $request->file('photo')->isValid()){
            $file = $request->file('photo');
            $photo_path = $file->store('/',['disk' => 'uploads']);
        }
        $articles = Article::create([

            'title'         => $request->post('title'),
            'content'       => $request->post('content'),
            'photo'         => $photo_path,
            'tag_id'        => $request->post('tag_id'),
            'category_id'   => $request->post('category_id'),

        ]);

        $articles -> tags()->attach($request->tags);

        return redirect()->route('admin.articles.index')
            ->with('success','Your Article Has Been Successfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $article = Article::findOrFail(id);
        $article->delete();
        return redirect()->route('admin.articles.index')
            ->with('success','The Article Was Successfully Deleted');
    }
}
