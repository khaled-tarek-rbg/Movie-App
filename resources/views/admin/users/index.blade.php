@extends('layouts.backend.master')


@section('content')
    <div class="col-lg-12">
        <div class="admin-dashboard-content p-3   rounded" style="background-color: #262B40">
            <table class="table text-white">

                @if (count($users) == 0)
                    <p class="text-white text-center">there is no data</p>
                @else
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>first name</th>
                            <th>last name</th>
                            <th>email</th>
                            <th>status</th>
                            <th>Admin</th>
                            <th>User</th>
                            <th>Delete</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->first_name }}</td>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->email }}</td>
                                @if ($user->is_admin == 1)
                                    <td class="badge bg-success">Admin</td>
                                @else
                                    <td class="badge bg-danger">User</td>
                                @endif





                                <td>
                                    <form action="{{ route('users.updateStatus', ['id' => $user->id]) }}" method="POST">

                                        @csrf


                                        <button type="submit" class="btn btn-success" name="status"
                                            value="1">Admin</button>

                                    </form>
                                </td>



                                <td>
                                    <form action="{{ route('users.updateStatus', ['id' => $user->id]) }}" method="POST">

                                        @csrf


                                        <button type="submit" name="status" class="btn btn-danger"
                                            value="0">User</button>

                                    </form>
                                </td>




                                <td><button type="button" class="btn btn-link " data-bs-toggle="modal"
                                        data-bs-target="#exampleModal{{ $user->id }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>

                            </tr>


                            <div class="modal fade" id="exampleModal{{ $user->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            Are you sure you want to delete {{ $user->first_name }} {{ $user->last_name }}
                                            <div class="modal-footer">
                                                <form action="{{ route('users.delete', ['id' => $user->id]) }}"
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
