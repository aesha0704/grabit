@extends('admin.layout')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            CREATE TRANSPORTER
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">

                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <!-- general form elements -->
                <div class="box box-primary">
                    <form role="form"  action="{{ route('transporter.update',$transporter->id) }}" enctype="multipart/form-data" method="post">
                        @csrf
                        @method('PUT')

                        <div class="card-body">

                            <div class="form-group">
                                <label >Name</label>
                                <input type="text" name="name" class="form-control" id=" " placeholder="Enter name"  value="{{$transporter->name }}">
                            </div>
                            <div class="form-group">
                                <label >Email Address</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter Email Address"  value="{{$transporter->email }}">
                            </div>

                            <div class="form-group">
                                <label >Address</label>
                                <textarea type="text" name="address" class="form-control" placeholder="Enter address"  >{{$transporter->address }}</textarea>
                            </div>
                            <div class="form-group">
                                <label >Area</label>
                                <input type="text" name="area" class="form-control" placeholder="Enter area"  value="{{$transporter->area }}">
                            </div>
                            <div class="form-group">
                                <label >Sub area</label>
                                <input type="text" name="subarea" class="form-control" placeholder="Enter Sub area"  value="{{$transporter->subarea }}">
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" accept="image/*" required name="image[]" id="image" multiple="">

                            </div>
                            <div class="form-group">
                                <label >Phone</label>
                                <input type="text" name="phone" class="form-control" placeholder="Enter Phone number"  value="{{$transporter->phone }}">
                            </div>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
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


