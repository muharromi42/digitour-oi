@extends('home.layouts.app')
@section('content')
    <!-- Hero Banner Section with Title -->
    <div class="position-relative">
        <img src="{{ asset('/storage/images/1.jpg') }}" class="img-fluid w-100" alt="Destinations Banner"
            style="height: 300px; object-fit: cover;">
        <div class="position-absolute top-50 start-50 translate-middle text-center text-white">
            <h1 class="display-4 fw-bold">Destinations</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white">Home</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">Destination</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Search & Filter Section -->
    <div class="container my-4">
        <form action="{{ route('home.wisata') }}" method="GET" class="row g-3 justify-content-center">
            <div class="col-md-3">
                <input type="text" class="form-control" name="keyword" placeholder="Keyword..."
                    value="{{ request('keyword') }}">
            </div>
            <div class="col-md-3">
                <select name="category" class="form-select">
                    <option value="">Choose Category...</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>
                            {{ $category }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">SEARCH</button>
            </div>
        </form>
    </div>

    <!-- Destinations Grid -->
    <div class="container my-4">
        <div class="row g-4">
            @forelse($wisata as $destination)
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 rounded-3 shadow-sm h-100">
                        <div class="position-relative">
                            <!-- Category Badge -->
                            <span class="position-absolute top-0 start-0 badge rounded-0 text-white px-3 py-2 m-2"
                                style="background-color: #00b3b3; z-index: 1;">
                                {{ $destination->kategori ?? 'UNCATEGORIZED' }}
                            </span>

                            <!-- Image Container -->
                            @if ($destination->foto)
                                @php
                                    //  decode string json menjadi array
                                    $fotoData = json_decode($destination->foto);
                                    // ambil foto pertama saja jika json berbentuk array
                                    $fotoPath = is_array($fotoData)
                                        ? $fotoData[0]
                                        : (isset($fotoData->main)
                                            ? $fotoData->main
                                            : $destination->foto);
                                @endphp
                                <img src="{{ asset('storage/' . $fotoPath) }}" class="card-img-top"
                                    alt="{{ $destination->judul }}" style="height: 220px; object-fit: cover;">
                            @else
                                <img src="{{ asset('images/no-image.jpg') }}" class="card-img-top" alt="No Image Available"
                                    style="height: 220px; object-fit: cover;">
                            @endif

                            <!-- Location Badge -->
                            <div class="position-absolute bottom-0 start-0 bg-white rounded-pill px-3 py-1 m-3">
                                <small>Kab. {{ $destination->lokasi }}</small>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{ route('wisata.detail', $destination->slug) }}"
                                    class="text-decoration-none text-dark stretched-link">
                                    {{ $destination->judul }}
                                </a>
                            </h5>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <h4>No destinations found</h4>
                    {{-- <p>Try adjusting your search filters</p> --}}
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
            {{ $wisata->appends(request()->query())->links() }}
        </div>
    </div>

    <style>
        .news-item {
            transition: transform 0.3s ease;
        }

        .news-item:hover {
            transform: translateY(-5px);
        }

        .news-title a {
            color: #333;
        }

        .news-title a:hover {
            color: #007bff;
        }
    </style>
@endsection
