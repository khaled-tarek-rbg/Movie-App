<form action="{{ route('eposide.update', ['id' => $eposide->id]) }}" method="POST">

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

    <div class="row m-0 w-100 ">


        <div class="col-lg-4 ">
            <label class="text-white"> Eposide Number</label>
            <input type="number" name="eposide_number" class="form-control" required
                value="{{ $eposide->serie_number }}" />
        </div>



        <div class="col-lg-4">
            <label class="text-white">Serie</label>
            <select wire:model="searchItem" required name="series" class="form-control">



                @foreach ($series as $serie)
                    <option value="{{ $serie->id }}">{{ $serie->name }}</option>
                @endforeach
            </select>


        </div>

        <div class="col-lg-4 ">
            <label class="text-white">Season</label>
            <select wire:model="seasonItem" required name="seasons" class="form-control">

                @foreach ($seasons as $season)
                    <option value="{{ $season->id }}">{{ $season->season_number }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-lg-4">
            <label class="text-white"> Eposide Rate</label>
            <input type="text" value="{{ $eposide->eposide_rate }}" name="eposide_rate" class="form-control"
                required />
        </div>


        <div class="all-servers d-flex w-100   justify-content-between  align-items-center" style="padding: 10px 120px">
            <a href="{{ route('serie.watch.show', ['id' => $eposide->id]) }}"
                class=" text-decoration-none m-0 text-white">eposide watch servers
                <i class="icon-animation fas fa-arrow-circle-right ms-2"></i>
            </a>


            <a href="{{ route('serie.download.show', ['id' => $eposide->id]) }}"
                class=" text-decoration-none m-0 text-white">eposide download servers
                <i class="icon-animation fas fa-arrow-circle-right ms-2"></i>

            </a>


        </div>








    </div>

    <button class="btn btn-primary w-100 mt-2" type="submit">update Eposide</button>
</form>
