<?php

use App\Http\Controllers\AnimeCommentController;
use App\Http\Controllers\AnimeController;
use App\Http\Controllers\AnimeEposideCommentController;
use App\Http\Controllers\AnimeEposideDownloadServerController;
use App\Http\Controllers\AnimeEposidesController;
use App\Http\Controllers\AnimeEposideWatchServerController;
use App\Http\Controllers\AnimeMovieDownloadServerController;
use App\Http\Controllers\AnimeMoviesCommentController;
use App\Http\Controllers\AnimeMoviesController;
use App\Http\Controllers\AnimeMovieWatchServerController;
use App\Http\Controllers\AnimeSeasonCommentController;
use App\Http\Controllers\AnimeSeasonsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChannelController;
use App\Http\Controllers\ChannelServerController;
use App\Http\Controllers\ChannelCountryController;
use App\Http\Controllers\ChannelTypeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\ClientController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\SeasonController;
use App\Http\Controllers\SerieCommentController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\EposideCommentController;
use App\Http\Controllers\SerieController;
use App\Http\Controllers\SerieDownloadServerController;
use App\Http\Controllers\SerieSeasonCommentController;
use App\Http\Controllers\SerieWatchServerController;
use App\Http\Controllers\ServerController;
use App\Http\Controllers\ServerDownloadController;
use App\Http\Controllers\SubSerieController;
use App\Http\Controllers\SubTypeController;
use App\Http\Controllers\TVCommentController;
use App\Http\Controllers\TVController;
use App\Http\Controllers\TvEposideDownloadServerController;
use App\Http\Controllers\TVEposidesCommentsController;
use App\Http\Controllers\TVEposidesController;
use App\Http\Controllers\TvEposideWatchServerController;
use App\Http\Controllers\TVSeasonCommentController;
use App\Http\Controllers\TVSeasonsController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use App\Models\SerieDownloadServer;
use App\Models\SerieWatchServer;
use App\Models\TV;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/





Route::get('/', [ClientController::class, 'index'])->name('clients');
Route::get('/movie/show/{id}', [MovieController::class, 'show'])->name('movies.show');
Route::get('/movies', [MovieController::class, 'index'])->name('movies');
Route::get('/movies/old', [MovieController::class, 'oldMovies'])->name('movies.old');
Route::get('/movies/best', [MovieController::class, 'bestMovies'])->name('movies.best');
Route::get('/movies/top', [MovieController::class, 'topMovies'])->name('movies.top');
Route::get('/movies/year', [MovieController::class, 'productionYear'])->name('movies.year');
Route::get('/movies/country', [MovieController::class, 'country'])->name('movies.country');






Route::get('/series', [SubSerieController::class, 'clientIndex'])->name('client.series');
Route::get('/series/new', [SerieController::class, 'newSeries'])->name('series.new');
Route::get('/series/old', [SerieController::class, 'oldSeries'])->name('series.old');
Route::get('/series/best', [SerieController::class, 'bestSeries'])->name('series.best');
Route::get('/series/top', [SerieController::class, 'topSeries'])->name('series.top');



Route::get('/series/show/{id}', [SerieController::class, 'clientShow'])->name('series.show');
Route::get('/eposides/show/{id}', [SubSerieController::class, 'clientShow'])->name('eposide.show');
Route::get('/seasons/show/{id}', [SeasonController::class, 'show'])->name('season.show');
Route::get('/categories/show/{id}', [CategoryController::class, 'clientShow'])->name('category.show');
Route::get('/categories/series/show/{id}', [CategoryController::class, 'clientSeriesShow'])->name('category.series.show');
Route::get('/categories/tvs/show/{id}', [CategoryController::class, 'clientTvsShow'])->name('category.tvs.show');
Route::get('/categories/animes/show/{id}', [CategoryController::class, 'clientAnimesShow'])->name('category.animes.show');


// anmie client routes

Route::get('/animes', [AnimeEposidesController::class, 'clientIndex'])->name('client.animes');


Route::get('/animes/show/{id}', [AnimeController::class, 'clientShow'])->name('animes.show');
Route::get('/animes/movies/show/{id}', [AnimeMoviesController::class, 'show'])->name('animes.movies.show');
Route::get('/animes/eposides/show/{id}', [AnimeEposidesController::class, 'clientShow'])->name('animes.eposide.show');


Route::get('/animes/seasons/show/{id}', [AnimeSeasonsController::class, 'clientShow'])->name('animes.season.show');










Route::get('/animes/series', [AnimeController::class, 'animeSeries'])->name('client.animes.series');
Route::get('/animes/movies', [AnimeController::class, 'animeMovies'])->name('client.animes.movies');





//tv shows routes
Route::get('/tv_shows', [TVEposidesController::class, 'clientIndex'])->name('client.tv_shows');

Route::get('/all_tv_shows', [TVController::class, 'all_shows'])->name('all_shows');



Route::get('/tv/show/{id}', [TVController::class, 'clientShow'])->name('client.tv.show');

Route::get('/tv_eposides/show/{id}', [TVEposidesController::class, 'clientShow'])->name('client.tv_eposides.show');

Route::get('/tv_seasons/show/{id}', [TVSeasonsController::class, 'show'])->name('client.tv_seasons.show');


Route::get('/movies/search', [ClientController::class, 'movieSearch'])->name('movies.search');



Route::get('/type/show/{id}', [TypeController::class, 'show'])->name('client.type.show');


//live TV routes

Route::get('/liveChannels', [ChannelController::class, 'clientIndex'])->name('client.channels');
Route::get('/subtype/show/{id}', [SubTypeController::class, 'clientShow'])->name('client.subtype.show');




Auth::routes();

// Route::get('/email/verify', function () {
//     return view('auth.verify');
// })->middleware('auth')->name('verification.notice');


Route::group(
    ["middleware" => ['auth']],
    function () {
        Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::post('/logout', [UserController::class, 'logout'])->name('logout');
        Route::post('/users/sore', [UserController::class, 'store'])->name('users.store');
        Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/users/update/{id}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/users/delete/{id}', [UserController::class, 'destroy'])->name('users.delete');

        Route::post('/movie/comment', [CommentController::class, 'store'])->name('movie.comment');
        Route::post('/anime/movie/comment', [AnimeMoviesCommentController::class, 'store'])->name('anime.movie.comment');
        Route::post('/serie/comment', [SerieCommentController::class, 'store'])->name('serie.comment');
        Route::post('/anime/comment', [AnimeCommentController::class, 'store'])->name('anime.comment');


        Route::post('/serie/season/comment', [SerieSeasonCommentController::class, 'store'])->name('serie.season.comment');
        Route::post('/anime/season/comment', [AnimeSeasonCommentController::class, 'store'])->name('anime.season.comment');


        Route::post('/eposide/comment', [EposideCommentController::class, 'store'])->name('eposide.comment');

        Route::post('/anime_eposide/comment', [AnimeEposideCommentController::class, 'store'])->name('anime.eposide.comment');

        Route::post('/tv/comment', [TVCommentController::class, 'store'])->name('tv.comment');


        Route::post('/tv/season/comment', [TVSeasonCommentController::class, 'store'])->name('tv.season.comment');



        Route::post('/tv_eposide/comment', [TVEposidesCommentsController::class, 'store'])->name('tv_eposide.comment');



        Route::group(
            ["middleware" => ['admin']],
            function () {


                Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
                Route::get('/users', [UserController::class, 'index'])->name('users');
                Route::post('/users/updateStatus/{id}', [UserController::class, 'updateStatus'])->name('users.updateStatus');




                Route::get('/watch_server/create', [ServerController::class, 'watchServer'])->name('server.watch');


                Route::get('/watch_server/show/{id}', [ServerController::class, 'watchServerShow'])->name('server.watch.show');

                Route::get('/watch_server/edit/{id}', [ServerController::class, 'watchServerEdit'])->name('watchserver.edit');
                Route::put('/watch_server/update/{id}', [ServerController::class, 'watchServerUpdate'])->name('server.update');



                Route::delete('/watch_server/delete/{id}', [ServerController::class, 'watchServerDelete'])->name('watchserver.delete');





                Route::put('/download_server/update/{id}', [ServerDownloadController::class, 'downloadServerUpdate'])->name('downloadServer.update');

                Route::delete('/download_server/delete/{id}', [ServerDownloadController::class, 'downloadServerDelete'])->name('downloadserver.delete');



                Route::get('/download_server/show/{id}', [ServerDownloadController::class, 'watchServerDownload'])->name('server.download.show');


                Route::get('/download_server/edit/{id}', [ServerDownloadController::class, 'downloadServerEdit'])->name('downloadserver.edit');

                Route::get('/download_server/create', [ServerDownloadController::class, 'downloadServer'])->name('server.download');


                Route::post('/watch_server/store', [ServerController::class, 'watchServerStore'])->name('server.watch.store');

                Route::post('/download_server/store', [ServerDownloadController::class, 'downloadServerStore'])->name('server.download.store');



            // serie watch server start


            Route::get('/serie_watch_server/create', [SerieWatchServerController::class, 'create'])->name('serie.server.watch');
            Route::post('/serie_watch_server/store', [SerieWatchServerController::class, 'store'])->name('serie.watch.store');

            Route::get('/serie_watch_server/show/{id}', [SerieWatchServerController::class, 'show'])->name('serie.watch.show');





            Route::get('/serie_watch_server/edit/{id}', [SerieWatchServerController::class, 'edit'])->name('serieWatchServer.edit');




            Route::put('/serie_watch_server/update/{id}', [SerieWatchServerController::class, 'update'])->name('serieWatchServer.update');

            Route::delete('/serie_watch_server/delete/{id}', [SerieWatchServerController::class, 'destroy'])->name('serieWatchServer.delete');








            // serie watch server end

            // serie download server start


            Route::get('/serie_download_server/create', [SerieDownloadServerController::class, 'create'])->name('serie.server.download');
            Route::post('/serie_download_server/store', [SerieDownloadServerController::class, 'store'])->name('serie.download.store');
            Route::get('/serie_download_server/show/{id}', [SerieDownloadServerController::class, 'show'])->name('serie.download.show');


            Route::get('/serie_download_server/edit/{id}', [SerieDownloadServerController::class, 'edit'])->name('serieDownloadServer.edit');




            Route::put('/serie_download_server/update/{id}', [SerieDownloadServerController::class, 'update'])->name('serieDownloadServer.update');

            Route::delete('/serie_download_server/delete/{id}', [SerieDownloadServerController::class, 'destroy'])->name('serieDownloadServer.delete');












            // serie download server end






                Route::get('/types', [TypeController::class, 'index'])->name('types');
                Route::get('/types/create', [TypeController::class, 'create'])->name('types.create');

                Route::post('/types/store', [TypeController::class, 'store'])->name('types.store');



                Route::get('/admin/types/show/{id}', [TypeController::class, 'show'])->name('types.show');

                Route::get('/types/edit/{id}', [TypeController::class, 'edit'])->name('types.edit');

                Route::put('/types/update/{id}', [TypeController::class, 'update'])->name('types.update');

                Route::delete('/types/delete/{id}', [TypeController::class, 'destroy'])->name('types.delete');








                //subtypes


                Route::get('/all_subtypes', [SubTypeController::class, 'index'])->name('subtypes');
                Route::get('/subtypes/create', [SubTypeController::class, 'create'])->name('subtypes.create');

                Route::get('/admin/subtypes/show/{id}', [TypeController::class, 'subTypeShow'])->name('subtypes.show');

                Route::get('/admin/subtypes/edit/{id}', [SubTypeController::class, 'subTypeEdit'])->name('subtypes.edit');

                Route::put('/admin/subtypes/update/{id}', [SubTypeController::class, 'subTypeUpdate'])->name('subtypes.update');
                Route::delete('/admin/subtypes/delete/{id}', [SubTypeController::class, 'subTypeDelete'])->name('subtypes.delete');



                Route::post('/subtypes/store', [SubTypeController::class, 'store'])->name('subtypes.store');



                // categories routes
                Route::get('/categories', [CategoryController::class, 'index'])->name('categories');

                Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');

                Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');

                Route::get('/admin/categories/show/{id}', [CategoryController::class, 'show'])->name('categories.show');

                Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');

                Route::put('/categories/update/{id}', [CategoryController::class, 'update'])->name('categories.update');

                Route::delete('/categories/delete/{id}', [CategoryController::class, 'destroy'])->name('categories.delete');


                // movies routes
                Route::get('/admin/movies', [MovieController::class, 'adminIndex'])->name('movies.admin');

                Route::get('/admin/movie/show/{id}', [MovieController::class, 'adminShow'])->name('movies.admin.show');

                Route::get('/movies/create', [MovieController::class, 'create'])->name('movies.create');

                Route::post('/movies/store', [MovieController::class, 'store'])->name('movies.store');


                Route::get('/movies/edit/{id}', [MovieController::class, 'edit'])->name('movies.edit');

                Route::put('/movies/update/{id}', [MovieController::class, 'update'])->name('movies.update');


                Route::delete('/movies/delete/{id}', [MovieController::class, 'destroy'])->name('movies.delete');


                // series routes

                Route::get('/admin/series', [SerieController::class, 'index'])->name('series');
                Route::get('/series/create', [SerieController::class, 'create'])->name('series.create');
                Route::post('/series/store', [SerieController::class, 'store'])->name('series.store');

                Route::get('/admin/series/show/{id}', [SerieController::class, 'show'])->name('admin.series.show');

                Route::get('/series/edit/{id}', [SerieController::class, 'edit'])->name('series.edit');

                Route::put('/series/update/{id}', [SerieController::class, 'update'])->name('series.update');

                Route::delete('/series/delete/{id}', [SerieController::class, 'destroy'])->name('series.delete');


                //series seasons routes

                Route::get('/seasons', [SeasonController::class, 'index'])->name('seasons');
                Route::get('/seasons/create', [SeasonController::class, 'create'])->name('seasons.create');
                Route::post('/seasons/store', [SeasonController::class, 'store'])->name('seasons.store');

                Route::get('/admin/seasons/show/{id}', [SeasonController::class, 'adminShow'])->name('seasons.admin.show');

                Route::get('/admin/seasons/edit/{id}', [SeasonController::class, 'edit'])->name('seasons.admin.edit');

                Route::put('/admin/series/seasons/update/{id}', [SeasonController::class, 'update'])->name('series.seasons.update');



                Route::delete('/series/seasons/delete/{id}', [SeasonController::class, 'destroy'])->name('series.seasons.delete');













                //subseries routes

                Route::get('/eposides', [SubSerieController::class, 'index'])->name('eposides');
                Route::get('/eposide/create', [SubSerieController::class, 'create'])->name('eposide.create');
                Route::post('/eposide/store', [SubSerieController::class, 'store'])->name('eposide.store');



                Route::get('/admin/eposide/show/{id}', [SubSerieController::class, 'show'])->name('eposide.admin.show');

                Route::get('/eposide/edit/{id}', [SubSerieController::class, 'edit'])->name('eposide.edit');

                Route::put('/eposide/update/{id}', [SubSerieController::class, 'update'])->name('eposide.update');
                Route::delete('/eposide/delete/{id}', [SubSerieController::class, 'destroy'])->name('eposide.delete');





                //anime routes

                Route::get('/admin/animes', [AnimeController::class, 'index'])->name('animes.admin');

                Route::get('/admin/animes/create', [AnimeController::class, 'create'])->name('animes.admin.create');

                Route::post('/admin/animes/store', [AnimeController::class, 'store'])->name('animes.admin.store');

                Route::get('/admin/animes/edit/{id}', [AnimeController::class, 'edit'])->name('animes.admin.edit');

                Route::get('/admin/animes/show/{id}', [AnimeController::class, 'show'])->name('animes.admin.show');

                Route::put('/admin/animes/update/{id}', [AnimeController::class, 'update'])->name('animes.admin.update');

                Route::delete('/admin/animes/delete/{id}', [AnimeController::class, 'destroy'])->name('animes.admin.destroy');









                //animes eposides

                Route::get('/admin/animes/eposides', [AnimeEposidesController::class, 'index'])->name('animes.admin.eposides');
                Route::get('/admin/animes/eposides/create', [AnimeEposidesController::class, 'create'])->name('animes.admin.eposides.create');
                Route::post('/admin/animes/eposides/store', [AnimeEposidesController::class, 'store'])->name('animes.admin.eposides.store');
                Route::get('/admin/animes/eposides/show/{id}', [AnimeEposidesController::class, 'show'])->name('animes.admin.eposides.show');
                Route::get('/admin/animes/eposides/edit/{id}', [AnimeEposidesController::class, 'edit'])->name('animes.admin.eposides.edit');
                Route::put('/admin/animes/eposides/update/{id}', [AnimeEposidesController::class, 'update'])->name('animes.admin.eposides.update');
                Route::delete('/admin/animes/eposides/delete/{id}', [AnimeEposidesController::class, 'destroy'])->name('animes.admin.eposides.delete');










                //animes seasons




                Route::get('/admin/animes/seasons', [AnimeSeasonsController::class, 'index'])->name('animes.admin.seasons');

                Route::get('/admin/animes/seasons/create', [AnimeSeasonsController::class, 'create'])->name('animes.admin.seasons.create');

                Route::post('/admin/animes/seasons/store', [AnimeSeasonsController::class, 'store'])->name('animes.admin.seasons.store');

                Route::get('/admin/animes/seasons/show/{id}', [AnimeSeasonsController::class, 'show'])->name('animes.admin.seasons.show');

                Route::get('/admin/animes/seasons/edit/{id}', [AnimeSeasonsController::class, 'edit'])->name('animes.admin.seasons.edit');




                Route::put('/admin/seasons/update/{id}', [AnimeSeasonsController::class, 'update'])->name('animes.admin.seasons.update');



                Route::delete('/seasons/delete/{id}', [AnimeSeasonsController::class, 'destroy'])->name('animes.admin.seasons.delete');









                //anime movies routes



                Route::get('/admin/anime/movies', [AnimeMoviesController::class, 'adminIndex'])->name('movies.admin.animes');

                Route::get('/admin/anime/movie/show/{id}', [AnimeMoviesController::class, 'adminShow'])->name('movies.admin.show.animes');

                Route::get('/anime/movies/create', [AnimeMoviesController::class, 'create'])->name('movies.create.animes');

                Route::post('/anime/movies/store', [AnimeMoviesController::class, 'store'])->name('movies.store.animes');


                Route::get('/anime/movies/edit/{id}', [AnimeMoviesController::class, 'edit'])->name('movies.edit.animes');

                Route::put('/anime/movies/update/{id}', [AnimeMoviesController::class, 'update'])->name('movies.update.animes');


                Route::delete('/anime/movies/delete/{id}', [AnimeMoviesController::class, 'destroy'])->name('movies.delete.animes');



                // anime movies watch servers start



                Route::post('/anime/movies/watch_servers/store', [AnimeMovieWatchServerController::class, 'store'])->name('movies.servers.store.animes');
                Route::get('/anime/movies/watch_servers/show/{id}', [AnimeMovieWatchServerController::class, 'show'])->name('movies.servers.show.animes');

                Route::get('/anime/movies/watch_servers/edit/{id}', [AnimeMovieWatchServerController::class, 'edit'])->name('movies.servers.edit.animes');
                Route::put('/anime/movies/watch_servers/update/{id}', [AnimeMovieWatchServerController::class, 'update'])->name('movies.servers.update.animes');
                Route::delete('/anime/movies/watch_servers/delete/{id}', [AnimeMovieWatchServerController::class, 'destroy'])->name('movies.servers.delete.animes');

                // anime movies watch servers end





                // anime movies downlaod servers start

                Route::post('/anime/movies/download_servers/store', [AnimeMovieDownloadServerController::class, 'store'])->name('movies.downloadservers.store.animes');





                Route::get('/anime/movies/download_servers/show/{id}', [AnimeMovieDownloadServerController::class, 'show'])->name('movies.downloadservers.show.animes');

                Route::get('/anime/movies/download_servers/edit/{id}', [AnimeMovieDownloadServerController::class, 'edit'])->name('movies.downloadservers.edit.animes');
                Route::put('/anime/movies/download_servers/update/{id}', [AnimeMovieDownloadServerController::class, 'update'])->name('movies.downloadservers.update.animes');
                Route::delete('/anime/movies/download_servers/delete/{id}', [AnimeMovieDownloadServerController::class, 'destroy'])->name('movies.downloadservers.delete.animes');



                // anime movies downlaod servers end

                // anime eposides watch servers start



                Route::get('/anime/eposides/servers/create', [AnimeEposideWatchServerController::class, 'create'])->name('eposides.servers.create.animes');
                Route::get('/anime/eposides/servers/show/{id}', [AnimeEposideWatchServerController::class, 'show'])->name('eposides.servers.show.animes');
                Route::get('/anime/eposides/servers/edit/{id}', [AnimeEposideWatchServerController::class, 'edit'])->name('eposides.servers.edit.animes');



                Route::post('/anime/eposides/servers/store', [AnimeEposideWatchServerController::class, 'store'])->name('eposides.servers.store.animes');

                Route::put('/anime/eposides/servers/update/{id}', [AnimeEposideWatchServerController::class, 'update'])->name('eposides.servers.update.animes');
                Route::delete('/anime/eposides/servers/delete/{id}', [AnimeEposideWatchServerController::class, 'destroy'])->name('eposides.servers.delete.animes');


                // anime eposides watch servers end

               // anime eposides download servers start


               Route::get('/anime/eposides/downloadservers/create', [AnimeEposideDownloadServerController::class, 'create'])->name('eposides.downloadservers.create.animes');

               Route::get('/anime/eposides/downloadservers/show/{id}', [AnimeEposideDownloadServerController::class, 'show'])->name('eposides.downloadservers.show.animes');
               Route::get('/anime/eposides/downloadservers/edit/{id}', [AnimeEposideDownloadServerController::class, 'edit'])->name('eposides.downloadservers.edit.animes');

               Route::post('/anime/eposides/downloadservers/store', [AnimeEposideDownloadServerController::class, 'store'])->name('eposides.downloadservers.store.animes');


               Route::put('/anime/eposides/downlodservers/update/{id}', [AnimeEposideDownloadServerController::class, 'update'])->name('eposides.downlodservers.update.animes');


               Route::delete('/anime/eposides/downloadservers/delete/{id}', [AnimeEposideDownloadServerController::class, 'destroy'])->name('eposides.downloadservers.delete.animes');



               // anime eposides download servers end





                //tv routes start


                Route::get('/admin/tvs', [TVController::class, 'index'])->name('tvs');
                Route::get('/admin/tvs/create', [TVController::class, 'create'])->name('tvs.create');
                Route::post('/admin/tvs/store', [TVController::class, 'store'])->name('tvs.store');
                Route::get('/admin/tvs/show/{id}', [TVController::class, 'show'])->name('tvs.show');
                Route::get('/admin/tvs/edit/{id}', [TVController::class, 'edit'])->name('tvs.edit');
                Route::put('/admin/tvs/update/{id}', [TVController::class, 'update'])->name('tvs.update');
                Route::delete('/admin/tvs/delete/{id}', [TVController::class, 'destroy'])->name('tvs.delete');


                //tv routes end

              //tv eposides watch server routes start
              Route::get('/admin/tvs/create/watch_servers', [TvEposideWatchServerController::class, 'create'])->name('tv.watch.create');
              Route::post('/admin/tvs/store/watch_servers', [TvEposideWatchServerController::class, 'store'])->name('tv.watch.store');

              Route::get('/admin/tvs/show/watch_servers/{id}', [TvEposideWatchServerController::class, 'show'])->name('tv.watch.show');
              Route::get('/admin/tvs/edit/watch_servers/{id}', [TvEposideWatchServerController::class, 'edit'])->name('tv.watch.edit');
              Route::put('/admin/tvs/update/watch_servers/{id}', [TvEposideWatchServerController::class, 'update'])->name('tv.watch.update');
              Route::delete('/admin/tvs/delete/watch_servers/{id}', [TvEposideWatchServerController::class, 'destroy'])->name('tv.watch.delete');
              //tv eposides watch server routes end




              //tv eposides download server routes start
              Route::get('/admin/tvs/create/download_servers', [TvEposideDownloadServerController::class, 'create'])->name('tv.download.create');
              Route::post('/admin/tvs/store/download_servers', [TvEposideDownloadServerController::class, 'store'])->name('tv.download.store');

              Route::get('/admin/tvs/show/download_servers/{id}', [TvEposideDownloadServerController::class, 'show'])->name('tv.download.show');
              Route::get('/admin/tvs/edit/download_servers/{id}', [TvEposideDownloadServerController::class, 'edit'])->name('tv.download.edit');
              Route::put('/admin/tvs/update/download_servers/{id}', [TvEposideDownloadServerController::class, 'update'])->name('tv.download.update');
              Route::delete('/admin/tvs/delete/download_servers/{id}', [TvEposideDownloadServerController::class, 'destroy'])->name('tv.download.delete');
              //tv eposides download server routes end

































                // tv seasons routes

                Route::get('/admin/tvs/seasons', [TVSeasonsController::class, 'index'])->name('tvs.admin.seasons');

                Route::get('/admin/tvs/seasons/create', [TVSeasonsController::class, 'create'])->name('tvs.admin.seasons.create');

                Route::post('/admin/tvs/seasons/store', [TVSeasonsController::class, 'store'])->name('tvs.admin.seasons.store');

                Route::get('/admin/tvs/seasons/show/{id}', [TVSeasonsController::class, 'adminShow'])->name('tvs.admin.seasons.show');

                Route::get('/admin/tvs/seasons/edit/{id}', [TVSeasonsController::class, 'edit'])->name('tvs.admin.seasons.edit');

                Route::put('/admin/tvs/seasons/update/{id}', [TVSeasonsController::class, 'update'])->name('tvs.admin.seasons.update');

                Route::delete('/admin/tvs/seasons/delete/{id}', [TVSeasonsController::class, 'destroy'])->name('tvs.admin.seasons.delete');



                //tv eposides

                Route::get('/admin/tvs/eposides', [TVEposidesController::class, 'index'])->name('tvs.admin.eposides');
                Route::get('/admin/tvs/eposides/create', [TVEposidesController::class, 'create'])->name('tvs.admin.eposides.create');
                Route::post('/admin/tvs/eposides/store', [TVEposidesController::class, 'store'])->name('tvs.admin.eposides.store');
                Route::get('/admin/tvs/eposides/show/{id}', [TVEposidesController::class, 'show'])->name('tvs.admin.eposides.show');
                Route::get('/admin/tvs/eposides/edit/{id}', [TVEposidesController::class, 'edit'])->name('tvs.admin.eposides.edit');
                Route::put('/admin/tvs/eposides/update/{id}', [TVEposidesController::class, 'update'])->name('tvs.admin.eposides.update');
                Route::delete('/admin/tvs/eposides/delete/{id}', [TVEposidesController::class, 'destroy'])->name('tvs.admin.eposides.delete');



                // channels admin routes

                Route::get('/admin/channels', [ChannelController::class, 'index'])->name('channels.admin');

                Route::get('/admin/channels/create', [ChannelController::class, 'create'])->name('channels.admin.create');

                Route::post('/admin/channels/store', [ChannelController::class, 'store'])->name('channels.admin.store');
                Route::get('/admin/channels/show/{id}', [ChannelController::class, 'show'])->name('channels.admin.show');

                Route::get('/admin/channels/edit/{id}', [ChannelController::class, 'edit'])->name('channels.admin.edit');

                Route::put('/admin/channels/update/{id}', [ChannelController::class, 'update'])->name('channels.admin.update');
                Route::delete('/admin/channels/delete/{id}', [ChannelController::class, 'destroy'])->name('channels.admin.delete');


                  // channel countries admin routes start


                Route::get('/admin/channels/countries', [ChannelCountryController::class, 'index'])->name('channels.countries.admin');

                Route::get('/admin/channels/countries/create', [ChannelCountryController::class, 'create'])->name('channels.countries.admin.create');

                Route::post('/admin/channels/countries/store', [ChannelCountryController::class, 'store'])->name('channels.country.admin.store');


                Route::get('/admin/channels/countries/edit/{id}', [ChannelCountryController::class, 'edit'])->name('channels.country.admin.edit');


                Route::get('/admin/channels/countries/show/{id}', [ChannelCountryController::class, 'show'])->name('channels.countries.admin.show');

                Route::put('/admin/channels/countries/update/{id}', [ChannelCountryController::class, 'update'])->name('channels.country.admin.update');
                Route::delete('/admin/channels/countries/delete/{id}', [ChannelCountryController::class, 'destroy'])->name('channels.country.admin.delete');

                  // channel countries admin routes end

                  // channel types admin routes start


                Route::get('/admin/channels/types', [ChannelTypeController::class, 'index'])->name('channels.types.admin');

                Route::get('/admin/channels/types/create', [ChannelTypeController::class, 'create'])->name('channels.types.admin.create');

                Route::post('/admin/channels/types/store', [ChannelTypeController::class, 'store'])->name('channels.types.admin.store');


                Route::get('/admin/channels/types/edit/{id}', [ChannelTypeController::class, 'edit'])->name('channels.types.admin.edit');


                Route::put('/admin/channels/types/update/{id}', [ChannelTypeController::class, 'update'])->name('channels.types.admin.update');
                Route::delete('/admin/channels/types/delete/{id}', [ChannelTypeController::class, 'destroy'])->name('channels.types.admin.delete');


                  // channel types admin routes end
                  // channel servers admin routes start





                Route::get('/admin/channels/servers', [ChannelServerController::class, 'index'])->name('channels.servers.admin');

                Route::get('/admin/channels/servers/create', [ChannelServerController::class, 'create'])->name('channels.servers.admin.create');

                Route::post('/admin/channels/servers/store', [ChannelServerController::class, 'store'])->name('channels.servers.admin.store');




                Route::get('/admin/channels/servers/edit/{id}', [ChannelServerController::class, 'edit'])->name('channels.servers.admin.edit');


                Route::put('/admin/channels/servers/update/{id}', [ChannelServerController::class, 'update'])->name('channels.servers.admin.update');
                Route::delete('/admin/channels/servers/delete/{id}', [ChannelServerController::class, 'destroy'])->name('channels.servers.admin.delete');


                  // channel servers admin routes end




            }





        );
    }
);
