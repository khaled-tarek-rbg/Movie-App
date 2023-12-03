<div>
    <div class="col-lg-3  left-sidebar">

        <h5 class="title" style="text-align: right">كل القنوات</h5>

        @foreach ($channelTypes as $item)
            <input type="button" wire:click ="channel({{ $item }})" class=" mt-2 px-2 channel"
                value="{{ $item->name }}" />
        @endforeach

    </div>

    <div class="col-6 mx-auto" style=" margin-top: 100px">
        @if (!empty($channels))
            <div class="row d-flex justify-content-end">
                @foreach ($channels as $item)
                    <div class="col-lg-3">
                        <button type="button" wire:click="test({{ $item }})" class="channel">
                            {{ $item->name }}
                        </button>

                    </div>
                @endforeach
            </div>
        @endif

        @if (!empty($channelServers))
            <div class="row d-flex justify-content-end mt-3">
                @foreach ($channelServers as $item)
                    <div class="col-lg-3">
                        <button type="button" wire:click="test2({{ $item }})" class="channel servers"
                            value="{{ $item->url }}">
                            سيرفر{{ $item->id }}
                        </button>

                    </div>
                @endforeach
            </div>
        @endif
    </div>





    <div class="row mt-3">
        <div class="col-xl-6 mx-auto">
            <div class="channel-frame">
                <iframe src="{{ $channelServerUrl }}" id="channel-frame" width="100%" height="300px" allowfullscreen>
                </iframe>
            </div>
        </div>
    </div>

</div>




@include('layouts.frontend.rightsidebar')
@if (Auth::check())
    @if (auth()->user()->is_admin == 0)
        @section('script')
            <script>
                let authDropdown = document.querySelector('.auth-dropdown')
                let userProfileDropdown = document.querySelector('.user-profile-dropdown')
                authDropdown.style.maxHeight = "0px"



                userProfileDropdown.addEventListener('click', () => {

                    authDropdown.style.maxHeight == "0px" ? authDropdown.style.maxHeight = "100px" : authDropdown.style
                        .maxHeight = "0px"
                })
            </script>
        @endsection
    @endif

@endif


@section('script')
    <script src="{{ asset('frontend/js/film.js') }}"></script>
@endsection
