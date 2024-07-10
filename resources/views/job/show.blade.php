<x-layout>
    <x-breadcrumps class="mb-4" :links="['Jobs' => Route('jobs.index'), $job->title => '#']" />
    <x-job-card :$job>
        <p class="text-slate-500 text-sm mb-4">{!! nl2br(e($job->description)) !!}</p>
    </x-job-card>
</x-layout>
