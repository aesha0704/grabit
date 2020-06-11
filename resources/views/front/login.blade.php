@extends('layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                ADMIN PROFILE
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
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
            <div class="row">
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <form role="form" id="quickForm" method="post" >
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">

                                    <img src="{{'public\storage\admin\profile'}}" class="img-circle" alt="Cinque Terre">
                                </div>
                                <div class="form-group">
                                    <label >Name </label>
                                    <input type="text" name="name" value="{{$admin->name}}" class="form-control">

                                </div>

                                <div class="form-group">
                                    <label >Email Address </label>
                                    <input type="text" name="email" value="{{$admin->email}}" class="form-control">

                                </div>

                                <div class="form-group">
                                    <label >Contact number </label>
                                    <input type="text" name="phone" value="{{$admin->phone}}" class="form-control">

                                </div>

                                <div class="form-group">
                                    <label >Password </label>
                                    <input type="password" name="password" value="{{$admin->password}}" class="form-control">

                                </div>

                                <div class="form-group">
                                    <label >Status</label>
                                    <select name="status">
                                        <?php $val='{{$admin->status}}';

                                        if($val=='active'){
                                            echo "<option value='active' selected>Active</option>

                                            <option value='onbording'>Onbording</option>";
                                        }
                                        else{
                                            echo "<option value='active' >Active</option>

                                            <option value='onbording' selected>Onbording</option>";

                                        }

                                        ?>
                                    </select>
                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">

                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


@endsection


