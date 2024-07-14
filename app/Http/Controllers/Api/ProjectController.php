<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Category;

class ProjectController extends Controller
{
    //
    public function index()
    {
        // $category = Category::all();
        // if ($request->query('category')) {
        //     $project = Project::where('category_id', $request->query('category'))->get();
        //     return response()->json(
        //         [
        //             'success' => true,
        //             'results' => $project
        //         ]
        //     );
        // }
        $project = Project::paginate(3);
        return response()->json(
            [
                'success' => true,
                'results' => $project
            ]
        );
    }

    public function show($slug)
    {
        $project = Project::where('slug', $slug)->with(['category', 'technologies'])->first();
        return response()->json(
            [
                'success' => true,
                'results' => $project
            ]
        );
    }
}
