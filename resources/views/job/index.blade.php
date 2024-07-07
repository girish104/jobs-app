<x-layout>
    <x-breadcrumps class="mb-4" :links="['Jobs' => Route('jobs.index')]" />
    <x-card class="mb-4 text-sm">
        <div class="grid grid-cols-2 gap-4">
            <div>
                <div class="mb-1 font-semibold">Search</div>
                <x-text-input type="text" name="search" placeholder="Search For Any Job" value="" />
            </div>

            <div>
                <div class="mb-1 font-semibold">Salary</div>
                <div class="flex space-x-2">
                    <x-text-input type="text" name="min_salary" placeholder="From" value="" />
                    <x-text-input type="text" name="max_salary" placeholder="TO" value="" />
                </div>
            </div>
            <div>1</div>
            <div>1</div>
        </div>
    </x-card>
    @foreach ($jobs as $job)
        <x-job-card class="mb-4" :$job>
            <div>
                <x-link-button :href="route('jobs.show', $job)">Show</x-link-button>
            </div>
        </x-job-card>
    @endforeach
    <div class="mb-4">
        {{ $jobs->links() }}
    </div>
</x-layout>
