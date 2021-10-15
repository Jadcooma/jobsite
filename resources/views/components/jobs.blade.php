@props(['jobs'])
<div class="border-2 border-gray-200 rounded-lg max-w-prose mx-auto">
    @foreach ($jobs as $job )
        <x-job :job=$job/>
    @endforeach
</div>