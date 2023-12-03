@extends('layouts.frontend.master')


{{-- @section('title')
    movies-page
@endsection --}}

@section('content')
    <div class="col-lg-6 mx-auto center">


        <div class="movie-slider position-relative pt-3">
            <div class="prev position-absolute"><i class="fas fa-angle-left"></i></div>
            <div class="row flex-nowrap overflow-hidden w-100 mx-auto">


                @foreach ($animes as $movie)
                    <div class="col-lg-5 custom-film-w p-0 mx-2 position-relative" style="height: 380px">

                        <a href="#">
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


            </div>
            <div class="next position-absolute"><i class="fas fa-angle-right"></i></div>
        </div>




        <div class="movie-categories my-5">
            <ul class="d-flex p-3">
                <li><a href="{{ route('client.animes') }}">Last Eposides</a></li>
                <li><a href="{{ route('client.animes.series') }}">Cartoon Series</a></li>
                <li style="background-color: #6375FF;"><a href="{{ route('client.animes.movies') }}">Cartoon Movies</a>
                </li>

            </ul>
        </div>



        <div class="row w-100 mx-auto justify-content-center  ">

            @foreach ($paginatedAnimes as $paginatedMovie)
                <div class="col-lg-4 similar-movie-col   mx-2  movie-container d-flex flex-column ">


                    <a href="#" class="movie-img" style="width:100%">

                        <img src="{{ Storage::url($paginatedMovie->poster) }}" alt="" width="100%" height="100%">
                    </a>



                    <div class="movie-caption d-flex flex-column">
                        <a class="text-white" href="#">


                            <p>
                                {{ $paginatedMovie->name }} ({{ $paginatedMovie->production_year }})
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


        <div class="row w-100 justify-content-center mx-auto ">

            <div class="links  d-flex justify-content-center pt-3">
                {{ $paginatedAnimes->links() }}
            </div>


        </div>

    </div>
@endsection


@section('script')
    <script src="{{ asset('frontend/js/main.js') }}"></script>
@endsection
