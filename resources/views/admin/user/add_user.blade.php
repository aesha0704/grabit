@extends('admin.layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                ADD USER
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">

{{--                    @if ($errors->any())--}}
{{--                        <div class="alert alert-danger">--}}
{{--                            <strong>Whoops!</strong> There were some problems with your input.<br><br>--}}
{{--                            <ul>--}}
{{--                                @foreach ($errors->all() as $error)--}}
{{--                                    <li>{{ $error }}</li>--}}
{{--                                @endforeach--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                @endif--}}
                </div>
            </div>
                <!-- general form elements -->
                    <div class="box box-primary">

                        <form role="form" method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="shop" value="1" />
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">

                                        <input  type="text" class="form-control" name="name" placeholder="Name"   >

                                    </div>
                                    <div class="form-group">

                                        <input type="email" class="form-control" id="" placeholder="E-mail" name="email"  />

                                    </div>
                                    <div class="form-group">

                                        <input type="password" class="form-control" id="" name="password" placeholder="Password"  />

                                    </div>
                                    <div class="form-group">

                                        <input type="password" class="form-control" id="" name="confirm_password" placeholder="Confirm Password"  />

                                    </div>

                                    <div class="form-group">
                                        <label for="image">Image</label>

                                        <input type="file" accept="image/*" required name="image[]" class="dropify form-control" id="image" multiple="" aria-describedby="fileHelp">

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="" name="phone" width="200px" placeholder="Phone Number"  />
                                </div>
                            </div>
                            <br>

                    <div class="row">
                    <div class="col-xs-12 mb-2">
                                                <a href="{{ route('users.index') }}" class="btn btn-warning mr-1">
                                                    <i class="ft-x"></i> Cancel
                                                </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-check-square-o"></i> Save
                        </button>
                    </div>
                    </div>
                    </form>
                    </div>

        </section>

            <!-- /.row -->

            <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


@endsection
