<div class="pre-nav text-center text-white  d-flex align-items-center "
    style="background-color: #5367FF; z-index: 100; position: fixed; top: 0; width: 100%; ">

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
                        class="fas fa-ellipsis-h"></i></span>
            </div>

            <div class="bars text-white">
                <i class="fas fa-bars"></i>
                <ul class="bars-list">
                    <li>
                        <a href="#">
                            <i class="fas fa-home"></i>
                        </a>
                        <span class="angle-right"><i class="fas fa-angle-right"></i></span>
                    </li>
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
                    </li>

                </ul>
            </div>
        </div>
    </div>

</div>






<nav class="navbar navbar-expand-lg  fixed-top  text-white">
    <div class="container-fluid">
        <div class="row w-100 mx-auto">
            <div class="col-lg-3  d-flex align-items-center">
                <a href="#" class="logo text-white ">Movie App</a>
            </div>

            <div class="col-lg-6  d-flex align-items-center">
                <div class="collapse navbar-collapse " id="navbarSupportedContent">

                    <input type="text" class="form-control  w-100" autofocus>


                </div>
            </div>

            <div class="col-lg-3  d-flex align-items-center justify-content-center">
                <div class="d-flex align-items-center ">

                    <div class="admin-profile-img rounded-circle  d-flex justify-content-center align-items-center me-3"
                        style="width: 50px; height : 50px ; background-color:  #333E91 ">
                        @if (Auth::check())

                            @if (auth()->user()->image !== 'null')
                                <img class="rounded-circle" src="{{ Storage::url(auth()->user()->image) }}"
                                    alt="" width="100%" height="100%">
                            @else
                                <i class="fas fa-user" style="font-size: 30px"></i>
                            @endif
                        @endif




                    </div>

                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                            style="background-color: #333E91 ; border : 0" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a href="{{ route('users.edit', ['id' => auth()->user()->id]) }}"
                                    class="dropdown-item">Edit
                                    Profile</a></li>
                            <li> <a href="{{ route('logout') }}" class="dropdown-item"
                                    onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>

        </div>




    </div>
</nav>
