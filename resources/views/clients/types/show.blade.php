@extends('layouts.frontend.master')


@section('title')
    {{ $type->name }}
@endsection

@section('content')
    <div class="col-lg-6 mx-auto center">


        <div class="movie-slider position-relative pt-3">
            <div class="prev position-absolute"><i class="fas fa-angle-left"></i></div>
            <div class="row flex-nowrap overflow-hidden w-100 mx-auto">

                @if (count($type->movies) > 0)
                    @foreach ($type->movies as $movie)
                        <div class="col-lg-5 custom-film-w p-0 mx-2 position-relative" style="height: 380px">

                            <a href="{{ route('movies.show', ['id' => $movie->id]) }}">
                                <div class="box"
                                    style="height: 100% ; background-image: url({{ Storage::url($movie->poster) }}) ; background-size : cover ; background-position : center ; background-repeat : no-repeat">
                                </div>
                            </a>

                            <div class="box-content position-absolute">
                                <p>watch film {{ $movie->name }} ({{ $movie->production_year }})</p>



                            </div>

                        </div>
                    @endforeach
                @endif
                @if (count($type->series) > 0)
                    @foreach ($type->series as $item)
                        <div class="col-lg-5 custom-film-w p-0 mx-2 position-relative" style="height: 380px">

                            <a href="{{ route('series.show', ['id' => $item->id]) }}">
                                <div class="box"
                                    style="height: 100% ; background-image: url({{ Storage::url($item->poster) }}) ; background-size : cover ; background-position : center ; background-repeat : no-repeat">
                                </div>
                            </a>

                            <div class="box-content position-absolute">
                                <p>watch film {{ $item->name }} ({{ $item->production_year }})</p>



                            </div>

                        </div>
                    @endforeach
                @endif
                @if (count($type->tvs) > 0)
                    @foreach ($type->tvs as $item)
                        <div class="col-lg-5 custom-film-w p-0 mx-2 position-relative" style="height: 380px">

                            <a href="{{ route('client.tv.show', ['id' => $item->id]) }}">
                                <div class="box"
                                    style="height: 100% ; background-image: url({{ Storage::url($item->poster) }}) ; background-size : cover ; background-position : center ; background-repeat : no-repeat">
                                </div>
                            </a>

                            <div class="box-content position-absolute">
                                <p>watch TV Show {{ $item->name }} ({{ $item->production_year }})</p>



                            </div>

                        </div>
                    @endforeach
                @endif




            </div>
            <div class="next position-absolute"><i class="fas fa-angle-right"></i></div>
        </div>





        <div class="movie-categories my-5">
            <ul class="d-flex p-3">
                <li style="background-color: #6375FF;"><a href="{{ route('clients') }}">موفى اب</a></li>
                <li><a href="{{ route('movies') }}">افلام جديدة</a></li>
                <li><a href="{{ route('client.series') }}">اخر الحلقات</a></li>
                <li><a href="{{ route('series.new') }}">مسلسلات جديده</a></li>

            </ul>
        </div>






        <div class="row w-100 mx-auto justify-content-center">



            @if (count($type->movies) > 0)
                @foreach ($type->movies()->paginate(10) as $item)
                    <div class="col-lg-4 similar-movie-col position-relative  mx-2  movie-container">
                        <a href="{{ route('movies.show', ['id' => $item->id]) }}" class="movie-img" style="width:100% ;">
                            <img src="{{ Storage::url($item->poster) }}" alt="" width="100%">
                        </a>




                        <div class="movie-caption d-flex flex-column">
                            <p>watch film {{ $movie->name }} ({{ $movie->production_year }})</p>



                        </div>

                    </div>
                @endforeach




                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 d-flex justify-content-center">
                        {{ $type->movies()->paginate(10)->links() }}
                    </div>
                </div>
            @endif





            @if (count($type->series) > 0)
                @foreach ($type->series()->paginate(10) as $item)
                    <div class="col-lg-4 similar-movie-col position-relative  mx-2  movie-container">
                        <a href="{{ route('series.show', ['id' => $item->id]) }}" class="movie-img" style="width:100% ;">
                            <img src="{{ Storage::url($item->poster) }}" alt="" width="100%">
                        </a>




                        <div class="movie-caption d-flex flex-column">
                            <p>watch film {{ $item->name }} ({{ $item->production_year }})</p>



                        </div>

                    </div>
                @endforeach




                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 d-flex justify-content-center">
                        {{ $type->series()->paginate(10)->links() }}
                    </div>
                </div>
            @endif



            @if (count($type->tvs) > 0)
                @foreach ($type->tvs()->paginate(10) as $item)
                    <div class="col-lg-4 similar-movie-col position-relative  mx-2  movie-container">
                        <a href="{{ route('client.tv.show', ['id' => $item->id]) }}" class="movie-img"
                            style="width:100% ;">
                            <img src="{{ Storage::url($item->poster) }}" alt="" width="100%" height="100%">
                        </a>




                        <div class="movie-caption d-flex flex-column">
                            <p>watch Tv show {{ $item->name }} ({{ $item->production_year }})</p>



                        </div>

                    </div>
                @endforeach




                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 d-flex justify-content-center">
                        {{ $type->tvs()->paginate(10)->links() }}
                    </div>
                </div>
            @endif


        </div>










    </div>
@endsection


@section('script')
    <script src="{{ asset('frontend/js/main.js') }}"></script>
@endsection
