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
                    umkm
                </h5>
                <a href="{{ route('umkm.create') }}" class="btn btn-primary mb-3">Tambah umkm</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="umkmTable" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Pembuat</th>
                                <th>Waktu Kunjungan</th>
                                <th>No HP</th>
                                <th>Alamat</th>
                                {{-- <th>Map</th> --}}
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
                $('#umkmTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('umkm.index') }}",
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
                            data: 'waktu_kunjungan',
                            name: 'waktu_kunjungan'
                        },
                        {
                            data: 'no_hp',
                            name: 'no_hp'
                        },
                        {
                            data: 'alamat',
                            name: 'alamat'
                        },
                        // {
                        //     data: 'map',
                        //     name: 'map',
                        //     orderable: false,
                        //     searchable: false
                        // },
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

            $(document).ready(function() {
                // Function to initialize Magnific Popup for galleries
                function initMagnificPopup() {
                    $('[class^="gallery-"]').each(function() {
                        $(this).magnificPopup({
                            delegate: 'a',
                            type: 'image',
                            gallery: {
                                enabled: true,
                                navigateByImgClick: true,
                                preload: [0, 1]
                            },
                            callbacks: {
                                elementParse: function(item) {
                                    // For hidden elements that only have href but no content
                                    if ($(item.el).hasClass('d-none')) {
                                        item.src = item.el.attr('href');
                                    }
                                }
                            }
                        });
                    });
                }

                // Initialize for initial table load
                initMagnificPopup();

                // Reinitialize after DataTables redraws
                $('#umkmTable').on('draw.dt', function() {
                    initMagnificPopup();
                });

                @if (session('success'))
                    Swal.fire({
                        title: 'Success!',
                        text: "{{ session('success') }}",
                        icon: 'success',
                        confirmButtonText: 'OK'
                    });
                @endif

                // confirm delete button
                $('#umkmTable').on('click', '.delete-button', function(event) {
                    event.preventDefault();
                    var form = $(this).closest('form');
                    Swal.fire({
                        title: 'Yakin?',
                        text: "Kamu tidak bisa mengulangnya lagi!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        cancelButtonText: "Batal",
                        confirmButtonText: 'Ya, hapus data ini!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        </script>
    @endpush
@endsection
