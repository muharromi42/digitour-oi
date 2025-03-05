@extends('layouts.app')

@section('content')

    <!-- Basic Tables start -->
    <section class="section">
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    Wisata
                </h5>
                <a href="{{ route('wisata.create') }}" class="btn btn-primary mb-3">Tambah Wisata</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="wisataTable" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Pembuat</th>
                                <th>No HP</th>
                                <th>Jam Buka</th>
                                <th>Kota</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </section>
    <!-- Basic Tables end -->
    </div>
    @push('scripts')
        <script type="text/javascript">
            $(function() {
                $('#wisataTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('wisata.index') }}",
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'judul',
                            name: 'judul'
                        },
                        {
                            data: 'deskripsi',
                            name: 'deskripsi'
                        },
                        {
                            data: 'user',
                            name: 'user'
                        },
                        {
                            data: 'no_hp',
                            name: 'no_hp'
                        },
                        {
                            data: 'jam_buka',
                            name: 'jam_buka'
                        },
                        {
                            data: 'kota',
                            name: 'kota'
                        },
                        {
                            data: 'foto',
                            name: 'foto',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        }
                    ]
                });
            });
        </script>
    @endpush
@endsection
