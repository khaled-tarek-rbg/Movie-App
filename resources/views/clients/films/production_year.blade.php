@extends('layouts.frontend.master')


@section('title')
    صفحة الافلام
@endsection

@section('content')
    <div class="col-lg-6 mx-auto center">


        <div class="movie-slider position-relative pt-3">
            <div class="prev position-absolute"><i class="fas fa-angle-left"></i></div>
            <div class="row flex-nowrap overflow-hidden w-100 mx-auto">


                @foreach ($movies as $movie)
                    <div class="col-lg-5 custom-film-w p-0 mx-2 position-relative" style="height: 380px">

                        <a href="{{ route('movies.show', ['id' => $movie->id]) }}">
                            <div class="box"
                                style="height: 100% ; background-image: url({{ Storage::url($movie->poster) }}) ; background-size : cover ; background-position : center ; background-repeat : no-repeat">
                            </div>
                        </a>

                        <div class="box-content position-absolute">
                            <p>مشاهده فيلم
                                {{ $movie->getTranslation('name', 'ar') == true ? $movie->getTranslation('name', 'ar') : $movie->getTranslation('name', 'en') }}
                                ({{ $movie->production_year }})
                            </p>



                        </div>

                    </div>
                @endforeach


            </div>
            <div class="next position-absolute"><i class="fas fa-angle-right"></i></div>
        </div>




        <div class="movie-categories my-5">
            <ul class="d-flex p-3">
                <li><a href="{{ route('movies') }}">الافلام الجديده</a></li>
                <li><a href="{{ route('movies.old') }}">الافلام القديمه</a></li>
                <li><a href="{{ route('movies.best') }}">افضل الافلام</a></li>
                <li><a href="{{ route('movies.top') }}">الاكثر تقييما</a></li>

            </ul>
        </div>


        <div class="row w-100 mx-auto justify-content-center  ">

            @foreach ($paginatedMovies as $paginatedMovie)
                <div class="col-lg-4 similar-movie-col   mx-2  movie-container d-flex flex-column justify-content-center">


                    <a href="{{ route('movies.show', ['id' => $paginatedMovie->id]) }}" class="movie-img"
                        style="width:100% ">
                        <img src="{{ Storage::url($paginatedMovie->poster) }}" alt="" width="100%" height="100%">
                    </a>



                    <div class="movie-caption d-flex flex-column">
                        <a class="text-white" href="{{ route('movies.show', ['id' => $paginatedMovie->id]) }}">


                            <p>
                                {{ $paginatedMovie->name }} ({{ $paginatedMovie->production_year }})
                            </p>
                        </a>




                    </div>

                </div>
            @endforeach








        </div>


        <div class="row w-100 justify-content-center mx-auto ">


            <div class="links  d-flex justify-content-center pt-3">
                {{ $paginatedMovies->links() }}
            </div>


        </div>

    </div>
@endsection


@section('script')
    <script src="{{ asset('frontend/js/main.js') }}"></script>
@endsection
