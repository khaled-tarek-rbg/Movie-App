@extends('layouts.frontend.master2')

@section('title')
    {{-- {{ $movie->name }} film --}}
@endsection



@section('comment-form')
    <form action="{{ route('tv_eposide.comment') }}" method="POST">
        @csrf
        <input type="text" placeholder="write comment" class="ms-2 rounded border-0 h-100" name="title">

        <input type="hidden" value="{{ $eposide->id }}" name="tv_eposide">
    </form>
@endsection




@section('content')
    <div class="col-lg-6 mx-auto film-center" style="background-color: #0C0F21 ; padding-top: 70px;">
        <div class="row position-relative "
            style="background-image: url({{ Storage::url($eposide->season->season_poster) }}) ; background-position: center ; background-size: cover ; background-repeat: no-repeat">
            <div class="blur position-absolute "></div>
            <div class="content py-4 normal-w d-none">
                <div class="poster-container d-flex justify-content-center">
                    <div class="col-lg-5 custom-show-w" style="height: 300px">
                        <div class="poster overflow-hidden" style="height: 100%">
                            <img src="{{ Storage::url($eposide->season->season_poster) }}" alt="" width="100%"
                                height="100%">
                        </div>
                    </div>
                </div>


                <ul class="unstyled d-flex ">
                    <li><a href="#">موفى اب</a></li>
                    <li><a
                            href="{{ route('client.type.show', ['id' => $eposide->tv->type->id]) }}">{{ $eposide->tv->type->name }}</a>
                    </li>
                    <li><a
                            href="{{ route('client.subtype.show', ['id' => $eposide->tv->subtype->id]) }}">{{ $eposide->tv->subtype->name }}</a>
                    </li>
                    <li><a href="{{ route('tvs.show', ['id' => $eposide->tv->id]) }}"> {{ $eposide->tv->name }}
                            {{ $eposide->season->season_number }} </a></li>
                </ul>


                <h4>مشاهده
                    <span
                        class="ms-1">{{ $eposide->tv->getTranslation('name', 'ar') == true ? $eposide->tv->getTranslation('name', 'ar') : $eposide->tv->getTranslation('name', 'en') }}
                    </span>
                    موسم رقم
                    ({{ $eposide->season->season_number }})
                    حلقة رقم
                    {{ $eposide->serie_number }}
                </h4>


                <div class="film-info py-2">
                    <ul class="m-0 p-0">
                        @if ($eposide->tv->getTranslation('name', 'ar') == true)
                            <li><span>الاسم بالعربى</span>
                                <p class="m-0"> {{ $eposide->tv->getTranslation('name', 'ar') }} </p>
                            </li>
                        @endif
                        <li><span>التصنيف</span>
                            <p class="m-0">
                                @foreach ($eposide->tv->categories as $item)
                                    {{ $item->name }}
                                @endforeach
                            </p>

                        <li><span>النوع</span>
                            <p class="m-0">
                                {{ $eposide->tv->subtype->name }}

                            </p>
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
                            <li><a href="#">موفى اب</a></li>
                            <li><a
                                    href="{{ route('client.type.show', ['id' => $eposide->tv->type->id]) }}">{{ $eposide->tv->type->name }}</a>
                            </li>
                            <li><a
                                    href="{{ route('client.subtype.show', ['id' => $eposide->tv->subtype->id]) }}">{{ $eposide->tv->subtype->name }}</a>
                            </li>
                            <li><a href="{{ route('tvs.show', ['id' => $eposide->tv->id]) }}"> {{ $eposide->tv->name }}
                                    {{ $eposide->season->season_number }} </a></li>
                        </ul>


                        <h4>مشاهده <span
                                class="ms-1">{{ $eposide->tv->getTranslation('name', 'ar') == true ? $eposide->tv->getTranslation('name', 'ar') : $eposide->tv->getTranslation('name', 'en') }}
                            </span>موسم رقم
                            ({{ $eposide->season->season_number }}) حلقة رقم
                            {{ $eposide->serie_number }}</h4>


                        <div class="film-info py-2">
                            <ul class="m-0 p-0">

                                <li><span>الاسم بالعربى</span>
                                    <p class="m-0"> {{ $eposide->tv->getTranslation('name', 'ar') }} </p>
                                </li>

                                <li><span>التصنيف</span>
                                    <p class="m-0">
                                        @foreach ($eposide->tv->categories as $item)
                                            {{ $item->name }}
                                        @endforeach
                                    </p>
                                </li>


                                <li><span>النوع</span>
                                    <p class="m-0">
                                        {{ $eposide->tv->subtype->name }}

                                    </p>
                                </li>







                            </ul>

                        </div>

                    </div>
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







        @if (count($eposide->servers))
            <div class="row py-3 " style="background-color: #262A42">

                <div class="col-xxl-3 col-xl-12 ">
                    <h3 class="text-center">
                        سيرفرات المشاهده </h3>

                    <div class="server-watshes d-flex flex-wrap  justify-content-center">

                        @foreach ($eposide->servers as $item)
                            <button value="{{ $item->url }}">سيرفر {{ $item->id }}</button>
                        @endforeach





                    </div>
                </div>


                <div class="col-xxl-6 col-xl-12 ">

                    <div class="film-iframe">


                        <iframe id="filmUrl" allowfullscreen src="{{ $eposide->servers[0]->url }}" width="100%"
                            height="400"></iframe>

                    </div>
                </div>
        @endif
        @if (count($eposide->downloadservers))
            <div class="col-xxl-3 col-xl-12">
                <h3>سيرفرات التحميل</h3>


                <div class="server-downloads d-flex flex-wrap">

                    @foreach ($eposide->downloadservers as $item)
                        <a href="{{ $item->url }}" target="blank"
                            class="border-0 d-flex justify-content-around align-items-center">
                            <span class="download-icon">
                                <i class="fas fa-download"></i>
                            </span>

                            <span class="d-flex flex-column ">
                                <span class=" fs-5">سيرقر {{ $item->id }}</span>
                                <small>تحميل </small>
                            </span>


                        </a>
                    @endforeach











                </div>
            </div>
        @endif





    </div>












    <h3 class="my-3 " style="text-align: right">اعمال مشابهه</h3>


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
