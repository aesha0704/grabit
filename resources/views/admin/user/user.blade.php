@extends('admin.layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                RESTAURANT

            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Tables</a></li>
                <li class="active">Data tables</li>
            </ol>
        </section>

        <div class="box">
            <div class="box-header">
                <a href="{{ route('users.create') }}"> <button type="button" class="btn btn-primary">Add New</button></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($User as $key=>$value)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->email }}</td>
                            <td>{{ $value->password }}</td>
                            <td>{{ $value->phone }}</td>
                            <td>



                                <form action="{{route('users.destroy',$value->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
{{--                                    <a class="btn" href="{{route('users.edit',$value->id)}}">--}}
{{--                                        <span class="glyphicon glyphicon-pencil" style="color: red"></span>                                    </a>--}}
                                    <button class="btn" href="">
                                        <span class="glyphicon glyphicon-trash" style="color: red"></span>                                    </button>
                                </form>
                            </td>


                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->
    </section>
    <!-- /.content -->
    </div>

@endsection


