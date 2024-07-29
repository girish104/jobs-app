<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Requests\JobRequest;

class MyJobController extends Controller
{
    use \Illuminate\Foundation\Auth\Access\AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAnyEmployer');
        return view('my_job.index', [
            'jobs' => auth()->user()->employer
                ->jobs()
                ->with(['employer', 'jobApplications', 'jobApplications.user'])
                ->get()
        ]);
    }

    public function create()
    {
        return view('my_job.create');
    }

    public function store(JobRequest $request)
    {
        auth()->user()->employer->jobs()->create($request->validated());

        return redirect()->route('my-jobs.index')
            ->with('success', 'Job created successfully.');
    }

    public function edit(Job $myJob)
    {
        return view('my_job.edit', ['job' => $myJob]);
    }


    public function update(JobRequest $request, Job $myJob)
    {
        $myJob->update($request->validated());

        return redirect()->route('my-jobs.index')
            ->with('success', 'Job updated successfully.');
    }

    public function destroy(Job $myJob)
    {
        $myJob->delete();

        return redirect()->route('my-jobs.index')
            ->with('success', 'Job deleted.');
    }
}
