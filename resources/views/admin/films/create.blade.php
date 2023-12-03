@extends('layouts.backend.master')

@section('content')
    <div class="col-lg-12">
        <div class="admin-dashboard-content  rounded">
            <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">

                @csrf
                @if (session()->has('message'))
                    <div class="alert alert-danger">{{ session()->get('message') }}</div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <label for="">Movie Name</label>
                <input type="text" name="movie_name" class="form-control " placeholder="movie name" required />

                <label for="" class="mt-2">Movie Name in Arabic</label>
                <input type="text" name="movie_name_ar" class="form-control " placeholder="movie name in Arabic"
                    required />

                <label for="" class="mt-2">description</label>
                <textarea name="descripion" class="form-control " rows="6" placeholder="description"></textarea>



                <div class="row">
                    <div class="col-lg-3">
                        <label for="" class="mt-2">Also known as</label>
                        <input type="text" name="also_known_as" class="form-control " placeholder="movie also known as">


                    </div>
                    <div class="col-lg-3">
                        <label for="">Movie Rate</label>
                        <input type="text" name="movie_rate" class="form-control mt-2" placeholder="movie Rate"
                            required />

                    </div>
                    @livewire('movie-input');
                </div>


                <label for="" class="mt-2">Movie Poster</label>
                <input type="file" name="poster" class="form-control " required>




                <div class="row">
                    <div class="col-lg-3">
                        <label for="" class="mt-2">Country</label>
                        <select required name="country" id="country" class="form-control">

                        </select>
                    </div>
                    <div class="col-lg-3">
                        <label for="" class="mt-2">Category</label>
                        <select multiple size='4' name="category[]" id="category" class="form-control " required>

                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>


                    </div>
                    <div class="col-lg-3">
                        <label for="" class="mt-2">duration</label>
                        <select required name="duration" id="duration" class="form-control ">
                            <option value="" disabled selected>duration</option>
                        </select>
                    </div>
                    <div class="col-lg-3">
                        <label for="" class="mt-2">production_year</label>
                        <select required name="production_year" id="production_year" class="form-control">
                            <option disabled selected value="">production_year</option>
                        </select>
                    </div>
                </div>





                <button type="submit" class="btn btn-primary w-100 mt-3">Add Movie</button>


            </form>
        </div>

    </div>
@endsection

@section('script')
    <script>
        countryApi()

        function countryApi() {
            fetch('https://restcountries.com/v3.1/all')
                .then((res) => res.json()
                    .then((data) => dispalyCountries(data))
                )
        }

        function dispalyCountries(countries) {
            let design = '<option value="" disabled selected>country</option>'
            countries.map((country) => {
                design += ` <option value ='${country.name.common}'>${country.name.common}</option>`
            })
            document.getElementById('country').innerHTML = design

        }





        for (let i = 5; i < 300; i++) {
            document.getElementById('duration').innerHTML += `
                <option value = '${i}'>${i} minutes </option>
                `
        }

        for (let i = 1850; i <= 2022; i++) {
            document.getElementById('production_year').innerHTML += `

                <option value = '${i}'>${i} </option>
                `
        }
    </script>
@endsection
