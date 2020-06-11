<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <style>
        .theme-btn {
            background-color:#ff3300;
            border-color: #f30;
            color: #fff
        }
        body{
            background-color:lightgrey;
        }
    </style>
</head>

<body>
@if ($message = Session::get('success'))
    <div class="form-group mt-4 mb-3 col-md-5 mx-auto blue-gradient rounded alert" style="background-color: white">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <center> <strong>{{\Illuminate\Support\Facades\Session::get('success')}}</strong></center>
    </div>
@endif
@if ($message = Session::get('empty'))
    <div class="form-group mt-4 mb-3 col-md-5 mx-auto blue-gradient rounded alert" style="background-color: white">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <center> <strong>{{\Illuminate\Support\Facades\Session::get('empty')}}</strong></center>
    </div>
@endif
<div class="content-wrapper" >
    <div class="row ">

        <div class="form-group mt-4 mb-3 col-md-5 mx-auto blue-gradient rounded" style="background-color: white">
            <center>
                <h2 style="color:#ff3300">Your Cart</h2><hr>
            </center>
            @foreach($cart as $key=>$value1)

                <?php
                $pid=$value1->product_id;


                $product=\App\Product::with('images','prices','categories','cart')->where('id',$pid)->get();
                ?>

                @foreach($product as $value)

                    <div class="row mt-3">
                        <div class="col-md-3">
                            <img src="{{asset('uploads/product/'.$value->images[0]->url)}}" width="100" alt="Food logo">
                        </div>
                        <div class="col-md-5">
                            <h4>{{$value->name}}</h4>
                            <h6 style="color: grey">{{$value->description}}</h6>

                            <b> <span class="price pull-left">&#8377;{{$value->prices->price}}</span></b>
                        </div>
                        <div class="col-md-1 mt-5">
                            <form action="{{route('addtocart.destroy',$value->cart[0]->id)}}"  method="post"enctype="multipart/form-data">
                                @csrf
                                @method('DELETE')
                                <br>
                                <button class="btn-danger btn" >Remove
                                </button>
                            </form>
                        </div>
                    </div>
                    <hr>
                @endforeach

            @endforeach

            <div class="row">

                    @if(!$cart->isEmpty())
                    <div class="col-md-6">

                    <a href="{{route('front_home.show',$product[0]->shop_id)}}" class="btn btn-default pull-left mb-3" style="float: left;">Close</a>
                    </div>
                       <div class="col-md-6">
                           <a href="{{route('checkout.show',$product[0]->shop_id)}}" class="btn btn-success pull-right mb-3" style="float: right">Checkout</a>
                       </div>
                    @else
                    <div class="col-md-6">

                    <a href="{{route('front_home.index')}}" class="btn btn-success pull-left mb-3" style="float: left;">Close</a>
                    </div>
                    <div class="col-md-6">

                    <button  class="btn btn-success pull-right mb-3" style="float: right" disabled>Checkout</button>

                    </div>
                    @endif



            </div>
        </div>
    </div>

</div>


</body>

