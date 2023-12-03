@extends('layouts.backend.master')

@section('content')
    <div class="col-lg-12">
        <div class="admin-dashboard-content  rounded">
            <form action="{{ route('serieWatchServer.update', ['id' => $eposideWatchServer->id]) }}" method="POST"
                enctype="multipart/form-data">
                @method('PUT')

                @csrf
                <input type="text" name="servers" class="form-control" placeholder="Eposide Watch Server url"
                    value="{{ $eposideWatchServer->url }}">







                <button type="submit" class="btn btn-primary w-100 mt-3">Update Eposide Watch Server</button>


            </form>
        </div>

    </div>
@endsection
