@extends('layouts.backend.master');

@section('content')
    <table class="table text-white">

        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>subtypes</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>

        <tbody>

            <tr>
                <td>{{ $type->id }}</td>
                <td>{{ $type->name }}</td>
                <td>
                    @if (count($type->subtypes) > 0)
                        @foreach ($type->subtypes as $item)
                            {{ $item->name }} <br>
                        @endforeach
                    @else
                        there is no data
                    @endif
                </td>
                <td><a class="btn btn-link" href="{{ route('types.edit', ['id' => $type->id]) }}"><i
                            class="fas fa-edit"></i></a></td>

                <td><button type="button" class="btn btn-link" data-bs-toggle="modal"
                        data-bs-target="#exampleModal{{ $type->id }}">
                        <i class="fas fa-trash"></i>
                    </button></td>
            </tr>


            <div class="modal fade" id="exampleModal{{ $type->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            Are you sure you want to delete {{ $type->name }}
                            <div class="modal-footer">
                                <form action="{{ route('types.delete', ['id' => $type->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Confirm</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
        </tbody>
    </table>
@endsection
