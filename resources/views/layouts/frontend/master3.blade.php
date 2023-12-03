@include('layouts.frontend.header')

@include('layouts.frontend.navbar')


<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            @livewire('channel-content')
            {{-- @include('layouts.frontend.leftchannelsidebar') --}}


            {{-- @yield('content') --}}



            {{-- @include('layouts.frontend.rightsidebar') --}}

        </div>
    </div>
</div>


@include('layouts.frontend.footer')
