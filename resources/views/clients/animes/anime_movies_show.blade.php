@extends('layouts.frontend.master2')


@section('title')
    صفحة الانمى
@endsection


@section('comment-form')
    <form action="{{ route('anime.movie.comment') }}" method="POST">

        @csrf

        <input type="text" placeholder="write comment" class="ms-2 rounded border-0 " name="comment">

        <input type="hidden" value="{{ $movie->id }}" name="anime_movie">
    </form>
@endsection

@section('content')
    <div class="col-lg-6 mx-auto film-center show-center" style="background-color: #0C0F21 ; padding-top: 50px;">
        <div class="row position-relative "
            style="background-image: url({{ Storage::url($movie->poster) }}) ; background-position: center ; background-size: cover ; background-repeat: no-repeat ; padding-top: 20px;">
            <div class="blur position-absolute "></div>

            <div class="content py-4 normal-w d-none">
                <div class="poster-container d-flex justify-content-center">
                    <div class="col-lg-5 custom-show-w ">
                        <div class="poster overflow-hidden " style="height: 100% ; width : 100%">
                            <img src="{{ Storage::url($movie->poster) }}" alt="" width="100%" height="100%">
                        </div>
                    </div>
                </div>


                <ul class="unstyled d-flex  py-1 ">
                    <li><a href="#">Movie app</a></li>
                    <li><a href="{{ route('client.type.show', ['id' => $movie->type->id]) }}">{{ $movie->type->name }}</a>
                    </li>
                    <li><a
                            href="{{ route('client.subtype.show', ['id' => $movie->subtype->id]) }}">{{ $movie->subtype->name }}</a>
                    </li>
                    <li><a href="#"> مشاهده فيلم
                            {{ $movie->getTranslation('name', 'ar') == true ? $movie->getTranslation('name', 'ar') : $movie->getTranslation('name', 'en') }}
                            {{ $movie->production_year }} </a></li>
                </ul>


                <h4>{{ $movie->getTranslation('name', 'ar') == true ? $movie->getTranslation('name', 'ar') : $movie->getTranslation('name', 'en') }}
                    ({{ $movie->production_year }})</h4>


                <div class="film-info py-2">
                    <ul class="m-0 p-0">
                        @if ($movie->getTranslation('name', 'ar') == true)
                            <li><span>الاسم بالعربى</span>
                                <p class="m-0"> {{ $movie->getTranslation('name', 'ar') }} </p>
                            </li>
                        @endif
                        <li><span>التصنيف</span>
                            <p class="m-0">
                                @foreach ($movie->categories as $item)
                                    {{ $item->name }}
                                @endforeach
                            </p>
                        </li>
                        <li><span>التقييم</span>
                            <p class="m-0">

                                {{ $movie->rate }}

                            </p>
                        </li>
                        <li><span>المده</span>
                            <p class="m-0"> {{ $movie->duration }} minutes</p>
                        </li>
                        <li><span>النوع</span>
                            <p class="m-0">
                                {{ $movie->subtype->name }}
                            </p>
                        </li>


                        @if ($movie->also_known_as == true)
                            <li><span>يعرف ايضا ب</span>
                                <p class="m-0"> {{ $movie->also_known_as }}</p>
                            </li>
                        @endif




                    </ul>

                </div>

            </div>




            <div class="content py-4 large-w ">
                <div class="row d-flex">
                    <div class="col-lg-5 custom-show-w ">
                        <div class="poster overflow-hidden" style="height: 100% ; width : 100%">
                            <img src="{{ Storage::url($movie->poster) }}" alt="" width="100%" height="100%">
                        </div>
                    </div>

                    <div class="col-lg-7 large-w-content">
                        <ul class="unstyled d-flex py-1">
                            <li><a href="#">Movie app</a></li>
                            <li><a
                                    href="{{ route('client.type.show', ['id' => $movie->type->id]) }}">{{ $movie->type->name }}</a>
                            </li>
                            <li><a
                                    href="{{ route('client.subtype.show', ['id' => $movie->subtype->id]) }}">{{ $movie->subtype->name }}</a>
                            </li>
                            <li><a href="#"> مشاهده فيلم
                                    {{ $movie->getTranslation('name', 'ar') == true ? $movie->getTranslation('name', 'ar') : $movie->getTranslation('name', 'en') }}
                                    {{ $movie->production_year }} </a></li>
                        </ul>


                        <h4>{{ $movie->getTranslation('name', 'ar') == true ? $movie->getTranslation('name', 'ar') : $movie->getTranslation('name', 'en') }}
                            ({{ $movie->production_year }})</h4>


                        <div class="film-info py-2">
                            <ul class="m-0 p-0">
                                @if ($movie->getTranslation('name', 'ar') == true)
                                    <li><span>الاسم بالعربى</span>
                                        <p class="m-0"> {{ $movie->getTranslation('name', 'ar') }} </p>
                                    </li>
                                @endif
                                <li><span>التصنيف</span>
                                    <p class="m-0">
                                        @foreach ($movie->categories as $item)
                                            {{ $item->name }}
                                        @endforeach
                                    </p>
                                </li>
                                <li><span>التقييم</span>
                                    <p class="m-0">

                                        {{ $movie->rate }}

                                    </p>
                                </li>
                                <li><span>المده</span>
                                    <p class="m-0"> {{ $movie->duration }} minutes</p>
                                </li>
                                <li><span>النوع</span>
                                    <p class="m-0">
                                        {{ $movie->subtype->name }}
                                    </p>
                                </li>


                                @if ($movie->also_known_as == true)
                                    <li><span>يعرف ايضا ب</span>
                                        <p class="m-0"> {{ $movie->also_known_as }}</p>
                                    </li>
                                @endif




                            </ul>

                        </div>

                    </div>
                </div>
            </div>

        </div>























        <div class="row"
            style="background-color: #15192a ; border-top: 1px solid rgba(255, 255, 255, .05);
                box-shadow: #0c0f21 0 12px 10px -10px inset;">
            <div class="col-lg-12 d-flex align-items-center">
                <div class="film-story py-3">
                    <div class="d-flex align-items-center my-2">
                        <i class="fas fa-paragraph" style="font-size: 25px; color  : blue"></i>
                        <h3 class="text-white ms-2 my-0">قصة الفيلم</h3>
                    </div>
                    <p> {{ $movie->description }}</p>
                </div>
            </div>
        </div>


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





        @if (count($movie->AnimeWatchServers))
            <div class="row py-3 " style="background-color: #262A42">

                <div class="col-xxl-3 col-xl-12 ">
                    <h3 class="text-center">
                        سيرفرات المشاهده
                    </h3>

                    <div class="server-watshes d-flex flex-wrap  justify-content-center">

                        @foreach ($movie->AnimeWatchServers as $item)
                            <button value="{{ $item->url }}">سيرفر {{ $item->id }}</button>
                        @endforeach





                    </div>
                </div>


                <div class="col-xxl-6 col-xl-12 ">

                    <div class="film-iframe">


                        <iframe id="filmUrl" allowfullscreen src="{{ $eposide->serieWatchServers[0]->url }}"
                            width="100%" height="400"></iframe>

                    </div>
                </div>
        @endif

        @if (count($movie->AnimeDownloadsServers))
            <div class="col-xxl-3 col-xl-12">
                <h3>سيرفرات التحميل</h3>


                <div class="server-downloads d-flex flex-wrap">

                    @foreach ($movie->AnimeDownloadsServers as $item)
                        <a href="{{ $item->url }}" target="blank"
                            class="border-0 d-flex justify-content-around align-items-center">
                            <span class="download-icon">
                                <i class="fas fa-download"></i>
                            </span>

                            <span class="d-flex flex-column ">
                                <span class=" fs-5">سيرفر {{ $item->id }}</span>
                                <small>تحميل </small>
                            </span>


                        </a>
                    @endforeach











                </div>
            </div>




    </div>
    @endif











    <h3 class="my-3" style="text-align: right">أعمال مشابهه</h3>


    <div class="row  justify-content-center">

        @foreach ($similar_movies as $similarMovie)
            <div class="col-lg-4 mx-2 similar-movie-col movie-container d-flex flex-column justify-content-center"
                style="height: 350px">


                <a href="{{ route('animes.movies.show', ['id' => $similarMovie->id]) }}" class="movie-img"
                    style="width:100% ; height:80%">
                    <img src="{{ Storage::url($similarMovie->poster) }}" alt="" width="100%" height="100%">
                </a>



                <div class="movie-caption d-flex flex-column">
                    <a class="text-white" href="{{ route('movies.show', ['id' => $similarMovie->id]) }}">


                        <p>
                            {{ $similarMovie->name }} ({{ $similarMovie->production_year }})
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
    <script src="{{ asset('frontend/js/film.js') }}"></script>
@endsection
