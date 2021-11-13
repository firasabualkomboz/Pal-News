<x-admin-layout title="All Category" category="Categories">

    @if (session()->has('success'))
    <div class="alert alert-success mb-3">{{session()->get('success')}} </div>
    @endif

<div class="card card-custom">

<div class="card-header flex-wrap border-0 pt-6 pb-0">

<div class="card-toolbar">
<!--begin::Dropdown-->

<!--end::Dropdown-->
<a href="{{route('admin.categories.create')}}" class="btn btn-primary font-weight-bolder">Add New Category</a>
<!--end::Button-->
</div>
</div>
<div class="card-body">

<table class="table">
<thead>
<tr>
<th scope="col">#</th>
<th>Nmae Category</th>
<th>ACTIONS</th>
</tr>
</thead>
<tbody>

@foreach($categories as $category)
<tr>
<td>{{$loop->index}}</td>
<td>{{$category->name}}</td>
<td>
<a href="{{route('admin.categories.edit',[$category->id])}}" class="btn btn-sm btn-clean btn-icon mr-2" title="Edit details">
<button class="btn btn-sm btn-warning">Edit</button>
</a>

<form action="{{route('admin.categories.destroy',[$category->id])}}" method="post" style="display: inline-block">
@csrf
@method('delete')
<button type="submit" class="btn btn-sm btn-danger">
Delete
</button>
</form>

</td>
</tr>
@endforeach
</tbody>
</table>
{{$categories->links()}}
</div>
</div>
<!--end::Card-->
</x-admin-layout>
