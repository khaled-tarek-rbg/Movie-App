<form action="{{ route('tvs.admin.eposides.store') }}" method="POST">

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



    <div class="row m-0 w-100 ">


        <div class="col-lg-3 ps-0">
            <label class="text-white"> Eposide Number</label>
            <input type="number" name="eposide_number" class="form-control" required />
        </div>



        <div class="col-lg-3 ">
            <label class="text-white">Tv</label>
            <select wire:model="selectedTv" required name="tvs" class="form-control">
                <option value="">TVS</option>
                @foreach ($tvs as $tv)
                    <option value="{{ $tv->id }}">{{ $tv->name }}</option>
                @endforeach
            </select>

        </div>

        <div class="col-lg-3 ">
            <label class="text-white">Season</label>
            <select wire:model="selectedSeason" required name="seasons" class="form-control">
                @foreach ($seasons as $season)
                    <option value="{{ $season->id }}">{{ $season->season_number }}</option>
                @endforeach
            </select>
        </div>





    </div>




    <button class="btn btn-primary w-100 mt-2" type="submit">Add Eposide</button>



</form>
