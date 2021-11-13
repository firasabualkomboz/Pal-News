<x-admin-layout title="All tag" category="tag">


@if (session()->has('success'))
<div class="alert alert-success mb-3">{{session()->get('success')}}</div>
@endif


<!--end::Notice-->
<!--begin::Card-->
<div class="card card-custom">
<div class="card-header flex-wrap border-0 pt-6 pb-0">
<div class="card-title">
<h3 class="card-label">List tags</h3>
</div>
<div class="card-toolbar">
<!--begin::Dropdown-->

<!--end::Dropdown-->
<!--begin::Button-->
<a href="{{route('admin.tags.create')}}" class="btn btn-primary font-weight-bolder">New tag</a>
<!--end::Button-->
</div>
</div>
<div class="card-body">
<!--begin: Datatable-->
<table class="table">
<thead>
<tr>
<th scope="col">#</th>
<th>tag</th>
<th>ACTIONS</th>
</tr>
</thead>
<tbody>

@foreach($tags as $tag)
<tr>
<td>{{$loop->index}}</td>
<td>{{$tag->tag}}</td>
<td>
<a href="{{route('admin.tags.edit',[$tag->id])}}" class="btn btn-sm btn-clean btn-icon mr-2" title="Edit details">
<button class="btn btn-sm btn-success">Edit</button>
</a>
<form action="{{route('admin.tags.destroy',[$tag->id])}}" method="post" style="display: inline-block">
@csrf
@method('delete')
<button type="submit" class="btn btn-sm btn-danger">Delete</button>
</form>

</td>
</tr>
@endforeach
</tbody>
</table>
{{$tags->links()}}
</div>
</div>
</x-admin-layout>
