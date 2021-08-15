<x-admin-layout title="Add New Article" category="Articles">

@if ($errors->any())
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $message )
<li>{{$message}}</li>
@endforeach
</ul>
</div>
@endif

<div class="card card-custom">
<div class="card-header">
<h3 class="card-title">Edit User - <span><a href="{{route('admin.users.index')}}">Back</a></span></h3>
<div class="card-toolbar">
<div class="example-tools justify-content-center">
<span class="example-toggle" data-toggle="tooltip" title="View code"></span>
<span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
</div>
</div>
</div>

<!--begin::Form-->
{!! Form::model($user, ['method' => 'PATCH','route' => ['admin.users.update', $user->id]]) !!}

@csrf
<div class="card-body">


<div class="form-group">
<label>Name</label>
{!! Form::text('name', null, array('class' => 'form-control','required')) !!}
</div>

<div class="form-group">
<label>E-mail</label>
{!! Form::text('email', null, array('class' => 'form-control','required')) !!}
</div>

<div class="form-group">
<label>Password</label>
{!! Form::password('password', array('class' => 'form-control','required')) !!}
</div>

<div class="form-group">
<label>Password Confirmation</label>
{!! Form::password('password_confirmation', array('class' => 'form-control','required')) !!}
</div>

<div class="form-group">
<label> Status </label>
<select class="form-control form-control-lg" name="status">
<option value="{{$user->status}}">{{ $user->status}}</option>
<option value="active">Active</option>
<option value="disabled">Disabled</option>
</select>
</div>

<div class="row mg-b-20">
<div class="col-xs-12 col-md-12">
<div class="form-group">
<label class="form-label">Users Permissions</label>
{!! Form::select('roles_name[]', $roles,$userRole, array('class' => 'form-control','multiple'))!!}
</div>
</div>
</div>


<div class="card-footer">
<button type="submit" class="btn btn-primary mr-2">Update</button>
<button type="reset" class="btn btn-secondary">Cancel</button>
</div>

{!! Form::close() !!}
<!--end::Form-->
</div>
</div>


</x-admin-layout>
