<div class="col-lg-5">
    <div class="row">
        <div class="col-lg-5">
            <label class="text-white mt-2" for="">Type</label>
            <select wire:model = "selectedType" required name="type" class="form-control ">
                <option disabled selected value="">type</option>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-lg-5">
            <label class="text-white mt-2" for="">SubType</label>
            <select wire:model = "selectedSubType" required name="subType" id="subtype" class="form-control ">
                @foreach ($subTypes as $subType)
                    <option value="{{ $subType->id }}">{{ $subType->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

</div>
