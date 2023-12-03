@extends('layouts.backend.master')


@section('content')
    <div class="col-lg-12">
        <div class="admin-dashboard-content p-3  overflow-auto rounded" style="background-color: #262B40">
            <table class="table text-white ">


                <thead>
                    <tr>
                        <th>#</th>
                        <th>Channel Country Name</th>
                        <th>types</th>


                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>

                <tbody>

                    <tr>
                        <td>{{ $channelCountry->id }}</td>







                        <td>
                            {{ $channelCountry->channel_country }}
                        </td>




                        <td>
                            @foreach ($channelCountry->ChannelTypes as $item)
                                {{ $item->name }} <br>
                            @endforeach
                        </td>





                        <td><a class="btn btn-link "
                                href="{{ route('channels.country.admin.edit', ['id' => $channelCountry->id]) }}"><i
                                    class="fas fa-edit"></i></a>
                        </td>

                        <td><button type="button" class="btn btn-link " data-bs-toggle="modal"
                                data-bs-target="#exampleModal{{ $channelCountry->id }}">
                                <i class="fas fa-trash"></i>
                            </button></td>
                    </tr>



                    <div class="modal fade" id="exampleModal{{ $channelCountry->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    Are you sure you want to delete {{ $channelCountry->channel_country }}
                                    <div class="modal-footer">
                                        <form
                                            action="{{ route('channels.country.admin.delete', ['id' => $channelCountry->id]) }}"
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
