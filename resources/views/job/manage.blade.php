<x-layout>
    <header class="my-6">
        <div class="text-center text-2xl">
            Beheer jobs
        </div>
    </header>
    <main>
        <div class="text-center">
            <button class="text-md font-bold p-2 bg-green-200 rounded mx-auto mb-6">
                <a href="/admin/job/create">Job toevoegen</a>
            </button>
        </div>

        @if (session()->has('success'))
        <div class="text-center font-bold text-green-500 mx-auto mb-2">
            {{ session('success')}}
        </div>
        @endif

        @if(empty($jobs))
        <div class="text-center text-2xl">Geen jobs in database..</div>
        @else
        <table class="table-auto mx-auto">
            <thead class="text-left">
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