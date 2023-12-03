<div class="row">

    <div class="col-lg-6">
        <select wire:model = "selectedCountry" name="countries" id="" class="form-control my-2">
            <option value="" disabled selected>choose channel country</option>
            @foreach ($channelsCountries as $item)
                <option value="{{ $item->id }}">

                    {{ $item->channel_country }}

                </option>
            @endforeach
        </select>
    </div>
    <div class="col-lg-6">
        <select wire:model = "selectedType" name="types" id="" class="form-control my-2">
            {{-- <option value="" disabled selected>choose channel ty</option> --}}
            @foreach ($channelsTypes as $item)
                <option value="{{ $item->id }}">

                    {{ $item->name }}

                </option>
            @endforeach
        </select>
    </div>


</div>
