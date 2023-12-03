@extends('layouts.backend.master')


@section('content')
    <div class="col-lg-12">
        <div class="admin-dashboard-content p-3  overflow-auto rounded" style="background-color: #262B40">
            <table class="table  ">

                @if (count($anime->AnimeWatchServers) == 0)
                    <p class="text-white text-center">there is no data</p>
                @else
                    <thead class="text-white">
                        <tr>
                            <th>Name</th>

                            <th>Anime_Movie_watch_servers</th>


                            <th>Edit watch server </th>
                            <th>Delete watch server </th>



                        </tr>
                    </thead>

                    <tbody>
                        <tr>



                            @if ($anime->getTranslation('name', 'en') == true)
                                <td class="text-white">{{ $anime->getTranslation('name', 'en') }}</td>
                            @else
                                <td class="text-white">{{ $anime->getTranslation('name', 'ar') }}</td>
                            @endif








                            <td>
                                @foreach ($anime->AnimeWatchServers as $item)
                                    <a href="{{ $item->url }}">{{ $item->url }}</a>
                                @endforeach

                            </td>



                            <td>
                                @foreach ($anime->AnimeWatchServers as $item)
                                    <a class="d-block" href="{{ route('movies.servers.edit.animes', ['id' => $item->id]) }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($anime->AnimeWatchServers as $item)
                                    <button type="button" class="btn btn-link " data-bs-toggle="modal"
                                        data-bs-target="#exampleModal{{ $item->id }}">
                                        <i class="fas fa-trash"></i>
                                    </button>



                                    <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog  ">
                                            <div class="modal-content ">
                                                <div class="modal-body  ">
                                                    Are you sure you want to delete {{ $item->AnimeMovie->name }} server
                                                    <div class="modal-footer">
                                                        <form
                                                            action="{{ route('movies.servers.delete.animes', ['id' => $item->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Confirm</button>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </td>









                        </tr>



                    </tbody>
                @endif

            </table>
        </div>

    </div>
@endsection
