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
                        <th>Anime Name</th>
                        <th>Season Number</th>

                        <th>Edit</th>
                        <th>Show</th>
                        <th>Delete</th>








                    </tr>
                </thead>

                <tbody>
                    @foreach ($anime_eposides as $item)
                        <tr>
                            <td>{{ $item->eposide_number }}</td>
                            <td>{{ $item->rate }}</td>




                            <td>{{ $item->anime->getTranslation('name', 'en') }}</td>
                            <td>{{ $item->season->season_number }}</td>


                            <td><a class="btn btn-link "
                                    href="{{ route('animes.admin.eposides.edit', ['id' => $item->id]) }}"><i
                                        class="fas fa-edit"></i></a>
                            </td>
                            <td><a class="btn btn-link "
                                    href="{{ route('animes.admin.eposides.show', ['id' => $item->id]) }}"><i
                                        class="fas fa-eye"></i></a>
                            </td>


                            <td><button type="button" class="btn btn-link " data-bs-toggle="modal"
                                    data-bs-target="#exampleModal{{ $item->id }}">
                                    <i class="fas fa-trash"></i>
                                </button></td>



















                        </tr>



                        <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        Are you sure you want to delete {{ $item->eposide_number }}
                                        {{ $item->anime->getTranslation('name', 'en') }}
                                        {{ $item->season->season_number }}
                                        <div class="modal-footer">
                                            <form action="{{ route('animes.admin.eposides.delete', ['id' => $item->id]) }}"
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

            </table>
        </div>

    </div>
@endsection

@section('script')
    <script src="toastr.js"></script>
@endsection
