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
    <style>
        body
        {
            background-color:lavender;
        }
        .theme-btn {
            background-color:#ff3300;
            border-color: #f30;
            color: #fff
        }

    </style>
</head>
<body>
<div class="container-fluid">
    <div id="id1">
        <br><br><br><br><br>

        <form action="{{ url('payment') }}" class="form-image-upload" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row ">
                <div class="form-group mb-3 col-md-3 p-3 mx-auto blue-gradient rounded" style="background-color: white">
                    <div style="background-color:#5cb85c"><font style="color: white"  size="6px"><center ><b>Grab-It</b></center></font></div>
                    <hr>

                    <div class="form-group mb-3">
                        <label > <b>Mobile No:</b> </label>
                        <div class="input-group">
                            <input type="text" name="mobile_no" class="form-control" placeholder="Mobile No." maxlength="10" required>
                            <input type="hidden" name="fee" value="{{$oprice}}">
                            <input type="hidden" name="order_invoice_id" value="{{$oidc}}">
                            <input type="hidden" name="user_id" value="{{$datau}}">

                        </div>
                    </div>

                    <b> Total Pay: {{$oprice}} Rs/-</b>


                    <br><br>
                    <div class="form-group mb-3 bg-light ml-auto pull-right">
                        <button type="submit" class="btn btn-success">Pay To PayTm</button>
                    </div>

                </div>
            </div>

        </form>
        <br><br><br><br>

    </div>
</div>
</body>
</html>









