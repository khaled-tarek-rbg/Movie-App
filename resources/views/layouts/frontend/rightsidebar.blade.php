<div class="col-lg-3  right-sidebar ">

    <div class="search" id="search">
        <form action="{{ route('movies.search') }}" method="GET">
            @csrf
            <input class="text-white" type="text" placeholder="Search" autofocus name="movie_name">
        </form>
        <i class="fas  fa-search"></i>
    </div>


    <a href="{{ route('clients') }}" class="home-page text-white d-flex justify-content-between align-items-center">
        <i class="fas fa-home"></i>
        <p class="m-0">الصفحة الرئيسية</p>
    </a>


    <ul class="right-categories" dir="rtl">
        @if (Auth::check())

            @if (auth()->user()->is_admin == 0)

                <li class="user-profile-dropdown">
                    <span>الملف اشلخصى</span>
                    @if (auth()->user()->image !== 'null')
                        <img src="{{ Storage::url(auth()->user()->image) }}" alt="" class="rounded-circle "
                            width="40px" height="40px" style="object-fit: cover">
                    @else
                        <i class="fas fa-user" style="color: #fff"></i>
                    @endif



                    <ul class="auth-dropdown">
                        <li style="border-bottom: 1px solid #202337 ; padding : 10px "> <a
                                href="{{ route('users.edit', ['id' => auth()->user()->id]) }}">تعديل
                                الملف الشخصى</a>
                        </li>
                        <li style="border-bottom: 1px solid #202337 ; padding :  10px ">
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                                تسجيل خروج </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            @endif
        @endif

        <li>
            <a href="{{ route('movies') }}">الافلام</a>
            <i class="fas fa-camera" style="color: #FF2E2E"></i>
        </li>
        <li>
            <a href="{{ route('client.series') }}">المسلسلات</a>
            <i class="fas fa-tv" style="color: #964CE8"></i>
        </li>
        <li>
            <a href="{{ route('client.animes') }}">انمى وكرتون</a>
            <i class="fas fa-dog" style="color: #D87C2B"></i>
        </li>
        <li>
            <a href="{{ route('client.channels') }}">بث مباشر</a>
            <i class="fas fa-dumbbell" style="color: #4190FD"></i>
        </li>
        <li>
            <a href="{{ route('client.tv_shows') }}">عروض تليفيزيونية</a>
            <i class="fas fa-satellite-dish" style="color: #6AAF3C"></i>
        </li>


    </ul>

    <h6 class="my-3 text-start">
        Filters and Personalization
    </h6>

    {{--
    <div class="restricts" style="
                 background-color: #6AAF3C">
        <i class="fas fa-users"></i>
        <div class="restricts-text ps-3">
            <small>Age group</small>
            <h6>Censoring the viewer</h6>
        </div>
    </div> --}}

    {{-- <div class="restricts drop-down" style="background-color: #262B40">
        <div class="restricts-text">
            <small>نوع العرض</small>
            <h6>اختر نكهتك السينمائية</h6>
        </div>
        <i class="fas fa-angle-right"></i>

    </div>

    <div class="categories">

        @foreach ($categories as $category)
            <a class="text-white"
                href="{{ route('category.show', ['id' => $category->id]) }}">{{ $category->name }}</a>
        @endforeach

    </div> --}}

    <div class="qualities" style="background-color: #202337">
        <div class="qualities-text">
            <small>اختر نكهتك السينمائية</small>
            <h6>السينمائية نكهتك </h6>
        </div>

        <i class="fas fa-angle-right"></i>
    </div>

    <div class="all-qualities">



        @foreach ($categories as $category)
            <a class="text-white"
                href="{{ route('category.show', ['id' => $category->id]) }}">{{ $category->name }}</a>
        @endforeach






    </div>


    <div class="restricts filter-drop-down" style="background-color: #3F457C ;">
        <div class="restricts-text">
            <small>تاريخ الإنتاج </small>
            <h6>اختر تاريخ الإنتاج</h6>
        </div>
        <i class="fas fa-search fa-xs"></i>




        <div class="years">

            <div class="nav-icons">
                <span>اختر السنة</span>
                <div class="closebtn">
                    <i class="fas fa-times"></i>
                </div>

            </div>

            <div class="years-filter">
                <input type="text" placeholder="Keywords">
                <div class="form-drop-down">
                    <i class="fas fa-angle-down"></i>
                </div>



            </div>

            @if (count($all_movies) > 0)

                <div class="years-buttons">

                    <form action="{{ route('movies.year') }}" method="GET">
                        @foreach ($all_movies as $item)
                            <button type="submit" name="year"
                                value="{{ $item->production_year }}">{{ $item->production_year }}
                            </button>
                        @endforeach
                    </form>



                </div>
            @endif

        </div>





    </div>










    <div class="countries" style="background-color: #202337">

        <div class="countries-text">
            <small>تصنيف حسب البلد </small>
            <h6>اختر البلد</h6>
        </div>

        <i class="fas fa-angle-right"></i>

    </div>

    <div class="all-countries">

        @if (count($all_movies) > 0)

            <div class="years-buttons">

                <form action="{{ route('movies.country') }}" method="GET">
                    @foreach ($all_movies as $item)
                        <button type="submit" name="country" value="{{ $item->country }}">{{ $item->country }}
                        </button>
                    @endforeach
                </form>



            </div>
        @endif

    </div>




    {{-- <div class="languages" style="background-color: #202337">

        <div class="languages-text">
            <small>language</small>
            <h6>decide your language</h6>
        </div>

        <i class="fas fa-angle-right"></i>

    </div> --}}

    {{--
    <div class="all-languages">
        <button>Arabic</button>
        <button>English</button>
        <button>Russian</button>
        <button>chineese</button>
        <button>jabanese</button>
        <button>العربيه</button>
        <button>الكوريه</button>
        <button>german</button>
        <button>Indian</button>
        <button class="none">plastine</button>
        <button class="none">plastine</button>
        <button class="none">plastine</button>
        <button class="none">plastine</button>
        <button class="none">plastine</button>
        <button class="none">plastine</button>
        <button class="none">plastine</button>

        <button class="more-languages">show more
            <i class="fas fa-plus"></i>
        </button>

    </div>
 --}}




    <div class="go-up-container">
        <div class="go-up">
            GO UP
        </div>
    </div>





</div>
@if (Auth::check())
    @if (auth()->user()->is_admin == 0)
        <script>
            let authDropdown = document.querySelector('.auth-dropdown')
            let userProfileDropdown = document.querySelector('.user-profile-dropdown')
            authDropdown.style.maxHeight = "0px"



            userProfileDropdown.addEventListener('click', () => {
                console.log('hi');
                authDropdown.style.maxHeight == "0px" ? authDropdown.style.maxHeight = "200px" : authDropdown.style
                    .maxHeight = "0px"
            })
        </script>
    @endif
@endif
