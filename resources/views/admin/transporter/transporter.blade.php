@extends('admin.layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                TRANSPORTER

            </h1>
            <ol class="breadcrumb">
                <li><i class="fa fa-dashboard"></i> Home</li>
                <li>Transporter</li>
            </ol>
        </section>

        <div class="box">
            <div class="box-header">
                <a href="{{ route('transporter.create') }}"> <button type="button" class="btn btn-primary">Add New</button></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Contact</th>
{{--                        <th>Image</th>--}}
                        <th>Rating</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($transporter as $key=>$User)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $User->name }}</td>
                            <td>{{ $User->email }}</td>
                            <td>{{ $User->address }}</td>
                            <td>{{ $User->phone }}</td>
{{--                            <td><img src="{{asset('uploads/transporter/'.$User->avatar)}}" alt="image" height="100px" width="100px"></td>--}}
                            <td>
                                <span class="review-stars" style="color: #1e88e5;">
                                 @if($User->rating <= 0)
                                            <i class="fa fa-star-o" aria-hidden="true"></i>
                                            <i class="fa fa-star-o" aria-hidden="true"></i>
                                            <i class="fa fa-star-o" aria-hidden="true"></i>
                                            <i class="fa fa-star-o" aria-hidden="true"></i>
                                            <i class="fa fa-star-o" aria-hidden="true"></i>
                                        @elseif($User->rating === 1)
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star-o" aria-hidden="true"></i>
                                            <i class="fa fa-star-o" aria-hidden="true"></i>
                                            <i class="fa fa-star-o" aria-hidden="true"></i>
                                            <i class="fa fa-star-o" aria-hidden="true"></i>
                                        @elseif($User->rating === 2)
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star-o" aria-hidden="true"></i>
                                            <i class="fa fa-star-o" aria-hidden="true"></i>
                                            <i class="fa fa-star-o" aria-hidden="true"></i>
                                        @elseif($User->rating === 3)
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star-o" aria-hidden="true"></i>
                                            <i class="fa fa-star-o" aria-hidden="true"></i>
                                        @elseif($User->rating === 4)
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star-o" aria-hidden="true"></i>
                                        @elseif($User->rating >= 5)
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                    @endif
                            </span></td>
                            <td>

                                <form action="{{ route('transporter.destroy',$User->id) }}" method="POST" enctype="multipart/form-data">

                                    @csrf
                                    <a class="btn" href="{{ route('transporter.edit',$User->id) }}"><span class="glyphicon glyphicon-pencil" style="color: red"></span></a>

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


