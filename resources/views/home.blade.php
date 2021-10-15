<x-layout>
    @include('jobs_header')
    <main class="mt-10">
        <x-jobs :jobs="$jobs"/>
    </main>
</x-layout>