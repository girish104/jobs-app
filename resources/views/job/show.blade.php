<x-layout>
    <x-breadcrumps class="mb-4" :links="['Jobs' => Route('jobs.index'), $job->title => '#']" />
    <x-job-card :$job>
        <p class="text-slate-500 text-sm mb-4">{!! nl2br(e($job->description)) !!}</p>
    </x-job-card>
    <x-card class="mb-4">
        <h2 class="mb-4 text-lg font-medium">
            More {{ $job->employer->company_name }} jobs
        </h2>

        <div class="text-sm text-slate-500">
            @foreach ($job->employer->jobs as $otherjob)
                <div class="flex justify-between mb-4">
                    <div>
                        <div class="text-slate-700">
                            <a href="{{ route('jobs.show', $otherjob) }}">{{ $otherjob->title }}</a>
                        </div>
                        <div class="xs">
                            {{ $otherjob->created_at->diffForHumans() }}
                        </div>
                        <div>

                        </div>
                    </div>
                    <div>
                        <div class="text-xs">${{ number_format($otherjob->salary) }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </x-card>
</x-layout>
