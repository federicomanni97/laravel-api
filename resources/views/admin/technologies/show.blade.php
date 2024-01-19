@extends('layouts.app')
@section('content')
    <section class="container">
        <h1>{{$technology->name}}</h1>
         <ul>
            @foreach($technology->projects as $project)
                <li>{{$project->title}}</li>
            @endforeach
         </ul>
    </section>
@endsection