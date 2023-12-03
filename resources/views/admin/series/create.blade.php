@extends('layouts.backend.master')

@section('content')
    <div class="col-lg-12">
        <div class="admin-dashboard-content  rounded">

            <form action="{{ route('series.store') }}" method="POST" enctype="multipart/form-data">

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
                <label class="text-white " for="">serie_name</label>
                <input type="text" name="serie_name" class="form-control " placeholder="Serie name" required>

                <label class="text-white  mt-2" for="">Serie name in Arabic</label>
                <input type="text" name="serie_name_ar" class="form-control" placeholder="Serie name in Arabic" required>
                <label class="text-white  mt-2" for="">Description</label>
                <textarea name="descripion" class="form-control" rows="6" placeholder="description"></textarea>




                <div class="row">
                    <div class="col-lg-2">
                        <label class="text-white mt-2" for="">serie_rate</label>
                        <input type="text" name="serie_rate" class="form-control " placeholder="Serie rate" required>
                    </div>
                    <div class="col-lg-2">
                        <label class="text-white mt-2" for="">Production_year</label>
                        <select required name="production_year" id="year_production" class="form-control">
                            <option disabled selected value="">production_year</option>
                        </select>
                    </div>
                    <div class="col-lg-3">
                        <label class="text-white mt-2" for="">Category</label>
                        <select multiple size='4' required name="category[]" id="category" class="form-control ">

                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @livewire('serie-input')
                </div>

                <label class="text-white mt-2" for="">Serie_poster <span style="margin-left: 10px">(jpg
                        , png ,
                        jpeg)</span></label>

                <input type="file" name="poster" class="form-control" required accept="image/*" />










                <button type="submit" class="btn btn-primary w-100 mt-3">Add Serie</button>


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
