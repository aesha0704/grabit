@extends('layout')
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
                <a href="{{ route('shop.create') }}"> <button type="button" class="btn btn-primary">Add New</button></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Image</th>
                        <th>Contact</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($Shops as $key=>$User)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $User->name }}</td>
                            <td>{{ $User->email }}</td>
                            <td>{{ $User->Image }}</td>
                            <td>{{ $User->phone }}</td>
                            <td>{{ $User->status }}</td>
                            <td>
                                <a  href="{{route('categories.index')}}"><button class="btn-primary">Categories
                                    </button></a>
                                <a  href="{{route('product.index')}}"><button class="btn-primary">MenuList
                                    </button></a>
                                <button class="btn-default" href="">Edit
                                    <i class="fa fa-eye"></i>
                                </button>
                                <button class="btn-danger" href="">Delete
                                    <i class="fa fa-remove"></i>
                                </button>

                                <form id="resource-delete-{{ $User->id }}" action="" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
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


