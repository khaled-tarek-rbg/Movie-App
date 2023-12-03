@extends('layouts.backend.master')

@section('content')
    <div class="col-lg-12">
        <div class="admin-dashboard-content  rounded">
            <form action="{{ route('serieDownloadServer.update', ['id' => $eposideSownloadServer->id]) }}" method="POST"
                enctype="multipart/form-data">
                @method('PUT')

                @csrf
                <input type="text" name="servers" class="form-control" placeholder="Eposide Download Server url"
                    value="{{ $eposideSownloadServer->url }}">







                <button type="submit" class="btn btn-primary w-100 mt-3">Update Eposide Download Server</button>


            </form>
        </div>

    </div>
@endsection
