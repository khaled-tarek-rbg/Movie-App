@extends('layouts.backend.master')

@section('content')
    <div class="col-lg-12">
        <div class="admin-dashboard-content  rounded">
            <form action="{{ route('subtypes.update', ['id' => $subType->id]) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')

                @csrf
                <input type="text" name="subtype" class="form-control" value="{{ $subType->name }}">







                <button type="submit" class="btn btn-primary w-100 mt-3">Update SubType</button>


            </form>
        </div>

    </div>
@endsection
