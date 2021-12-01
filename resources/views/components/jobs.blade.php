@props(['jobs', 'favorites'])
<div class="jobs-container border-2 border-gray-200 rounded-lg max-w-prose mx-auto">
    @foreach ($jobs as $job)
    <?php
    $favorite = isset($favorites) 
        ? $favorites->where('job_id', $job->id)->first()
        : null;
    ?>
    <x-job :job=$job :favorite='$favorite' />
    @endforeach
</div>