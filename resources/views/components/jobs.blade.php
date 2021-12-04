@props(['jobs', 'favorites'])
<div class="jobs-container flex flex-wrap justify-center mx-12">
    @foreach ($jobs as $job)
    <?php
    $favorite = isset($favorites) 
        ? $favorites->where('job_id', $job->id)->first()
        : null;
    ?>
    <x-job :job=$job :favorite='$favorite' />
    @endforeach
</div>