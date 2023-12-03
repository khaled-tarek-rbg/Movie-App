<div class="pre-nav text-center text-white d-flex align-items-center "
    style="background-color: #5367FF; z-index: 100; position: fixed; top: 0; width: 100%;">

    <div class="container-fluid">
        <div class="pre-nav-container d-flex justify-content-between align-items-center">
            <a href="#" class="logo text-white">Movie App</a>

            <div class="pre-nav-list d-flex  align-items-center">

                <div class="xs-media">
                    <div class="d-flex flex-column">
                        <h1 class="p-0 m-0">MYCINEMA</h1>
                        <span>wath movies and series</span>
                    </div>
                </div>

                <span style="cursor: pointer ; font-size: 25px;" class="elipsisIcon ms-4 "><i
                        class="fas fa-ellipsis-h"></i>
                </span>
            </div>

            <div class="bars text-white">
                <i class="fas fa-bars"></i>
                <ul class="bars-list">
                    <li>
                        <a href="{{ route('clients') }}">
                            <i class="fas fa-home"></i>
                        </a>
                        <span class="angle-right"><i class="fas fa-angle-right"></i>
                        </span>
                    </li>

                    {{--
                    <li>
                        <a href="#">

                            Movie</a>
                        <span class="angle-right"><i class="fas fa-angle-right"></i></span>
                    </li>


                    <li>
                        <a href="#">

                            Series</a>
                        <span class="angle-right"><i class="fas fa-angle-right"></i></span>
                    </li>
                    <li>
                        <a href="#">
                            Anime and Cartoon</a>
                        <span class="angle-right"><i class="fas fa-angle-right"></i></span>
                    </li> --}}

                    @foreach ($types as $item)
                        <li class=" types">
                            <a href="#">{{ $item->name }}</a>
                            <a class="types-link" href="#">
                                <i class="fas fa-angle-right"></i>
                            </a>
                            <ul class="types-list">
                                @foreach ($item->subtypes as $subitem)
                                    <li>
                                        <a class="text-white"
                                            href="{{ route('client.subtype.show', ['id' => $subitem->id]) }}">{{ $subitem->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach



                </ul>

            </div>
        </div>





    </div>


</div>


<nav class="navbar navbar-expand-lg  p-0 text-white" style="z-index: 200; position: fixed; top: 0; width: 100%">
    <div class="container-fluid">
        <a href="#" class="logo text-white">Movie App</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ">



                @foreach ($types as $item)
                    <li class="nav-item active-item">
                        <a class="nav-link " href="#"> <i class="fas fa-angle-left"></i>{{ $item->name }}</a>
                        <ul class="drop-down-list  ">
                            @foreach ($item->subtypes as $subitem)
                                <li>
                                    <a class="text-white"
                                        href="{{ route('client.subtype.show', ['id' => $subitem->id]) }}">{{ $subitem->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach













                <li class="nav-item">
                    <a class="nav-link " href="{{ route('clients') }}">
                        <i class="fas fa-home"></i>
                    </a>
                </li>


            </ul>


            <div class="d-flex flex-column align-items-center">
                <h1 class="p-0 m-0">MYCINEMA</h1>
                <span>wath movies and series</span>
            </div>


        </div>
    </div>
</nav>
