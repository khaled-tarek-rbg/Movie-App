@extends('layouts.frontend.master')

@section('title')
    صفحة الانمى
@endsection


@section('content')
    <div class="col-lg-6 mx-auto center">


        <div class="movie-slider position-relative pt-3">
            <div class="prev position-absolute"><i class="fas fa-angle-left"></i></div>
            <div class="row flex-nowrap overflow-hidden w-100 mx-auto">


                @foreach ($anime_eposides as $item)
                    <div class="col-lg-5 custom-serie-w p-0 mx-2 position-relative" style="height: 400px">

                        <a href="#">
                            <div class="box"
                                style="height: 100% ; background-image: url({{ Storage::url($item->season->season_poster) }}) ; background-size : cover ; background-position : center ; background-repeat : no-repeat">
                            </div>
                        </a>


                        <div class="box-content position-absolute">
                            <p>مشاهده
                                {{ $item->getTranslation('name', 'ar') == true ? $item->getTranslation('name', 'ar') : $item->getTranslation('name', 'en') }}
                                موسم رقم
                                {{ $item->season->season_number }} حلقة رقم
                                {{ $item->eposide_number }} ({{ $item->anime->production_year }})</p>


                        </div>

                    </div>
                @endforeach















                @foreach ($animes as $item)
                    <div class="col-lg-5 custom-serie-w p-0 mx-2 position-relative" style="height: 400px">

                        <a href="#">
                            <div class="box"
                                style="height: 100% ; background-image: url({{ Storage::url($item->poster) }}) ; background-size : cover ; background-position : center ; background-repeat : no-repeat">
                            </div>
                        </a>


                        <div class="box-content position-absolute">
                            <p>مشاهده
                                {{ $item->getTranslation('name', 'ar') == true ? $item->getTranslation('name', 'ar') : $item->getTranslation('name', 'en') }}({{ $item->production_year }})
                            </p>


                        </div>

                    </div>
                @endforeach
















            </div>
            <div class="next position-absolute"><i class="fas fa-angle-right"></i></div>
        </div>








        <div class="movie-categories my-5">
            <ul class="d-flex p-3">
                <li><a href="{{ route('client.animes') }}">اخر الحلقات</a></li>
                <li style="background-color: #6375FF;"><a href="{{ route('client.animes.series') }}">مسلسلات انمى</a></li>
                <li><a href="{{ route('client.animes.movies') }}">افلام انمى</a></li>

            </ul>
        </div>


        <div class="row w-100 mx-auto justify-content-center">



            @foreach ($animes as $item)
                <div class="col-lg-4 similar-movie-col position-relative  mx-2  movie-container">
                    <a href="#" class="movie-img" style="width:100% ;">
                        <img src="{{ Storage::url($item->poster) }}" alt="" width="100%" height="280px">
                    </a>



                    <div class="movie-caption d-flex flex-column">
                        <p>مشاهده
                            {{ $item->getTranslation('name', 'ar') == true ? $item->getTranslation('name', 'ar') : $item->getTranslation('name', 'en') }}
                            ({{ $item->production_year }})
                        </p>

                    </div>

                </div>
            @endforeach




            <div class="row d-flex justify-content-center">
                <div class="col-lg-6 d-flex justify-content-center">
                    {{ $animes->links() }}
                </div>
            </div>



        </div>




    </div>
@endsection

@section('script')
    <script src="{{ asset('frontend/js/main.js') }}"></script>
@endsection
