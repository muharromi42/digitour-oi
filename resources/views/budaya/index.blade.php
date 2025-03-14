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

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    Budaya
                </h5>
                <a href="{{ route('budaya.create') }}" class="btn btn-primary mb-3">Tambah Budaya</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="budayaTable" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Pembuat</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Data will be loaded via DataTables -->
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
                $('#budayaTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('budaya.index') }}",
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

            // Initialize Magnific Popup for galleries
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
            $('#budayaTable').on('draw.dt', function() {
                initMagnificPopup();
            });
        </script>
    @endpush
@endsection
