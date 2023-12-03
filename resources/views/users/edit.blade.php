<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('auth/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('auth/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('auth/css/login.css') }}">
    <title>Edit page</title>
</head>

<body class="d-flex justify-content-center align-items-center">


    <div class="container">
        <div class="row">
            <div class="col-lg-5 mx-auto">
                <form method="POST" action="{{ route('users.update', ['id' => $user->id]) }}"
                    style="background-color: #232848; color : #fff" enctype="multipart/form-data">

                    @method('PUT')

                    @csrf

                    <div class="form-header d-flex justify-content-center">

                        Edit user profile
                    </div>
                    <div class="form-body">
                        <h1 class="text-center py-4">MOVIE APP</h1>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">

                                <input type="text" class="form-control" name="firstName"
                                    value="{{ $user->first_name }}">

                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <input type="text" class="form-control " name="lastName"
                                    value="{{ $user->last_name }}">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <input type="email" class="form-control mt-2 " name="email" value="{{ $user->email }}">



                        </div>





                        <div class="col-lg-12">
                            <input type="password" class="form-control mt-2 " name="password" autofocus
                                placeholder="new password" required>
                        </div>

                        <div class="col-lg-12">
                            <input type="password" class="form-control mt-2" name="password_confirmation"
                                placeholder="confirmPassword">

                        </div>



                        <p class="mt-3
                                mb-3">birth date</p>

                        <div class="row">
                            <input name="birth_date" class="form-control" type="date"
                                value="{{ $user->birth_date }}">
                        </div>

                        <p class="my-2">gender</p>

                        @if ($user->gender == 'male')
                            <input type="radio" name="gender" id="male" value="male" checked>
                        @else
                            <input type="radio" name="gender" id="male" value="male" required>
                        @endif
                        <label for="male">Male</label>


                        @if ($user->gender == 'female')
                            <input type="radio" name="gender" id="female" value="female" checked>
                        @else
                            <input type="radio" name="gender" id="female" value="female" required>
                        @endif
                        <label for="female">Female</label>


                        @if ($user->image !== 'null')
                            <div class="user-profile-image my-2">
                                <img width="50px" height="50px" src="{{ Storage::url($user->image) }}"
                                    alt="">
                            </div>
                        @endif

                        <input type="file" name="image" class="form-control">

                        <button class="btn btn-danger w-100 mb-4 mt-2" type="submit"
                            style="background-color: #6BB45B;
                        ">update</button>
                    </div>


            </div>
            </form>
        </div>
    </div>
    </div>




    <script src="{{ asset('auth/js/all.min.js') }}"></script>
    <script src="{{ asset('auth/js/bootstrap.bundle.js') }}"></script>
</body>

</html>
