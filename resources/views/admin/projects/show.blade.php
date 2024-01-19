@extends('layouts.app')
@section('content')
    <section class="container">
        <h1>{{$project->title}}</h1>
        <span>{{$project->category ? $project->category->name : 'Uncategorized'}}</span>
        <div>
            <img src="{{asset('storage/' . $project->image)}}" alt="{{$project->title}}">
        </div>
        <p>{{$project->body}}</p>
        <button class="btn btn-primary mb-3"><a href="{{route('admin.projects.edit', $project)}}" class="text-white text-decoration-none">Edit</a></button>
        @if($project->technologies)
        <div class="mb-3">
            @foreach($project->technologies as $technology)
                <a href="{{route('admin.technologies.show', $technology->slug)}}" class="badge fs-6 text-bg-primary">{{$technology->name}}</a>
            @endforeach
        </div>
        @endif
    </section>
@endsection
