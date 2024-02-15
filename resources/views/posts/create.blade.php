@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create New Post') }}</div>

                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{--add form to create new admin user--}}
                    <form method="post" action="{{ route('posts.store') }}">
                        @csrf
                        @method('POST')
                        <div class="mb-3">
                            <label>Post Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="(Required) Enter post title"/>
                        </div>
                        @error('title')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                        <div class="mb-3">
                            <label>Content</label>
                            <input type="text" class="form-control" id="content" name="content" placeholder="(Required) Enter content"/>
                        </div>
                        @error('content')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                        <div class="mb-3">
                            <label>Image URL</label>
                            <input type="url" class="form-control" id="imgUrl" name="imgUrl" placeholder="(Optional) Enter image URL"/>
                        </div>

                        <div class="mb-3">
                            <label>External Web Link</label>
                            <input type="url" class="form-control" id="extUrl" name="extUrl" placeholder="(Optional) Enter link to external web page"/>
                        </div>

{{--                        @if($errors->any())--}}
{{--                            <div class="alert alert-danger">--}}
{{--                                <ul>--}}
{{--                                    @foreach($errors->all() as $error)--}}
{{--                                        <li>{{ $error }}</li>--}}
{{--                                    @endforeach--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        @endif--}}

                        <a class="btn btn-outline-primary" href="{{ route('home') }}">Cancel</a>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
