@extends('layouts.backend.master')


@section('content')
    <div class="col-lg-12">
        <div class="admin-dashboard-content p-3  overflow-auto rounded" style="background-color: #262B40">
            <table class="table  ">

                @if (count($eposide->eposideDownloadServers) == 0)
                    <p class="text-white text-center">there is no data</p>
                @else
                    <thead class="text-white">
                        <tr>
                            <th>Serie Name</th>
                            <th>Eposide Number</th>
                            <th>Season Number</th>

                            <th>eposide_download_servers</th>


                            <th>Edit download server </th>
                            <th>Delete download server </th>



                        </tr>
                    </thead>

                    <tbody>
                        <tr>



                            @if ($eposide->serie->getTranslation('name', 'en') == true)
                                <td class="text-white">{{ $eposide->serie->getTranslation('name', 'en') }}</td>
                            @else
                                <td class="text-white">{{ $eposide->serie->getTranslation('name', 'ar') }}</td>
                            @endif



                            <td class="text-white">{{ $eposide->serie_number }}</td>

                            <td class="text-white">{{ $eposide->season->season_number }}</td>






                            <td>
                                @foreach ($eposide->eposideDownloadServers as $item)
                                    <a class="d-block" href="{{ $item->url }}">{{ $item->url }}</a>
                                @endforeach

                            </td>



                            <td>
                                @foreach ($eposide->eposideDownloadServers as $item)
                                    <a class="d-block" href="{{ route('serieDownloadServer.edit', ['id' => $item->id]) }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($eposide->eposideDownloadServers as $item)
                                    <button type="button" class="btn btn-link p-0 m-0 d-block " data-bs-toggle="modal"
                                        data-bs-target="#exampleModal{{ $item->id }}">
                                        <i class="fas fa-trash"></i>
                                    </button>



                                    <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog  ">
                                            <div class="modal-content ">
                                                <div class="modal-body  ">
                                                    Are you sure you want to delete this Eposide watch server
                                                    <div class="modal-footer">
                                                        <form
                                                            action="{{ route('serieDownloadServer.delete', ['id' => $item->id]) }}"
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
