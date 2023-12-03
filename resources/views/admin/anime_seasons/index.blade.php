@extends('layouts.backend.master')


@section('content')
    <div class="col-lg-12">
        <div class="admin-dashboard-content p-3  overflow-auto rounded" style="background-color: #262B40">
            <table class="table text-white ">

                @if (count($anime_seasons) == 0)
                    <p class="text-white text-center">there is no data</p>
                @else
                    <thead>
                        <tr>
                            <th>season number</th>
                            <th>season poster</th>
                            <th>season production year</th>


                            <th>serie name</th>

                            <th>Edit</th>
                            <th>Show</th>
                            <th>Delete</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($anime_seasons as $season)
                            <tr>
                                <td>{{ $season->season_number }}</td>
                                <td><img width="40px" height="40px" src="{{ Storage::url($season->season_poster) }}"
                                        alt=""></td>
                                <td>{{ $season->season_production_year }}</td>

                                <td>{{ $season->anime->getTranslation('name', 'en') }}</td>


                                <td><a class="btn btn-link "
                                        href="{{ route('animes.admin.seasons.edit', ['id' => $season->id]) }}"><i
                                            class="fas fa-edit"></i></a>
                                </td>

                                <td><a class="btn btn-link "
                                        href="{{ route('animes.admin.seasons.show', ['id' => $season->id]) }}"><i
                                            class="fas fa-eye"></i></a>
                                </td>

                                <td><button type="button" class="btn btn-link " data-bs-toggle="modal"
                                        data-bs-target="#exampleModal{{ $season->id }}">
                                        <i class="fas fa-trash"></i>
                                    </button></td>
                            </tr>



                            <div class="modal fade" id="exampleModal{{ $season->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            Are you sure you want to delete season {{ $season->season_number }} of
                                            {{ $season->anime->name }}
                                            <div class="modal-footer">
                                                <form
                                                    action="{{ route('animes.admin.seasons.delete', ['id' => $season->id]) }}"
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
