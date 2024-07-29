<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    use \Illuminate\Foundation\Auth\Access\AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', Job::class);
        $jobs = Job::query();

        $jobs->when(request('search'), function ($query) {
            $query->where(function ($query) {
                $query->where('title', 'LIKE', '%' . request('search') . '%')
                    ->orWhere('description', 'LIKE', '%' . request('search') . '%')
                    ->orWhereHas('employer', function ($query) {
                        $query->where('company_name', 'LIKE', '%' . request('search') . '%');
                    });
            });
        })->when(request('min_salary'), function ($query) {
            $query->where('salary', '>=', request('min_salary'));
        })->when(request('max_salary'), function ($query) {
            $query->where('salary', '<=', request('max_salary'));
        })->when(request('experience'), function ($query) {
            $query->where('experience', request('experience'));
        })->when(request('category'), function ($query) {
            $query->where('category', request('category'));
        });;

        $jobs = $jobs->latest()->simplePaginate(10); // 10 items per page

        return view('job.index', ['jobs' => $jobs]);
    }

    public function show(Job $job)
    {
        $this->authorize('view', $job);
        return view(
            'job.show',
            ['job' => $job->load('employer.jobs')]
        );
    }
}
