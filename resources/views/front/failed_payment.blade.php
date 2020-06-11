<!DOCTYPE html>
<html>
<head>
    <title></title>
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
            <i class="fa fa-times" style="color: red;font-size: 40px; display: inline-block;
        border-radius: 60px;
        box-shadow: 0px 0px 2px #888;
        padding: 0.5em 0.6em;"></i>
            <br>
            <h3 style="color:darkslategrey" class="mt-2">Ooops ! Your Payment Is Failed.</h3>
            <p>Please Try Again &nbsp;</p><i class="fa fa-frown-o" style="color: green;font-size: 30px"></i><br>
            <a href="{{route('front_home.index')}}" class="pull-right btn btn-success">
                Go Back To Home
            </a>
        </div>

    </div>
</center>

</body>
</html>
