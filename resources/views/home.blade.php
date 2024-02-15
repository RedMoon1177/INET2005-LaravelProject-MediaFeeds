@php
    use Carbon\Carbon;
@endphp

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    {{ __('Welcome to the Media Feed') }}
                    @auth
                        <a class="btn btn-primary" href="{{ route('posts.create') }}">Create New Post</a>
                    @endauth
                </div>

                <div class="card-body">
                    @if (session('status'))
                        @if (session('is_success', true))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @else
                            <div class="alert alert-danger" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    @endif

                    @foreach($posts as $post)
                        <div class="mb-3 post-container" style="border: 2px solid lightgrey; border-radius: 10px; padding: 10px;">
                        @php
                            // Calculate the duration using Carbon
                            $duration = Carbon::parse($post->created_at)->diffForHumans()
                        @endphp
                        <p>Posted {{ $duration }} by {{\App\Models\User::find($post->created_by)->name}}</p>
                        <h2>{{ $post->title }}</h2>
                        <div style="margin-bottom: 20px;">
                        {{-- STYLING: max-width: 100%; ensures that the image doesn't exceed the width of its container.
                                height: auto; maintains the aspect ratio of the image.
                                margin: 0 auto; centers the image horizontally.
                                display: block; ensures that any default spacing around inline elements is removed.--}}
                            <img src="{{ $post->imgUrl }}" style="max-width: 100%; height: auto; margin: 0 auto; display: block;" alt="ImageURL">
                        </div>
                        <p>
                            {{ $post->content }}
                            <br>
                            <a href="#" style="text-decoration: none" >View more...</a>
                        </p>

                        @auth
                            <form method="post" action="{{ route('posts.destroy', $post->id ) }}">
                                @csrf
                                @method('DELETE')
                                    <!-- Show "Edit" only if the user is the owner of the post -->
                                @if ($post->created_by === auth()->id())
                                    <a class="btn btn-warning" href="{{ route('posts.edit', $post->id) }}">Edit</a>
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                @else
                                <!-- Show "Delete" only if the user is the owner of the post OR is a moderator -->
                                    @can('isMod')
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    @endcan
                                @endif
                            </form>
                        @endauth

                        </div>
                    @endforeach
{{--                    {{ __('You are logged in!') }}--}}

</div>
</div>
</div>
</div>
</div>
@endsection
