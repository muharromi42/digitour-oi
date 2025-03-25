@extends('home.layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <article class="blog-post">
                    <h1 class="blog-post-title">{{ $news->judul }}</h1>

                    <p class="blog-post-meta">
                        Published on {{ \Carbon\Carbon::parse($news->tanggal)->format('F d, Y') }}
                        by {{ $news->user->name }}
                    </p>

                    @if ($news->foto)
                        <img src="{{ asset('storage/' . $news->foto) }}" class="img-fluid mb-4" alt="{{ $news->judul }}">
                    @endif

                    <div class="blog-post-content">
                        {!! nl2br(e($news->deskripsi)) !!}
                    </div>
                </article>

                <div class="mt-4 mb-4">
                    <a href="{{ route('home.news') }}" class="btn btn-secondary">Back to News List</a>
                </div>
            </div>
        </div>
    </div>
@endsection
