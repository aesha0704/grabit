@extends('layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Order

            </h1>
            <ol class="breadcrumb">
                <li><i class="fa fa-dashboard"></i> Home</li>
                <li class="active">Order</li>
            </ol>
        </section>

        <div class="box">

            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Shop Name</th>
                        <th>Quantity</th>
                        <th>User Name</th>
                        <th>Total Pay</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order as $key=>$User)
                        <tr>
                            <td>{{ $User->id }}</td>
                            <td>{{ $User->shop['name']}}</td>
                            <td>{{$User->invoice['quantity']}}</td>
                            <td>{{ $User->user['name']}}</td>
                            <td>{{$User->invoice['total_pay']}}</td>

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


