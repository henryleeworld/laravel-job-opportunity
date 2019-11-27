<?php

namespace App\Http\Controllers;

use App\Category;
use App\Job;
use App\Location;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('company')
            ->paginate(7);

        $banner = '職務';

        return view('jobs.index', compact(['jobs', 'banner']));
    }

    public function show(Job $job)
    {
        $job->load('company');

        return view('jobs.show', compact('job'));
    }
}
