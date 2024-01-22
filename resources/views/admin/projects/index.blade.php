@extends('layouts.app')
@section('content')
    <section class="container">
        <h2 class="my-2">Projects</h2>
        <!-- <p>section content</p> -->
        @foreach ($projects as $project)
            <!-- <p> <a href="{{ route('admin.projects.show', $project->id) }}">{{ $project->title }}</a></p> -->
            <table class="table">
                <tbody class="d-flex align-middle">
                    <tr class="">
                        <th scope="row" class="p-0"><a class="fw-normal text-decoration-none text-black"
                                href="{{ route('admin.projects.show', $project) }}">{{ $project->title }}</a></th>
                        <th><a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-primary">Edit</a></th>
                        <th>
                            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                                @csrf
                                @method ('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </th>
                    </tr>
                </tbody>
            </table>
        @endforeach
        {{ $projects->links('vendor.pagination.bootstrap-5') }}
        <button class=" btn btn-primary text-white"><a href="{{ route('admin.projects.create', $project) }}"
                class="text-decoration-none text-white">Create</a></button>
    </section>
@endsection
