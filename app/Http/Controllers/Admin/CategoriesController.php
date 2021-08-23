<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{


    public function __construct()
    {
        $this->middleware('permission:Categories-List|Add-Categories|Update-Categories|Delete-Categories', ['only' => ['index','store']]);
        $this->middleware('permission:Add-Categories', ['only' => ['create','store']]);
        $this->middleware('permission:update-Categories', ['only' => ['edit','update']]);
        $this->middleware('permission:Delete-Categories', ['only' => ['destroy']]);
    }

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
        try{

            $categories = Category::create([

                'name' => $request->post('name'),

            ]);
            // return redirect()->route('admin.categories.index')
            // ->with('success','The Section Has Been Added Successfully');
            return redirect()->back()
            ->with('success','The Section Has Been Added Successfully');

            } catch (\Exception $e)
            {
                return redirect()->back()
                ->with('error','The Section Not Added');
            }
        

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

        return redirect()->route('admin.categories.index')
        ->with('success','The Category Has Been Updated Successfully');
    }


    public function destroy($id)
    {
        $catgory = Category::findOrFail($id);
        $catgory->delete();

        return redirect()->route('admin.categories.index')
        ->with('success','The Category Has Been Deleted Successfully');

    }
}
