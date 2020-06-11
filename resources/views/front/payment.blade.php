@extends('front_layout')

@section('content')
<head>
    <style>
        body{
            background-color: lavender;
        }
    </style>
</head>
<body>
        <!-- .navbar -->
        <nav class="navbar navbar-dark">

            <div class="container"><br>
            <li class="nav-item dropdown " style="color: lavender">
                <a id="navbarDropdown" class="nav-link dropdown-toggle btn btn-success pull-right" href="#"
                   role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <i class="fa fa-user"></i> {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" >
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>

        </div>
    </nav>

    <div class="container m-t-30" style="background-color:white">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                <div class="sidebar-wrap">
                    <form method="POST" action="{{route('order.store')}}">
                        @csrf

{{--                    <div class="widget widget-cart">--}}
{{--                        <div class="widget-heading">--}}

                            <div class="pull-left ml-1 mt-1 mr-2">

                                <a class="restaurant-logo pull-left" href="#"><img src="{{asset('uploads/shop/logo/'.$shop[0]->avatar)}}" width="100"></a>
                            </div>

                        <div ><font size="6px" ><b>  {{$shop[0]->name}} </b> </font>
                            <input type="hidden" value="{{$shop[0]->id}}" name="shop_id" >
                            <input type="hidden" value="{{Auth::user()->id}}" name="user_id" >
                        </div>
                        <?php $total=0; $quantity=0;?>

                    @foreach($cart as $value)
                            <?php
                            $product=\App\Product::with('images','prices','categories','cart')->where('id',$value->product_id)->get();
                            $total=$total+($value->quantity * $product[0]->prices->price);
                            $quantity=$quantity+$value->quantity;
                            ?>

                            <div class="order-row bg-white">
                                <div class="widget-body">
                                    <div><font size="4px" ><b> {{$product[0]->name}}</b></font>
                                    <div class="form-group row no-gutter">
                                        <div><b>Quntity</b>
<div class="row"><div class="col-md-2"></div>
                                        <div class="col-xs-1 mr-1">
                                            <input class="form-control" type="text" value="{{$value->quantity}}" disabled></div>
                                            <h3><i class="fa fa-inr">{{$value->quantity * $product[0]->prices->price}}</i></h3></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
<hr>
                    @endforeach
                    <!-- end:Order row -->
                        <div class="widget-body">
                            <div class="price-wrap text-xs-center">
                                <p><b>TOTAL</b></p>
                                <h3 class="value"><i class="fa fa-inr"></i><strong>{{$total}}</strong></h3>
                                <input type="hidden" value="{{$total}}" name="total_pay" >
                                <input type="hidden" value="{{$quantity}}" name="quantity" >
                            </div>
                        </div>
                        <hr class="mb-2">
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Continue To Pay</button>

<br>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
