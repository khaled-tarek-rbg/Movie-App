<div class="col-lg-3 left-sidebar " id="active">

    <div class="user-comment-info  h-100">

        @foreach ($comments as $item)
            <div class="user-info-container">
                <div class="user-info d-flex align-items-center w-100  ">

                    @if ($item->user->image !== 'null')
                        <img class="me-2 rounded-circle" src="{{ Storage::url($item->user->image) }}" alt=""
                            width="50px" height="50px">
                    @else
                        <div class="me-2 d-flex ; justify-content-center ; align-items-center"
                            style="width: 50px ; height: 50px ; border-radius: 50% ; background-color: #232848; ; font-size: 25px">
                            <i class="fas fa-user"></i>
                        </div>
                    @endif



                    <div>
                        @if ($item->user->is_admin == 1)
                            <h6 class="p-0 m-0 d-flex align-items-center">

                                <span>{{ $item->user->first_name }}</span>

                                <span class="d-flex justify-content-center align-items-center ms-1"
                                    style="width: 12px; height : 12px;  background-color: #2C86FD ; color : #fff ; border-radius: 50% ; font-size: 8px">
                                    <i class="fas fa-check "></i>
                                </span>
                            </h6>
                        @else
                            <h6>{{ $item->user->first_name }}</h6>
                        @endif






                        <small>من {{ $item->created_at->format('y-m-d') }}</small>
                    </div>
                </div>

                <div class="comment-desc  fw-bold position-relative ">
                    <p class="p-0 m-0"> {{ $item->title }}
                    </p>
                </div>
            </div>
        @endforeach





        @if (Auth::check())
            <div class="user-comment    position-relative d-flex align-items-center">

                <div class="rounded-circle d-flex justify-content-center align-items-center "
                    style="width: 40px ; height : 40px ; background-color: #232848;">
                    @if (auth()->user()->image !== 'null')
                        <img class="rounded-circle" src="{{ Storage::url(auth()->user()->image) }}" width="100%"
                            height="100%" alt="">
                    @else
                        <i class="fas fa-user"></i>
                    @endif


                </div>



                @yield('comment-form')





            </div>
        @else
            <div class="activities">
                <div class="account-info">
                    <div class="account-img"></div>
                    <span class="account"></span>
                </div>
                <div class="account-info">
                    <div class="account-img"></div>
                    <span class="account"></span>
                </div>
                <div class="account-info">
                    <div class="account-img"></div>
                    <span class="account"></span>
                </div>
                <div class="account-info">
                    <div class="account-img"></div>
                    <span class="account"></span>
                </div>
                <div class="account-info">
                    <div class="account-img"></div>
                    <span class="account"></span>
                </div>


                <div class="login text-center">
                    <a href="{{ route('login') }}" style="font-size: 20px">تسجيل الدخول</a>
                </div>
            </div>
        @endif

    </div>



</div>
