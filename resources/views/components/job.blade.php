@props(['job'])
<article class="border-b-2 border-gray-300 mx-auto px-3 py-3">
        <div><strong>Functie</strong> {{ $job->function }} </div>
        <div><strong>Omschrijving</strong>><br> {{ $job->description }} </div>
        <div><strong>Sector</strong> <br> {{ $job->company->sector }} </div>
        <div><strong>Bedrijf</strong> <br> {{ $job->company->name }} </div>
        <div><strong>Locatie</strong> <br> {{ $job->city->code }} {{ $job->city->name }} </div>
</article>