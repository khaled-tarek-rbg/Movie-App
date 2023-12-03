<form action="{{ route('tvs.admin.eposides.update', ['id' => $element->id]) }}" method="POST">

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


        <div class="col-lg-4 ps-0">
            <label class="text-white"> Eposide Number</label>
            <input type="number" name="eposide_number" class="form-control" required
                value="{{ $element->serie_number }}" />
        </div>



        <div class="col-lg-4 pe-0">
            <label class="text-white">Tv Show</label>
            <select wire:model="selectedTv" required name="tvs" class="form-control">



                @foreach ($tvs as $tv)
                    <option value="{{ $tv->id }}">{{ $tv->name }}</option>
                @endforeach
            </select>


        </div>

        <div class="col-lg-4 pe-0">
            <label class="text-white">Season</label>
            <select wire:model="selectedSeason" required name="seasons" class="form-control">

                @foreach ($seasons as $season)
                    <option value="{{ $season->id }}">{{ $season->season_number }}</option>
                @endforeach
            </select>
        </div>

        <div class="all-servers d-flex w-100   justify-content-between  align-items-center" style="padding: 10px 120px">
            <a href="{{ route('tv.watch.show', ['id' => $element->id]) }}"
                class=" text-decoration-none m-0 text-white">eposide watch servers
                <i class="icon-animation fas fa-arrow-circle-right ms-2"></i>
            </a>


            <a href="{{ route('tv.download.show', ['id' => $element->id]) }}"
                class=" text-decoration-none m-0 text-white">eposide download servers
                <i class="icon-animation fas fa-arrow-circle-right ms-2"></i>

            </a>


        </div>










    </div>

    <button class="btn btn-primary w-100 mt-2" type="submit">update Eposide</button>
</form>
