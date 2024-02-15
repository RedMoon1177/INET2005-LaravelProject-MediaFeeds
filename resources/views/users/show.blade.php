@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('User Administration Profile') }}</div>

                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Roles</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @foreach($user->roles as $role)
                                            {{ $role->name }}
                                            @if (!$loop->last)
                                                <br>
                                            @endif
                                        @endforeach
                                    </td>

                                    <td>
                                        <a class="btn btn-outline-primary" href="{{ route('users.index') }}">Cancel</a>
                                    </td>

                                </tr>
                            </tbody>
                        </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
