@extends('layouts.backend.master')

@section('content')
    <div class="col-lg-12">
        <div class="admin-dashboard-content  rounded">

            <form action="{{ route('channels.country.admin.update', ['id' => $channelCountry->id]) }}" method="POST"
                enctype="multipart/form-data">

                @csrf
                @method('PUT')
                @if (session()->has('message'))
                    <div class="alert alert-danger">{{ session()->get('message') }}</div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <label class="text-white " for="">channel_country</label>
                <input type="text" name="name" class="form-control " placeholder="Channel country"
                    value="{{ $channelCountry->channel_country }}">




                <button type="submit" class="btn btn-primary w-100 mt-3">update Channel Country</button>


            </form>
        </div>

    </div>
@endsection
