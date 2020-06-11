@extends('shop.layout')
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
                <a href="{{ route('shop_banner.create') }}"> <button type="button" class="btn btn-primary">Add New</button></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Shop Name</th>
                        <th>Images</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
{{--                    @foreach($shop_banner as $key=>$User)--}}
                        <tr>
                            <td>    </td>

                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                 <form action="#" method="POST">
                                    @csrf
                                    @method('GET')
                                    <button type="submit" class="btn btn-success fa fa-edit" ></button>
                                </form>
                                <form action="#" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger fa fa-trash"></button>
                                </form>

                            </td>


                        </tr>
{{--                    @endforeach--}}
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


