@extends('shop.layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Products

            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Tables</a></li>
                <li class="active">Data tables</li>
            </ol>
        </section>

        <div class="box">
            <div class="box-header">
                <a href="{{ route('products.create') }}"> <button type="button" class="btn btn-primary">Add New</button></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Cuisine</th>
                        <th>Pure Veg</th>
                        <th>Status</th>
                        {{--                                    <th>Image</th>--}}
                        <th>Out of Stock</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($Product as $key=>$value)

                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->description }}</td>
                            <td></td>
                            <td></td>
                            {{--                                        <td>{{$value->Category->name}}</td>--}}
                            <td>{{ $value->food_type}}</td>
                            <td>{{ $value->status}}</td>
                            {{--                                        <td><img src="{{asset('public/products/'.$value->url)}}"></td>--}}
                            <td>{{ $value->out_of_stock}}</td>

                            <td>
                                <form action="{{route('products.destroy',$value->id)}}"  method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn-default" href="{{route('products.edit',$value->id)}}">Edit<i class="fa fa-eye"></i></a>
                                    <button class="btn-danger" href="">Delete<i class="fa fa-remove"></i></button>
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

    <!-- /.row -->
    <!-- /.content -->


@endsection



