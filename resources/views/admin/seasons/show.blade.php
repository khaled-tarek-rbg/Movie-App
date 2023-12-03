@extends('layouts.backend.master')


@section('content')
    <div class="col-lg-12">
        <div class="admin-dashboard-content p-3  overflow-auto rounded" style="background-color: #262B40">
            <table class="table text-white ">


                <thead>
                    <tr>
                        <th>#</th>
                        <th>Serie_Name</th>
                        <th>Season_poster</th>
                        <th>Serie_production_year</th>
                        <th>Eposides</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>

                <tbody>

                    <tr>
                        <td>{{ $season->season_number }}</td>


                        @if ($season->serie->getTranslation('name', 'en') == true)
                            <td>{{ $season->serie->getTranslation('name', 'en') }}</td>
                        @else
                            <td>{{ $season->serie->getTranslation('name', 'ar') }}</td>
                        @endif


                        <td><img src="{{ Storage::url($season->season_poster) }}" alt=""></td>
                        <td>{{ $season->season_production_year }}</td>



                        <td>
                            @foreach ($season->subSeries as $item)
                                <a class="text-white mx-1" style="text-decoration: underline"
                                    href="{{ route('eposide.admin.show', ['id' => $item->id]) }}">


                                    {{ $item->serie_number }}

                                </a>
                            @endforeach
                        </td>





                        <td><a class="btn btn-link " href="{{ route('seasons.admin.edit', ['id' => $season->id]) }}"><i
                                    class="fas fa-edit"></i></a>
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
                                    {{ $season->serie->name }}
                                    <div class="modal-footer">
                                        <form action="{{ route('series.seasons.delete', ['id' => $season->id]) }}"
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
