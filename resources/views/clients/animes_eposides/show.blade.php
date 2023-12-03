@extends('layouts.frontend.master2')





@section('comment-form')
    <form action="{{ route('anime.eposide.comment') }}" method="POST">

        @csrf

        <input type="text" placeholder="write comment" class="ms-2 rounded border-0 h-100" name="title">

        <input type="hidden" value="{{ $eposide->id }}" name="eposide">
    </form>
@endsection

@section('content')
    <div class="col-lg-6 mx-auto film-center" style="background-color: #0C0F21 ; padding-top: 70px;">
        <div class="row position-relative "
            style="background-image: url({{ Storage::url($eposide->season->season_poster) }}) ; background-position: center ; background-size: cover ; background-repeat: no-repeat">
            <div class="blur position-absolute "></div>
            <div class="content py-4 normal-w d-none">
                <div class="poster-container d-flex justify-content-center">
                    <div class="col-lg-5 custom-show-w" style="height: 400px">
                        <div class="poster overflow-hidden" style="height: 100%">
                            <img src="{{ Storage::url($eposide->season->season_poster) }}" alt="" width="100%"
                                height="100%">
                        </div>
                    </div>
                </div>


                <ul class="unstyled d-flex ">
                    <li><a href="#">Movie app</a></li>
                    <li><a href="#">Series</a></li>
                    <li><a href="#">English Series</a></li>
                    <li><a href="#"> {{ $eposide->anime->name }} {{ $eposide->season->season_number }} </a></li>
                </ul>


                <h4>Watch Serie<span class="ms-1">{{ $eposide->anime->getTranslation('name', 'en') }} </span> Season
                    ({{ $eposide->season->season_number }}) Eposide
                    {{ $eposide->eposide_number }}</h4>


                <div class="film-info py-2">
                    <ul class="m-0 p-0">
                        @if ($eposide->anime->getTranslation('name', 'ar') == true)
                            <li><span>Name in Arabic</span>
                                <p class="m-0"> {{ $eposide->anime->getTranslation('name', 'ar') }} </p>
                            </li>
                        @endif
                        <li><span>Categorization</span>
                            <p class="m-0">
                                @foreach ($eposide->anime->categories as $item)
                                    {{ $item->name }}
                                @endforeach
                            </p>
                        </li>
                        <li><span>Rate</span>
                            <p class="m-0">

                                {{ $eposide->eposide_rate }}

                            </p>
                        </li>

                        <li><span>type</span>
                            <p class="m-0">
                                @foreach ($eposide->anime->categories as $item)
                                    {{ $item->name }}
                                @endforeach
                            </p>
                        </li>

                        <li><span>share</span>
                            <i class="fab fa-whatsapp"></i>
                            <i class="fab fa-facebook"></i>
                            <i class="fab fa-telegram"></i>
                            <i class="fab fa-twitter"></i>
                            <i class="fab fa-facebook-messenger"></i>
                        </li>



                    </ul>

                </div>

            </div>

            <div class="content py-4 large-w ">
                <div class="row d-flex">
                    <div class="col-lg-5 custom-show-w">
                        <div class="poster overflow-hidden">
                            <img src="{{ Storage::url($eposide->season->season_poster) }}" alt="">
                        </div>
                    </div>

                    <div class="col-lg-7 large-w-content">
                        <ul class="unstyled d-flex ">
                            <li><a href="#">Movie app</a></li>
                            <li><a href="#">Series</a></li>
                            <li><a href="#">English Series</a></li>
                            <li><a href="#"> serie {{ $eposide->anime->getTranslation('name', 'ar') }}
                                    {{ $eposide->season->season_number }}
                                </a></li>
                        </ul>


                        <h4>Watch <span class="ms-1">{{ $eposide->anime->getTranslation('name', 'ar') }} </span>Season
                            ({{ $eposide->season->season_number }}) Eposide
                            {{ $eposide->eposide_number }}</h4>


                        <div class="film-info py-2">
                            <ul class="m-0 p-0">

                                <li><span>Name in Arabic</span>
                                    <p class="m-0"> {{ $eposide->anime->getTranslation('name', 'ar') }} </p>
                                </li>

                                <li><span>Categorization</span>
                                    <p class="m-0">
                                        @foreach ($eposide->anime->categories as $item)
                                            {{ $item->name }}
                                        @endforeach
                                    </p>
                                </li>
                                <li><span>Rate</span>
                                    <p class="m-0">

                                        {{ $eposide->eposide_rate }}

                                    </p>
                                </li>


                                <li><span>type</span>
                                    <p class="m-0">
                                        @foreach ($eposide->anime->categories as $item)
                                            {{ $item->name }}
                                        @endforeach
                                    </p>
                                </li>



                                <li><span>share</span>
                                    <i class="fab fa-whatsapp"></i>
                                    <i class="fab fa-facebook"></i>
                                    <i class="fab fa-telegram"></i>
                                    <i class="fab fa-twitter"></i>
                                    <i class="fab fa-facebook-messenger"></i>
                                </li>



                            </ul>

                        </div>

                    </div>
                </div>
            </div>
        </div>



        @if ($eposide->anime->description !== null)
            <div class="row"
                style="background-color: #15192a ; border-top: 1px solid rgba(255, 255, 255, .05);
                    box-shadow: #0c0f21 0 12px 10px -10px inset;">
                <div class="col-lg-12 d-flex align-items-center">
                    <div class="film-story py-3">
                        <div class="d-flex align-items-center my-2">
                            <i class="fas fa-paragraph" style="font-size: 25px; color  : blue"></i>
                            <h3 class="text-white ms-2 my-0">Anime Story</h3>
                        </div>
                        <p> {{ $eposide->anime->description }}</p>
                    </div>
                </div>
            </div>
        @endif




        <div class="row social-media" style="background-color: #1A1D2E">
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




        <div class="row py-3 " style="background-color: #262A42">
            <h3 class="text-center">
                Viewing Servers
            </h3>

            <div class="server-watshes d-flex flex-wrap  justify-content-center">

                <button value="{{ $eposide->server_1_url }}">Server1</button>

                @if ($eposide->server_2_url == true)
                    <button value="{{ $eposide->server_2_url }}">Server2</button>
                @endif
                @if ($eposide->server_3_url == true)
                    <button value="{{ $eposide->server_3_url }}">Server3</button>
                @endif
                @if ($eposide->server_4_url == true)
                    <button value="{{ $eposide->server_4_url }}">Server4</button>
                @endif
                @if ($eposide->server_5_url == true)
                    <button value="{{ $eposide->server_5_url }}">Server5</button>
                @endif
                @if ($eposide->server_6_url == true)
                    <button value="{{ $eposide->server_6_url }}">Server6</button>
                @endif
                @if ($eposide->server_7_url == true)
                    <button value="{{ $eposide->server_7_url }}">Server7</button>
                @endif
                @if ($eposide->server_8_url == true)
                    <button value="{{ $eposide->server_8_url }}">Server8</button>
                @endif






            </div>
            <div class="film-iframe">


                <iframe id="filmUrl" allowfullscreen src="{{ $eposide->anime_url }}" width="100%"
                    height="400"></iframe>


            </div>




            <div class="related-eposides d-flex justify-content-between align-items-center">
                @if ($prevEposide)
                    <a class=" text-white  d-flex align-items-center justify-content-center"
                        href="{{ route('eposide.show', ['id' => $prevEposide->id]) }}"
                        style="width : 200px ; padding: 8px 0 ; background-color : #4D5374 ; border-radius: 5px ; ">
                        <span>Previous
                            Eposide {{ $eposide->eposide_number - 1 }} </span></a>
                @endif


                <a></a>





                @if ($nextEposide)
                    <a class="text-white  d-flex align-items-center justify-content-center"
                        href="{{ route('eposide.show', ['id' => $nextEposide->id]) }}"
                        style="width : 200px ; padding: 8px 0 ; background-color : #6375FF ; border-radius: 5px ; ">
                        <span>Next
                            Eposide {{ $eposide->eposide_number + 1 }} </span></a>
                @endif

            </div>
















            <h3 class="my-2">Downloading servers</h3>


            <div class="server-downloads d-flex flex-wrap">


                <a href="{{ $eposide->server_1_url_download }}"
                    class="border-0 d-flex justify-content-around align-items-center">
                    <span class="download-icon">
                        <i class="fas fa-download"></i>
                    </span>

                    <span class="d-flex flex-column ">
                        <span class=" fs-5">Server 1</span>
                        <small>download </small>
                    </span>


                </a>


                @if ($eposide->server_2_url_download == true)
                    <a href="{{ $eposide->server_2_url_download }}"
                        class="border-0 d-flex justify-content-around align-items-center">
                        <span class="download-icon">
                            <i class="fas fa-download"></i>
                        </span>

                        <span class="d-flex flex-column ">
                            <span class=" fs-5">Server2</span>
                            <small>download </small>
                        </span>


                    </a>
                @endif


                @if ($eposide->server_3_url_download == true)
                    <a href="{{ $eposide->server_3_url_download }}"
                        class="border-0 d-flex justify-content-around align-items-center">
                        <span class="download-icon">
                            <i class="fas fa-download"></i>
                        </span>

                        <span class="d-flex flex-column ">
                            <span class=" fs-5">Server3</span>
                            <small>download </small>
                        </span>
                    </a>
                @endif

                @if ($eposide->server_4_url_download == true)
                    <a href="{{ $eposide->server_4_url_download }}"
                        class="border-0 d-flex justify-content-around align-items-center">
                        <span class="download-icon">
                            <i class="fas fa-download"></i>
                        </span>

                        <span class="d-flex flex-column ">
                            <span class=" fs-5">Server4</span>
                            <small>download </small>
                        </span>
                    </a>
                @endif


                @if ($eposide->server_5_url_download == true)
                    <a href="{{ $eposide->server_5_url_download }}"
                        class="border-0 d-flex justify-content-around align-items-center">
                        <span class="download-icon">
                            <i class="fas fa-download"></i>
                        </span>

                        <span class="d-flex flex-column ">
                            <span class=" fs-5">server5</span>
                            <small>download </small>
                        </span>
                    </a>
                @endif




            </div>

        </div>









        <div class="row py-3  " style="background-color: #1A1D2E">
            <h3 class="mb-3">{{ $eposide->anime->getTranslation('name', 'ar') }} season
                {{ $eposide->season->season_number }}
                eposides</h3>

            <div class="col-12 d-lg-none d-md-none d-sm-block mb-3">
                <div class="row">
                    @foreach ($eposide->anime->seasons as $item)
                        <div class="col-3">
                            @if ($item->id == $eposide->season->id)
                                <a href='{{ route('animes.season.show', ['id' => $item->id]) }}'
                                    class='text-white d-block p-2 my-1 '
                                    style='background-color: #6375FF ; border-radius: 17px ; '>Season
                                    {{ $item->season_number }}</a>
                            @else
                                <a href='{{ route('animes.season.show', ['id' => $item->id]) }}'
                                    class='text-white d-block p-2 my-1 '
                                    style='background-color: #393D51 ; border-radius: 17px ; '>Season
                                    {{ $item->season_number }}</a>
                            @endif
                        </div>
                    @endforeach
                </div>

            </div>


            <div class="col-12 col-lg-8 col-md-8 col-sm-12">
                <div class="row">
                    @foreach ($eposide->season->eposides as $item)
                        <div class="col-6 col-lg-6 col-md-6 col-sm-6">
                            @if ($id == $item->id)
                                <a class='text-white d-block position-relative mb-2 '
                                    href='{{ route('animes.eposide.show', ['id' => $item->id]) }}'
                                    style='background-color: #6375FF ; border-radius: 17px ; padding: 12px '>
                                    <div class="eposide">
                                        <i class="fas fa-angle-right position-absolute"></i>
                                    </div>

                                    <span class="eposide-span">eposide {{ $item->eposide_number }}</span>
                                </a>
                            @else
                                <a class='text-white d-block position-relative mb-2 '
                                    href='{{ route('animes.eposide.show', ['id' => $item->id]) }}'
                                    style='background-color: #393D51 ; border-radius: 17px ; padding: 12px '>
                                    <div class="eposide">
                                        <i class="fas fa-angle-right position-absolute"></i>
                                    </div>

                                    <span class="eposide-span">eposide {{ $item->eposide_number }}</span>
                                </a>
                            @endif

                        </div>
                    @endforeach
                </div>
            </div>


            <div class="col-lg-4  col-md-4 col-sm-6 d-none  d-lg-flex d-md-flex d-sm-none   justify-content-center">
                <div class="seasons py-2  d-flex flex-column align-items-center"
                    style="background-color: #1E243C; border-radius: 17px ; width : 200px ">


                    @foreach ($eposide->anime->seasons as $item)
                        @if ($item->id == $eposide->season->id)
                            <a href='{{ route('animes.season.show', ['id' => $item->id]) }}'
                                class='text-white d-block p-2 my-1 '
                                style='background-color: #6375FF ; border-radius: 17px ; width:230px '>Season
                                {{ $item->season_number }}</a>
                        @else
                            <a href='{{ route('animes.season.show', ['id' => $item->id]) }}'
                                class='text-white d-block p-2 my-1 '
                                style='background-color: #393D51 ; border-radius: 17px ; width:230px '>Season
                                {{ $item->season_number }}</a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>















        <h3 class="my-3">Similar movies</h3>


        <div class="row  justify-content-center">

            @foreach ($similar_animes as $similarMovie)
                <div class="col-lg-4 mx-2 similar-movie-col movie-container d-flex flex-column justify-content-center"
                    style="height: 350px">


                    <a href="{{ route('animes.show', ['id' => $similarMovie->id]) }}" class="movie-img"
                        style="width:100% ; height:80%">
                        <img src="{{ Storage::url($similarMovie->poster) }}" alt="" width="100%"
                            height="100%">
                    </a>



                    <div class="movie-caption d-flex flex-column">
                        <a class="text-white" href="{{ route('series.show', ['id' => $similarMovie->id]) }}">


                            <p>
                                {{ $similarMovie->name }} ({{ $similarMovie->production_year }})
                            </p>
                        </a>




                        <div class="movie-comments d-flex py-0 ">
                            <div class="movie-comment d-flex">
                                <span>comment</span>
                                <i class="fas fa-comment"></i>

                            </div>

                            <div class="movie-comment d-flex">
                                <span>like</span>
                                <div class="movie-icon">
                                    <i class="fas fa-thumbs-up"></i>
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
    <script src="{{ asset('frontend/js/film.js') }}"></script>
@endsection
