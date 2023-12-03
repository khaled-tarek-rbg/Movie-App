<div class="col-lg-12">
    <div class="row">
        <div class="col-lg-4">
            <select wire:model = "selectedSerie" name="serie" class="form-control mb-3">
                <option value="" selected disabled>choose the Serie</option>

                @foreach ($series as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach

            </select>
        </div>
        <div class="col-lg-4">
            <select wire:model = "selectedsubseries" name="eposide" class="form-control mb-3">


                @foreach ($subseries as $item)
                    <option value="{{ $item->id }}">{{ $item->serie_number }}</option>
                @endforeach

            </select>
        </div>

        <div class="col-lg-4">
            <select wire:model = "selectedSeason" name="season" class="form-control mb-3">


                @foreach ($seasons as $item)
                    <option value="{{ $item->id }}">{{ $item->season_number }}</option>
                @endforeach

            </select>
        </div>
    </div>
</div>
