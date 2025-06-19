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
                    Data Wisata
                </h5>
                <a href="{{ route('wisatadata.create') }}" class="btn btn-primary mb-3">Tambah Wisata</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="wisatadataTable" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama komersial</th>
                                <th>Nama perusahaan</th>
                                <th>Alamat</th>
                                <th>No HP</th>
                                <th>User</th>
                                <th>Approval</th>
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
                $('#wisatadataTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('wisatadata.index') }}",
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'nama_komersial',
                            name: 'nama_komersial'
                        },
                        {
                            data: 'nama_perusahaan',
                            name: 'nama_perusahaan'
                        },
                        {
                            data: 'alamat',
                            name: 'alamat',
                            render: function(data) {
                                return `<div class="d-block text-truncate" style="max-width: 200px;" title="${data}">${data}</div>`;
                            }
                        },
                        {
                            data: 'nomor_telepon',
                            name: 'nomor_telepon'
                        },
                        {
                            data: 'user',
                            name: 'user'
                        },
                        {
                            data: 'approval',
                            name: 'approval'
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


                @if (session('success'))
                    Swal.fire({
                        title: 'Success!',
                        text: "{{ session('success') }}",
                        icon: 'success',
                        confirmButtonText: 'OK'
                    });
                @endif

                // confirm delete button
                $('#wisatadataTable').on('click', '.delete-button', function(event) {
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
