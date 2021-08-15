<x-admin-layout title="All Role" category="Role">


    <!-- row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card mg-b-20">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        <div class="pull-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('admin.roles.index') }}">Back</a>
                        </div>
                    </div>
                    <div class="row">
                        <!-- col -->
                        <div class="col-lg-4">
                            <ul>
                                <li><a href="#">{{ $role->name }}</a>
                                    <ul>
                                        @if(!empty($rolePermissions))
                                            @foreach($rolePermissions as $v)
                                                <li>{{ $v->name }}</li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!-- /col -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
</x-admin-layout>
