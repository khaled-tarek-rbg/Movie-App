@extends('layouts.backend.master')

@section('css')
    <link href="toastr.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="col-lg-12">
        <div class="admin-dashboard-content p-3  overflow-auto rounded" style="background-color: #262B40">
            <table class="table text-white ">

                <thead>
                    <tr>
                        <th>Eposide Number</th>
                        <th>Eposide Rate</th>
                        <th>Serie Name</th>
                        <th>Season Number</th>

                        <th>Edit</th>
                        <th>Delete</th>
                        <th>Eposide Watch Servers</th>


                        <th>Eposide Watch Servers</th>



                    </tr>
                </thead>

                <tbody>

                    <tr>
                        <td>{{ $eposide->serie_number }}</td>
                        <td>{{ $eposide->eposide_rate }}</td>




                        <td>{{ $eposide->serie->getTranslation('name', 'en') }}</td>
                        <td>{{ $eposide->season->season_number }}</td>



                        <td><a class="btn btn-link " href="{{ route('eposide.edit', ['id' => $eposide->id]) }}"><i
                                    class="fas fa-edit"></i></a>
                        </td>


                        <td><button type="button" class="btn btn-link " data-bs-toggle="modal"
                                data-bs-target="#exampleModal{{ $eposide->id }}">
                                <i class="fas fa-trash"></i>
                            </button></td>

                        <td>
                            @if (count($eposide->serieWatchServers) > 0)
                                @foreach ($eposide->serieWatchServers as $item)
                                    <a class="d-block" href="{{ $item->url }}">{{ $item->url }}</a>
                                @endforeach
                            @else
                                no servers found
                            @endif


                        </td>
                        <td>
                            @if (count($eposide->eposideDownloadServers) > 0)
                                @foreach ($eposide->eposideDownloadServers as $item)
                                    <a class="d-block" href="{{ $item->url }}">{{ $item->url }}</a>
                                @endforeach
                            @else
                                no servers found
                            @endif


                        </td>
























                    </tr>



                    <div class="modal fade" id="exampleModal{{ $eposide->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    Are you sure you want to delete eposide {{ $eposide->serie_number }}
                                    of {{ $eposide->serie->getTranslation('name', 'en') }}
                                    season {{ $eposide->season->season_number }}
                                    <div class="modal-footer">
                                        <form action="{{ route('eposide.delete', ['id' => $eposide->id]) }}"
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

@section('script')
    <script src="toastr.js"></script>
@endsection
