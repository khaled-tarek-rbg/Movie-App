@extends('layouts.frontend.master2')

@section('title')
    {{-- {{ $movie->name }} film --}}
@endsection



@section('comment-form')
    <form action="{{ route('tv.comment') }}" method="POST">

        @csrf

        <input type="text" placeholder="write comment" class="ms-2 rounded border-0 h-100" name="title">

        <input type="hidden" value="{{ $tv->id }}" name="tv">

    </form>
@endsection
@section('content')
    <div class="col-lg-6 mx-auto film-center" style="background-color: #0C0F21 ; padding-top: 70px;">
        <div class="row position-relative "
            style="background-image: url({{ Storage::url($tv->poster) }}) ; background-position: center ; background-size: cover ; background-repeat: no-repeat">
            <div class="blur position-absolute "></div>
            <div class="content py-4 normal-w d-none">
                <div class="poster-container d-flex justify-content-center">
                    <div class="col-lg-5 custom-show-w" style="height: 400px">
                        <div class="poster overflow-hidden" style="height: 100%">
                            <img src="{{ Storage::url($tv->poster) }}" alt="" width="100%" height="100%">
                        </div>
                    </div>
                </div>


                <ul class="unstyled d-flex ">
                    <li><a href="#">Movie app</a></li>
                    <li><a href="{{ route('client.type.show', ['id' => $tv->type->id]) }}">{{ $tv->type->name }}</a></li>
                    <li><a
                            href="{{ route('client.subtype.show', ['id' => $tv->subtype->id]) }}">{{ $tv->subtype->name }}</a>
                    </li>
                    <li><a href="#">
                            {{ $tv->getTranslation('name', 'ar') == true ? $tv->getTranslation('name', 'ar') : $tv->getTranslation('name', 'en') }}
                            {{ $tv->production_year }} </a></li>
                </ul>


                <h4> Tv<span class="ms-1">{{ $tv->name }} </span>
                    ({{ $tv->production_year }})</h4>


                <div class="film-info py-2">
                    <ul class="m-0 p-0">
                        @if ($tv->getTranslation('name', 'ar') == true)
                            <li><span>الاسم بالعربى</span>
                                <p class="m-0"> {{ $tv->getTranslation('name', 'ar') }} </p>
                            </li>
                        @endif
                        <li><span>التصنيف</span>
                            <p class="m-0">
                                @foreach ($tv->categories as $item)
                                    {{ $item->name }}
                                @endforeach
                            </p>
                        </li>

                        <li><span>النوع</span>
                            <p class="m-0">
                                {{ $tv->subtype->name }}
                            </p>
                        </li>



                    </ul>

                </div>

            </div>

            <div class="content py-4 large-w ">
                <div class="row d-flex">
                    <div class="col-lg-5 custom-show-w ">
                        <div class="poster overflow-hidden">
                            <img src="{{ Storage::url($tv->poster) }}" alt="">
                        </div>
                    </div>

                    <div class="col-lg-7 large-w-content">
                        <ul class="unstyled d-flex ">
                            <li><a href="#">Movie app</a></li>
                            <li><a
                                    href="{{ route('client.type.show', ['id' => $tv->type->id]) }}">{{ $tv->type->name }}</a>
                            </li>
                            <li><a
                                    href="{{ route('client.subtype.show', ['id' => $tv->subtype->id]) }}">{{ $tv->subtype->name }}</a>
                            </li>
                            <li><a href="#">
                                    {{ $tv->getTranslation('name', 'ar') == true ? $tv->getTranslation('name', 'ar') : $tv->getTranslation('name', 'en') }}
                                    {{ $tv->production_year }} </a></li>
                        </ul>


                        <h4> <span class="ms-1">
                                {{ $tv->getTranslation('name', 'ar') == true ? $tv->getTranslation('name', 'ar') : $tv->getTranslation('name', 'en') }}
                            </span>
                            {{ $tv->production_year }}</h4>


                        <div class="film-info py-2">
                            <ul class="m-0 p-0">
                                @if ($tv->getTranslation('name', 'ar') == true)
                                    <li><span>الاسم بالعربى</span>
                                        <p class="m-0"> {{ $tv->getTranslation('name', 'ar') }} </p>
                                    </li>
                                @endif
                                <li><span>التصنيف</span>
                                    <p class="m-0">
                                        @foreach ($tv->categories as $item)
                                            {{ $item->name }}
                                        @endforeach
                                    </p>
                                </li>

                                <li><span>النوع</span>
                                    <p class="m-0">
                                        {{ $tv->subtype->name }}
                                    </p>
                                </li>



                            </ul>


                        </div>

                    </div>
                </div>
            </div>
        </div>



        @if ($tv->description !== null)
            <div class="row"
                style="background-color: #15192a ; border-top: 1px solid rgba(255, 255, 255, .05);
                    box-shadow: #0c0f21 0 12px 10px -10px inset;">
                <div class="col-lg-12 d-flex align-items-center">
                    <div class="film-story py-3">
                        <div class="d-flex align-items-center my-2">
                            <i class="fas fa-paragraph" style="font-size: 25px; color  : blue"></i>
                            <h3 class="text-white ms-2 my-0">القصة</h3>
                        </div>
                        <p> {{ $tv->description }}</p>
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






        <div class="row py-3  " style="background-color: #1A1D2E">
            <h3 class="mb-3">
                {{ $tv->getTranslation('name', 'ar') == true ? $tv->getTranslation('name', 'ar') : $tv->getTranslation('name', 'en') }}
                {{ $tv->production_year }}
            </h3>


            <div class="col-lg-8 ">
                <div class="row">
                    @foreach ($season->tv_eposides as $item)
                        <div class="col-lg-6">

                            <a class='text-white d-block position-relative mb-2 '
                                href='{{ route('client.tv_eposides.show', ['id' => $item->id]) }}'
                                style='background-color: #393D51 ; border-radius: 17px ; padding: 12px '>
                                <div class="eposide">
                                    <i class="fas fa-angle-right position-absolute"></i>
                                </div>

                                <span class="eposide-span">حلقة {{ $item->serie_number }}</span>
                            </a>


                        </div>
                    @endforeach
                </div>
            </div>




            <div class="col-lg-4 d-flex justify-content-center">
                <div class="seasons py-2 w-75 d-flex flex-column align-items-center"
                    style="background-color: #1E243C; border-radius: 17px ; ">


                    @foreach ($tv->seasons as $item)
                        @if ($item->id == $season->id)
                            <a href='{{ route('client.tv_seasons.show', ['id' => $item->id]) }}'
                                class='text-white d-block p-2 my-1 '
                                style='background-color: #5367FF ; border-radius: 17px ; width:230px '>موسم
                                {{ $item->season_number }}</a>
                        @else
                            <a href='{{ route('client.tv_seasons.show', ['id' => $item->id]) }}'
                                class='text-white d-block p-2 my-1 '
                                style='background-color: #3E4663 ; border-radius: 17px ; width:230px '>موسم
                                {{ $item->season_number }}</a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>



















        <h3 class="my-3">اعمال مشابهه</h3>


        <div class="row  justify-content-center">

            @foreach ($similartvs as $similarMovie)
                <div class="col-lg-4 mx-2 similar-movie-col movie-container d-flex flex-column justify-content-center"
                    style="height: 350px">


                    <a href="{{ route('client.tv.show', ['id' => $similarMovie->id]) }}" class="movie-img"
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





                    </div>

                </div>
            @endforeach



        </div>






    </div>
@endsection


@section('script')
    <script src="{{ asset('frontend/js/film.js') }}"></script>
@endsection
