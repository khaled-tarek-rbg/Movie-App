@extends('layouts.backend.master')


@section('content')
    <div class="col-lg-12">
        <div class="admin-dashboard-content p-3  overflow-auto rounded" style="background-color: #262B40">
            <table class="table text-white ">

                @if (count($anime_movies) == 0)
                    <p class="text-white text-center">there is no data</p>
                @else
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>description</th>
                            <th>country</th>
                            <th>duration</th>
                            <th>poster</th>
                            <th>Rate</th>
                            <th>also_known_as</th>
                            <th>category</th>
                            <th>production_year</th>


                            <th>Edit</th>
                            <th>Show</th>
                            <th>Delete</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($anime_movies as $movie)
                            <tr>
                                <td>{{ $loop->iteration }}</td>



                                @if ($movie->getTranslation('name', 'en') == true)
                                    <td>{{ $movie->getTranslation('name', 'en') }}</td>
                                @else
                                    <td>{{ $movie->getTranslation('name', 'ar') }}</td>
                                @endif



                                <td>
                                    {{ $movie->description !== null ? Str::substr($movie->description, 0, 40) : 'not entered' }}
                                </td>
                                <td>{{ $movie->country }}</td>
                                <td>{{ $movie->duration }}</td>

                                <td><img width='100%' src='{{ Storage::url($movie->poster) }}'></td>

                                <td>{{ $movie->rate }}</td>

                                <td>{{ $movie->also_known_as !== null ? $movie->also_known_as : 'not entered' }}</td>

                                <td>
                                    @foreach ($movie->categories as $movie->categorie)
                                        {{ $movie->categorie->name }} <br>
                                    @endforeach
                                </td>

                                <td>{{ $movie->production_year }}</td>








                                <td><a class="btn btn-link "
                                        href="{{ route('movies.edit.animes', ['id' => $movie->id]) }}"><i
                                            class="fas fa-edit"></i></a>
                                </td>
                                <td><a class="btn btn-link "
                                        href="{{ route('movies.admin.show.animes', ['id' => $movie->id]) }}"><i
                                            class="fas fa-eye"></i></a>
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
                        @endforeach

                    </tbody>
                @endif

            </table>
        </div>

    </div>
@endsection
