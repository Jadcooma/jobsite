<x-layout>
    <section class="px-6 py-6">
        <main class="max-w-lg mx-auto">
            <x-panel>
                <h1 class="text-center font-bold text-xl">Bedrijf aanpassen</h1>

                <form method="POST" action="/admin/company/update/{{ $company->id }}" class="mt-10">
                    @csrf
                    @method('PUT')
                    
                    <div class="grid gap-2 grid-cols-2">

                        <label for="name">Naam: </label>
                        <input class="px-1" name="name" required value="{{ $company->name }}" />

                        <label for="sector">Sector: </label>
                        @include('company.sector-dropdown')
                        
                    </div>

                    @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $message )
                        <li class="text-red-500 text-xs mt-2">{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif

                    <button class="p-2 mt-2 font-bold bg-grey-200 border-2 border-black border-solid rounded" type="submit">Wijzigen</button>
                </form>
            </x-panel>
        </main>
    </section>
</x-layout>