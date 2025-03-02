@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Pengguna</h1>
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="text" name="name" value="{{ $user->name }}" required class="form-control mb-2">
            <input type="email" name="email" value="{{ $user->email }}" required class="form-control mb-2">
            <select name="role" class="form-control mb-2">
                <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
            <button type="submit" class="btn btn-warning">Update</button>
        </form>
    </div>
@endsection
