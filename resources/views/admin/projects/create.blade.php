@extends('layouts.app')
@section('content')
<section class="container">
    <h2 class="text-primary mt-3">Post Creator</h2>
    <form action="{{route('admin.projects.store')}}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="my-2">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title"
                required maxlength="200" minlength="3" value="{{old('title')}}">
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="category_id">Select Category</label>
            <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
                <option value="">Select a category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
       </div>
        <div class="mb-3">
            <label for="body" class="my-2">Body</label>
            <textarea type="text" class="form-control @error('title') is-invalid @enderror" name="body" id="body"
                required maxlength="200" minlength="3" value="{{old('body')}}"></textarea>
            @error('body')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <div class="form-group">
                <h6>Select Tags</h6>
                @foreach ($technologies as $technology)
                    <div class="form-check @error('technologies') is invalid @enderror">
                        <input type="checkbox" class="form-check-input" name="technologies[]" value="{{$technology->id}}" {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }}>
                        <label for="" class="form-check-label">
                            {{$technology->name}}
                        </label>
                    </div>
                @endforeach
            </div>
            @error('technology_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <img class="w-25" id="uploadPreview" src="https://via.placeholder.com/300x200" alt="PlaceHolder">
        </div>
        <div class="my-3">
            <label class="my-1" for="image">Image</label>
            <input type="file" class="form-control @error('title') is-invalid @enderror" name="image" id="image">
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="my-3">
            <label class="my-1" for="image_alternative">Image</label>
            <input type="file" class="form-control @error('title') is-invalid @enderror" name="image_alternative" id="image_alternative">
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Save</button>
        <button type="reset" class="btn btn-primary">Reset</button>
    </form>
</section>
@endsection
