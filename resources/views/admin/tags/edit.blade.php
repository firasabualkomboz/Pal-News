<x-admin-layout title="Add New Tag" category="Tag">
<div class="card card-custom">
<div class="card-header">
<h3 class="card-title">
Add tags
</h3>
<div class="card-toolbar">
<div class="example-tools justify-content-center">
<span class="example-toggle" data-toggle="tooltip" title="View code"></span>
<span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
</div>
</div>
</div>
<!--begin::Form-->
<form method="post" action="{{route('admin.tags.update',[$tag->id])}}">
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
<label>Tag Name</label>
<input type="text" class="form-control" name="tag" value="{{old('tag',$tag->tag)}}"/>
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
