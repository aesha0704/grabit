@extends('admin.layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                CUISINES

            </h1>
            <ol class="breadcrumb">
                <li><i class="fa fa-dashboard"></i> Home</li>
                <li>Cuisines</li>
            </ol>
        </section>

        <div class="box">
            <div class="box-header">
                <a href="{{ route('cuisine.create') }}"> <button type="button" class="btn btn-primary">Add New</button></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cuisine as $key=>$User)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $User->name }}</td>

                            <td>

                                <form action="{{ route('cuisine.destroy',$User->id) }}" method="POST" enctype="multipart/form-data">

                                    @csrf

                                    @method('DELETE')

                                    <button type="submit" class="btn"><span class="glyphicon glyphicon-trash" style="color: red"></span></button>
                                </form>
                            </td>

                            {{--                            <td>--}}
                            {{--                                <a  href="{{route('categories.index')}}"><button class="btn-primary">Categories--}}
                            {{--                                    </button></a>--}}
                            {{--                                <a  href="{{route('products.index')}}"><button class="btn-primary">MenuList--}}
                            {{--                                    </button></a>--}}
                            {{--                                <button class="btn-default" href="">Edit--}}
                            {{--                                    <i class="fa fa-eye"></i>--}}
                            {{--                                </button>--}}
                            {{--                                <button class="btn-danger" href="">Delete--}}
                            {{--                                    <i class="fa fa-remove"></i>--}}
                            {{--                                </button>--}}

                            {{--                                <form id="resource-delete-{{ $User->id }}" action="" method="POST">--}}
                            {{--                                    {{ csrf_field() }}--}}
                            {{--                                    {{ method_field('DELETE') }}--}}
                            {{--                                </form>--}}
                            {{--                            </td>--}}


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


