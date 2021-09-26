<x-admin-layout title="All Role" category="Role">


@if (session()->has('Add'))
<script>
window.onload = function() {
notif({
msg: " تم اضافة الصلاحية بنجاح",
type: "success"
});
}
</script>
@endif

@if (session()->has('edit'))
<script>
window.onload = function() {
notif({
msg: " تم تحديث بيانات الصلاحية بنجاح",
type: "success"
});
}
</script>
@endif

@if (session()->has('delete'))
<script>
window.onload = function() {
notif({
msg: " تم حذف الصلاحية بنجاح",
type: "error"
});
}
</script>
@endif

<!-- row -->
<div class="row row-sm">
<div class="col-xl-12">
<div class="card">
<div class="card-header pb-0">
<div class="d-flex justify-content-between">
<div class="col-lg-12 margin-tb">
<div class="pull-right">
@can('اضافة صلاحية')
<a class="btn btn-primary btn-sm" href="{{ route('roles.create') }}">اضافة</a>
@endcan
</div>
</div>
<br>
</div>

</div>
<div class="card-body">
<div class="table-responsive">
<table class="table mg-b-0 text-md-nowrap table-hover ">
<thead>
<tr>
<th>#</th>
<th>Name</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
@foreach ($roles as $key => $role)
<tr>
<td>{{ ++$i }}</td>
<td>{{ $role->name }}</td>
<td>
@can('role-list')
<a class="btn btn-success btn-sm"
href="{{ route('admin.roles.show', $role->id) }}">Show</a>
@endcan

<a class="btn btn-primary btn-sm"
href="{{ route('admin.roles.edit', $role->id) }}">Update</a>

@if ($role->name !== 'owner')
@can('role-delete')
{!! Form::open(['method' => 'DELETE', 'route' => ['admin.roles.destroy',
$role->id], 'style' => 'display:inline']) !!}
{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
{!! Form::close() !!}
@endcan
@endif
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
</div>
</div>
</div>
<!--/div-->
</div>
<!-- row closed -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->

</x-admin-layout>
