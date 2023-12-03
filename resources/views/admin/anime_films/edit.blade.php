@extends('layouts.backend.master')

@section('content')
    <div class="col-lg-12">
        <div class="admin-dashboard-content  rounded">
            <form action="{{ route('movies.update.animes', ['id' => $movie->id]) }}" method="POST"
                enctype="multipart/form-data">
                @method('PUT')

                @csrf
                <input type="text" name="name_en" class="form-control" placeholder="movie name"
                    value="{{ $movie->getTranslation('name', 'en') }}">

                <input type="text" name="name_ar" class="form-control mt-2" placeholder="movie name in Arabic"
                    value="{{ $movie->getTranslation('name', 'ar') }}">





                <textarea name="descripion" class="form-control mt-2" rows="6" placeholder="description">{{ $movie->description }}</textarea>


                <div class="row">
                    <div class="col-lg-3">
                        <input type="text" name="also_known_as" class="form-control mt-2"
                            placeholder="movie also known as" value="{{ $movie->also_known_as }}">


                    </div>
                    <div class="col-lg-3">
                        <input type="text" name="rate" class="form-control mt-2" placeholder="movie Rate"
                            value="{{ $movie->rate }}" required />
                    </div>
                    <div class="col-lg-3">
                        <select name="type" class="form-control mt-2">
                            <option value="{{ $movie->type->id }}">
                                {{ $movie->country }}</option>

                            @foreach ($types as $item)
                                <option value="{{ $item->id }}">
                                    {{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <img src="{{ Storage::url($movie->poster) }}" alt="" width="30px" height="30px" class="mt-2">

                <input type="file" name="poster" class="form-control mt-2">





                <div class="row">
                    <div class="col-lg-3">
                        <select name="country" id="country" class="form-control mt-2">
                            <option value="{{ $movie->country }}">
                                {{ $movie->country }}</option>
                        </select>
                    </div>
                    <div class="col-lg-3">
                        <select name="category[]" multiple size="4" id="category" class="form-control mt-2">

                            @foreach ($movie->categories as $item)
                                <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                            @endforeach


                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-3">
                        <select name="duration" id="duration" class="form-control mt-2">
                            <option value="{{ $movie->duration }}">{{ $movie->duration }} hours</option>
                        </select>
                    </div>
                    <div class="col-lg-3">
                        <select name="production_year" id="production_year" class="form-control mt-2">
                            <option value="{{ $movie->production_year }}">year {{ $movie->production_year }}</option>
                        </select>
                    </div>
                </div>



                <div class="all-servers d-flex w-100   justify-content-between  align-items-center"
                    style="padding: 10px 120px">
                    <a href="{{ route('movies.servers.show.animes', ['id' => $movie->id]) }}"
                        class=" text-decoration-none m-0 text-white">Anime movie watch servers
                        <i class="icon-animation fas fa-arrow-circle-right ms-2"></i>
                    </a>


                    <a href="{{ route('movies.downloadservers.show.animes', ['id' => $movie->id]) }}"
                        class=" text-decoration-none m-0 text-white">movie download servers
                        <i class="icon-animation fas fa-arrow-circle-right ms-2"></i>

                    </a>


                </div>



                <button type="submit" class="btn btn-primary w-100 mt-3">Update Movie</button>


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
            let design = ''
            countries.map((country) => {
                design += `
            <option value ='${country.name.common}'>${country.name.common}</option>`
            })
            document.getElementById('country').innerHTML += design

        }





        for (let i = 1; i < 6; i++) {
            document.getElementById('duration').innerHTML += `
                <option value = '${i}'>${i} hour </option>
                `
        }

        for (let i = 1850; i <= 2022; i++) {
            document.getElementById('production_year').innerHTML += `

                <option value = '${i}'>${i} </option>
                `
        }
    </script>
@endsection
