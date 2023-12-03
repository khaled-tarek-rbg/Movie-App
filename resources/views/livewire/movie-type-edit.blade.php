<div class="row">
    <div class="col-lg-6 ">
        <label class="text-white">Tv</label>
        <select wire:model="type" required name="type" class="form-control">
            <option value="type" selected disabled>{{ $movie->type->name }}</option>
            @foreach ($types as $type)
                <option value="{{ $type->id }}">{{ $type->name }}</option>
            @endforeach
        </select>

    </div>

    <div class="col-lg-6 ">
        <label class="text-white">Sub Types</label>
        <select wire:model="subtype" required name="subtype" class="form-control">

            @foreach ($subtypes as $subtype)
                <option value="{{ $subtype->id }}">{{ $subtype->name }}</option>
            @endforeach
        </select>
    </div>
</div>
