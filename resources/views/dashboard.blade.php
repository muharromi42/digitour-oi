@extends('layouts.app')

@section('content')
    <h1 style="margin-bottom: 100px">Dashboard</h1>

    <div class="row">
        {{-- Card 1 --}}
        <div class="d-flex flex-wrap gap-3 justify-content-center">
            <div class="card text-center text-white flex-fill"
                style="background: linear-gradient(135deg, #0174BE, #0C3C78); max-width: 19%;">
                <div class="card-body">
                    <i class="fas fa-map-marker-alt fa-2x mb-3"></i>
                    <h3 class="fw-bold">{{ $totalDataWisata }}</h3>
                    <p class="fw-semibold">Data Wisata</p>
                </div>
            </div>
            <div class="card text-center text-white flex-fill"
                style="background: linear-gradient(135deg, #6C3483, #512E5F); max-width: 19%;">
                <div class="card-body">
                    <i class="fas fa-newspaper fa-2x mb-3"></i>
                    <h3 class="fw-bold">{{ $totalDataNews }}</h3>
                    <p class="fw-semibold">Data News</p>
                </div>
            </div>
            <div class="card text-center text-white flex-fill"
                style="background: linear-gradient(135deg, #2E8B57, #145A32); max-width: 19%;">
                <div class="card-body">
                    <i class="fas fa-tree fa-2x mb-3"></i>
                    <h3 class="fw-bold">{{ $totalDataBudaya }}</h3>
                    <p class="fw-semibold">Data Budaya</p>
                </div>
            </div>
            <div class="card text-center text-white flex-fill"
                style="background: linear-gradient(135deg, #FF6F61, #C0392B); max-width: 19%;">
                <div class="card-body">
                    <i class="fas fa-users fa-2x mb-3"></i>
                    <h3 class="fw-bold">{{ $totalDataUmkm }}</h3>
                    <p class="fw-semibold">Data UMKM</p>
                </div>
            </div>
            <div class="card text-center text-white flex-fill"
                style="background: linear-gradient(135deg, #F39C12, #D68910); max-width: 19%;">
                <div class="card-body">
                    <i class="fas fa-school fa-2x mb-3"></i>
                    <h3 class="fw-bold">{{ $totalDataPenginapan }}</h3>
                    <p class="fw-semibold">Data Penginapan</p>
                </div>
            </div>
        </div>

    </div>
@endsection
