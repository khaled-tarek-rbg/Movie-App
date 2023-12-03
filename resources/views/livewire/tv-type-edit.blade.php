<div class="col-lg-6">
    <div class="row">
        <div class="col-lg-6 ">
            <label class="text-white  mt-2">Tv</label>
            <select wire:model="type" required name="type" class="form-control mt-2">
                <option value="type" selected disabled>{{ $Tv->type->name }}</option>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>

        </div>

        <div class="col-lg-6">
            <label class="text-white  mt-2">Sub Types</label>
            <select wire:model="subtype" required name="subtype" class="form-control mt-2">

                @foreach ($subtypes as $subtype)
                    <option value="{{ $subtype->id }}">{{ $subtype->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

</div>
