@extends('layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Order Report   </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">

                {{--                    @if ($errors->any())--}}
                {{--                        <div class="alert alert-danger">--}}
                {{--                            <strong>Whoops!</strong> There were some problems with your input.<br><br>--}}
                {{--                            <ul>--}}
                {{--                                @foreach ($errors->all() as $error)--}}
                {{--                                    <li>{{ $error }}</li>--}}
                {{--                                @endforeach--}}
                {{--                            </ul>--}}
                {{--                        </div>--}}
                {{--                @endif--}}
                <!-- general form elements -->
                    <div class="box box-primary">
                        <form role="form" method="POST" action="{{route('ord_report1')}}">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label >Restaurant</label>
<?php $shop=\App\Shop::all();?>
                                            <select name="restaurant" class="form-control" id="">
                                                @foreach($shop as $value)
                                                <option value="{{$value->id}}">{{$value->name}}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
{{--                                        <div class="form-group">--}}
{{--                                            <label >Payment method</label>--}}
{{--                                            <select name="payment" class="form-control" id="">--}}
{{--                                                <option>Paytm</option>--}}
{{--                                            </select>--}}
{{--                                        </div>--}}
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label >Start Date</label>
                                            <input type="date" name="startdate" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label >End Date</label>
                                            <input type="date" name="enddate" class="form-control">
                                        </div>
                                    </div>
                                </div>
<center>
                                <div class="row">
                                    <div class="form-group">
                                        <button type="submit" name="search" class="btn btn-primary ">Search</button>
                                    </div>
                                </div>
</center>
                                <a href="{{route('rep')}}" class="btn btn-primary ">Download Pdf</a><br><br>

                                <div class="box-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>S.no</th>
                                            <th>Customer Name</th>
{{--                                            <th>Delivery People</th>--}}
                                            <th>Restaurant</th>
                                            <th>Address</th>
                                            <th>Cost</th>
                                        </tr>
                                        </thead>
                                        <tbody>
{{--                                        @dd($order);--}}
                                        @if(isset($order))

                                            @foreach($order as $key=>$value1)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$value1->user->name}}</td>
{{--                                                <td></td>--}}
                                                <td>{{$value1->shop->name}}</td>
                                                <td>{{$value1->user_address['building']}},{{$value1->user_address['street']}},{{$value1->user_address['city']}}</td>
                                                <td>{{$value1->invoice['total_pay']}}</td>


                                            </tr>
                                            @endforeach
                                            @endif

                                        </tbody>
                                    </table>
                                </div>
                                @if(isset($order))

                                <?php $i=0;$j=0;?>
                    @foreach($order as $key=>$val)
                                <?php $iid[]=\App\Order_invoice::where('order_id',$val->id)->first();?>
                                    @foreach($iid as $val2)
                                        <?php
                                            $i=$val2->total_pay;
//                                        $i[$k]+=$val2->total_pay;
                                        ?>
                                    @endforeach
                             <?php   $j=$j+$i;?>

                                @endforeach



                                <div class="form-group">
                                    <h2>Total Earing :-<b>{{$j}}</b></h2>

                                </div>
                                    @endif
                        </form>

                    </div>

                </div>
            </div>

                <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


@endsection


