@extends('layouts.backend.master')


@section('content')
    <div class="col-lg-12">
        <div class="admin-dashboard-content p-3  overflow-auto rounded" style="background-color: #262B40">
            <table class="table  ">
                @if (count($type->subtypes) == 0)
                    <p class="text-white text-center">there is no data</p>
                @else
                    <thead class="text-white">
                        <tr>
                            <th>Name</th>

                            <th>subTypes</th>


                            <th>Edit subtype </th>
                            <th>Delete subtype </th>



                        </tr>
                    </thead>

                    <tbody>
                        <tr>



                            <td class="text-white">{{ $type->name }}</td>








                            <td class="text-white">
                                @foreach ($type->subtypes as $item)
                                    <p class="p-0 m-0">{{ $item->name }}</p>
                                @endforeach

                            </td>



                            <td>
                                @foreach ($type->subtypes as $item)
                                    <a class="d-block" href="{{ route('subtypes.edit', ['id' => $item->id]) }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                @endforeach
                            </td>

                            <td>
                                @foreach ($type->subtypes as $item)
                                    <button type="button" class="m-0 p-0 btn btn-link d-block" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal{{ $item->id }}">
                                        <i class="fas fa-trash"></i>
                                    </button>



                                    <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    Are you sure you want to delete {{ $item->name }}
                                                    <div class="modal-footer">
                                                        <form action="{{ route('subtypes.delete', ['id' => $item->id]) }}"
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
