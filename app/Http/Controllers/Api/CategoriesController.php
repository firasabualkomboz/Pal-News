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
        return response()->json(Category::get(),200);
    }


    public function store(Request $request)
    {
        $category = Category::create($request->all());
        return response()->json($category,201);
    }


    public function show($id)
    {
        return response()->json(Category::findOrFail($id),200);
    }


    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());
        return response()->json($category,200);
    }


    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return Response::json ([
            'message' => "post $id deleted"
        ]);
    }
}
