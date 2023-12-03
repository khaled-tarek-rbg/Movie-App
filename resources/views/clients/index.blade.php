@extends('layouts.frontend.master')


@section('title')
    الصفحة الرئيسية
@endsection

@section('content')
    <div class="col-lg-6 mx-auto center">


        <div class="movie-slider position-relative pt-3">
            <div class="prev position-absolute"><i class="fas fa-angle-left"></i></div>
            <div class="row flex-nowrap overflow-hidden w-100 mx-auto">


                @foreach ($movies as $movie)
                    <div class="col-lg-5 custom-film-w p-0 mx-2 position-relative" style="height: 380px">

                        <a href="{{ route('movies.show', ['id' => $movie->id]) }}">
                            <div class="box"
                                style="height: 100% ; background-image: url({{ Storage::url($movie->poster) }}) ; background-size : cover ; background-position : center ; background-repeat : no-repeat">
                            </div>
                        </a>

                        <div class="box-content position-absolute">
                            <p>مشاهده فيلم
                                {{ $movie->getTranslation('name', 'ar') == true ? $movie->getTranslation('name', 'ar') : $movie->getTranslation('name', 'en') }}
                                ({{ $movie->production_year }})
                            </p>

                            {{-- <div class="comments">
                                <div class="comment">
                                    <span>0</span>
                                </div>
                                <div class="comment">
                                    <button class="btn btn-primary movie-icon">
                                        <span>أعجبنى</span>

                                        <i class="far fa-thumbs-up"></i>
                                    </button>

                                </div>


                            </div> --}}


                        </div>

                    </div>
                @endforeach

                @foreach ($eposides as $item)
                    <div class="col-lg-5 custom-serie-w p-0 mx-2 position-relative" style="height: 380px">

                        <a href="{{ route('eposide.show', ['id' => $item->id]) }}">
                            <div class="box"
                                style="height: 100% ; background-image: url({{ Storage::url($item->season->season_poster) }}) ; background-size : cover ; background-position : center ; background-repeat : no-repeat">
                            </div>
                        </a>


                        <div class="box-content position-absolute">
                            <p>مشاهده مسلسل
                                {{ $item->serie->getTranslation('name', 'ar') == true ? $item->serie->getTranslation('name', 'ar') : $item->serie->getTranslation('name', 'en') }}
                                {{ $item->season->season_number }} حلقة رقم
                                {{ $item->serie_number }} ({{ $item->serie->production_year }})</p>
                            {{-- <div class="comments">
                                <div class="comment">
                                    <span>comment</span>
                                    <i class="far fa-comment"></i>
                                </div>
                                <div class="comment">
                                    <span>اعجبنى</span>
                                    <div class="movie-icon">
                                        <i class="far fa-thumbs-up"></i>
                                    </div>

                                </div>


                            </div> --}}

                        </div>

                    </div>
                @endforeach
                @foreach ($tveposides as $item)
                    <div class="col-lg-5 custom-serie-w p-0 mx-2 position-relative" style="height: 380px">

                        <a href="{{ route('client.tv_eposides.show', ['id' => $item->id]) }}">
                            <div class="box"
                                style="height: 100% ; background-image: url({{ Storage::url($item->season->season_poster) }}) ; background-size : cover ; background-position : center ; background-repeat : no-repeat">
                            </div>
                        </a>


                        <div class="box-content position-absolute">
                            <p>مشاهده العرض التليفيزيونى
                                {{ $item->tv->getTranslation('name', 'ar') == true ? $item->tv->getTranslation('name', 'ar') : $item->tv->getTranslation('name', 'en') }}
                                {{ $item->season->season_number }} حلقة رقم
                                {{ $item->serie_number }} ({{ $item->tv->production_year }})</p>
                            {{-- <div class="comments">
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


                            </div> --}}

                        </div>

                    </div>
                @endforeach


            </div>
            <div class="next position-absolute"><i class="fas fa-angle-right"></i></div>
        </div>





        <div class="movie-categories my-5">
            <ul class="d-flex p-3 ">
                <li><a href="{{ route('client.series') }}">اخر الحلقات</a></li>
                <li><a href="{{ route('series.new') }}">اخر المسلسلات</a></li>
                <li><a href="{{ route('movies') }}">افلام جديدة</a></li>
                <li style="background-color: #6375FF;"><a href="{{ route('clients') }}">الجديد فى موفى اب</a></li>

            </ul>
        </div>






        <div class="row w-100 mx-auto justify-content-center">



            @foreach ($paginatedEposides as $item)
                <div class="col-lg-4 similar-movie-col position-relative  mx-2  movie-container">
                    <a href="{{ route('eposide.show', ['id' => $item->id]) }}" class="movie-img" style="width:100% ;">
                        <img src="{{ Storage::url($item->season->season_poster) }}" alt="" width="100%">
                    </a>

                    <div class="eposide-number">
                        <span>حلقة رقم {{ $item->serie_number }}</span>
                    </div>


                    <div class="movie-caption d-flex flex-column">
                        <p>مشاهده مسلسل {{ $item->serie->getTranslation('name', 'en') }} الموسم رقم
                            {{ $item->season->season_number }} الحلقة رقم
                            {{ $item->serie_number }} ({{ $item->serie->production_year }})</p>
                        {{--
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

                        </div> --}}
                    </div>

                </div>
            @endforeach




            <div class="row d-flex justify-content-center">
                <div class="col-lg-6 d-flex justify-content-center">
                    {{ $paginatedEposides->links() }}
                </div>
            </div>



        </div>










    </div>
@endsection


@section('script')
    <script src="{{ asset('frontend/js/main.js') }}"></script>
@endsection
