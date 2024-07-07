<x-layout>
    <x-breadcrumps class="mb-4" :links="['Jobs' => Route('jobs.index'), $job->title => '#']" />
    <x-job-card :$job />
</x-layout>
