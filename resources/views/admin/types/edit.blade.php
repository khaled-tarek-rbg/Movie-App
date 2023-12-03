@extends('layouts.backend.master');

@section('content')
    <form action="{{ route('types.update', ['id' => $type->id]) }}" method="POST">
        @csrf


        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif



        @method('PUT')

        <input type="text" name="name" class="form-control" value="{{ $type->name }}">


        <div class="all-subtypes d-flex w-100  " style="padding: 10px">
            <a href=" {{ route('subtypes.show', ['id' => $type->id]) }}" class=" text-decoration-none m-0 text-white">Show
                SubTypes
                <i class="icon-animation fas fa-arrow-circle-right ms-2"></i>
            </a>



        </div>


        <button type="submit" class="btn btn-primary w-100 mt-3">update type</button>


    </form>
@endsection
