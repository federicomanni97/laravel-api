<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Category;
use App\Models\Technology;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $currentUserId=Auth::user();
        $projects = Project::where('user_id', $currentUserId)->paginate(3);
        // $projects = Project::paginate(3);
        // $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all();
        $technologies = Technology::all();
        return view('admin.projects.create', compact('categories', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        //
        $formData = $request->validated();
        // creo lo slug
        $slug = Str::slug($formData['title'], '-');
        // aggiungo slug al formdata
        $formData['slug'] = $slug;
        // prendiamo l'id dell'utente che sta facendo l'operazione
        $userId = Auth::id();
        // aggiungiamo l'id dell'utente
        $formData['user_id'] = $userId;
        if ($request->hasFile('image')) {

            $img_path = Storage::put('uploads', $request->image);
            $formData['image'] = $img_path;
        }

        $project = Project::create($formData);
        if ($request->has('technologies')) {
            $project->technologies()->attach($request->technologies);
            # code...
        }
        return redirect()->route('admin.projects.show', $project->slug);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        if(Auth::id() == $project->id){
            return view('admin.projects.show', compact('project'));
        }
        abort(403);
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
        $categories = Category::all();
        $technologies = Technology::all();
        return view('admin.projects.edit', compact('project', 'categories', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $formData = $request->validated();
        // aggiungo la slug a formData
        $formData['slug'] = $project->slug;
        if ($project->title !== $formData['title']) {
            // creo la slug
            $slug = Project::getSlug($formData['title']);
            $formData['slug'] = $slug;
        }
        // add owners id to formData
        $formData['user_id'] = $project->user_id;
        if ($request->hasFile('image')){
            if ($project->image){
                Storage::delete($project->image);
            }
            $path = Storage::put('images', $request->image);
            $formData['image'] = $path;
        }
        $project->update($formData);
        if ($request->has('technologies')) {
            $project->technologies()->sync($request->technologies);
            # code...
        } else {
            $project->technologies()->detach();
        }
        // $project = Project::create($formData);
        return redirect()->route('admin.projects.show', $project->slug);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
        if ($project->image) {
            Storage::delete('$post->image');
        }
        $project->delete();
        return to_route('admin.projects.index')->with('message', 'Post $project->title Eliminato Correttamente');
    }
}
