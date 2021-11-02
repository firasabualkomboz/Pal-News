<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{

    public function index()
    {
        return Category::all();
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $category = Category::create($request->all());
        return response()->json($category,201);
    }


    public function show($id)
    {
        return response()->json(Category::findOrFail($id),200);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'sometimes|required',
        ]);

        $category = Category::findOrFail($id);
        $category->update($request->all());
        return response()->json($category,200);
    }


    public function destroy($id)
    {

        Category::destroy($id);

        return Response::json ([
            'message' => "Category $id deleted"
        ]);

    }
}
