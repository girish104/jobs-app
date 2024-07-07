<x-card class="mb-4">
    <div class="flex justify-between mb-4">
        <h2 class="text-lg font-medium">{{ $job->title }}</h2>
        <div class="text-slate-500">${{ number_format($job->salary) }}</div>
    </div>
    <div class="flex justify-between mb-4 text-sm text-slate-500 items-center">
        <div class="flex space-x-4">
            <div>Company Name</div>
            <div>{{ $job->location }}</div>
        </div>
        <div class="flex space-x-1">
            <x-tag>{{ ucfirst($job->experience) }}</x-tag>
            <x-tag>{{ $job->category }}</x-tag>
        </div>
    </div>
    <p class="text-slate-500 text-sm mb-4">{!! nl2br(e($job->description)) !!}</p>
    {{ $slot }}
</x-card>
