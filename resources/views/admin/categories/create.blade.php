<x-admin-layout title="Add New Category" category="Categories">
    @if ($errors->any())
    <div class="alert alert-danger">

    @foreach ($errors->all() as $message )
    {{$message}}
    @endforeach
    </div>
    @endif
    
<div class="card card-custom">

<div class="card-header">
<h3 class="card-title">
Add Categories
</h3>
</div>
<!--begin::Form-->
<form method="post" action="{{route('admin.categories.store')}}">
@csrf
<div class="card-body">


<div class="form-group">
<label>Category Name</label>
<input type="text" class="form-control" name="name" placeholder="Enter Category"/>
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
