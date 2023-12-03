<form action="{{ route('animes.admin.eposides.update', ['id' => $eposide->id]) }}" method="POST">

    @csrf
    @method('PUT')



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
            <input type="number" name="eposide_number" class="form-control" value="{{ $eposide->eposide_number }}"
                required />
        </div>



        <div class="col-lg-3 ">
            <label class="text-white">Anime</label>
            <select wire:model="selectedAnime" required name="animes" class="form-control">


                @foreach ($animes as $anime)
                    <option value="{{ $anime->id }}">{{ $anime->name }}</option>
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


        <div class="col-lg-3 pe-0">
            <label class="text-white"> Eposide Rate</label>
            <input type="text" value="{{ $eposide->rate }}" name="rate" class="form-control" required />
        </div>





        <div class="all-servers d-flex w-100   justify-content-between  align-items-center" style="padding: 10px 120px">
            <a href="{{ route('eposides.servers.show.animes', ['id' => $eposide->id]) }}"
                class=" text-decoration-none m-0 text-white">Anime Eposide watch servers
                <i class="icon-animation fas fa-arrow-circle-right ms-2"></i>
            </a>


            <a href="{{ route('eposides.downloadservers.show.animes', ['id' => $eposide->id]) }}"
                class=" text-decoration-none m-0 text-white">Anime Eposide download servers
                <i class="icon-animation fas fa-arrow-circle-right ms-2"></i>

            </a>


        </div>








    </div>




    <button class="btn btn-primary w-100 mt-2" type="submit">update Eposide</button>



</form>
