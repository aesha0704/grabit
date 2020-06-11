@extends('layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Products

            </h1>
            <ol class="breadcrumb">
                <li><i class="fa fa-dashboard"></i> Home</li>
                <li>Shop</li>
                <li class="active">Products</li>
            </ol>
        </section>

        <div class="box">
            <div class="box-header">
                <a href="{{ route('pro',$Product[0]->shop_id)}}" class="btn btn-primary"> Add New</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Pure Veg</th>
                        <th>Status</th>
                        <th>Image</th>
                        <th>Out of Stock</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
<?php //        $Product = \App\Product::with('images','categories','prices')->get();?>
                    @foreach($Product as $value)

                        <tr>
                            <td>{{ $value->id}}</td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->description }}</td>
                            <td>{{ $value->categories[0]->category_name}}</td>
                            <td>{{ $value->food_type}}</td>
                            <td>{{ $value->status}}</td>


                            <td> <img src="{{asset('uploads/product/'.$value->images[0]->url)}}" width="100"></td>
{{--                            <td><img src="{{url('$value->url')}}" width="100px" height="100px"></td>--}}
                            <td>{{ $value->out_of_stock}}</td>

                            <td>
                                <form action="{{route('product.destroy',$value->id)}}"  method="post"enctype="multipart/form-data">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn" href="{{route('product.edit',$value->id)}}"><span class="glyphicon glyphicon-pencil" style="color: red"></span></a>
                                    <button class="btn" href=""><span class="glyphicon glyphicon-trash" style="color: red"></span></button>
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



