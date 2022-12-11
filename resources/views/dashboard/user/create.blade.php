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
            <form action="{{ route('user.create') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control">
                    @error('username')
                        <div class="text-danger mt-2 d-block">{{ $message }}</div>                        
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="roles">Pick Roles</label>
                    <select name="roles" id="roles" class="form-control" >
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                    @error('roles')
                        <div class="text-danger mt-2 d-block">{{ $message }}</div>                        
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Assign</button>
            </form>
        </div>
    </div>
    
    <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>The Roles</th>
                <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($users as $index => $user)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ implode(', ', $user->getRoleNames()->toArray()) }}</td>
                        <td><a href="/penjual/edit/{id_penjual}" class="btn btn-primary btn-sm">Sync</a></td>
                    </tr>
                @endforeach
          </tbody>
        </table>
    </div>
@endsection