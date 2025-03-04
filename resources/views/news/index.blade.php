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
                    News
                </h5>
                <a href="{{ route('news.create') }}" class="btn btn-primary mb-3">Tambah News</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="newsTable" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Tanggal</th>
                                <th>Foto</th>
                                <th>Pembuat</th>
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
                var table = $('#newsTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('news.index') }}",
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
                            data: 'tanggal',
                            name: 'tanggal'
                        },
                        {
                            data: 'foto',
                            name: 'foto',
                            orderable: false,
                            searchable: false,
                            render: function(data) {
                                return `<a href="${data}" class="image-popup d-flex justify-content-center">
                    <img src="${data}" class="img-thumbnail" style="width: 50px; height: 50px; object-fit: cover;">
                </a>`;
                            }
                        },
                        {
                            data: 'user',
                            name: 'user'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        },
                    ],
                    drawCallback: function() {
                        $('.image-popup').magnificPopup({
                            type: 'image'
                        });
                    }
                });
            });
        </script>
    @endpush
@endsection
