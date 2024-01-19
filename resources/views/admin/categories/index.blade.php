@extends('layouts.app')
@section('content')
    <section class="container">
        <h2 class="my-2 p-2">Projects</h2>
        <!-- <p>section content</p> -->
        @foreach ($categories as $category)
        <table class="table">
        <tbody class="d-flex align-middle">
            <tr>
                <th scope="row"><a class="fw-normal text-decoration-none text-black" href="{{route('admin.categories.show', $category->id)}}">{{$category->name}}</a></th>
                <th><a href="{{route('admin.categories.edit' , $category->slug)}}" class="btn btn-primary">Edit</a></th>
                <th>
                    <form action="{{route('admin.categories.destroy' , $category)}}" method="POST">
                    @csrf
                    @method ('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </th>
            </tr>
        </tbody>
        </table>
        @endforeach
        <form class="p-2" action="{{route('admin.categories.create', $category->id)}}">
            <button class=" btn btn-primary" >Create</button>
        </form>
    </section>
@endsection