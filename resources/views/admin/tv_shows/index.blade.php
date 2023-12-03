@extends('layouts.backend.master')


@section('content')
    <div class="col-lg-12">
        <div class="admin-dashboard-content p-3  overflow-auto rounded" style="background-color: #262B40">
            <table class="table text-white ">

                @if (count($tvs) == 0)
                    <p class="text-white text-center">there is no data</p>
                @else
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>country</th>

                            <th>poster</th>

                            <th>category</th>


                            <th>Edit</th>
                            <th>Show</th>
                            <th>Delete</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($tvs as $serie)
                            <tr>
                                <td>{{ $loop->iteration }}</td>



                                @if ($serie->getTranslation('name', 'en') == true)
                                    <td>{{ $serie->getTranslation('name', 'en') }}</td>
                                @else
                                    <td>{{ $serie->getTranslation('name', 'ar') }}</td>
                                @endif




                                <td>
                                    {{ $serie->country }}
                                </td>




                                <td><img width='30px' height="30px" src='{{ Storage::url($serie->poster) }}'></td>

                                <td>
                                    @foreach ($serie->categories as $item)
                                        {{ $item->name }} <br>
                                    @endforeach
                                </td>


                                <td><a class="btn btn-link " href="{{ route('tvs.edit', ['id' => $serie->id]) }}"><i
                                            class="fas fa-edit"></i></a>
                                </td>
                                <td><a class="btn btn-link " href="{{ route('tvs.show', ['id' => $serie->id]) }}"><i
                                            class="fas fa-eye"></i></a>
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
                                                <form action="{{ route('tvs.delete', ['id' => $serie->id]) }}"
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
