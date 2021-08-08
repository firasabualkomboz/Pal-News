<x-admin-layout title="Edit Article" category="Articles">
<div class="card card-custom">
<div class="card-header">
<h3 class="card-title">
Edit articles
</h3>
</div>
<!--begin::Form-->
<form method="post" action="{{route('admin.articles.update',[$article->id])}}" enctype="multipart/form-data">
@csrf
    @method('put')

    <div class="card-body">

@if ($errors->any())
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $message )
<li>{{$message}}</li>
@endforeach
</ul>
</div>
@endif

<div class="form-group">
<label>Article Title</label>
<input type="text" class="form-control" name="title" value="{{old('title',$article->title)}}" placeholder="Enter Tag"/>
</div>

<div class="form-group mb-1">
<label for="exampleTextarea">Article Content <span class="text-danger">*</span></label>
<textarea class="form-control"  name="content" value="{{old('content',$article->content)}}" rows="3"></textarea>
</div>

<div class="form-group">
<label for="exampleSelectl">Article Category</label>
<select class="form-control form-control-lg" name="category_id">
@foreach($categories as $category)
<option value="{{$category->id}}"  @if ($category->id == old('category_id' , $article->category_id ) ) selected @endif>{{$category->name}}</option>
@endforeach
</select>
</div>

<div class="form-group">
<label>Article Tags</label>
<div class="checkbox-inline">
@foreach($tags as $tag)
<label class="checkbox">
<input type="checkbox" value="{{$tag->id}}" name="tag[]"  @if (in_array($tag->id , $article_tag))checked @endif />
<span></span>
{{$tag->tag}}
</label>
@endforeach

</div>
</div>


<div class="form-group">
<label>Article Photo</label>
<div></div>
<div class="custom-file">
<input type="file" class="custom-file-input" name="photo" id="customFile"/>
<label class="custom-file-label" for="customFile">Choose Photo</label>
</div>
</div>



</div>
<div class="card-footer">
<button type="submit" class="btn btn-primary mr-2">Submit</button>
<button type="reset" class="btn btn-secondary">Cancel</button>
</div>
</form>
<!--end::Form-->
</div>
</x-admin-layout>
