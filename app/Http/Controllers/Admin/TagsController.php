<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{

    function __construct()
    {

        $this->middleware('permission:Tags-List|Add-Tags|Update-Tags|Delete-Tags', ['only' => ['index','store']]);
        $this->middleware('permission:Add-Tags', ['only' => ['create','store']]);
        $this->middleware('permission:Update-Tags', ['only' => ['edit','update']]);
        $this->middleware('permission:Delete-Tags', ['only' => ['destroy']]);
    }

    public function index()
    {
        $tags = Tag::paginate(5);
        return view('admin.tags.index',[
            'tags' => $tags,
        ]);
    }


    public function create()
    {
        return view('admin.tags.create');

    }


    public function store(TagRequest $request)
    {
        $tags = Tag::create([
            'tag' => $request->post('tag'),
        ]);

        return redirect()->route('admin.tags.index')
        ->with('success','Your Tag Has Been Successfully Added');
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $tag = Tag::findOrFail($id);
        return view('admin.tags.edit',[
            'tag' => $tag,
        ]);
    }

    public function update(Request $request, $id)
    {
        $tag = Tag::findOrFail($id);
        $tag -> tag = $request -> tag;
        $tag -> save();
        return redirect()->route('admin.tags.index')
        ->with('success','The Tag Has Been Updated Successfully');
    }


    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();
        return redirect()->route('admin.tags.index')
        ->with('success','The Tag Has Been Deleted Successfully');
    }
}
