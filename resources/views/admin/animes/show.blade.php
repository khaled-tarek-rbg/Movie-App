@extends('layouts.backend.master')


@section('content')
    <div class="col-lg-12">
        <div class="admin-dashboard-content p-3  overflow-auto rounded" style="background-color: #262B40">
            <table class="table text-white ">


                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>description</th>
                        <th>rate</th>


                        <th>poster</th>

                        <th>category</th>
                        <th>production_year</th>


                        <th>seasons</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>

                <tbody>

                    <tr>
                        <td>{{ $serie->id }}</td>



                        @if ($serie->getTranslation('name', 'en') == true)
                            <td>{{ $serie->getTranslation('name', 'en') }}</td>
                        @else
                            <td>{{ $serie->getTranslation('name', 'ar') }}</td>
                        @endif



                        <td>
                            {{ $serie->description !== null ? Str::substr($serie->description, 0, 40) : 'not entered' }}
                        </td>


                        <td>
                            {{ $serie->rate }}
                        </td>


                        <td><img width='30px' height="30px" src='{{ Storage::url($serie->poster) }}'></td>

                        <td>
                            @foreach ($serie->categories as $item)
                                {{ $item->name }} <br>
                            @endforeach
                        </td>

                        <td>
                            {{ $serie->production_year }}
                        </td>


                        <td>
                            @foreach ($serie->seasons as $item)
                                <a href="{{ route('animes.admin.seasons.show', ['id' => $item->id]) }}" class="text-white mx-1"
                                    style="text-decoration: underline">
                                    Season {{ $item->season_number }}
                                </a>
                            @endforeach
                        </td>

                        <td><a class="btn btn-link " href="{{ route('animes.admin.edit', ['id' => $serie->id]) }}"><i
                                    class="fas fa-edit"></i></a>
                        </td>

                        <td><button type="button" class="btn btn-link " data-bs-toggle="modal"
                                data-bs-target="#exampleModal{{ $serie->id }}">
                                <i class="fas fa-trash"></i>
                            </button></td>
                    </tr>



                    <div class="modal fade" id="exampleModal{{ $serie->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    Are you sure you want to delete {{ $serie->name }}
                                    <div class="modal-footer">
                                        <form action="{{ route('animes.admin.destroy', ['id' => $serie->id]) }}"
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
