@extends('layouts.backend.master')

@section('content')
    <div class="col-lg-12">
        <div class="admin-dashboard-content  rounded">

            @livewire('tv-eposide-edit-form', [$eposide])
        </div>

    </div>
@endsection
