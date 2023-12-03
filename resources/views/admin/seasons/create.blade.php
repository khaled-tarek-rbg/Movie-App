@extends('layouts.backend.master')

@section('content')
    <div class="col-lg-12">
        <div class="admin-dashboard-content  rounded">

            <form action="{{ route('seasons.store') }}" method="POST" enctype="multipart/form-data">

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
                <label class="text-white " for="">season number</label>
                <input type="number" name="season_number" class="form-control " placeholder="Season Number" required>

                <label class="text-white  mt-2" for="">Serie</label>
                <select class="form-control" name="series" id="">
                    @foreach ($series as $item)
                        <option value="{{ $item->id }}">
                            {{ $item->name }}
                        </option>
                    @endforeach
                </select>


                <label class="text-white mt-2" for="">Season_poster <span style="margin-left: 10px">(jpg
                        , png ,
                        jpeg)</span></label>

                <input type="file" name="season_poster" class="form-control" required accept="image/*" />

                <div class="row">

                    <div class="col-lg-6">
                        <label class="text-white mt-2" for="">Season_Production_year</label>
                        <select required name="season_production_year" id="year_production" class="form-control mt-2">
                            <option disabled selected value="">production_year</option>
                        </select>
                    </div>


                </div>





                <button type="submit" class="btn btn-primary w-100 mt-3">Add Season</button>


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
