@props(['job', 'favorite'])
<article class="border-b-2 border-gray-300 mx-auto px-3 py-3">
    <div><strong>Functie</strong> {{ $job->function }} </div>
    <div><strong>Omschrijving</strong><br> {{ $job->description }} </div>
    <div><strong>Sector</strong> <br> {{ $job->company->sector }} </div>
    <div><strong>Bedrijf</strong> <br> {{ $job->company->name }} </div>
    <div><strong>Locatie</strong> <br> {{ $job->city->code }} {{ $job->city->name }} </div>

    @if( auth()->user() )
    <button 
        class="p-2 mt-2 bg-grey-200 border-2 border-black border-solid rounded"
        data-favorite-id="{{ isset($favorite) ? $favorite->id : '' }}"
        data-job-id="{{ $job->id }}"
        data-mode="{{ isset($favorite) ? 'Delete' : 'Create' }}"
    >
        @if($favorite)
        &#10060
        @else
        &#11088
        @endif
    </button>
    @endif
</article>