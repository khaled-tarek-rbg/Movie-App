<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('auth/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('auth/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('auth/css/login.css') }}">
    <title>registration</title>
</head>

<body class="d-flex justify-content-center align-items-center">


    <div class="container">
        <div class="row">
            <div class="col-lg-5 mx-auto">
                <form method="POST" action="{{ route('register') }}" style="background-color: #232848; color : #fff">

                    @csrf

                    <div class="form-header d-flex justify-content-center">

                        انشاء حساب جديد
                    </div>
                    <div class="form-body">
                        <h1 class="text-center py-4">MOVIE APP</h1>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">

                                <input type="text" class="form-control @error('firstName') is-invalid @enderror"
                                    placeholder="first name" name="firstName" value="{{ old('firstName') }}" required
                                    autocomplete="firstName" autofocus>


                                @error('firstName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <input type="text" class="form-control @error('lastName') is-invalid @enderror"
                                    placeholder="lastName" name="lastName" value="{{ old('lastName') }}" required
                                    autocomplete="lastName" autofocus>

                                @error('lastName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <input type="email" class="form-control mt-2 @error('email') is-invalid @enderror"
                                placeholder="email" name="email" value="{{ old('email') }}" required
                                autocomplete="email">


                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>





                        <div class="col-lg-12">
                            <input type="password" class="form-control mt-2 @error('password') is-invalid @enderror"
                                name="password" required autocomplete="new-password" placeholder="password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-lg-12">
                            <input type="password" class="form-control mt-2" name="password_confirmation" required
                                autocomplete="new-password" placeholder="confirmPassword">

                        </div>



                        <p class="mt-3 mb-3">birth date</p>

                        <div class="row">
                            <input name="birth_date" class="form-control" type="date">
                        </div>

                        <p class="my-2">gender</p>

                        <input type="radio" name="gender" id="male" value="male" required>
                        <label for="male">Male</label>
                        <input type="radio" name="gender" id="female" required value="female">
                        <label for="female">Female</label>
                        <button class="btn btn-danger w-100 mb-4 mt-2" type="submit"
                            style="background-color: #6BB45B;
                        ">register</button>
                    </div>

                    <div class="form-footer  d-flex  justify-content-center pt-4 ">
                        <a href="{{ route('login') }}"
                            style="background-color: #2D83F3;
                        ">تسجيل الدخول</a>

                        {{-- <a href="#">continue using facebook</a> --}}
                    </div>
                </form>
            </div>
        </div>
    </div>




    <script src="{{ asset('auth/js/all.min.js') }}"></script>
    <script src="{{ asset('auth/js/bootstrap.bundle.js') }}"></script>
</body>

</html>
