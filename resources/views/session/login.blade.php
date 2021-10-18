<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-6">
            <x-panel>
                <h1 class="text-center font-bold text-xl">Aanmelden</h1>

                <form method="POST" action="/session/login" class="mt-10">
                    @csrf
                    <div class="grid gap-2 grid-cols-2">
                        <label for="username">Gebruikersnaam: </label>
                        <input class="px-1" name="username" required value="{{ old('username') }}" />

                        <label for="password">Wachtwoord: </label>
                        <input class="px-1" name="password" type="password" required />
                    </div>

                    @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $message )
                        <li class="text-red-500 text-xs mt-2">{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif

                    <button class="p-2 mt-2 font-bold bg-grey-200 border-2 border-black border-solid rounded-sm" type="submit">Aanmelden</button>
                </form>
            </x-panel>
        </main>
    </section>
</x-layout>