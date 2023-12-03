<div class="col-lg-3  left-sidebar">

    <h5 class="title">All channels</h5>

    @foreach ($channels as $item)
        <button class=" mt-2 px-2 channel d-flex align-items-center ">
            <img class="me-4" src="{{ Storage::url($item->poster) }}" alt="" width="40px" height="40px"
                value={{ $item->channelServers }}>
            {{ $item->name }}
        </button>
    @endforeach





</div>
