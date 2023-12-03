@extends('layouts.backend.master')

@section('content')
    <div class="col-lg-12">
        <div class="admin-dashboard-content  rounded">

            <form action="{{ route('channels.admin.store') }}" method="POST" enctype="multipart/form-data">

                @csrf
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
                <label class="text-white " for="">channel_name</label>
                <input type="text" name="name" class="form-control " placeholder="Channel name" required>


                @livewire('channel-country-type')



                <label class="text-white mt-2" for="">channel_poster <span style="margin-left: 10px">(jpg
                        , png ,
                        jpeg)</span></label>

                <input type="file" name="poster" class="form-control" required accept="image/*" />










                <button type="submit" class="btn btn-primary w-100 mt-3">Add Channel</button>


            </form>
        </div>

    </div>
@endsection
