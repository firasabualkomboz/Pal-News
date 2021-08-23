<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{


    public function index()
    {
        return Tag::all();
    }


    public function store(TagRequest $request)
    {
        $tags = Tag::create($request->all());
        return $tags;
    }

    public function update(TagRequest $request , Tag $tag)
    {
        $tag -> update($request->all());
        return $tag;
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return response()->noContent();
    }
}
