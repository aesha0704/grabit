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
            @guest
                @if (Route::has('register'))
                    <a class="btn theme-btn pull-right" href="{{route('register')}}">Register</a>
                @endif
                <a href="{{route('login')}}" class="btn btn-link  pull-right"><big><font color="black">Login</font></big></a>

            @else
                <li class="nav-item dropdown pull-right">

                    <a id="navbarDropdown" class="nav-link dropdown-toggle btn btn-success" href="#"
                       role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <i class="fa fa-user"></i> {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" >
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest


        </div>
    </nav>
    <div class="container m-t-30">
        <div class="row" style="background-color:#5cb85c">
            <div class="form-group col-md-12">
                <center>  <span><b><font color="white" size="6px">Check Out</font></b></span></center>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-7" style="background-color: white">
                <div class=" clearfix">
                    <div class="main-block">

                        @guest
                            @if (Route::has('register'))
                                <a class="btn theme-btn pull-right" href="{{route('register')}}">Register</a>
                            @endif
                                <a href="{{route('login')}}" class="btn btn-link  pull-right"><big><font color="black">Login</font></big></a>
                        @else

                        <?php
                            $user_add=\App\User_address::where('user_id',Auth::user()->id)->get();
                        ?>
                                <div class="row">
                                    <div class="form-group  col-md-12 mx-auto blue-gradient rounded alert" style="background-color: white">
                                       <font class="form-group ml-1" size="5px">{{Auth::user()->name}} <i class="fa fa-check" style="color: #5cb85c"></i></font><br>
                                        <font class="form-group ml-1 mt-5" size="5px">{{Auth::user()->email}} <i class="fa fa-check" style="color: #5cb85c"></i></font>

                                    </div>
                                </div>

                        <div class="row" style="background-color: lavender">
                            <div class="col-md-12 form-group mt-2"> </div>

                        </div>



{{--                                <div class="mb-3">--}}
{{--                                    <label for="email">Email </label>--}}
{{--                                    <input type="email" class="form-control" id="email" value="">--}}
{{--                                </div>--}}

                            @if(!$user_add->isEmpty())
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-8 form-group mt-2">--}}


                                        <b><font size="5px" class="form-group ">Check Address for food delivery</font></b>

                                        <br><br>
                                    <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <b><label for="address">Building No & Name</label></b>
                                        <input type="text" class="form-control" name="building" value="{{$user_add[0]->building}}">
                                         </div>
                                    </div>
                                    <div class="col-md-6">
                                        <b><label for="address">Street/Area</label></b>
                                        <input type="text" class="form-control" name="street" value="{{$user_add[0]->street}}">
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-md-6">
                                    <b><label for="address">City</label></b>
                                    <input type="text" class="form-control" name="city" value="{{$user_add[0]->city}}">
                                </div>

                                <div class="col-md-6">
                                    <b> <label for="address">Pincode</label></b>
                                    <input type="text" class="form-control" name="pincode" value="{{$user_add[0]->pincode}}">
                                </div>
                                </div>
                                <form method="POST" action="{{route('checkout.store')}}">
                                    @csrf
                                    <hr class="mb-4">
                                        <input type="hidden" name="shop_id" value="{{$shop[0]->id}}">
                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                <h4 class="mb-3">Payment</h4>

                                <hr class="mb-4">
                                <button class="btn btn-success btn-lg btn-block" type="submit">Continue to checkout</button><br><br>
                                </form>

{{--                                <h1>not Empty</h1>--}}
                            @else
                                            <b><font size="5px" class="form-group ">Enter Address for food delivery</font></b>


                                <form method="POST" action="{{route('checkout.update',Auth::user()->id)}}" class="needs-validation" novalidate>
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="shop_id" value="{{$shop[0]->id}}">

                                    <br><br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <b><label for="address">Building No & Name</label></b>
                                                <input type="text" class="form-control" name="building">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <b><label for="address">Street/Area</label></b>
                                            <input type="text" class="form-control" name="street">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <b><label for="address">City</label></b>
                                            <input type="text" class="form-control" name="city">
                                        </div>

                                        <div class="col-md-6">
                                            <b> <label for="address">Pincode</label></b>
                                            <input type="text" class="form-control" name="pincode">
                                        </div>

                                    </div>

                                    <hr class="mb-4">
                                    <h4 class="mb-5 ml-1">Payment</h4>

                                    <hr class="mb-4">
                                    <button class="btn btn-success btn-lg btn-block" type="submit">Continue to checkout</button>
                                    <br><br>
                                </form>


                            @endif



                                                @endguest
            </div>
                </div>
            </div>
    <div class="col-md-1"> </div>

            <div class="col-md-4 " id="dis"  >
                <div class="sidebar-wrap">
                    <div class="widget widget-cart">
                        <div class="widget-heading">
                            <div class="rest-logo pull-left" >
                                <a class="restaurant-logo pull-left mr-2" href="#"><img src="{{asset('uploads/shop/logo/'.$shop[0]->avatar)}}" width="100"></a>
                            </div>

                            <div class="h3">{{$shop[0]->name}}  </div>
                            <div class="clearfix"></div>
                        </div>
                        <?php $total=0;?>
                        @foreach($cart as $value)
                        <?php
                            $product=\App\Product::with('images','prices','categories','cart')->where('id',$value->product_id)->get();
                            $total=$total+($value->quantity * $product[0]->prices->price);
                            ?>

                        <div class="order-row bg-white" >
                            <div class="widget-body">
                                <div ><font size="5px"><b>{{$product[0]->name}}</b></font></div>
                 <div class="row">
                     <div class="col-md-8">
                         {{$product[0]->description}}
                     </div>
                        <div class="col-md-4">
                            <b>Quntity</b>
                             <input class="form-control" type="text" value="{{$value->quantity}}" disabled>
                        </div>
                 </div>
                                <br>
                                        <h3><i class="fa fa-inr"></i>{{$value->quantity * $product[0]->prices->price}}</h3>

                            </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                <div class="row" ><div class="col-md-8"></div>
                    <div class="col-md-4">
                <div class="order-row bg-white">

                    <div class="widget-body">
                        <div class="price-wrap text-xs-center">
                            <b><p>TOTAL</p></b>
                            <h3 class="value"><i class="fa fa-inr" style="font-size: 15px"></i><strong>{{$total}}</strong></h3>
                        </div>
                    </div>
                </div></div>

                <!-- end:Order row -->
                </div>
        </div>
        </div>
    </div>


</body>
@endsection
