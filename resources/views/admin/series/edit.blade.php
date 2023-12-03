@extends('layouts.backend.master')

@section('content')
    <div class="col-lg-12">
        <div class="admin-dashboard-content  rounded">

            <form action="{{ route('series.update', ['id' => $serie->id]) }}" method="POST" enctype="multipart/form-data">

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
                <label class="text-white " for="">serie_name</label>
                <input type="text" name="serie_name" class="form-control " placeholder="Serie name"
                    value="{{ $serie->getTranslation('name', 'en') }}" required>

                <label class="text-white  mt-2" for="">Serie name in Arabic</label>
                <input type="text" name="serie_name_ar" class="form-control" placeholder="Serie name in Arabic"
                    value="{{ $serie->getTranslation('name', 'ar') }}" required>



                <label class="text-white  mt-2" for="">Description</label>
                <textarea name="description" class="form-control" rows="6" placeholder="description">{{ $serie->description }}</textarea>



                <div class="row">
                    <div class="col-lg-4">
                        <label class="text-white " for="">serie_rate</label>
                        <input type="text" name="serie_rate" class="form-control " placeholder="Serie rate"
                            value="{{ $serie->rate }}" required>

                    </div>
                    <div class="col-lg-4">
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
                    <div class="col-lg-4">
                        <label class="text-white mt-2" for="">Production_year</label>
                        <select required name="production_year" id="year_production" class="form-control mt-2">
                            <option selected value="{{ $serie->production_year }}">{{ $serie->production_year }}
                            </option>
                        </select>
                    </div>
                    <div>
                        <img src="{{ Storage::url($serie->poster) }}" alt="" width="100px" height="100px"
                            class="mt-2 d-block">

                        <label class="text-white mt-2" for="">Serie_poster <span style="margin-left: 10px">(jpg
                                , png ,
                                jpeg)</span></label>

                        <input type="file" name="poster" class="form-control" accept="image/*" />


                        @livewire('serie-type-edit', [$serie])


                        <button type="submit" class="btn btn-primary w-100 mt-3">update Serie</button>


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
