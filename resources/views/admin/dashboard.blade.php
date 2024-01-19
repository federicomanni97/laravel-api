@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="bghome d-flex flex-column align-items-center justify-content-center">
            <h1 class="colortitle fw-bold text-uppercase">Projects</h1>
            <a class="fs-1 btn text-white text-uppercase text-decoration-underline " href="{{route('admin.projects.index')}}">Watch your Projects</a>
        </div>
    </div>
@endsection
