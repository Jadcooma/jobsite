<x-layout>
    <header class="my-6">
        <div class="text-center text-2xl">
            Beheer bedrijven
        </div>
    </header>
    <main>
        <div class="text-center">
            <button class="text-md font-bold p-2 bg-green-200 rounded mx-auto mb-6">
                <a href="/admin/companies/create">Bedrijf toevoegen</a>
            </button>
        </div>
        @if(empty($companies))
        <div class="text-center text-2xl">Geen bedrijven in database gevonden..</div>
        @else
        <table class="table-auto mx-auto">
            <thead>
                <tr>
                    <th>Naam</th>
                    <th>Sector</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($companies as $company )
                <x-company-row :company=$company />
                @endforeach
            </tbody>
        </table>
        @endif
    </main>
</x-layout>