<x-admin-layout title="Home" category="Admin">
<div class="d-flex flex-column-fluid">
<!--begin::Container-->
<div class="container">
<!--begin::Row-->
<div class="row">

    @foreach ($data as $key => $user)


<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
<!--begin::Card-->
<div class="card card-custom gutter-b card-stretch">
<!--begin::Body-->
<div class="card-body pt-4">

<div class="d-flex align-items-center mb-7">
<!--begin::Title-->
<div class="d-flex flex-column">
<a href="#" class="text-dark font-weight-bold text-hover-primary font-size-h4 mb-0">{{$user->name}}</a>
<span class="text-muted font-weight-bold">{{$user->email}}</span>
</div>
<!--end::Title-->
</div>

<div class="mb-7">
<div class="d-flex justify-content-between align-items-center my-1">
<span class="text-dark-75 font-weight-bolder mr-2">Status</span>
<a href="#" class="text-muted text-hover-primary">
@if ($user->status == 'active')
<span class="label text-success d-flex">
<div class="dot-label bg-success ml-1"></div>{{ $user->status }}
</span>
@else
<span class="label text-danger d-flex">
<div class="dot-label bg-danger ml-1"></div>{{ $user->status }}
</span>
@endif
</a>
</div>
<div class="d-flex justify-content-between align-items-center">
<span class="text-dark-75 font-weight-bolder mr-2">Roles</span>
<span class="text-muted font-weight-bold">
@if (!empty($user->getRoleNames()))
@foreach ($user->getRoleNames() as $v)
<label class="badge badge-success">{{ $v }}</label>
@endforeach
@endif
</span>
</div>
</div>

<a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-outline-success py-4"> <i class="fa fa-edit"></i> </a>

<form action="{{ route('admin.users.destroy',[$user->id]) }}" method="post" style="display: inline-block">
{{ method_field('delete') }}
{{ csrf_field() }}
<button type="submit" class="btn btn-sm btn-outline-success">
<i class="fa fa-trash p-2"></i>
</button>
</form>

</div>
</div>
</div>

@endforeach


</div>

</div>

</div>

</x-admin-layout>
