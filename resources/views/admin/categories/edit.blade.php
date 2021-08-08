<x-admin-layout title="Add New Category" category="Categories">
<div class="card card-custom">
<div class="card-header">
<h3 class="card-title">
Add Categories
</h3>
</div>
<!--begin::Form-->
<form method="post" action="{{route('admin.categories.update',[$category->id])}}">
@csrf
@method('put')
<div class="card-body">
<div class="form-group mb-8">
@if ($errors->any())
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $message )
<li>{{$message}}</li>
@endforeach
</ul>
</div>
@endif

</div>
<div class="form-group">
<label>Category Name</label>
<input type="text" class="form-control" name="name" value="{{old('name',$category->name)}}"/>
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
