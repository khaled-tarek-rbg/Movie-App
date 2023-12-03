@extends('layouts.backend.master')

@section('content')
    <div class="col-lg-12">
        <div class="admin-dashboard-content  rounded">

            <form action="{{ route('tvs.update', ['id' => $serie->id]) }}" method="POST" enctype="multipart/form-data">

                @csrf
                @method('PUT')

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <label class="text-white " for="">Tv name</label>
                <input type="text" name="name_en" class="form-control " placeholder="Tv name"
                    value="{{ $serie->getTranslation('name', 'en') }}" required>

                <label class="text-white  mt-2" for="">Tv name in Arabic</label>
                <input type="text" name="name_ar" class="form-control" placeholder="Tv name in Arabic"
                    value="{{ $serie->getTranslation('name', 'ar') }}" required>







                <div class="row">

                    <div class="col-lg-2">
                        <label class="text-white mt-2" for="">Category</label>
                        <select multiple size='4' required name="category[]" id="category" class="form-control ">
                            @foreach ($serie->categories as $item)
                                <option selected value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach

                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="col-lg-2">
                        <label class="text-white mt-2" for="">Production_year</label>
                        <select required name="production_year" id="year_production" class="form-control mt-2">
                            <option selected value="{{ $serie->production_year }}">{{ $serie->production_year }}
                            </option>
                        </select>
                    </div>
                    <div class="col-lg-2">
                        <label for="" class="mt-2">Country</label>
                        <select required name="country" id="country" class="form-control">
                            <option value="{{ $serie->country }}" selected>{{ $serie->country }}</option>
                        </select>
                    </div>



                    @livewire('tv-type-edit', [$serie])

                </div>








                <img class="d-block mt-2" src="{{ Storage::url($serie->poster) }}" width="200px" height="200px"
                    alt="">

                <label class="text-white mt-2" for="">Tv_poster <span style="margin-left: 10px">(jpg
                        , png ,
                        jpeg)</span></label>

                <input type="file" name="poster" class="form-control" accept="image/*" />









                <button type="submit" class="btn btn-primary w-100 mt-3">update Tv</button>


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
                design += ` <option value ='${country.name.common}'>${country.name.common}</option>`
            })
            document.getElementById('country').innerHTML += design

        }

        for (let i = 1850; i <= 2022; i++) {
            document.getElementById('year_production').innerHTML += `

                <option value = '${i}'>${i} </option>
                `
        }
    </script>
@endsection
