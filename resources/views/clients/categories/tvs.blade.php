@extends('layouts.frontend.master')

@section('title')
    categories
@endsection


@section('content')
    <div class="col-lg-6 mx-auto center">


        <h5 style="color: #C3CBFF" class="m-0 px-3 pt-2">Movie App <span class="ms-3 text-white">{{ $category->name }}</span>
        </h5>


        <div class="movie-slider position-relative pt-3">
            <div class="prev position-absolute"><i class="fas fa-angle-left"></i></div>
            <div class="row flex-nowrap overflow-hidden w-100 mx-auto">

                @foreach ($animes as $serie)
                    <div class="col-lg-5 custom-serie-w p-0 mx-2 position-relative" style="height: 400px">

                        <a href="{{ route('animes.show', ['id' => $serie->id]) }}">
                            <div class="box"
                                style="height: 100% ; background-image: url({{ Storage::url($serie->poster) }}) ; background-size : cover ; background-position : center ; background-repeat : no-repeat">
                            </div>
                        </a>


                        <div class="box-content position-absolute">
                            <p>مشاهده {{ $serie->name }} ({{ $serie->production_year }})</p>


                        </div>

                    </div>
                @endforeach
                @foreach ($tvs as $serie)
                    <div class="col-lg-5 custom-serie-w p-0 mx-2 position-relative" style="height: 400px">

                        <a href="{{ route('tvs.show', ['id' => $serie->id]) }}">
                            <div class="box"
                                style="height: 100% ; background-image: url({{ Storage::url($serie->poster) }}) ; background-size : cover ; background-position : center ; background-repeat : no-repeat">
                            </div>
                        </a>


                        <div class="box-content position-absolute">
                            <p>مشاهده {{ $serie->name }} ({{ $serie->production_year }})</p>


                        </div>

                    </div>
                @endforeach

                @foreach ($series as $serie)
                    <div class="col-lg-5 custom-serie-w p-0 mx-2 position-relative" style="height: 400px">

                        <a href="{{ route('series.show', ['id' => $serie->id]) }}">
                            <div class="box"
                                style="height: 100% ; background-image: url({{ Storage::url($serie->poster) }}) ; background-size : cover ; background-position : center ; background-repeat : no-repeat">
                            </div>
                        </a>


                        <div class="box-content position-absolute">
                            <p>مشاهده {{ $serie->name }} ({{ $serie->production_year }})</p>

                        </div>

                    </div>
                @endforeach




                @foreach ($movies as $movie)
                    <div class="col-lg-5 custom-serie-w p-0 mx-2 position-relative" style="height: 400px">

                        <a href="{{ route('movies.show', ['id' => $movie->id]) }}">
                            <div class="box"
                                style="height: 100% ; background-image: url({{ Storage::url($movie->poster) }}) ; background-size : cover ; background-position : center ; background-repeat : no-repeat">
                            </div>
                        </a>


                        <div class="box-content position-absolute">
                            <p>watch Film {{ $movie->name }} ({{ $movie->production_year }})</p>

                        </div>


                    </div>
                @endforeach

            </div>
            <div class="next position-absolute"><i class="fas fa-angle-right"></i></div>
        </div>








        <div class="movie-categories my-5">
            <ul class="d-flex p-3">
                <li><a href="{{ route('category.show', ['id' => $category->id]) }}">الافلام</a></li>

                <li><a href="{{ route('category.series.show', ['id' => $category->id]) }}">المسلسلات</a>
                </li>

                <li><a href="{{ route('category.animes.show', ['id' => $category->id]) }}">انمى وكارتون</a></li>


                <li style="background-color: #6375FF;"><a
                        href="{{ route('category.tvs.show', ['id' => $category->id]) }}">العروض التليفيزيونية</a>

                </li>

            </ul>
        </div>


        <div class="row w-100 mx-auto justify-content-center">



            @foreach ($paginatedSeries as $item)
                <div class="col-lg-4 similar-movie-col position-relative  mx-2  movie-container">
                    <a href="{{ route('series.show', ['id' => $item->id]) }}" class="movie-img"
                        style="width:100% ; height : 300px">
                        <img src="{{ Storage::url($item->poster) }}" alt="" width="100%" height="100%">
                    </a>




                    <div class="movie-caption d-flex flex-column">
                        <p>watch Serie {{ $item->getTranslation('name', 'en') }} ({{ $item->production_year }})</p>


                    </div>

                </div>
            @endforeach




            <div class="row d-flex justify-content-center">
                <div class="col-lg-6 d-flex justify-content-center">
                    {{ $paginatedSeries->links() }}
                </div>
            </div>



        </div>




    </div>
@endsection

@section('script')
    <script src="{{ asset('frontend/js/main.js') }}"></script>
@endsection
