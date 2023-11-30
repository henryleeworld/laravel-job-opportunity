<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Job;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $jobs = Job::with('company')
            ->whereHas('categories', function($query) use($category) {
                $query->whereId($category->id);
            })
            ->paginate(7);

        $banner = '類別：'.$category->name;
    
        return view('jobs.index', compact(['jobs', 'banner']));
    }
}
