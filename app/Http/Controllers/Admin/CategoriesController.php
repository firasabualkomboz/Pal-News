<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{

    public function index()
    {
        $categories = Category::paginate(5);
        return view('admin.categories.index',[
            'categories' => $categories,
        ]);
    }


    public function create()
    {
     return view('admin.categories.create');
    }


    public function store(CategoryRequest $request)
    {

        $categories = Category::create([

            'name' => $request->post('name'),

        ]);
        return view('admin.categories.index')
        ->with('success','The Section Has Been Added Successfully');

    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit',[
            'category' => $category ,
        ]);
    }


    public function update(CategoryRequest $request, $id)
    {

        $category = Category::findOrFail($id);

        $category->name = $request->name;

        $category->save();

        return view('admin.categories.index')->with('success','The Category Has Been Updated Successfully');
    }


    public function destroy($id)
    {
        $catgory = Category::findOrFail($id);
        $catgory->delete();
        return view('admin.categories.index')
        ->with('success','The Category Has Been Deleted Successfully');
    }
}
