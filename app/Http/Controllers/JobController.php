<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{

    public function index()
    {
        $jobs = Job::query();

        $jobs->when(request('search'), function ($query) {
            $query->where(function ($query) {
                $query->where('title', 'LIKE', '%' . request('search') . '%')
                    ->orWhere('description', 'LIKE', '%' . request('search') . '%');
            });
        })->when(request('min_salary'), function ($query) {
            $query->where('salary', '>=', request('min_salary'));
        })->when(request('max_salary'), function ($query) {
            $query->where('salary', '<=', request('max_salary'));
        })->when(request('experience'), function ($query) {
            $query->where('experience', request('experience'));
        });

        // Use paginate instead of get
        $jobs = $jobs->simplePaginate(10); // 10 items per page

        return view('job.index', ['jobs' => $jobs]);
    }



    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        return view('job.show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
