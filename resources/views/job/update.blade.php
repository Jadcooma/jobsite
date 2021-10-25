<x-layout>
    <section class="px-6 py-6">
        <main class="max-w-lg mx-auto">
            <x-panel>
                <h1 class="text-center font-bold text-xl">Nieuwe job</h1>

                <form method="POST" action="/admin/job/update/{{ $job->id }}" class="mt-10">
                    @csrf
                    @method('PUT')
                    <div class="grid gap-2 grid-cols-2">
                        <label for="function">Functie: </label>
                        <input class="px-1" name="function" required value="{{ $job->function }}" />

                        <label for="description">Beschrijving: </label>
                        <textarea class="px-1" name="description" required value="{{ $job->function }}" placeholder="Geef hier een beschrijving van de job.">{{ $job->description }}</textarea>

                        <label for="company_id">Bedrijf: </label>
                        <select name="company_id">
                            @foreach ($companies as $company)
                            <option 
                                value="{{ $company->id }}" 
                                {{ ( $company->id == $job->company_id ) ? 'selected' : '' }}
                            >
                                {{ $company->name .' ('. $company->sector .')' }}
                            </option>
                            @endforeach
                        </select>

                        <label for="city_id">Stad: </label>
                        <select name="city_id">
                            @foreach ($cities as $city)
                            <option 
                                value="{{ $city->id }}"
                                {{ ( $city->id == $job->city_id ) ? 'selected' : '' }}
                            >
                                {{ $city->name }}
                            </option>
                            @endforeach
                        </select>

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