<div>
    <select wire:model= "selectedAnime" name="animes" class="form-control mb-3">
        <option value="" selected disabled>choose the Anime Serie</option>

        @foreach ($animes as $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach

    </select>
    <select wire:model= "selectedEposide" name="eposides" class="form-control mb-3">
        <option value="" selected>Eposide Number</option>

        @foreach ($eposides as $item)
            <option value="{{ $item->id }}">{{ $item->eposide_number }}</option>
        @endforeach

    </select>
    <select wire:model= "selectedSeason" name="seasons" class="form-control mb-3">
        <option value="" selected>Season Number</option>

        @foreach ($seasons as $item)
            <option value="{{ $item->id }}">{{ $item->season_number }}</option>
        @endforeach

    </select>
</div>
