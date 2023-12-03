@extends('layouts.backend.master')

@section('content')
    <div class="col-lg-12">
        <div class="admin-dashboard-content  rounded">

            <form action="{{ route('channels.types.admin.update', ['id' => $channelType->id]) }}" method="POST"
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
                <label class="text-white " for="">channel_type_name</label>
                <input type="text" name="name" class="form-control " placeholder="Channel name"
                    value="{{ $channelType->name }}">

                <label class="text-white " for="">channel_country_name</label>

                <select name="countries" id="" class="form-control">
                    <option value="{{ $channelType->channel_country_id }}" selected>
                        {{ $channelType->channelCountry->channel_country }}</option>

                    @foreach ($channelsCountries as $item)
                        <option value="{{ $item->id }}">

                            {{ $item->channel_country }}

                        </option>
                    @endforeach
                </select>









                <button type="submit" class="btn btn-primary w-100 mt-3">update Channel Type</button>


            </form>
        </div>

    </div>
@endsection
