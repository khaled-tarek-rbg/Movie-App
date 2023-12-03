@extends('layouts.backend.master')

@section('content')
    <div class="col-lg-12">
        <div class="admin-dashboard-content  rounded">
            <form action="{{ route('downloadServer.update', ['id' => $server->id]) }}" method="POST"
                enctype="multipart/form-data">
                @method('PUT')

                @csrf
                <input type="text" name="servers" class="form-control" placeholder="server url" value="{{ $server->url }}">





                <button type="submit" class="btn btn-primary w-100 mt-3">Update Movie Download Server</button>


            </form>
        </div>

    </div>
@endsection
