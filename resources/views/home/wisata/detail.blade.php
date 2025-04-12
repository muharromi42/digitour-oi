@extends('home.layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <h1 class="blog-post-title">{{ $wisata->judul }}</h1>



                @if ($wisata->foto)
                    @php
                        // Decode string json menjadi array
                        $fotoData = json_decode($wisata->foto);
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
                            $fotoPaths[] = $wisata->foto;
                        }
                    @endphp

                    <!-- Carousel with all images -->
                    <div id="wisataCarousel" class="carousel slide mb-4" data-bs-ride="carousel">
                        <!-- Indicators/dots -->
                        <div class="carousel-indicators">
                            @foreach ($fotoPaths as $index => $path)
                                <button type="button" data-bs-target="#wisataCarousel" data-bs-slide-to="{{ $index }}"
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
                                        alt="{{ $wisata->judul }} - Photo {{ $index + 1 }}"
                                        style="height: 500px; object-fit: cover;">
                                </div>
                            @endforeach
                        </div>

                        <!-- Left and right controls/icons -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#wisataCarousel"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#wisataCarousel"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                @endif

                <div class="post-meta">
                    <p class="blog-post-meta">
                        <span><i class="fa fa-user"></i></span>
                        Published by {{ $wisata->user->name }}
                    </p>

                    <div class="row">
                        <div class="col-md-6">
                            <dl>
                                <dt>waktu kunjungan</dt>
                                <dd>{{ $wisata->jam_buka }}</dd>
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <dl>
                                <dt>No. telepon</dt>
                                <dd>{{ $wisata->no_hp }}</dd>
                            </dl>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="blog-post-content">
                    {!! nl2br(e($wisata->deskripsi)) !!}
                </div>

                <hr>
                <!-- Google Maps Section -->
                @if ($wisata->gmaps_link)
                @php
                // Convert regular Google Maps URL to embed URL
                $mapUrl = $wisata->gmaps_link;

                // Check if it's already an embed URL
                if (!str_contains($mapUrl, 'output=embed')) {
                    // Check for shortened URL format (goo.gl/maps)
                    if (str_contains($mapUrl, 'goo.gl/maps')) {
                        // For shortened URLs, we'll need to create a generic embed
                        $mapUrl = 'https://maps.google.com/maps?q=' . urlencode($mapUrl) . '&output=embed';
                    }
                    // Check for regular maps.google.com URL
                    elseif (str_contains($mapUrl, 'maps.google.com') || str_contains($mapUrl, 'google.com/maps')) {
                        // Add output=embed parameter if not present
                        $mapUrl = $mapUrl . (str_contains($mapUrl, '?') ? '&' : '?') . 'output=embed';
                    }
                    // For Google Maps URLs with @location format
                    elseif (str_contains($mapUrl, 'google.com/maps/place') || str_contains($mapUrl, '@')) {
                        // Extract the place part and create embed URL
                        $mapUrl = 'https://www.google.com/maps/embed?pb=' . urlencode($mapUrl);
                    }
                }
            @endphp

                @else
                    <div class="mb-4">
                        <h4>Location</h4>
                        <div class="ratio ratio-16x9">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d509787.80214799976!2d104.23039819301822!3d-3.418918986857036!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e3bc47986a63be5%3A0x7ed8763321e4be3b!2sOgan%20Ilir%20Regency%2C%20South%20Sumatra!5e0!3m2!1sen!2sid!4v1744428599780!5m2!1sen!2sid"
                                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                                class="rounded"></iframe>
                        </div>
                    </div>
                @endif


                <div class="mt-4 mb-4">
                    <a href="{{ route('home.wisata') }}" class="btn btn-secondary">Back to News List</a>
                </div>
            </div>
        </div>
    </div>
@endsection
