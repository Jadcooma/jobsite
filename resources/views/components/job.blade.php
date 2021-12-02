@props(['job', 'favorite'])
<article class="shadow border-2 border-gray-300 px-2 py-2 md:w-1/3">
    <div class="flex justify-around text-l md:text-xl">
        <div>{{ $job->function }}</div>
        @if( auth()->user() )
        <button class="bg-grey-200 border-2 border-black border-solid rounded text-center text-sm w-6" data-favorite-id="{{ isset($favorite) ? $favorite->id : '' }}" data-job-id="{{ $job->id }}" data-mode="{{ isset($favorite) ? 'Delete' : 'Create' }}">
            @if($favorite)
            &#10060
            @else
            &#11088
            @endif
        </button>
        @endif
    </div>
    <div class="flex flex-row justify-evenly text-center mt-2">
        <div>
            <h3 class="font-bold">Bedrijf</h3>
            <div> {{ $job->company->name }} </div>
        </div>
        <div>
            <h3 class="font-bold">Sector</h3>
            <div> {{ $job->company->sector }} </div>
        </div>
        <div>
            <h3 class="font-bold">Locatie</h3>
            <div> {{ $job->city->code }} {{ $job->city->name }} </div>
        </div>
    </div>
    <div class="text-center text-xs pt-2"> {{ $job->description }} </div>

</article>