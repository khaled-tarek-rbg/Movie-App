<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href=" {{ asset('auth/css/all.min.css ') }}">
    <link rel="stylesheet" href=" {{ asset('auth/css/bootstrap.min.css ') }}">
    <link rel="stylesheet" href=" {{ asset('auth/css/login.css ') }}">
    <title>login</title>
</head>

<body class="d-flex justify-content-center align-items-center" style="height: 100vh">


    <div class="container">
        <div class="row">
            <div class="col-lg-5 mx-auto">
                <form method="POST" action="{{ route('login') }}" style="background-color: #232848; color : #fff">
                    @csrf


                    <div class="form-header d-flex justify-content-center align-items-center">
                        <p class="m-0">Login to movie app</p>

                    </div>
                    <div class="form-body">
                        <h1 class="text-center py-4">MOVIE APP</h1>


                        <div class="col-lg-12">
                            <input id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>



                        <div class="col-lg-12 mt-2">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>



                        <button class="btn btn-danger w-100 mt-2 " type="submit">Login</button>


                        <div class="col-lg-12">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link text-white" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </div>

                    <div class="form-footer  d-flex  justify-content-between pt-4 ">
                        <a href="{{ route('register') }}">create new account</a>
                        <a href="#">continue using facebook</a>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <script src=" {{ asset('auth/js/all.min.js ') }}"></script>
    <script src=" {{ asset('auth/js/bootstrap.bundle.js ') }}"></script>
</body>

</html>
