<div class="row">

    <div class="col-lg-6">

        <select wire:model = "selectedCountry" name="countries" id="" class="form-control my-2">
            <option value="{{ $channel->channel_country_id }}" selected>{{ $channel->channelCountry->channel_country }}
            </option>
            @foreach ($channelsCountries as $item)
                <option value="{{ $item->id }}">

                    {{ $item->channel_country }}

                </option>
            @endforeach
        </select>

    </div>
    <div class="col-lg-6">

        <select wire:model = "selectedType" name="types" id="" class="form-control my-2">
            <option value="{{ $channel->channel_type_id }}" selected>
                {{ $channel->channelType->name }}
            </option>
            @foreach ($channelsTypes as $item)
                <option value="{{ $item->id }}">

                    {{ $item->name }}

                </option>
            @endforeach
        </select>
    </div>
</div>
