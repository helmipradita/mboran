@extends('layouts.backend')


@section('content')
    @if(session('success'))
    <div class="alert alert-success">
        {!! session('success') !!}
    </div>
    @elseif(session('info'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
    {!! session('info') !!}
    </div>
    @endif
    
    <div class="mb-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Pick user by username </h1>
        </div>
        <div class="">
            <form action="{{ route('user.edit', $user) }}" method="post">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control" value="{{ $user->username }}">
                    @error('username')
                        <div class="text-danger mt-2 d-block">{{ $message }}</div>                        
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="roles">Pick Roles</label>
                    <select name="roles" id="roles" class="form-control">
                        @foreach($roles as $role)
                            <option {{ $user->roles()->find($role->id) ? 'selected' : '' }} value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                    @error('role')
                        <div class="text-danger mt-2 d-block">{{ $message }}</div>                        
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Sync</button>
            </form>
        </div>
    </div>
@endsection