@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tambah Pengguna</h1>
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Nama" required class="form-control mb-2">
            <input type="email" name="email" placeholder="Email" required class="form-control mb-2">
            <input type="password" name="password" placeholder="Password" required class="form-control mb-2">
            <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required
                class="form-control mb-2">
            <select name="role" class="form-control mb-2">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
@endsection
