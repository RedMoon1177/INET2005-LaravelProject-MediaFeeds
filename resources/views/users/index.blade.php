@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('User Administration') }}</div>

                <div class="card-body">

                    <a class="btn btn-outline-primary btn-block" style="width: 100%;" href="{{ route('users.create') }}">Create new Admin User</a>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col" colspan="4">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>
                                        <a class="btn btn-success" href="{{ route('users.show', $user) }}">Show</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-warning" href="{{ route('users.edit', $user) }}">Edit</a>
                                    </td>
                                    <td>
                                        <form method="post" action="{{ route('users.destroy', $user) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
