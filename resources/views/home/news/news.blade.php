@extends('home.layouts.app')
@section('content')
    <div class="container">
        <h1 class="mb-4 mt-4">Latest News</h1>

        <div class="news-list">
            @foreach ($news as $item)
                <div class="news-item row mb-4 border-bottom pb-4">
                    <div class="col-md-4">
                        @if ($item->foto)
                            <img src="{{ asset('storage/' . $item->foto) }}" class="img-fluid rounded"
                                alt="{{ $item->judul }}">
                        @else
                            <img src="{{ asset('images/no-image.png') }}" class="img-fluid rounded" alt="No Image">
                        @endif
                    </div>
                    <div class="col-md-8">
                        <h2 class="news-title">
                            <a href="{{ route('news.detail', $item->slug) }}" class="text-decoration-none">
                                {{ $item->judul }}
                            </a>
                        </h2>
                        <p class="news-meta text-muted mb-2">
                            <small>
                                Published on {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                                by {{ $item->user->name }}
                            </small>
                        </p>
                        <div class="news-excerpt">
                            {{ Str::limit($item->deskripsi, 300) }}
                        </div>
                        <a href="{{ route('news.detail', $item->slug) }}" class="btn btn-primary mt-3">
                            Read More
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center">
            {{ $news->links('pagination::simple-bootstrap-5') }}
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
