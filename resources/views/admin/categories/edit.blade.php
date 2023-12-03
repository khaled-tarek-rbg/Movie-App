@extends('layouts.backend.master');

@section('content')
    <form action="{{ route('categories.update', ['id' => $category->id]) }}" method="POST">
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

        @method('PUT')

        <input type="text" name="name" class="form-control" value="{{ $category->name }}">

        <button type="submit" class="btn btn-primary w-100 mt-3">update Category</button>


    </form>
@endsection
