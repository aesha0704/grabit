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
<div class="container-fluid">
    <div id="id1">
        <br><br><br><br><br>

    <form  method="POST" action="{{ route('login') }}">
        @csrf
        <div class="row ">
            <div class="form-group mb-3 col-md-3 shadow-lg p-3 mx-auto blue-gradient rounded" style="background-color: white">
                <a href="{{route('front_home.index')}}" class="btn close">&times;</a>
                <h4>Login</h4>
                <hr>

                <div class="form-group mb-3">
                    <label > <b>Enter E-mail</b> </label>
                    <div class="input-group">
                        {{--                        <i class="fa fa-user-o"></i>--}}
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter E-mail">
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
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter Password" required autocomplete="current-password">
                    <div class="input-group-append">
                        <span class="input-group-text">*</span>
                    </div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-check mt-2">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>



                <br>
                <div class="form-group mb-3 bg-light ml-auto">
                    <button type="submit" class="btn theme-btn btn-block">LogIn</button>
                    {{--                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <button type="button"class="btn  btn-default pull-right"data-dismiss="modal">Close</button>--}}
                </div>
                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>
        </div>

    </form>
        <br><br><br><br>

    </div>
</div>
</body>
</html>
