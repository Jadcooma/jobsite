<x-layout>
    <header class="my-6">
        <div class="text-center text-2xl">
            Beheer jobs
        </div>
    </header>
    <main>
        <div class="text-center">
            <button class="text-md font-bold p-2 bg-green-200 rounded mx-auto mb-6">Job toevoegen</button>
        </div>
        @if(empty($jobs))
        <div class="text-center text-2xl">Geen jobs in database..</div>
        @else
        <table class="table-auto mx-auto">
            <thead>
                <tr>
                    <th>Functie</th>
                    <th>Bedrijf</th>
                    <th>Stad</th>
                    <th>Acties</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jobs as $job )
                <x-job-row :job=$job />
                @endforeach
            </tbody>
        </table>
        @endif
    </main>
</x-layout>