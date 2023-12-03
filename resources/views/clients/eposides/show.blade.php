@extends('layouts.frontend.master2')

@section('title')
    {{-- {{ $movie->name }} film --}}
@endsection


@section('comment-form')
    <form action="{{ route('eposide.comment') }}" method="POST">

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
                    <li><a href="#">موفى اب</a></li>
                    <li><a
                            href="{{ route('client.type.show', ['id' => $eposide->serie->type->id]) }}">{{ $eposide->serie->type->name }}</a>
                    </li>
                    <li><a
                            href="{{ route('client.subtype.show', ['id' => $eposide->serie->subtype->id]) }}">{{ $eposide->serie->subtype->name }}</a>
                    </li>
                    <li><a href="{{ route('tvs.show', ['id' => $eposide->serie->id]) }}"> {{ $eposide->serie->name }}
                            {{ $eposide->season->season_number }} </a></li>
                </ul>




                <h4>مشاهده مسلسل<span
                        class="ms-1">{{ $eposide->serie->getTranslation('name', 'ar') == true ? $eposide->serie->getTranslation('name', 'ar') : $eposide->serie->getTranslation('name', 'en') }}
                    </span> موسم رقم
                    ({{ $eposide->season->season_number }}) حلقةرقم
                    {{ $eposide->serie_number }}</h4>


                <div class="film-info py-2">
                    <ul class="m-0 p-0">
                        @if ($eposide->serie->getTranslation('name', 'ar') == true)
                            <li><span>الاسم بالعربى</span>
                                <p class="m-0"> {{ $eposide->serie->getTranslation('name', 'ar') }} </p>
                            </li>
                        @endif
                        <li><span>التصنيف</span>
                            <p class="m-0">
                                @foreach ($eposide->serie->categories as $item)
                                    {{ $item->name }}
                                @endforeach
                            </p>
                        </li>
                        <li><span>التقييم</span>
                            <p class="m-0">

                                {{ $eposide->eposide_rate }}

                            </p>
                        </li>

                        <li><span>النوع</span>
                            <p class="m-0">
                                {{ $eposide->serie->subtype->name }}
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
                                    href="{{ route('client.type.show', ['id' => $eposide->serie->type->id]) }}">{{ $eposide->serie->type->name }}</a>
                            </li>
                            <li><a
                                    href="{{ route('client.subtype.show', ['id' => $eposide->serie->subtype->id]) }}">{{ $eposide->serie->subtype->name }}</a>
                            </li>
                            <li><a href="{{ route('tvs.show', ['id' => $eposide->serie->id]) }}">
                                    {{ $eposide->serie->name }}
                                    {{ $eposide->season->season_number }} </a></li>
                        </ul>


                        <h4>مشاهده مسلسل <span
                                class="ms-1">{{ $eposide->serie->getTranslation('name', 'ar') == true ? $eposide->serie->getTranslation('name', 'ar') : $eposide->serie->getTranslation('name', 'en') }}
                            </span>موسم رقم
                            ({{ $eposide->season->season_number }}) حلقةرقم
                            {{ $eposide->serie_number }}</h4>


                        <div class="film-info py-2">
                            <ul class="m-0 p-0">
                                @if ($eposide->serie->getTranslation('name', 'ar') == true)
                                    <li><span>الاسم بالعربى</span>
                                        <p class="m-0"> {{ $eposide->serie->getTranslation('name', 'ar') }} </p>
                                    </li>
                                @endif
                                <li><span>التصنيف</span>
                                    <p class="m-0">
                                        @foreach ($eposide->serie->categories as $item)
                                            {{ $item->name }}
                                        @endforeach
                                    </p>
                                </li>
                                <li><span>التقييم</span>
                                    <p class="m-0">

                                        {{ $eposide->eposide_rate }}

                                    </p>
                                </li>

                                <li><span>النوع</span>
                                    <p class="m-0">
                                        {{ $eposide->serie->subtype->name }}
                                    </p>
                                </li>





                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>



        @if ($eposide->serie->description !== null)
            <div class="row"
                style="background-color: #15192a ; border-top: 1px solid rgba(255, 255, 255, .05);
                    box-shadow: #0c0f21 0 12px 10px -10px inset;">
                <div class="col-lg-12 d-flex align-items-center">
                    <div class="film-story py-3">
                        <div class="d-flex align-items-center my-2">
                            <i class="fas fa-paragraph" style="font-size: 25px; color  : blue"></i>
                            <h3 class="text-white ms-2 my-0">قصة المسلسل</h3>
                        </div>
                        <p> {{ $eposide->serie->description }}</p>
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







        @if (count($eposide->serieWatchServers))
            <div class="row py-3 " style="background-color: #262A42">

                <div class="col-xxl-3 col-xl-12 ">
                    <h3 class="text-center">
                        سيرفرات المشاهده
                    </h3>

                    <div class="server-watshes d-flex flex-wrap  justify-content-center">

                        @foreach ($eposide->serieWatchServers as $item)
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

        @if (count($eposide->eposideDownloadServers))
            <div class="col-xxl-3 col-xl-12">
                <h3>سيرفرات التحميل</h3>


                <div class="server-downloads d-flex flex-wrap">

                    @foreach ($eposide->eposideDownloadServers as $item)
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










































    <div class="row py-3  " style="background-color: #1A1D2E">
        <h3 class="mb-3">
            {{ $eposide->serie->getTranslation('name', 'ar') == true ? $eposide->serie->getTranslation('name', 'ar') : $eposide->serie->getTranslation('name', 'en') }}
            موسم رقم
            {{ $eposide->season->season_number }}
            حلقة رقم
            {{ $eposide->serie_number }}

        </h3>

        <div class="col-12 d-lg-none d-md-none d-sm-block mb-3">
            <div class="row">
                @foreach ($eposide->serie->seasons as $item)
                    <div class="col-3">
                        @if ($item->id == $eposide->season->id)
                            <a href='{{ route('season.show', ['id' => $item->id]) }}'
                                class='text-white d-block p-2 my-1 '
                                style='background-color: #6375FF ; border-radius: 17px ; '>موسم
                                {{ $item->season_number }}</a>
                        @else
                            <a href='{{ route('season.show', ['id' => $item->id]) }}'
                                class='text-white d-block p-2 my-1 '
                                style='background-color: #393D51 ; border-radius: 17px ; '>موسم رقم
                                {{ $item->season_number }}</a>
                        @endif
                    </div>
                @endforeach
            </div>

        </div>


        <div class="col-12 col-lg-8 col-md-8 col-sm-12">
            <div class="row">
                @foreach ($eposide->season->subSeries as $item)
                    <div class="col-6 col-lg-6 col-md-6 col-sm-6">
                        @if ($id == $item->id)
                            <a class='text-white d-block position-relative mb-2 '
                                href='{{ route('eposide.show', ['id' => $item->id]) }}'
                                style='background-color: #6375FF ; border-radius: 17px ; padding: 12px '>
                                <div class="eposide">
                                    <i class="fas fa-angle-right position-absolute"></i>
                                </div>

                                <span class="eposide-span">حلقة رقم {{ $item->serie_number }}</span>
                            </a>
                        @else
                            <a class='text-white d-block position-relative mb-2 '
                                href='{{ route('eposide.show', ['id' => $item->id]) }}'
                                style='background-color: #393D51 ; border-radius: 17px ; padding: 12px '>
                                <div class="eposide">
                                    <i class="fas fa-angle-right position-absolute"></i>
                                </div>

                                <span class="eposide-span">حلقة رقم {{ $item->serie_number }}</span>
                            </a>
                        @endif

                    </div>
                @endforeach
            </div>
        </div>


        <div class="col-lg-4  col-md-4 col-sm-6 d-none  d-lg-flex d-md-flex d-sm-none   justify-content-center">
            <div class="seasons py-2  d-flex flex-column align-items-center"
                style="background-color: #1E243C; border-radius: 17px ; width : 200px ">


                @foreach ($eposide->serie->seasons as $item)
                    @if ($item->id == $eposide->season->id)
                        <a href='{{ route('season.show', ['id' => $item->id]) }}' class='text-white d-block p-2 my-1 '
                            style='background-color: #6375FF ; border-radius: 17px ; width:230px '>موسم رقم
                            {{ $item->season_number }}</a>
                    @else
                        <a href='{{ route('season.show', ['id' => $item->id]) }}' class='text-white d-block p-2 my-1 '
                            style='background-color: #393D51 ; border-radius: 17px ; width:230px '>موسم رقم
                            {{ $item->season_number }}</a>
                    @endif
                @endforeach
            </div>
        </div>
    </div>















    <h3 class="my-3" style="text-align: right">اعمال مشابهه</h3>


    <div class="row  justify-content-center">

        @foreach ($similarEposides as $similarMovie)
            <div class="col-lg-4 mx-2 similar-movie-col movie-container d-flex flex-column justify-content-center"
                style="height: 350px">


                <a href="{{ route('series.show', ['id' => $similarMovie->id]) }}" class="movie-img"
                    style="width:100% ; height:80%">
                    <img src="{{ Storage::url($similarMovie->poster) }}" alt="" width="100%" height="100%">
                </a>



                <div class="movie-caption d-flex flex-column">
                    <a class="text-white" href="{{ route('series.show', ['id' => $similarMovie->id]) }}">


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
