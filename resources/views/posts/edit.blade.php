@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Post') }}</div>

                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{--add form to create new admin user--}}
                    <form method="post" action="{{ route('posts.update', $post->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label>Post Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') != "" ? old('title'): $post->title }}"/>
                        </div>
                        @error('title')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                        <div class="mb-3">
                            <label>Content</label>
                            <input type="text" class="form-control" id="content" name="content" value="{{ old('content') != "" ? old('content'): $post->content }}"/>
                        </div>
                        @error('content')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                        <div class="mb-3">
                            <label>Image URL</label>
                            <input type="url" class="form-control" id="imgUrl" name="imgUrl" value="{{ old('imgUrl') != "" ? old('imgUrl'): $post->imgUrl }}"/>
                        </div>

                        <div class="mb-3">
                            <label>External Web Link</label>
                            <input type="url" class="form-control" id="extUrl" name="extUrl" value="{{ old('extUrl') != "" ? old('extUrl'): $post->extUrl }}"/>
                        </div>

                        <a class="btn btn-outline-primary" href="{{ route('home') }}">Cancel</a>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
