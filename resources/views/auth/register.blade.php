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
        .theme-btn {
            background-color:#ff3300;
            border-color: #f30;
            color: #fff
        }
        #id1{
            background-image: url("uploads/grabit_logo/grabit.jpg");
            background-size: cover;

        }
    </style>
</head>
<body>
<br>
<div class="container-fluid">
    <div id="id1">
        <br><br>

        <form  method="POST" action="{{ route('register') }}">
        @csrf
        <div class="row ">
            <div class="form-group mb-3 col-md-3 shadow-lg p-3 mx-auto blue-gradient rounded" style="background-color: white">
                <a href="{{route('front_home.index')}}" class="btn close">&times;</a>
                <h4>Register</h4>
                <hr>

                <div class="form-group mb-3">
                    <label > <b>Enter Name</b> </label>
                    <div class="input-group">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name"  placeholder="Enter Name" autofocus>
                        <div class="input-group-append">
                            <span class="input-group-text">*</span>
                        </div>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>



                <div class="form-group mb-3">
                    <label > <b>Enter E-mail</b> </label>
                    <div class="input-group">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"placeholder="Enter E-mail" required autocomplete="email">

                        <div class="input-group-append">
                            <span class="input-group-text">*</span>
                        </div>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <label > <b>Password</b> </label>
                <div class="input-group">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    <div class="input-group-append">
                        <span class="input-group-text">*</span>
                    </div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>



                <label > <b>Confirm Password</b> </label>
                <div class="input-group">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    <div class="input-group-append">
                        <span class="input-group-text">*</span>
                    </div>
                </div>

                <br>
                <div class="form-group mb-3 bg-light ml-auto">
                    <button type="submit" class="btn theme-btn btn-block">Register</button>
                </div>

            </div>
        </div>

    </form>
        <br><br><br><br>
    </div>
</div>
</body>
</html>
