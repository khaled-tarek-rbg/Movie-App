@extends('layouts.backend.master')

@section('content')
    <div class="col-lg-12">
        <div class="admin-dashboard-content  rounded">
            <form action="{{ route('channels.servers.admin.update', ['id' => $server->id]) }}" method="POST"
                enctype="multipart/form-data">
                @method('PUT')

                @csrf
                <input type="text" name="url" class="form-control" placeholder="Channel  Server url"
                    value="{{ $server->url }}">







                <button type="submit" class="btn btn-primary w-100 mt-3">Update Channel Server</button>


            </form>
        </div>

    </div>
@endsection
