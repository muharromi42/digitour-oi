@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="mb-1">Account Profile</h2>
            </div>
            <div class="d-xl-none">
                <button class="btn btn-light border" type="button">
                    <i class="bi bi-list fs-4"></i>
                </button>
            </div>
        </div>

        <div class="row g-4">
            <!-- Profile Picture Card -->
            <div class="col-12 col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center py-4">
                        <div class="mb-3">
                            <img src="{{ asset('/storage/user-profile/default-user.png') }}" alt="{{ $user->name }}"
                                class="rounded-circle img-thumbnail"
                                style="width: 150px; height: 150px; object-fit: cover;">
                        </div>
                        <h3>{{ $user->name }}</h3>
                        <p class="text-muted">{{ $user->level ?? 'User' }}</p>
                    </div>
                </div>
            </div>

            <!-- Account Form Card -->
            <div class="col-12 col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <h4 class="card-title mb-4">Personal Information</h4>

                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="nama" class="form-label">Name</label>
                                <input type="text" name="nama" id="nama" class="form-control"
                                    placeholder="Your Name" value="{{ old('name', $user->name) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    placeholder="Your Email" value="{{ old('email', $user->email) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="role" class="form-label">Role</label>
                                <input type="text" name="role" id="role" class="form-control"
                                    placeholder="Your Role" value="{{ old('role', $user->role) }}" readonly>
                            </div>

                            <div class="mb-4">
                                <label for="profile_picture" class="form-label">Profile Picture</label>
                                <input type="file" name="profile_picture" id="profile_picture" class="form-control">
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="submit" class="btn btn-primary px-4">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
