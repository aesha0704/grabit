@extends('front_layout')

@section('content')
    <head>
        <style>
            body{
                background-color: lavender;
            }
            #dis{
                height:500px;
                overflow-y: scroll;
            }
        </style>
    </head>
    <body>

    <nav class="navbar navbar-dark">

        <div class="container">
            <br>



        </div>
    </nav>
    <div class="container m-t-30">
        <div class="row" style="background-color:#5cb85c">
            <div class="form-group col-md-12">
                <center>  <span><b><font color="white" size="6px">My Profile</font></b></span></center>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12" style="background-color: white">
                <div class=" clearfix">
                    <div class="main-block">



                            <?php

                            $user=\App\User::where('id',Auth::user()->id)->first();
                            ?>
                            <div class="row">
                                <div class="form-group  col-md-12 mx-auto blue-gradient rounded alert" style="background-color: white">
                                    <b><font class="form-group ml-1" size="5px">{{$user->name}} <i class="fa fa-check" style="color: #5cb85c"></i></font><br></b>
                                    <font class="form-group ml-1 mt-5" size="3px">{{$user->phone}} </font>

                                    <font class="form-group ml-1 mt-5" size="3px">{{$user->email}} </font>


                                </div>
                            </div>

                            <div class="row" style="background-color: lavender">
                                <div class="col-md-12 form-group mt-2"> </div>

                            </div>
                                <div class="row">
                                    <div class="form-group  col-md-12 mx-auto blue-gradient rounded alert" style="background-color: white">
                                        <b><font class="form-group ml-1" size="6px">My Orders </font><br></b>
                                        <hr>
                                        

                                           <?php $order=\App\User_cart::where('user_id',Auth::user()->id)->withTrashed()->get();
                                           ?>
                                        @foreach($order as $value)
                                            <?php
                                            $product=\App\Product::where('id',$value->product_id)->first();



                                                    $price=\App\ProductPrice::where('product_id',$product->id)->first();
                                                    $shop=\App\Shop::where('id',$product->shop_id)->first();
                                                    $invoice=\App\Order_invoice::where('order_id',$value->order_id)->first();


                                                    ?>
                                                    <br>
                                            <div class="row">
                                            <div class="col-md-2">
                                                <img src="{{asset('uploads/shop/logo/'.$shop->avatar) }} " height="100px" width="100px" >

                                            </div>
                                                <div class="col-md-2">

                                                    <h4><b>{{$shop->name}}</b></h4>
                                                </div>
                                                <div class="col-md-3">


                                                <h6>{{$product->name}}</h6>

                                                <h6> Price : {{$price->price}}</h6>
                                                    <h6>Qty : {{$value->quantity}}</h6>
                                                </div>

                                                    <h6>Order Id : #{{$value->order_id}}</h6><span>Ordered On : {{$value->created_at}}</span>
<br><br><br>
                                                    <h5 class="pull-right">Total Pay: {{$value->quantity *$price->price}}</h5>

                                                </div>
                                            <hr>


                                        @endforeach


                                    </div>
                                </div>


                    <!-- end:Order row -->
                </div>
            </div>
        </div>
    </div>
    </div>


    </body>
@endsection
