<x-admin-layout title="All Role" category="Role">



{!! Form::open(array('route' => 'admin.roles.store','method'=>'POST')) !!}
<!-- row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card mg-b-20">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        <div class="col-xs-7 col-sm-7 col-md-7">
                            <div class="form-group">
                                <p>Name Permisions</p>
                                {!! Form::text('name', null, array('class' => 'form-control')) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- col -->
                        <div class="col-lg-4">
                            <ul>
                                <li><a href="#">Permisions</a>
                                    <ul>
                                        </li>
                                        @foreach($permission as $value)
                                            <label
                                                style="font-size: 16px;">
                                                {{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                                {{ $value->name }}</label>
                                            @endforeach
                                            </li>

                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!-- /col -->
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <button type="submit" class="btn btn-outline-primary">Save</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->

    {!! Form::close() !!}

</x-admin-layout>
