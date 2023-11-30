<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Location;

class LocationController extends Controller
{
    public function show(Location $location)
    {
        $jobs = Job::with('company')
            ->whereHas('location', function($query) use($location) {
                $query->whereId($location->id);
            })
            ->paginate(7);

        $banner = '地點：'.$location->name;
    
        return view('jobs.index', compact(['jobs', 'banner']));
    }
}
