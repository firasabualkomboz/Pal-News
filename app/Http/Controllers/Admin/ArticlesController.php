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


    public function index()
    {
        $articles = Article::with('category')->paginate(5);

        return view('admin.articles.index',[
            'articles' => $articles,
        ]);

    }


    public function create()
    {
        $categories = Category::all();

        if ($categories -> count() ==0)
        {
            return redirect()->route('admin.categories.create');
        }


        return view('admin.articles.create',[
            'categories' => $categories,

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
            'category_id'   => $request->post('category_id'),

        ]);

        toastr()->success('Your Store Has Been Successfully Added');
        return redirect()->route('admin.articles.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('admin.articles.edit',[
            'article' => $article ,
            'categories' => Category::all(),
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


        if($old_photo && $old_photo != $photo_path){
            Storage::disk('uploads')->delete($old_photo);
        }
        toastr()->success('The Store Was Successfully Updated');
        return redirect()->route('admin.articles.index');

    }

    public function destroy($id)
    {

        $article = Article::findOrFail($id);
        $article->delete();
        toastr()->error('The Store Was Successfully Deleted');
        return redirect()->route('admin.articles.index');
    }
}
