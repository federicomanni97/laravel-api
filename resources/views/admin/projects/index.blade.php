@extends('layouts.app')
@section('content')
    <section class="container">
        <h2 class="my-2 p-2">Projects</h2>
        <!-- <p>section content</p> -->
        @foreach ($projects as $project)
        <!-- <p> <a href="{{route('admin.projects.show', $project->id)}}">{{$project->title}}</a></p> -->
        <table class="table">
        <tbody class="d-flex align-middle">
            <tr>
                <th scope="row"><a class="fw-normal text-decoration-none text-black" href="{{route('admin.projects.show', $project)}}">{{$project->title}}</a></th>
                <th><a href="{{route('admin.projects.edit' , $project)}}" class="btn btn-primary">Edit</a></th>
                <th>
                    <form action="{{route('admin.projects.destroy' , $project)}}" method="POST">
                    @csrf
                    @method ('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </th>
            </tr>
        </tbody>
        </table>
        {{ $projects->links() }}
        @endforeach
        <form class="p-2" action="{{route('admin.projects.create', $project)}}">
            <button class=" btn btn-primary" >Create</button>
        </form>
    </section>
@endsection
