<x-layout>
    <header class="my-6">
        <div class="text-center text-2xl">
            Beheer steden
        </div>
    </header>
    <main>
        <div class="text-center">
            <button class="text-md font-bold p-2 bg-green-200 rounded mx-auto mb-6">Stad toevoegen</button>
        </div>
        @if(empty($cities))
        <div class="text-center text-2xl">Geen steden in database..</div>
        @else
        <table class="table-auto mx-auto">
            <thead>
                <tr>
                    <th>Naam</th>
                    <th>Postcode</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cities as $city )
                <x-city-row :city=$city />
                @endforeach
            </tbody>
        </table>
        @endif
    </main>
</x-layout>