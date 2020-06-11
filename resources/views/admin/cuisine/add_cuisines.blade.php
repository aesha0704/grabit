@extends('admin.layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                CREATE CUISINES
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
                {{--                  @endif--}}
                <!-- general form elements -->
                    <div class="box box-primary">
                        <form role="form" method="POST" action="{{ route('cuisine.store') }}">
                            @csrf
                            <div class="card-body">

                                <div class="form-group">
                                    <label >Name</label>
                                    <input type="text" name="name" class="form-control" id=" " placeholder="Enter name">
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>
                <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


@endsection



