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
                <li><i class="fa fa-dashboard"></i> Home</li>
                <li>Shop</li>
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
                        <th>Email Address</th>
                        <th>Logo</th>
                        <th>Photo</th>
                        <th>Contact Details</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($Shops as $key=>$User)
                        <tr>
                            <td>{{ $User->id }}</td>
                            <td>{{ $User->name }}</td>
                            <td>{{ $User->email}}</td>
                            <td><img src="{{asset('uploads/shop/logo/'.$User->avatar) }}" width="100px" height="100px"></td>
                            <td><img src="{{asset('uploads/shop/shop_photo/'.$User->photo) }}" width="100px" height="100px"></td>

                            <td>{{ $User->phone }}</td>
                            <td>{{ $User->status }}</td>
                            <td>
                                <a  href="{{route('categories.show',$User->id)}}"><button class="btn-primary">Categories
                                    </button></a> &nbsp;&nbsp;
                                <a  href="{{route('product.show',$User->id)}}"><button class="btn-primary">MenuList
                                    </button></a>
                                <br><br>

                                <form action="{{ route('shop.destroy',$User->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <a type="submit" href="{{route('shop.edit',$User->id)}}" class="btn btn-success fa fa-edit" ></a>
                                    <button type="submit" class="btn btn-danger fa fa-trash"></button>
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


