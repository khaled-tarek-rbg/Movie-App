@extends('layouts.backend.master')


@section('content')
    <div class="col-lg-12">
        <div class="admin-dashboard-content   rounded">
            <form class="repeater" action="{{ route('users.store') }}" method="POST">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif



                <input type="text" class="form-control my-2 @error('firstName') is-invalid @enderror"
                    placeholder="first name" name="firstName" value="{{ old('firstName') }}" required autocomplete="firstName"
                    autofocus>


                @error('firstName')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror


                <input type="text" class="form-control @error('lastName') is-invalid @enderror" placeholder="lastName"
                    name="lastName" value="{{ old('lastName') }}" required autocomplete="lastName" autofocus>

                @error('lastName')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <input type="email" class="form-control mt-2 @error('email') is-invalid @enderror" placeholder="email"
                    name="email" value="{{ old('email') }}" required autocomplete="email">


                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror



                <input type="password" class="form-control mt-2 @error('password') is-invalid @enderror" name="password"
                    required autocomplete="new-password" placeholder="password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <input type="password" class="form-control mt-2" name="password_confirmation" required
                    autocomplete="new-password" placeholder="confirmPassword">




                <p class="mt-3 mb-3 text-white">birth date</p>

                <input name="birth_date" class="form-control" type="date">

                <p class="my-2 text-white">gender</p>

                <div class="col-lg-12">
                    <input type="radio" name="gender" id="male" value="male" required>
                    <label for="male">Male</label>
                </div>
                <div class="col-lg-12">
                    <input type="radio" name="gender" id="female" required value="female">
                    <label for="female">Female</label>
                </div>


                <p class="my-2 text-white">type</p>

                <div class="col-lg-12">
                    <input type="radio" name="is_admin" value= "1" required>
                    <label>Admin</label>
                </div>
                <div class="col-lg-12">
                    <input type="radio" name="is_admin" required value="0">
                    <label>User</label>
                </div>



                <button class="btn btn-success w-100 mb-4 mt-2" type="submit">Add User</button>
        </div>




        </form>








    </div>
@endsection
