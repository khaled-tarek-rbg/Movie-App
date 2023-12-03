@extends('layouts.backend.master')

@section('content')
    <div class="col-lg-12">
        <div class="admin-dashboard-content p-3   rounded" style="background-color: #262B40">
            <table class="table text-white">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>poster</th>
                        <th>Channel Country</th>
                        <th>Channel Type</th>
                        @if (count($channel->channelServers) > 0)
                            <th>Channel Servers</th>
                            <th>Edit Channel Servers</th>
                            <th>Delete ChannelServers</th>
                        @endif
                    </tr>
                </thead>

                <tbody>

                    <tr>
                        <td>{{ $channel->id }}</td>
                        <td>{{ $channel->name }}</td>
                        <td>
                            <img src="{{ Storage::url($channel->poster) }}" alt="" width="100px">
                        </td>
                        <td>{{ $channel->channelCountry->channel_country }}</td>
                        <td>{{ $channel->channelType->name }}</td>

                        @if (count($channel->channelServers) > 0)
                            <td>
                                @foreach ($channel->channelServers as $item)
                                    <a href="{{ $item->url }}">{{ $item->url }}</a>
                                @endforeach
                            </td>

                            <td>
                                @foreach ($channel->channelServers as $item)
                                    <a class="btn btn-link "
                                        href="{{ route('channels.servers.admin.edit', ['id' => $item->id]) }}"><i
                                            class="fas fa-edit"></i>
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($channel->channelServers as $item)
                                    <button type="button" class="btn btn-link " data-bs-toggle="modal"
                                        data-bs-target="#exampleModal{{ $item->id }}">
                                        <i class="fas fa-trash"></i>
                                    </button>



                                    <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    Are you sure you want to delete {{ $item->Channel->name }}
                                                    {{ $item->url }} server
                                                    <div class="modal-footer">
                                                        <form
                                                            action="{{ route('channels.servers.admin.delete', ['id' => $item->id]) }}"
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
                        @endif




                    </tr>




                </tbody>

            </table>
        </div>

    </div>
@endsection
