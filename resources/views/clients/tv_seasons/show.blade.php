@extends('layouts.frontend.master2')

@section('comment-form')
    <form action="{{ route('tv.season.comment') }}" method="POST">
        @csrf
        <input type="text" placeholder="write comment" class="ms-2 rounded border-0 h-100" name="title">

        <input type="hidden" value="{{ $tv_season->id }}" name="tv_season">
    </form>
@endsection



@section('content')
    <div class="col-lg-6 mx-auto film-center" style="background-color: #0C0F21 ; padding-top: 70px;">
        <div class="row position-relative "
            style="background-image: url({{ Storage::url($tv_season->season_poster) }}) ; background-position: center ; background-size: cover ; background-repeat: no-repeat">
            <div class="blur position-absolute "></div>
            <div class="content py-4 normal-w d-none">
                <div class="poster-container d-flex justify-content-center">
                    <div class="col-lg-5 custom-show-w" style="height: 400px">
                        <div class="poster overflow-hidden" style="height: 100%">
                            <img src="{{ Storage::url($tv_season->season_poster) }}" alt="" width="100%"
                                height="100%">
                        </div>
                    </div>
                </div>


                <ul class="unstyled d-flex ">
                    <li><a href="#">Movie app</a></li>
                    <li><a href="#">Series</a></li>
                    <li><a href="#">English Series</a></li>
                    <li><a href="#"> {{ $tv_season->tv->name }} {{ $tv_season->season_number }} </a></li>
                </ul>


                <h4>{{ $tv_season->tv->getTranslation('name', 'en') }} Season {{ $tv_season->season_number }}</h4>


                <div class="film-info py-2">
                    <ul class="m-0 p-0">
                        @if ($tv_season->tv->getTranslation('name', 'ar') == true)
                            <li><span>Name in Arabic</span>
                                <p class="m-0"> {{ $tv_season->tv->getTranslation('name', 'ar') }} </p>
                            </li>
                        @endif
                        <li><span>Categorization</span>
                            <p class="m-0">
                                @foreach ($tv_season->tv->categories as $item)
                                    {{ $item->name }}
                                @endforeach
                            </p>
                        </li>

                        <li><span>type</span>
                            <p class="m-0">
                                @foreach ($tv_season->tv->categories as $item)
                                    {{ $item->name }}
                                @endforeach
                            </p>
                        </li>




                    </ul>

                </div>

            </div>

            <div class="content py-4 large-w ">
                <div class="row d-flex">
                    <div class="col-lg-5 custom-show-w">
                        <div class="poster overflow-hidden">
                            <img src="{{ Storage::url($tv_season->season_poster) }}" alt="">
                        </div>
                    </div>

                    <div class="col-lg-7 large-w-content">
                        <ul class="unstyled d-flex ">
                            <li><a href="#">Movie app</a></li>
                            <li><a href="#">Series</a></li>
                            <li><a href="#">English Series</a></li>
                            <li><a href="#"> serie {{ $tv_season->tv->getTranslation('name', 'en') }}
                                    {{ $tv_season->season_number }}
                                </a></li>
                        </ul>


                        <h4>{{ $tv_season->tv->getTranslation('name', 'en') }} ( {{ $tv_season->season_production_year }}
                            )
                        </h4>


                        <div class="film-info py-2">
                            <ul class="m-0 p-0">

                                <li><span>Name in Arabic</span>
                                    <p class="m-0"> {{ $tv_season->tv->getTranslation('name', 'ar') }} </p>
                                </li>

                                <li><span>Categorization</span>
                                    <p class="m-0">
                                        @foreach ($tv_season->tv->categories as $item)
                                            {{ $item->name }}
                                        @endforeach
                                    </p>
                                </li>

                                <li><span>type</span>
                                    <p class="m-0">
                                        @foreach ($tv_season->tv->categories as $item)
                                            {{ $item->name }}
                                        @endforeach
                                    </p>
                                </li>







                            </ul>

                        </div>

                    </div>
                </div>
            </div>
        </div>



        @if ($tv_season->tv->description !== null)
            <div class="row"
                style="background-color: #15192a ; border-top: 1px solid rgba(255, 255, 255, .05);
                    box-shadow: #0c0f21 0 12px 10px -10px inset;">
                <div class="col-lg-12 d-flex align-items-center">
                    <div class="film-story py-3">
                        <div class="d-flex align-items-center my-2">
                            <i class="fas fa-paragraph" style="font-size: 25px; color  : blue"></i>
                            <h3 class="text-white ms-2 my-0">Serie Story</h3>
                        </div>
                        <p> {{ $tv_season->tv->description }}</p>
                    </div>
                </div>
            </div>
        @endif




        <div class="row social-media" style="background-color: #1A1D2E ; border : 0">
            <div class="col-lg-12">
                <div class="social d-flex  flex-column align-items-center py-4">
                    <h2 class="text-white">Follow us on socical media</h1>
                        <div class="d-flex">
                            <div class="social-icons" style="background-color: #46B3E3">
                                <i class="fab fa-facebook"></i>
                            </div>
                            <div class="social-icons" style="background-color: #31A9F3"> <i class="fab fa-twitter"></i>
                            </div>
                            <div class="social-icons" style="background-color: #2D83F3"> <i class="fab fa-telegram"></i>
                            </div>
                        </div>


                </div>
            </div>
        </div>



        <div class="row py-3 " style="background-color: #1A1D2E">
            <h3 class="mb-3">Eposides of Season {{ $tv_season->season_number }}</h3>


            @foreach ($tv_season->tv_eposides as $item)
                <div class="col-lg-6 mt-2">
                    <a class='text-white d-block  w-100 '
                        href='{{ route('client.tv_eposides.show', ['id' => $item->id]) }}'
                        style='background-color: #393D51 ; border-radius: 17px ; padding: 12px '>eposide
                        {{ $item->serie_number }}</a>
                </div>
            @endforeach



        </div>


        <h3 class="my-3">Similar Series</h3>


        <div class="row  justify-content-center">

            @foreach ($similarEposides as $similarMovie)
                <div class="col-lg-4 mx-2 similar-movie-col movie-container d-flex flex-column justify-content-center"
                    style="height: 350px">


                    <a href="{{ route('client.tv.show', ['id' => $similarMovie->id]) }}" class="movie-img"
                        style="width:100% ; height:80%">
                        <img src="{{ Storage::url($similarMovie->poster) }}" alt="" width="100%" height="100%">
                    </a>



                    <div class="movie-caption d-flex flex-column">
                        <a class="text-white" href="#">


                            <p>
                                {{ $similarMovie->name }} ({{ $similarMovie->production_year }})
                            </p>
                        </a>





                    </div>

                </div>
            @endforeach



        </div>






    </div>
@endsection


@section('script')
    <script src="{{ asset('frontend/js/film.js') }}"></script>
@endsection
