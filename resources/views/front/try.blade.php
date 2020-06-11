@extends('front_layout')
<!DOCTYPE html>
<html lang="en">
<body>
<div class="site-wrapper animsition" data-animsition-in="fade-in" data-animsition-out="fade-out">
    <!--header starts-->
    <header id="header" class="header-scroll top-header headrom">
        <!-- .navbar -->
        <nav class="navbar navbar-dark">

        <div class="container">
            <br>
            @if ($message = Session::get('cart'))
                <div class="form-group mt-4 mb-3 col-md-5 ml-5 blue-gradient rounded alert text-white" style="background-color:deepskyblue;">
                    <b><center> {{\Illuminate\Support\Facades\Session::get('cart')}}<i class="fa fa-check" aria-hidden="true"></i></center></b>

                </div>
            @endif
            @guest
                <a href="{{route('login')}}" class="btn btn-link  pull-right"><big><font color="white">Login</font></big></a>

                @if (Route::has('register'))
                    <a class="btn theme-btn pull-right" href="{{route('register')}}">Register</a>
                @endif


            @else

                <a class="btn btn-success pull-right"  href="{{route('addtocart.index')}}">
                    <i class="fa fa-shopping-cart fa-lg" style="color: white">Cart</i>
                </a>

                <ul class="nav-item dropdown pull-right">

                    <a id="navbarDropdown" class="nav-link dropdown-toggle btn btn-success" href="#"
                       role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <i class="fa fa-user"></i> {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('user_profile',Auth::user()->id) }}">

                            {{ __('Profile') }}
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" >
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </ul>



            @endguest

{{--            <a href="{{route('addtocart.index')}}" class="btn theme-btn pull-right"><i class="fa fa-shopping-cart" style="font-size:20px"></i>Cart</a>--}}

        </div>

        <!-- /.navbar -->
        </nav>
    </header>
    <div class="page-wrapper">
        <!-- top Links -->
        <div class="top-links">

            <div class="container">
                <ul class="row links">
                    <li class="col-xs-12 col-sm-3 link-item"><span>1</span><a href="index.html">Choose Your Location</a></li>
                    <li class="col-xs-12 col-sm-3 link-item"><span>2</span><a href="restaurants.html">Choose Restaurant</a></li>
                    <li class="col-xs-12 col-sm-3 link-item active"><span>3</span><a href="profile.html">Pick Your favorite food</a></li>
                    <li class="col-xs-12 col-sm-3 link-item"><span>4</span><a href="checkout.html">Order and Pay online</a></li>
                </ul>
            </div>

        </div>
        <!-- end:Top links -->
        <!-- start: Inner page hero -->

        <section class="inner-page-hero bg-image">
            <div class="container-fluid">
                <img src="{{asset('uploads/shop/shop_photo/'.$shop->photo) }}" width="100%" height="400px">
            </div>
        </section>
        <!-- end:Inner page hero -->

        <div class="breadcrumb">

            <div class="profile">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12  col-md-4 col-lg-4 profile-img">
                            <div class="image-wrap">
                                <figure><img src="{{asset('uploads/shop/logo/'.$shop->avatar) }}" alt="Profile Image"></figure>
                            </div>
                        </div>

                        <br><br>

                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 profile-desc">

                            <div class="pull-left right-text white-txt">

                                <h6><a href="#">{{$shop->name}}</a></h6>
                                <a class="btn btn-small btn-green">Open</a>
                                <br>

                                <p>{{$shop->description}}</p>
                                <ul class="nav nav-inline">
                                    <li class="nav-item"> <a class="nav-link active" href="#">&#8377;{{$shop->offer_min_amount}} FOR TWO</a> </li>
                                    <li class="nav-item"> <a class="nav-link" href="#"><i class="fa fa-motorcycle"></i>&nbsp;{{$shop->estimated_delivery_time}} Min</a> </li>
                                </ul>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="container m-t-30">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                    <div class="sidebar clearfix m-b-20">
                        <div class="main-block">
                            <div class="sidebar-title white-txt">
                                <h6>Category</h6>
                                <i class="fa fa-cutlery pull-right"></i>
                            </div>
                            <ul>
                                <?php  $cate=\App\Category::where('shop_id',$id)->get();
                                ?>
                                @foreach($cate as $cname)
                                    <li><a  class="scroll active">{{$cname->category_name}}</a></li>
                                @endforeach
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <!-- end:Sidebar nav -->
                        <div class="widget-delivery">
                            <form>

                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                                    <label class="custom-control custom-radio">
                                        <input id="radio2" name="radio" type="radio" class="custom-control-input" checked> <span class="custom-control-indicator"></span> <span class="custom-control-description">Takeout</span> </label>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="menu-widget m-b-30">


                        <?php  $cid=\App\Category::where('shop_id',$id)->get();
                        //                    $cid=$cid->toArray();
                        ?>

                        @foreach($cid as $value1)

                            <b><h4 class="widget-title text-dark ml-1 mr-1 mt-1 mb-1">
                                    {{$value1->category_name}} </h4></b>

                            <?php $demo=\App\Product::with('images','prices','categories')->where('parent_id',$value1->id)->where('shop_id',$id)->get();
                            ?>
                            @foreach($demo as $value)
                                <div class="collapse in" id="1">
                                    <div class="food-item white">
                                        <form method="post" action="{{route('addtocart.update',$value->id)}}">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="col-md-8">

                                                    <div class="rest-logo pull-left">
                                                        <a class="restaurant-logo pull-left" href="#"><img src="{{asset('uploads/product/'.$value->images[0]->url)}}" width="100px" height="100px"></a>
                                                    </div>
                                                    <!-- end:Logo -->
                                                    <div class="rest-descr">
                                                        <p> {{$value->name}}</p>
                                                        <p> {{$value->description}}</p>
                                                        <span class="price pull-left">&#8377;{{$value->prices->price}}</span>
                                                    </div>
                                                    <!-- end:Description -->
                                                </div>
                                                <!-- end:col -->

                                                {{--                                    <div class="col-xs-12 col-sm-12 col-lg-1 pull-right item-cart-info">--}}

                                                {{--                                    </div>--}}
                                                <div class="col-md-3  item-cart-info">
                                                    <div class="input-group">
									               	<span class="input-group-btn">
									                  	<button class="btn btn-minuse" type="button">-</button>
									               	</span>
                                                        <input type="text" class="form-control no-padding add-color text-center " value="1" min="1" name="quantity" style="width: 40px">
                                                        <div class="input-group-prepend">
                                                            <button class="btn btn-pluss " type="button">+</button>
                                                        </div>

                                                    </div>

                                                    {{--                                        <input class="ml-1" type="number"  value="1" style="width: 50px;height: 35px" name="quantity" min="1"  max="5">--}}
                                                </div>
                                                <div class="col-md-1 item-cart-info" onclick="here()">
                                                    <button class="btn btn-small btn btn-secondary pull-right mt-5">ADD</button>
                                                </div>


                                            </div>

                                        </form>
                                        <!-- end:row -->
                                    </div>

                                </div>
                                <!-- end:Collapse -->
                            @endforeach
                            <hr>
                        @endforeach

                    </div>
                    <!-- end:Widget menu -->
                    <!-- end:Widget menu -->
                    <!--/row -->
                </div>
                <!-- end:Bar -->
            {{--                <div class="col-xs-12 col-md-12 col-lg-3">--}}
            {{--                    <div class="sidebar-wrap">--}}
            {{--                        <div class="widget widget-cart">--}}
            {{--                            <div class="widget-heading">--}}
            {{--                                <h3 class="widget-title text-dark">--}}
            {{--                                    Your Shopping Cart--}}
            {{--                                </h3>--}}
            {{--                                <div class="clearfix"></div>--}}
            {{--                            </div>--}}
            {{--                            <div class="order-row bg-white">--}}
            {{--                                <div class="widget-body">--}}
            {{--                                    <div class="title-row">Pizza Quatro Stagione <a href="#"><i class="fa fa-trash pull-right"></i></a></div>--}}
            {{--                                    <div class="form-group row no-gutter">--}}
            {{--                                        <div class="col-xs-8">--}}
            {{--                                            <select class="form-control b-r-0" id="exampleSelect1">--}}
            {{--                                                <option>Size SM</option>--}}
            {{--                                                <option>Size LG</option>--}}
            {{--                                                <option>Size XL</option>--}}
            {{--                                            </select>--}}
            {{--                                        </div>--}}
            {{--                                        <div class="col-xs-4">--}}
            {{--                                            <input class="form-control" type="number" value="2" id="example-number-input">--}}
            {{--                                        </div>--}}
            {{--                                    </div>--}}
            {{--                                </div>--}}
            {{--                            </div>--}}
            {{--                            <div class="order-row">--}}
            {{--                                <div class="widget-body">--}}
            {{--                                    <div class="title-row">Carlsberg Beer <a href="#"><i class="fa fa-trash pull-right"></i></a></div>--}}
            {{--                                    <div class="form-group row no-gutter">--}}
            {{--                                        <div class="col-xs-8">--}}
            {{--                                            <select class="form-control b-r-0">--}}
            {{--                                                <option>Size SM</option>--}}
            {{--                                                <option>Size LG</option>--}}
            {{--                                                <option>Size XL</option>--}}
            {{--                                            </select>--}}
            {{--                                        </div>--}}
            {{--                                        <div class="col-xs-4">--}}
            {{--                                            <input class="form-control" value="4" id="quant-input">--}}
            {{--                                        </div>--}}
            {{--                                    </div>--}}
            {{--                                </div>--}}
            {{--                            </div>--}}
            {{--                            <!-- end:Order row -->--}}
            {{--                            <div class="widget-delivery clearfix">--}}
            {{--                                <form>--}}
            {{--                                    <div class="col-xs-6 col-sm-12 col-md-6 col-lg-6 b-t-0">--}}
            {{--                                        <label class="custom-control custom-radio">--}}
            {{--                                            <input id="radio4" name="radio" type="radio" class="custom-control-input" checked=""> <span class="custom-control-indicator"></span> <span class="custom-control-description">Delivery</span> </label>--}}
            {{--                                    </div>--}}
            {{--                                    <div class="col-xs-6 col-sm-12 col-md-6 col-lg-6 b-t-0">--}}
            {{--                                        <label class="custom-control custom-radio">--}}
            {{--                                            <input id="radio3" name="radio" type="radio" class="custom-control-input"> <span class="custom-control-indicator"></span> <span class="custom-control-description">Takeout</span> </label>--}}
            {{--                                    </div>--}}
            {{--                                </form>--}}
            {{--                            </div>--}}
            {{--                            <div class="widget-body">--}}
            {{--                                <div class="price-wrap text-xs-center">--}}
            {{--                                    <p>TOTAL</p>--}}
            {{--                                    <h3 class="value"><strong>$ 25,49</strong></h3>--}}
            {{--                                    <p>Free Shipping</p>--}}
            {{--                                    <button onclick="location.href='checkout.html'" type="button" class="btn theme-btn btn-lg">Checkout</button>--}}
            {{--                                </div>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            <!-- end:Right Sidebar -->
            </div>
            <!-- end:row -->

        </div>
        <!-- end:Container -->


    </div>
    <!-- end:page wrapper -->
</div>
<!--/end:Site wrapper -->
<!-- Modal -->
</body>


<!-- Mirrored from codenpixel.com/demo/foodpicky/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 13 May 2020 06:32:38 GMT -->
</html>

