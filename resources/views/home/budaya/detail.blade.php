@extends('home.layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <h1 class="blog-post-title">{{ $budaya->judul }}</h1>



                @if ($budaya->foto)
                    @php
                        // Decode string json menjadi array
                        $fotoData = json_decode($budaya->foto);
                        // Buat array foto paths
                        $fotoPaths = [];
                        if (is_array($fotoData)) {
                            $fotoPaths = $fotoData;
                        } elseif (isset($fotoData->main)) {
                            $fotoPaths[] = $fotoData->main;
                            // Add other photos if they exist in the object
                            if (isset($fotoData->others) && is_array($fotoData->others)) {
                                $fotoPaths = array_merge($fotoPaths, $fotoData->others);
                            }
                        } else {
                            $fotoPaths[] = $budaya->foto;
                        }
                    @endphp

                    <!-- Carousel with all images -->
                    <div id="budayaCarousel" class="carousel slide mb-4" data-bs-ride="carousel">
                        <!-- Indicators/dots -->
                        <div class="carousel-indicators">
                            @foreach ($fotoPaths as $index => $path)
                                <button type="button" data-bs-target="#budayaCarousel" data-bs-slide-to="{{ $index }}"
                                    class="{{ $index === 0 ? 'active' : '' }}"
                                    aria-current="{{ $index === 0 ? 'true' : 'false' }}"
                                    aria-label="Slide {{ $index + 1 }}"></button>
                            @endforeach
                        </div>

                        <!-- The slideshow/carousel -->
                        <div class="carousel-inner rounded">
                            @foreach ($fotoPaths as $index => $path)
                                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                    <img src="{{ asset('storage/' . $path) }}" class="d-block w-100"
                                        alt="{{ $budaya->judul }} - Photo {{ $index + 1 }}"
                                        style="height: 500px; object-fit: cover;">
                                </div>
                            @endforeach
                        </div>

                        <!-- Left and right controls/icons -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#budayaCarousel"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#budayaCarousel"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                @endif

                <div class="post-meta">
                    <p class="blog-post-meta">
                        <span><i class="fa fa-user"></i></span>
                        Published by {{ $budaya->user->name }}
                    </p>

                    {{-- <div class="row">
                        <div class="col-md-6">
                            <dl>
                                <dt>waktu kunjungan</dt>
                                <dd>{{ $budaya->jam_buka }}</dd>
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <dl>
                                <dt>No. telepon</dt>
                                <dd>{{ $budaya->no_hp }}</dd>
                            </dl>
                        </div>
                    </div> --}}
                </div>

                <hr>

                <div class="blog-post-content">
                    {!! nl2br(e($budaya->deskripsi)) !!}
                </div>

                <hr>



                <div class="mt-4 mb-4">
                    <a href="{{ route('home.budaya') }}" class="btn btn-secondary">Back to budaya List</a>
                </div>
            </div>
        </div>
    </div>
@endsection
