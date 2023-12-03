<div class="col-lg-6">
    <div class="row">
        <div class="col-lg-6">
            <label for="" class="mt-2">Type</label>
            <select wire:model = "selectedType" required name="type" class="form-control">
                <option disabled selected value="">type</option>

                @foreach ($types as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach

            </select>
        </div>
        <div class="col-lg-6">
            <label for="" class="mt-2">SubType</label>
            <select wire:model = "selectedSubType" required name="subtype" class="form-control">

                @foreach ($subtypes as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach

            </select>
        </div>

    </div>
</div>
