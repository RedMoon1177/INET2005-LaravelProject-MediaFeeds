@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add New Admin User') }}</div>

                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{--add form to create new admin user--}}
                    <form method="post" action="{{ route('users.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label>Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Enter name"/>
                        </div>
                        @error('name')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                        <div class="mb-3">
                            <label>Email address</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Enter email"/>
                        </div>
                        @error('email')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password"/>
                        </div>
                        @error('password')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                        <div class="mb-3">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control" id="passwordCF" name="passwordCF" placeholder="Enter password"/>
                        </div>

                        <div class="mb-3">
                            <label for="role_list" class="form-label">Roles</label>
                            <ul class="list-group" id="role_list" name="role_list">
                                @foreach($roles as $role)
                                    <li class="list-group-item">
                                        <input {{ is_array(old('roles')) && in_array($role->id, old('roles')) ? 'checked' : ''}} class="form-check-input me-1" type="checkbox" name="roles[]" value="{{ $role->id }}" aria-label="...">
                                        {{ $role->name }}
                                    </li>
                                @endforeach
                            </ul>
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

                        <a class="btn btn-outline-primary" href="{{ route('users.index') }}">Cancel</a>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
