<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticlesController extends Controller
{

    // function __construct()
    // {
    //     $this->middleware('permission:Articles-List|Add-Articles|Update-Articles|Delete-Articles',['only'=>['index','show']]);
    //     $this->middleware('permission:Add-Articles',['only'=>['create','store']]);
    //     $this->middleware('permission:Update-Articles',['only'=>['edit','update']]);
    //     $this->middleware('permission:Delete-Articles',['only'=>['destroy']]);
    // }

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
            'article_tag' => [],

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

        $tags = $request->post('tag',[]);
        $articles->tags()->attach($tags);

        return redirect()->route('admin.articles.index')
            ->with('success','Your Article Has Been Successfully Added');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $article_tag = $article->tags()->pluck('id')->toArray();
        return view('admin.articles.edit',[
            'article' => $article ,
            'categories' => Category::all(),
            'tags' => Tag::all(),
            'article_tag' => $article_tag
        ]);
    }


    public function update(ArticleRequest $request, $id)
    {
        $article = Article::findOrFail($id);
        $photo_path = $article-> photo;
        $old_photo  = $article -> photo;

        if($request->hasFile('photo') && $request->file('photo')->isValid()){
            $file = $request->file('photo');
            $photo_path =$file->store('/',[
                'disk' => 'uploads'
            ]);
        }

        $article->update([

            'title' => $request->post('title'),
            'content' => $request->post('content'),
            'category_id' => $request->post('category_id'),
            'photo' => $photo_path,

        ]);

        $tags = $request->post('tag' , []);
        $article->tags()->sync($tags);

        if($old_photo && $old_photo != $photo_path){
            Storage::disk('uploads')->delete($old_photo);
        }
        return redirect()->route('admin.articles.index')
            ->with('success','The Article Was Successfully Updated');

    }

    public function destroy($id)
    {

        $article = Article::findOrFail($id);
        $article->delete();
        return redirect()->route('admin.articles.index')
        ->with('success','The Article Was Successfully Deleted');
    }
}
