@extends('layouts.backend.master')

@section('content')
    <div class="col-lg-12">
        <div class="admin-dashboard-content p-3   rounded" style="background-color: #262B40">
            <table class="table text-white">

                @if (count($types) == 0)
                    <p class="text-white text-center">there is no data</p>
                @else
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Edit</th>
                            <th>Show</th>
                            <th>Delete</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($types as $type)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $type->name }}</td>

                                <td><a class="btn btn-link " href="{{ route('types.edit', ['id' => $type->id]) }}"><i
                                            class="fas fa-edit"></i></a>
                                </td>
                                <td><a class="btn btn-link " href="{{ route('types.show', ['id' => $type->id]) }}"><i
                                            class="fas fa-eye"></i></a>
                                </td>


                                <td><button type="button" class="btn btn-link " data-bs-toggle="modal"
                                        data-bs-target="#exampleModal{{ $type->id }}">
                                        <i class="fas fa-trash"></i>
                                    </button></td>
                            </tr>


                            <div class="modal fade" id="exampleModal{{ $type->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            Are you sure you want to delete {{ $type->name }}
                                            <div class="modal-footer">
                                                <form action="{{ route('types.delete', ['id' => $type->id]) }}"
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
