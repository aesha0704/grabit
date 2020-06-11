{{--@extends('front_layout')--}}
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        body{
            background-color: lavender;
        }
        /*i.fa {*/
        /*   */

        /*}*/
    </style>
</head>
<body>
<br>
<center>
    <div class="row">
        <div class="form-group mb-3 col-md-4  p-3 mx-auto black-gradient rounded" style="background-color: white">
            <i class="fa fa-check" style="color: green;font-size: 40px; display: inline-block;
        border-radius: 60px;
        box-shadow: 0px 0px 2px #888;
        padding: 0.5em 0.6em;"></i>
            <br>
            <h3 style="color:darkslategrey" class="mt-2">Your Payment Is Successfull.</h3>
            <p>Thank You For Your Order &nbsp;</p><i class="fa fa-smile-o" style="color: green;font-size: 30px"></i><br>
            <a href="{{route('hey',$uid)}}" class="btn btn-light pull-right"><b>Download Invoice</b></a>

        </div>
    </div>
</center>

<form method="post" action="{{route('feedback.store')}}" enctype="multipart/form-data">
    <div class="row">
        <div class="form-group mb-3 col-md-4  p-3 mx-auto black-gradient rounded" style="background-color: white">
            {{--        <a href="{{route('front_home.index')}}" class="btn close">&times;</a>--}}
            <b><h3>Give your valuable feedback</h3></b>
            <br>
            <p>How likely is it that you would recommend Grabit to a friend or colleague?</p>
            <div class="form-group">
                <input type="hidden" name="uid" value="{{$uid}}">

                <button value="1" name="rating" class="btn btn-secondary" type="submit">1</button>
                <button value="2" name="rating" class="btn btn-secondary" type="submit">2</button>
                <button value="3" name="rating" class="btn btn-secondary"  type="submit">3</button>
                <button value="4" name="rating" class="btn btn-secondary" type="submit">4</button>
                <button value="5" name="rating" class="btn btn-secondary" type="submit">5</button>
                <button value="6" name="rating" class="btn btn-secondary" type="submit">6</button>
                <button value="7" name="rating" class="btn btn-secondary" type="submit">7</button>
                <button value="8" name="rating" class="btn btn-secondary" type="submit">8</button>
                <button value="9" name="rating" class="btn btn-secondary" type="submit">9</button>
                <button value="10" name="rating" class="btn btn-secondary"  type="submit">10</button>
{{--                <input type="hidden" name="shop_id" value="{{$datas}}">--}}
            </div>

        </div>
    </div>
</form>
<center> <a class="btn btn-success"  href="{{route('front_home.index')}}"><b>Want Some More Food ?</b></a></center>

</body>
</html>
