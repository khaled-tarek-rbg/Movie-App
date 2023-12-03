@extends('layouts.frontend.master')


@section('content')
    <div class="col-lg-6 mx-auto center">

        <div class="row w-100 mx-auto justify-content-center  ">

            @foreach ($movies as $movie)
                <div class="col-lg-4 similar-movie-col   mx-2  movie-container d-flex flex-column ">
                    <a href="{{ route('movies.show', ['id' => $movie->id]) }}" class="movie-img" style="width:100%">

                        <img src="{{ Storage::url($movie->poster) }}" alt="" width="100%" height="100%">
                    </a>



                    <div class="movie-caption d-flex flex-column">
                        <a class="text-white" href="{{ route('movies.show', ['id' => $movie->id]) }}">


                            <p>
                                {{ $movie->name }} ({{ $movie->production_year }})
                            </p>
                        </a>




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

            @foreach ($anime_movies as $movie)
                <div class="col-lg-4 similar-movie-col   mx-2  movie-container d-flex flex-column ">
                    <a href="{{ route('animes.movies.show', ['id' => $movie->id]) }}" class="movie-img" style="width:100%">

                        <img src="{{ Storage::url($movie->poster) }}" alt="" width="100%" height="100%">
                    </a>



                    <div class="movie-caption d-flex flex-column">
                        <a class="text-white" href="{{ route('movies.show', ['id' => $movie->id]) }}">


                            <p>
                                {{ $movie->name }} ({{ $movie->production_year }})
                            </p>
                        </a>




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




            @foreach ($series as $movie)
                <div class="col-lg-4 similar-movie-col   mx-2  movie-container d-flex flex-column ">
                    <a href="{{ route('series.show', ['id' => $movie->id]) }}" class="movie-img" style="width:100%">

                        <img src="{{ Storage::url($movie->poster) }}" alt="" width="100%" height="100%">
                    </a>



                    <div class="movie-caption d-flex flex-column">
                        <a class="text-white" href="{{ route('series.show', ['id' => $movie->id]) }}">


                            <p>
                                {{ $movie->name }} ({{ $movie->production_year }})
                            </p>
                        </a>




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






            @foreach ($animes as $movie)
                <div class="col-lg-4 similar-movie-col   mx-2  movie-container d-flex flex-column ">
                    <a href="{{ route('animes.show', ['id' => $movie->id]) }}" class="movie-img" style="width:100%">

                        <img src="{{ Storage::url($movie->poster) }}" alt="" width="100%" height="100%">
                    </a>



                    <div class="movie-caption d-flex flex-column">
                        <a class="text-white" href="{{ route('animes.show', ['id' => $movie->id]) }}">


                            <p>
                                {{ $movie->name }} ({{ $movie->production_year }})
                            </p>
                        </a>




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


            @foreach ($tv_shows as $movie)
                <div class="col-lg-4 similar-movie-col   mx-2  movie-container d-flex flex-column ">
                    <a href="{{ route('client.tv.show', ['id' => $movie->id]) }}" class="movie-img" style="width:100%">

                        <img src="{{ Storage::url($movie->poster) }}" alt="" width="100%" height="100%">
                    </a>



                    <div class="movie-caption d-flex flex-column">
                        <a class="text-white" href="{{ route('client.tv.show', ['id' => $movie->id]) }}">


                            <p>
                                {{ $movie->name }} ({{ $movie->production_year }})
                            </p>
                        </a>




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

        </div>

    </div>
@endsection

@section('script')
    <script src="{{ asset('frontend/js/main.js') }}"></script>
@endsection
