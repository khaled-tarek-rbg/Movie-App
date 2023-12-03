@extends('layouts.backend.master')


@section('content')
    <div class="col-lg-12">
        <div class="admin-dashboard-content p-3 overflow-auto  rounded" style="background-color: #262B40">
            <table class="table text-white">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>description</th>
                        <th>country</th>
                        <th>duration</th>
                        <th>poster</th>
                        <th>also_known_as</th>
                        <th>category</th>
                        <th>production_year</th>

                        <th>movie_watch_servers</th>
                        <th>movie_download_servers</th>

                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>

                <tbody>

                    <tr>
                        <td>{{ $movie->id }}</td>
                        <td>{{ $movie->name }}</td>
                        <td style="font-size: 10px ; font-weight : bold">{{ $movie->description }}</td>
                        <td>{{ $movie->country }}</td>
                        <td>{{ $movie->duration }}</td>

                        <td><img width='100%' src='{{ Storage::url($movie->poster) }}'></td>

                        <td>{{ $movie->also_known_as }}</td>
                        <td>
                            @foreach ($movie->categories as $movie->categorie)
                                {{ $movie->categorie->name }} <br>
                            @endforeach
                        </td>
                        <td>{{ $movie->production_year }}</td>


                        <td>
                            @if (count($movie->AnimeWatchServers) > 0)
                                @foreach ($movie->AnimeWatchServers as $item)
                                    <a class="d-block" href="{{ $item->url }}">{{ $item->url }}</a>
                                @endforeach
                            @else
                                no servers found
                            @endif


                        </td>
                        <td>
                            @if (count($movie->AnimeDownloadsServers) > 0)
                                @foreach ($movie->AnimeDownloadsServers as $item)
                                    <a class="d-block" href="{{ $item->url }}">{{ $item->url }}</a>
                                @endforeach
                            @else
                                no servers found
                            @endif


                        </td>









                        <td><a class="btn btn-link " href="{{ route('movies.edit.animes', ['id' => $movie->id]) }}"><i
                                    class="fas fa-edit"></i></a>
                        </td>



                        <td><button type="button" class="btn btn-link " data-bs-toggle="modal"
                                data-bs-target="#exampleModal{{ $movie->id }}">
                                <i class="fas fa-trash"></i>
                            </button></td>
                    </tr>



                    <div class="modal fade" id="exampleModal{{ $movie->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    Are you sure you want to delete {{ $movie->name }}
                                    <div class="modal-footer">
                                        <form action="{{ route('movies.delete.animes', ['id' => $movie->id]) }}"
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

                </tbody>

            </table>
        </div>

    </div>
@endsection
