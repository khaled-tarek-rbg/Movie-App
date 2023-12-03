@extends('layouts.backend.master')

@section('content')
    <div class="col-lg-12">
        <div class="admin-dashboard-content  rounded">

            <form action="{{ route('animes.admin.seasons.update', ['id' => $season->id]) }}" method="POST" enctype="multipart/form-data">

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

                <label class="text-white " for="">season number</label>
                <input type="number" name="season_number" class="form-control " placeholder="Season Number" required
                    value="{{ $season->season_number }}">

                <label class="text-white  mt-2" for="">Anime</label>
                <select class="form-control" name="animes" id="">

                    <option value="{{ $season->anime->id }}">{{ $season->anime->getTranslation('name', 'en') }}</option>
                    @foreach ($animes as $item)
                        <option value="{{ $item->id }}">
                            {{ $item->name }}
                        </option>
                    @endforeach
                </select>




                <img class="d-block mt-2" src="{{ Storage::url($season->season_poster) }}" width="200px" height="200px"
                    alt="">


                <label class="text-white mt-2" for="">Season_poster <span style="margin-left: 10px">(jpg
                        , png ,
                        jpeg)</span></label>


                <input type="file" name="season_poster" class="form-control"  accept="image/*" />

                <div class="row">

                    <div class="col-lg-6">
                        <label class="text-white mt-2" for="">Season_Production_year</label>

                        <select required name="season_production_year" id="year_production" class="form-control mt-2">
                            <option selected value="{{ $season->season_production_year }}">{{ $season->season_production_year }}</option>
                        </select>


                    </div>


                </div>





                <button type="submit" class="btn btn-primary w-100 mt-3">Update Season</button>


            </form>
        </div>

    </div>
@endsection


@section('script')
    <script>
        for (let i = 1850; i <= 2022; i++) {
            document.getElementById('year_production').innerHTML += `

                <option value = '${i}'>${i} </option>
                `
        }
    </script>
@endsection
