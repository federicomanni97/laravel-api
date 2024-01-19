@extends('layouts.app')
@section('content')
    <section class="container">
        <h2 class="my-2 p-2">Technologies</h2>
        <!-- <p>section content</p> -->
        @foreach ($technologies as $technology)
        <table class="table">
        <tbody class="d-flex align-middle">
            <tr>
                <th scope="row"><a class="fw-normal text-decoration-none text-black" href="{{route('admin.technologies.show', $technology->id)}}">{{$technology->name}}</a></th>
                <th><a href="{{route('admin.technologies.edit' , $technology->slug)}}" class="btn btn-primary">Edit</a></th>
                <th>
                    <form action="{{route('admin.technologies.destroy' , $technology)}}" method="POST">
                    @csrf
                    @method ('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </th>
            </tr>
        </tbody>
        </table>
        @endforeach
    </section>
@endsection