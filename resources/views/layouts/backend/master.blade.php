@include('layouts.backend.header')



@include('layouts.backend.navbar')



<div class="wrapper dahboard-wrapper">

    <div class="container-fluid">
        <div class="row ">


            @include('layouts.backend.sidebar')





            <div class="col-lg-10   ms-auto  center-dashboard ">


                @yield('content')

            </div>





        </div>
    </div>
</div>

@include('layouts.backend.footer')
