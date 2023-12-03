@extends('layouts.frontend.master')


@section('title')
    {{ $subType->name }}
@endsection

@section('content')
    <div class="col-lg-6 mx-auto center">


        <div class="movie-slider position-relative pt-3">
            <div class="prev position-absolute"><i class="fas fa-angle-left"></i></div>
            <div class="row flex-nowrap overflow-hidden w-100 mx-auto">

                @if (count($subType->movies) > 0)
                    @foreach ($subType->movies as $movie)
                        <div class="col-lg-5 custom-film-w p-0 mx-2 position-relative" style="height: 380px">

                            <a href="{{ route('movies.show', ['id' => $movie->id]) }}">
                                <div class="box"
                                    style="height: 100% ; background-image: url({{ Storage::url($movie->poster) }}) ; background-size : cover ; background-position : center ; background-repeat : no-repeat">
                                </div>
                            </a>

                            <div class="box-content position-absolute">
                                <p>watch film {{ $movie->name }} ({{ $movie->production_year }})</p>

                                <div class="comments">
                                    <div class="comment">
                                        <span>comment</span>
                                        <i class="far fa-comment"></i>
                                    </div>
                                    <div class="comment">
                                        <span>like</span>
                                        <div class="movie-icon">
                                            <i class="far fa-thumbs-up"></i>
                                        </div>

                                    </div>


                                </div>

                            </div>

                        </div>
                    @endforeach
                @endif
                @if (count($subType->series) > 0)
                    @foreach ($subType->series as $item)
                        <div class="col-lg-5 custom-film-w p-0 mx-2 position-relative" style="height: 380px">

                            <a href="{{ route('series.show', ['id' => $item->id]) }}">
                                <div class="box"
                                    style="height: 100% ; background-image: url({{ Storage::url($item->poster) }}) ; background-size : cover ; background-position : center ; background-repeat : no-repeat">
                                </div>
                            </a>

                            <div class="box-content position-absolute">
                                <p>watch film {{ $item->name }} ({{ $item->production_year }})</p>

                                <div class="comments">
                                    <div class="comment">
                                        <span>comment</span>
                                        <i class="far fa-comment"></i>
                                    </div>
                                    <div class="comment">
                                        <span>like</span>
                                        <div class="movie-icon">
                                            <i class="far fa-thumbs-up"></i>
                                        </div>

                                    </div>


                                </div>

                            </div>

                        </div>
                    @endforeach
                @endif
                @if (count($subType->tvs) > 0)
                    @foreach ($subType->tvs as $item)
                        <div class="col-lg-5 custom-film-w p-0 mx-2 position-relative" style="height: 380px">

                            <a href="{{ route('client.tv.show', ['id' => $item->id]) }}">
                                <div class="box"
                                    style="height: 100% ; background-image: url({{ Storage::url($item->poster) }}) ; background-size : cover ; background-position : center ; background-repeat : no-repeat">
                                </div>
                            </a>

                            <div class="box-content position-absolute">
                                <p>watch TV Show {{ $item->name }} ({{ $item->production_year }})</p>

                                <div class="comments">
                                    <div class="comment">
                                        <span>comment</span>
                                        <i class="far fa-comment"></i>
                                    </div>
                                    <div class="comment">
                                        <span>like</span>
                                        <div class="movie-icon">
                                            <i class="far fa-thumbs-up"></i>
                                        </div>

                                    </div>


                                </div>

                            </div>

                        </div>
                    @endforeach
                @endif




            </div>
            <div class="next position-absolute"><i class="fas fa-angle-right"></i></div>
        </div>





        <div class="movie-categories my-5">
            <ul class="d-flex p-3">
                <li style="background-color: #6375FF;"><a href="{{ route('clients') }}">new movie app</a></li>
                <li><a href="{{ route('movies') }}">new movies</a></li>
                <li><a href="{{ route('client.series') }}">last episode</a></li>
                <li><a href="{{ route('series.new') }}">new series</a></li>

            </ul>
        </div>






        <div class="row w-100 mx-auto justify-content-center">



            @if (count($subType->movies) > 0)
                @foreach ($subType->movies()->paginate(10) as $item)
                    <div class="col-lg-4 similar-movie-col position-relative  mx-2  movie-container">
                        <a href="{{ route('movies.show', ['id' => $item->id]) }}" class="movie-img" style="width:100% ;">
                            <img src="{{ Storage::url($item->poster) }}" alt="" width="100%">
                        </a>




                        <div class="movie-caption d-flex flex-column">
                            <p>watch film {{ $movie->name }} ({{ $movie->production_year }})</p>


                            <div class="movie-comments d-flex py-0 ">
                                <div class="movie-comment d-flex">
                                    <span>comment</span>

                                    <i class="far fa-comment"></i>

                                </div>

                                <div class="movie-comment d-flex">
                                    <span>like</span>
                                    <div class="movie-icon">
                                        <i class="far fa-thumbs-up"></i>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                @endforeach




                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 d-flex justify-content-center">
                        {{ $subType->movies()->paginate(10)->links() }}
                    </div>
                </div>
            @endif





            @if (count($subType->series) > 0)
                @foreach ($subType->series()->paginate(10) as $item)
                    <div class="col-lg-4 similar-movie-col position-relative  mx-2  movie-container">
                        <a href="{{ route('series.show', ['id' => $item->id]) }}" class="movie-img" style="width:100% ;">
                            <img src="{{ Storage::url($item->poster) }}" alt="" width="100%">
                        </a>




                        <div class="movie-caption d-flex flex-column">
                            <p>watch film {{ $item->name }} ({{ $item->production_year }})</p>


                            <div class="movie-comments d-flex py-0 ">
                                <div class="movie-comment d-flex">
                                    <span>comment</span>

                                    <i class="far fa-comment"></i>

                                </div>

                                <div class="movie-comment d-flex">
                                    <span>like</span>
                                    <div class="movie-icon">
                                        <i class="far fa-thumbs-up"></i>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                @endforeach




                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 d-flex justify-content-center">
                        {{ $subType->series()->paginate(10)->links() }}
                    </div>
                </div>
            @endif



            @if (count($subType->tvs) > 0)
                @foreach ($subType->cartoons()->paginate(10) as $item)
                    <div class="col-lg-4 similar-movie-col position-relative  mx-2  movie-container">
                        <a href="{{ route('client.tv.show', ['id' => $item->id]) }}" class="movie-img"
                            style="width:100% ;">
                            <img src="{{ Storage::url($item->poster) }}" alt="" width="100%">
                        </a>




                        <div class="movie-caption d-flex flex-column">
                            <p>watch Tv show {{ $item->name }} ({{ $item->production_year }})</p>


                            <div class="movie-comments d-flex py-0 ">
                                <div class="movie-comment d-flex">
                                    <span>comment</span>

                                    <i class="far fa-comment"></i>

                                </div>

                                <div class="movie-comment d-flex">
                                    <span>like</span>
                                    <div class="movie-icon">
                                        <i class="far fa-thumbs-up"></i>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                @endforeach




                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 d-flex justify-content-center">
                        {{ $subType->tvs()->paginate(10)->links() }}
                    </div>
                </div>
            @endif


        </div>










    </div>
@endsection


@section('script')
    <script src="{{ asset('frontend/js/main.js') }}"></script>
@endsection
