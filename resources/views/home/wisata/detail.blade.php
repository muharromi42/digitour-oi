@extends('home.layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <article class="blog-post">
                    <h1 class="blog-post-title">{{ $wisata->judul }}</h1>

                    <p class="blog-post-meta">
                        Published on {{ \Carbon\Carbon::parse($wisata->tanggal)->format('F d, Y') }}
                        by {{ $wisata->user->name }}
                    </p>

                    @if ($wisata->foto)
                        @php
                            //  decode string json menjadi array
                            $fotoData = json_decode($wisata->foto);
                            // ambil foto pertama saja jika json berbentuk array
                            $fotoPath = is_array($fotoData)
                                ? $fotoData[0]
                                : (isset($fotoData->main)
                                    ? $fotoData->main
                                    : $wisata->foto);
                        @endphp
                        <img src="{{ asset('storage/' . $fotoPath) }}" class="img-fluid mb-4" alt="{{ $wisata->judul }}">
                    @endif

                    <div class="blog-post-content">
                        {!! nl2br(e($wisata->deskripsi)) !!}
                    </div>
                </article>

                <div class="mt-4 mb-4">
                    <a href="{{ route('home.wisata') }}" class="btn btn-secondary">Back to News List</a>
                </div>
            </div>
        </div>
    </div>
@endsection
