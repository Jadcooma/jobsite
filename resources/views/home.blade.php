<x-layout>
    <header class="my-6">
        <div class="text-center text-xl">
            Vind hier uw volgende droomjob!
        </div>
    </header>
    <main class="mt-6">
        @if (session()->has('success'))
        <div class="text-center font-bold text-green-500 mx-auto mb-2">
            {{ session('success')}}
        </div>
        @endif
        @if(isset($hello))
        <div class="text-center font-bold text-red-500 mx-auto mb-2">
            {{ $hello }}
        </div>
        @endif
        <x-jobs :jobs="$jobs" />
    </main>
</x-layout>