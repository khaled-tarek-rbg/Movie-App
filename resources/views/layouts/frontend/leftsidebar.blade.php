<div class="col-lg-3  left-sidebar">

    <h5 class="title" style="text-align: right">اخر النشاطات</h5>


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


        <div class="login">
            <a href="{{ route('login') }}">تسجيل دخول</a>
        </div>
    </div>

    <h5 class="title" style="text-align: right">البحث بالكلمات</h5>


    <div class="categories">


        @foreach ($categories as $category)
            <a class="text-white" href="{{ route('category.show', ['id' => $category->id]) }}">{{ $category->name }}</a>
        @endforeach




    </div>




</div>
