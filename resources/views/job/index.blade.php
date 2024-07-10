<x-layout>
    <x-breadcrumps class="mb-4" :links="['Jobs' => Route('jobs.index')]" />
    <x-card class="mb-4 text-sm">
        <form action="{{ route('jobs.index') }}" method="GET">

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <div class="mb-1 font-semibold">Search</div>
                    <x-text-input type="text" name="search" placeholder="Search For Any Job"
                        value="{{ request('search') }}" />
                </div>

                <div>
                    <div class="mb-1 font-semibold">Salary</div>
                    <div class="flex space-x-2">
                        <x-text-input type="text" name="min_salary" placeholder="From"
                            value="{{ request('min_salary') }}" />
                        <x-text-input type="text" name="max_salary" placeholder="TO"
                            value="{{ request('max_salary') }}" />
                    </div>
                </div>
                <div>
                    <div class="mb-1 font-semibold">Experience</div>
                    <label for="experience" class="mb-1 flex items-center">
                        <input type="radio" value="" name="experience" @checked(!request('experience')) />
                        <span class="ml-2">All</span>
                    </label>
                    <label for="experience" class="mb-1 flex items-center">
                        <input type="radio" value="entry" name="experience" @checked('entry' === request('experience')) />
                        <span class="ml-2">Entry</span>
                    </label>
                    <label for="experience" class="mb-1 flex items-center">
                        <input type="radio" value="intermediate" name="experience" @checked('intermediate' === request('experience')) />
                        <span class="ml-2">Intermediate</span>
                    </label>
                    <label for="experience" class="mb-1 flex items-center">
                        <input type="radio" value="senior" name="experience" @checked('senior' === request('experience')) />
                        <span class="ml-2">Senior</span>
                    </label>
                </div>
                <div>1</div>
            </div>
            <button
                class="w-full mt-4 border border-slate-200 shadow-sm hover:bg-slate-50 text-black p-2 font-semibold rounded-md">Filter</button>
        </form>
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
