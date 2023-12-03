@extends('layouts.backend.master')


@section('content')
    <div class="col-lg-12">
        <div class="admin-dashboard-content p-3  overflow-auto rounded" style="background-color: #262B40">
            <table class="table text-white ">


                <thead>
                    <tr>
                        <th>#</th>
                        <th>Serie_Name</th>
                        <th>Season_poster</th>
                        <th>Serie_production_year</th>
                        <th>Eposides</th>

                    </tr>
                </thead>

                <tbody>

                    <tr>
                        <td>{{ $season->season_number }}</td>


                        @if ($season->anime->getTranslation('name', 'en') == true)
                            <td>{{ $season->anime->getTranslation('name', 'en') }}</td>
                        @else
                            <td>{{ $season->anime->getTranslation('name', 'ar') }}</td>
                        @endif


                        <td><img src="{{ Storage::url($season->season_poster) }}" alt="" width="30px" height="30px">
                        </td>
                        <td>{{ $season->season_production_year }}</td>



                        <td>
                            @foreach ($season->eposides as $item)
                                <a class="text-white mx-1" style="text-decoration: underline"
                                    href="{{ route('animes.admin.eposides.show', ['id' => $item->id]) }}">


                                    {{ $item->eposide_number }}

                                </a>
                            @endforeach
                        </td>






                    </tr>


                </tbody>

            </table>
        </div>

    </div>
@endsection
