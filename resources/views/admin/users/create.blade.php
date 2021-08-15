<x-admin-layout title="Add New User" category="Users">
    <div class="card card-custom">
        <div class="card-header">
            <h3 class="card-title"> Add User </h3>
            <div class="card-toolbar">
                <div class="example-tools justify-content-center">
                    <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                    <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
                </div>
            </div>
        </div>
        <!--begin::Form-->
        <form method="post" action="{{route('admin.users.store')}}" enctype="multipart/form-data">
            @csrf
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
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter Name"/>
                </div>

                    <div class="form-group">
                        <label>E-mail</label>
                        <input type="text" class="form-control" name="email" placeholder="Enter Email"/>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter password"/>
                    </div>

                    <div class="form-group">
                        <label>Password Confirmation</label>
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Enter Name"/>
                    </div>

                    <div class="form-group">
                        <label for="exampleSelectl">Status</label>
                        <select class="form-control form-control-lg" name="status">
                            <option value="active">Active</option>
                            <option value="disabled">Disabled</option>

                        </select>
                    </div>

                    <div class="row mg-b-20">
                        <div class="col-xs-12 col-md-12">
                            <div class="form-group">
                                <label class="form-label">Users Permissions</label>
                                {!! Form::select('roles_name[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                            </div>
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
