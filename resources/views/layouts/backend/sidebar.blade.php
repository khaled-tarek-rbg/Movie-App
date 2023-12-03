<div class="col-lg-2  left-sidebar ">
    <div class="admin-dashboard ">

        <a href="{{ route('home') }}"
            class="home text-white d-flex justify-content-between align-items-center p-3 rounded mt-0">
            <span>Dahboard</span>
            <i class="fas fa-home"></i>
        </a>




        <div class="dashboard-movies d-flex justify-content-between align-items-center p-3 rounded mt-2">
            <span>Categories</span>
            <i class="fas fa-angle-right"></i>
        </div>

        <ul>
            <li><a href="{{ route('categories') }}">All Categories</a></li>
            <li><a href="{{ route('categories.create') }}">Add new Category</a></li>
        </ul>




        <div class="dashboard-movies d-flex justify-content-between align-items-center p-3 rounded mt-2">
            <span>Types</span>
            <i class="fas fa-angle-right"></i>
        </div>

        <ul>
            <li><a href="{{ route('types') }}">All Types</a></li>
            <li><a href="{{ route('types.create') }}">Add new Type</a></li>
            <li><a href="{{ route('subtypes') }}">All Sub Types</a></li>
            <li><a href="{{ route('subtypes.create') }}">Add sub Type</a></li>
        </ul>






        <div class="dashboard-movies d-flex justify-content-between align-items-center p-3 rounded mt-2">
            <span>Movies</span>
            <i class="fas fa-angle-right"></i>
        </div>

        <ul>
            <li><a href="{{ route('movies.admin') }}">All Movies</a></li>
            <li><a href="{{ route('movies.create') }}">Add new Movie</a></li>
            <li><a href="{{ route('server.watch') }}">Add watch server</a></li>
            <li><a href="{{ route('server.download') }}">Add download server</a></li>
        </ul>





        <div class="dashboard-movies d-flex justify-content-between align-items-center p-3 rounded mt-2">
            <span>Series</span>
            <i class="fas fa-angle-right"></i>
        </div>

        <ul>
            <li><a href="{{ route('series') }}">All Series</a></li>
            <li><a href="{{ route('series.create') }}">Add new Serie</a></li>
            <li><a href="{{ route('seasons') }}">All Seasons</a></li>
            <li><a href="{{ route('seasons.create') }}">Add new Season</a></li>
            <li><a href="{{ route('eposides') }}">All Eposides</a></li>
            <li><a href="{{ route('eposide.create') }}">Add new Episode</a></li>
            <li><a href="{{ route('serie.server.watch') }}">Add watch server</a></li>
            <li><a href="{{ route('serie.server.download') }}">Add download server</a></li>

        </ul>


        <div class="dashboard-movies d-flex justify-content-between align-items-center p-3 rounded mt-2">
            <span>Anime</span>
            <i class="fas fa-angle-right"></i>
        </div>

        <ul>
            <li><a href="{{ route('movies.admin.animes') }}">All Anime Movies</a></li>
            <li><a href="{{ route('movies.create.animes') }}">Add Anime Movie</a></li>


            <li><a href="{{ route('animes.admin') }}">All Anime Series</a></li>
            <li><a href="{{ route('animes.admin.create') }}">Add Anime Serie</a></li>



            <li><a href="{{ route('animes.admin.seasons') }}">All Seasons</a></li>
            <li><a href="{{ route('animes.admin.seasons.create') }}">Add new season</a></li>
            <li><a href="{{ route('animes.admin.eposides') }}">All eposides</a></li>
            <li><a href="{{ route('animes.admin.eposides.create') }}">Add new eposide</a></li>

        </ul>



        <div class="dashboard-movies d-flex justify-content-between align-items-center p-3 rounded mt-2">
            <span>Tv shows</span>
            <i class="fas fa-angle-right"></i>
        </div>

        <ul>
            <li><a href="{{ route('tvs') }}">All shows</a></li>
            <li><a href="{{ route('tvs.create') }}">Add new show</a></li>



            <li><a href="{{ route('tvs.admin.seasons') }}">All Seasons</a></li>
            <li><a href="{{ route('tvs.admin.seasons.create') }}">Add new season</a></li>
            <li><a href="{{ route('tvs.admin.eposides') }}">All eposides</a></li>
            <li><a href="{{ route('tvs.admin.eposides.create') }}">Add new eposide</a></li>


            <li><a href="{{ route('tv.watch.create') }}">Add watch server</a></li>
            <li><a href="{{ route('tv.download.create') }}">Add download server</a></li>
        </ul>





        <div class="dashboard-movies d-flex justify-content-between align-items-center p-3 rounded mt-2">
            <span>Live TV</span>
            <i class="fas fa-angle-right"></i>
        </div>

        <ul>
            <li><a href="{{ route('channels.admin') }}">All channels</a></li>
            <li><a href="{{ route('channels.admin.create') }}">Add new channel</a></li>

            <li><a href="{{ route('channels.countries.admin') }}">All channel countries</a></li>
            <li><a href="{{ route('channels.countries.admin.create') }}">Add new channel country</a></li>

            <li><a href="{{ route('channels.types.admin') }}">All channel types</a></li>
            <li><a href="{{ route('channels.types.admin.create') }}">Add new channel type</a></li>
            <li><a href="{{ route('channels.servers.admin.create') }}">Add new channel server</a></li>

        </ul>









        <div class="dashboard-movies d-flex justify-content-between align-items-center p-3 rounded mt-2">
            <span>Users</span>
            <i class="fas fa-angle-right"></i>
        </div>

        <ul>
            <li><a href="{{ route('users') }}">All Users</a></li>
            <li><a href="{{ route('users.create') }}">Add new user</a></li>
            <li><a href="{{ route('clients') }}">user view</a></li>
        </ul>



    </div>


</div>
