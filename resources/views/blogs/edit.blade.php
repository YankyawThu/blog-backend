@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ route('blogs.update1', ['blog' => $data->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <label for="" class="col-md-3 col-form-label">Image</label>
                    <div class="col-md-9">
                        {{ $data->image }}
                        <input type="hidden" name="old_image" value="{{ $data->image }}">
                        <input type="file" name="image" class="form-control" id="">
                        @error('image')
                            <div class="text-danger pt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-md-3 col-form-label">Title</label>
                    <div class="col-md-9">
                        <input type="text" name="title" value="{{ $data->title }}" class="form-control" id="">
                        @error('title')
                            <div class="text-danger pt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-md-3 col-form-label">Duration (minutes)</label>
                    <div class="col-md-9">
                        <input type="number" name="duration" value="{{ $data->duration }}" class="form-control" id="">
                        @error('duration')
                            <div class="text-danger pt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-md-3 col-form-label">Content</label>
                    <div class="col-md-9">
                        <textarea name="content" rows="15" class="form-control" id="">{{ $data->content }}</textarea>
                        @error('content')
                            <div class="text-danger pt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Update</button>
                <a href="{{ route('blogs.index') }}" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection
