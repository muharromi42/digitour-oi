@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Tambah Wisata</h1>

        <form action="{{ route('wisata.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row d-block" bis_skin_checked="1">
                <div class="col-md-6 col-sm-12 float-left d-none" bis_skin_checked="1">
                    <div class="form-group" bis_skin_checked="1">
                        <label for="iddest" class="control-label ">Provinsi</label>
                        <select name="iddest" id="iddest" required=""
                            class="select2 form-control cascadingDropDown select2-hidden-accessible" data-group="wilayah"
                            data-id="id_prov" data-target="id_kota" data-url="/backend/getdata/fkota/0"
                            data-default-label="Pilih Provinsi" data-replacement="container1" tabindex="-1"
                            aria-hidden="true" data-select2-id="iddest">
                            <option value="">Pilih Provinsi</option>
                            <option value="16" selected="" data-select2-id="107">Sumatera Selatan</option>
                        </select><span class="select2 select2-container select2-container--default" dir="ltr"
                            data-select2-id="106" style="width: auto;"><span class="selection"><span
                                    class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true"
                                    aria-expanded="false" tabindex="0" aria-disabled="false"
                                    aria-labelledby="select2-iddest-container"><span class="select2-selection__rendered"
                                        id="select2-iddest-container" role="textbox" aria-readonly="true"
                                        title="Sumatera Selatan">Sumatera Selatan</span><span
                                        class="select2-selection__arrow" role="presentation"><b
                                            role="presentation"></b></span></span></span><span class="dropdown-wrapper"
                                aria-hidden="true"></span></span>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 float-left d-none" bis_skin_checked="1">
                    <div class="form-group" bis_skin_checked="1">
                        <label for="idkota" class="control-label ">Kota/Kabupaten</label>
                        <select name="idkota" id="idkota"
                            class="select2 form-control cascadingDropDown select2-hidden-accessible" data-group="wilayah"
                            data-id="id_kota" data-replacement="container1" data-default-label="Pilih Kota/Kabupaten"
                            tabindex="-1" aria-hidden="true" data-select2-id="idkota">
                            <option value="">Pilih Kota/Kabupaten</option>
                            <option value="1610" selected="" data-select2-id="111">Kabupaten Ogan Ilir</option>
                        </select><span class="select2 select2-container select2-container--default" dir="ltr"
                            data-select2-id="110" style="width: auto;"><span class="selection"><span
                                    class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true"
                                    aria-expanded="false" tabindex="0" aria-disabled="false"
                                    aria-labelledby="select2-idkota-container"><span class="select2-selection__rendered"
                                        id="select2-idkota-container" role="textbox" aria-readonly="true"
                                        title="Kabupaten Ogan Ilir">Kabupaten Ogan Ilir</span><span
                                        class="select2-selection__arrow" role="presentation"><b
                                            role="presentation"></b></span></span></span><span class="dropdown-wrapper"
                                aria-hidden="true"></span></span>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 float-left d-none" bis_skin_checked="1">
                    <div class="form-group" bis_skin_checked="1">
                        <label for="tahun" class="control-label ">Data Tahun</label>
                        <select name="tahun" id="tahun" required=""
                            class="select2 form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true"
                            data-select2-id="tahun">
                            <option value="2025" data-select2-id="118"> &nbsp; 2025 &nbsp; </option>
                            <option value="2024"> &nbsp; 2024 &nbsp; </option>
                            <option value="2023"> &nbsp; 2023 &nbsp; </option>
                            <option value="2022"> &nbsp; 2022 &nbsp; </option>
                            <option value="2021"> &nbsp; 2021 &nbsp; </option>
                        </select><span class="select2 select2-container select2-container--default" dir="ltr"
                            data-select2-id="117" style="width: auto;"><span class="selection"><span
                                    class="select2-selection select2-selection--single" role="combobox"
                                    aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false"
                                    aria-labelledby="select2-tahun-container"><span class="select2-selection__rendered"
                                        id="select2-tahun-container" role="textbox" aria-readonly="true"
                                        title=" &nbsp; 2025 &nbsp; "> &nbsp; 2025 &nbsp; </span><span
                                        class="select2-selection__arrow" role="presentation"><b
                                            role="presentation"></b></span></span></span><span class="dropdown-wrapper"
                                aria-hidden="true"></span></span>
                    </div>
                </div>
                <div class="col-lg-12 responsive-column" bis_skin_checked="1">
                    <div bis_skin_checked="1">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" data-bs-toggle="tab" href="#tab1" role="tab"
                                    aria-selected="true">
                                    <span>1. Profil Layanan Daya Tarik Wisata</span>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab2" role="tab"
                                    aria-selected="false" tabindex="-1">
                                    <span>2. Jumlah Pekera/Karyawan</span>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link " data-bs-toggle="tab" href="#tab3" role="tab"
                                    aria-selected="false" tabindex="-1">
                                    <span>3. Pendapatan dan Pengeluaran</span>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link " data-bs-toggle="tab" href="#tab4" role="tab"
                                    aria-selected="false" tabindex="-1">
                                    <span>4. Jenis Kegiatan</span>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link " data-bs-toggle="tab" href="#tab5" role="tab"
                                    aria-selected="false" tabindex="-1">
                                    <span>5. Operasional</span>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link " data-bs-toggle="tab" href="#tab6" role="tab"
                                    aria-selected="false" tabindex="-1">
                                    <span>6. Fasilitas</span>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link " data-bs-toggle="tab" href="#tab7" role="tab"
                                    aria-selected="false" tabindex="-1">
                                    <span>7. Sanitasi </span>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link " data-bs-toggle="tab" href="#tab8" role="tab"
                                    aria-selected="false" tabindex="-1">
                                    <span>8. Keamanan</span>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link " data-bs-toggle="tab" href="#tab9" role="tab"
                                    aria-selected="false" tabindex="-1">
                                    <span>9. Makanan dan Minuman </span>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link " data-bs-toggle="tab" href="#tab10" role="tab"
                                    aria-selected="false" tabindex="-1">
                                    <span>10. Signage</span>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link " data-bs-toggle="tab" href="#tab11" role="tab"
                                    aria-selected="false" tabindex="-1">
                                    <span>11. Lainnya</span>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content" bis_skin_checked="1">
                            <div class="tab-pane active show" id="tab1" role="tabpanel" bis_skin_checked="1">
                                <h3 class="" id="link320" style="color: #007bff">Profil Layanan Daya Tarik Wisata
                                </h3>
                                <div class="col-md-12 col-sm-12 mt-4 addborder float-left" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-md-12" bis_skin_checked="1">
                                            <div class="form-group" bis_skin_checked="1">
                                                <label for="field2" class="control-label col-form-label">1. Nama
                                                    Komersial
                                                    Usaha</label> <a tabindex="0"
                                                    class="btn btn-light-danger d-inline-flex align-items-center text-danger font-medium mx-2 my-2"
                                                    role="button" data-bs-toggle="popover" data-bs-trigger="focus"
                                                    data-bs-content="Definsi Nama komersil usaha: Nama bisnis/usaha yang digunakan dan dikenal secara populer di masyarakat, dan/atau nama yang digunakan untuk promosi di media sosial (contoh: Candi Borobudur, Taman Mini Indonesia Indah, dsb)."
                                                    data-bs-original-title="Keterangan"><i
                                                        class="ti ti-alert-octagon me-2 fs-4"></i> Info
                                                </a>
                                                <input type="text" class="form-control " id="field2"
                                                    name="field2" value="" placeholder=" Nama Komersial Usaha">
                                                <p>*Wajib diisi </p>
                                            </div>
                                            <div class="form-group" bis_skin_checked="1">
                                                <div class="row" bis_skin_checked="1">
                                                    <div class="col-md-3" bis_skin_checked="1">
                                                        <label for="tiadafield2"
                                                            class="control-label col-form-label me-2">Tidak ada
                                                            data</label>
                                                        <input type="checkbox" class=" showhidereason"
                                                            data-shid="shfield2" id="tiadafield2" name="tiadafield2"
                                                            value="1">
                                                    </div>
                                                    <div class="col-md-9 d-none " id="shfield2" bis_skin_checked="1">
                                                        <input type="text" class="form-control " id="reasonfield2"
                                                            name="reasonfield2" value="" placeholder="Penjelasan">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" bis_skin_checked="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 mt-4 addborder float-left" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-md-12" bis_skin_checked="1">
                                            <div class="form-group" bis_skin_checked="1">
                                                <label for="field1333" class="control-label col-form-label">2. Tematik
                                                    DTW</label> <a tabindex="0"
                                                    class="btn btn-light-danger d-inline-flex align-items-center text-danger font-medium mx-2 my-2"
                                                    role="button" data-bs-toggle="popover" data-bs-trigger="focus"
                                                    data-bs-content="Pilih salah satu jenis tematik DTW"
                                                    data-bs-original-title="Keterangan"><i
                                                        class="ti ti-alert-octagon me-2 fs-4"></i> Info
                                                </a>
                                                <div class="form-group" bis_skin_checked="1">
                                                    <select name="field1333[]" id="field1333"
                                                        class="select2 form-control select2-hidden-accessible"
                                                        multiple="" tabindex="-1" aria-hidden="true"
                                                        data-select2-id="field1333">
                                                        <option value="Wisata Alam">Wisata Alam</option>
                                                        <option value="Wisata Buatan">Wisata Buatan</option>
                                                        <option value="Wisata Budaya">Wisata Budaya</option>
                                                    </select><span
                                                        class="select2 select2-container select2-container--default"
                                                        dir="ltr" data-select2-id="123" style="width: 1068px;"><span
                                                            class="selection"><span
                                                                class="select2-selection select2-selection--multiple"
                                                                role="combobox" aria-haspopup="true"
                                                                aria-expanded="false" tabindex="-1"
                                                                aria-disabled="false">
                                                                <ul class="select2-selection__rendered">
                                                                    <li class="select2-search select2-search--inline">
                                                                        <input class="select2-search__field"
                                                                            type="search" tabindex="0"
                                                                            autocomplete="off" autocorrect="off"
                                                                            autocapitalize="none" spellcheck="false"
                                                                            role="searchbox" aria-autocomplete="list"
                                                                            placeholder="" style="width: 0.75em;">
                                                                    </li>
                                                                </ul>
                                                            </span></span><span class="dropdown-wrapper"
                                                            aria-hidden="true"></span></span>
                                                </div>
                                                <p></p>
                                            </div>
                                            <div class="form-group" bis_skin_checked="1">
                                                <div class="row" bis_skin_checked="1">
                                                    <div class="col-md-3" bis_skin_checked="1">
                                                        <label for="tiadafield1333"
                                                            class="control-label col-form-label me-2">Tidak ada
                                                            data</label>
                                                        <input type="checkbox" class=" showhidereason"
                                                            data-shid="shfield1333" id="tiadafield1333"
                                                            name="tiadafield1333" value="1">
                                                    </div>
                                                    <div class="col-md-9 d-none " id="shfield1333" bis_skin_checked="1">
                                                        <input type="text" class="form-control " id="reasonfield1333"
                                                            name="reasonfield1333" value=""
                                                            placeholder="Penjelasan">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" bis_skin_checked="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 mt-4 addborder float-left" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-md-12" bis_skin_checked="1">
                                            <div class="form-group" bis_skin_checked="1">
                                                <label for="field3" class="control-label col-form-label">3. Nama
                                                    Perusahaan/Usaha </label> <a tabindex="0"
                                                    class="btn btn-light-danger d-inline-flex align-items-center text-danger font-medium mx-2 my-2"
                                                    role="button" data-bs-toggle="popover" data-bs-trigger="focus"
                                                    data-bs-content="Definisi Nama Perusahaan / Usaha: Nama peruahaan atau badan hukum usaha yang terdaftar secara resmi. (Contoh: PT. Mekar Sari Indah, CV. Buana Cipta, dsb). "
                                                    data-bs-original-title="Keterangan"><i
                                                        class="ti ti-alert-octagon me-2 fs-4"></i> Info
                                                </a>
                                                <input type="text" class="form-control " id="field3"
                                                    name="field3" value="" placeholder="Nama Perusahaan/Usaha ">
                                                <p>*Wajib diisi </p>
                                            </div>
                                            <div class="form-group" bis_skin_checked="1">
                                                <div class="row" bis_skin_checked="1">
                                                    <div class="col-md-3" bis_skin_checked="1">
                                                        <label for="tiadafield3"
                                                            class="control-label col-form-label me-2">Tidak ada
                                                            data</label>
                                                        <input type="checkbox" class=" showhidereason"
                                                            data-shid="shfield3" id="tiadafield3" name="tiadafield3"
                                                            value="1">
                                                    </div>
                                                    <div class="col-md-9 d-none " id="shfield3" bis_skin_checked="1">
                                                        <input type="text" class="form-control " id="reasonfield3"
                                                            name="reasonfield3" value="" placeholder="Penjelasan">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" bis_skin_checked="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 mt-4 addborder float-left" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-md-12" bis_skin_checked="1">
                                            <div class="form-group" bis_skin_checked="1">
                                                <label for="field4" class="control-label col-form-label">4.
                                                    Alamat</label>
                                                <a tabindex="0"
                                                    class="btn btn-light-danger d-inline-flex align-items-center text-danger font-medium mx-2 my-2"
                                                    role="button" data-bs-toggle="popover" data-bs-trigger="focus"
                                                    data-bs-content="Definisi Alamat: Alamat dari lokasi usaha yang terdiri dari nama jalan, nomor jalan, Desa/Kelurahan, Kecamatan, Kabupaten/Kota, Provinsi."
                                                    data-bs-original-title="Keterangan"><i
                                                        class="ti ti-alert-octagon me-2 fs-4"></i> Info
                                                </a>
                                                <input type="text" class="form-control " id="field4"
                                                    name="field4" value="" placeholder="Alamat">
                                                <p>*Wajib diisi </p>
                                            </div>
                                            <div class="form-group" bis_skin_checked="1">
                                                <div class="row" bis_skin_checked="1">
                                                    <div class="col-md-3" bis_skin_checked="1">
                                                        <label for="tiadafield4"
                                                            class="control-label col-form-label me-2">Tidak ada
                                                            data</label>
                                                        <input type="checkbox" class=" showhidereason"
                                                            data-shid="shfield4" id="tiadafield4" name="tiadafield4"
                                                            value="1">
                                                    </div>
                                                    <div class="col-md-9 d-none " id="shfield4" bis_skin_checked="1">
                                                        <input type="text" class="form-control " id="reasonfield4"
                                                            name="reasonfield4" value="" placeholder="Penjelasan">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" bis_skin_checked="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 mt-4 addborder float-left" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-md-12" bis_skin_checked="1">
                                            <div class="form-group" bis_skin_checked="1">
                                                <label for="field12" class="control-label  col-form-label">5. Nomor
                                                    Telepon</label> <a tabindex="0"
                                                    class="btn btn-light-danger d-inline-flex align-items-center text-danger font-medium mx-2 my-2"
                                                    role="button" data-bs-toggle="popover" data-bs-trigger="focus"
                                                    data-bs-content="Definisi Nomor Telepon: Nomor telepon resmi yang dapat dihubungi baik oleh konsumen maupun pihak lain yang berkepentingan dengan usaha yang dioperasikan. (Contoh: 08535412215)"
                                                    data-bs-original-title="Keterangan"><i
                                                        class="ti ti-alert-octagon me-2 fs-4"></i> Info
                                                </a>
                                                <input type="number" step=".01" class="form-control "
                                                    id="field12" name="field12" value=""
                                                    placeholder="Nomor Telepon">
                                                <p>*Wajib diisi </p>
                                            </div>
                                            <div class="form-group" bis_skin_checked="1">
                                                <div class="row" bis_skin_checked="1">
                                                    <div class="col-md-3" bis_skin_checked="1">
                                                        <label for="tiadafield12"
                                                            class="control-label col-form-label me-2">Tidak ada
                                                            data</label>
                                                        <input type="checkbox" class=" showhidereason"
                                                            data-shid="shfield12" id="tiadafield12" name="tiadafield12"
                                                            value="1">
                                                    </div>
                                                    <div class="col-md-9 d-none " id="shfield12" bis_skin_checked="1">
                                                        <input type="text" class="form-control " id="reasonfield12"
                                                            name="reasonfield12" value="" placeholder="Penjelasan">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" bis_skin_checked="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 mt-4 addborder float-left" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-md-12" bis_skin_checked="1">
                                            <div class="form-group" bis_skin_checked="1">
                                                <label for="field9" class="control-label  col-form-label">6. Tahun Mulai
                                                    Beroperasinya Usaha</label> <a tabindex="0"
                                                    class="btn btn-light-danger d-inline-flex align-items-center text-danger font-medium mx-2 my-2"
                                                    role="button" data-bs-toggle="popover" data-bs-trigger="focus"
                                                    data-bs-content="Definisi Tahun Mulau Beroperasinya Usaha: Tahun dimana perusahaan mulai menjalankan operasi bisnisnya (Contoh: 1995, 1980, dsb)."
                                                    data-bs-original-title="Keterangan"><i
                                                        class="ti ti-alert-octagon me-2 fs-4"></i> Info
                                                </a>
                                                <input type="number" step=".01" class="form-control "
                                                    id="field9" name="field9" value=""
                                                    placeholder="Tahun Mulai Beroperasinya Usaha">
                                                <p>*Wajib diisi </p>
                                            </div>
                                            <div class="form-group" bis_skin_checked="1">
                                                <div class="row" bis_skin_checked="1">
                                                    <div class="col-md-3" bis_skin_checked="1">
                                                        <label for="tiadafield9"
                                                            class="control-label col-form-label me-2">Tidak ada
                                                            data</label>
                                                        <input type="checkbox" class=" showhidereason"
                                                            data-shid="shfield9" id="tiadafield9" name="tiadafield9"
                                                            value="1">
                                                    </div>
                                                    <div class="col-md-9 d-none " id="shfield9" bis_skin_checked="1">
                                                        <input type="text" class="form-control " id="reasonfield9"
                                                            name="reasonfield9" value="" placeholder="Penjelasan">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" bis_skin_checked="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 mt-4 addborder float-left" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-md-12" bis_skin_checked="1">
                                            <div class="form-group" bis_skin_checked="1">
                                                <label for="field16" class="control-label col-form-label">7. Total Luas
                                                    Area
                                                </label> <a tabindex="0"
                                                    class="btn btn-light-danger d-inline-flex align-items-center text-danger font-medium mx-2 my-2"
                                                    role="button" data-bs-toggle="popover" data-bs-trigger="focus"
                                                    data-bs-content="Definisi Luas Area: Luas area keseluruhan / total yang dimiliki. Catatan: Tidak semua lokasi memiliki perbedaan total luas area dengan luas area yang dimanfaatkan untuk kegiatan wisata, oleh sebab itu, total luas area &amp; total luas area yang dimanfaatkan untuk kegiatan wisata dapat memiliki nilai yang sama. Pertanyaan total luas area &amp; total luas area yang dimanfaatkan untuk kegiatan wisata dapat langsung ditanyakan kepada pihak pengelola (petugas survei tidak perlu melakukan pengisian secara langsung). "
                                                    data-bs-original-title="Keterangan"><i
                                                        class="ti ti-alert-octagon me-2 fs-4"></i> Info
                                                </a>
                                                <input type="text" class="form-control " id="field16"
                                                    name="field16" value="" placeholder="Total Luas Area ">
                                                <p>*dalam (m<sup>2</sup>) </p>
                                            </div>
                                            <div class="form-group" bis_skin_checked="1">
                                                <div class="row" bis_skin_checked="1">
                                                    <div class="col-md-3" bis_skin_checked="1">
                                                        <label for="tiadafield16"
                                                            class="control-label col-form-label me-2">Tidak ada
                                                            data</label>
                                                        <input type="checkbox" class=" showhidereason"
                                                            data-shid="shfield16" id="tiadafield16" name="tiadafield16"
                                                            value="1">
                                                    </div>
                                                    <div class="col-md-9 d-none " id="shfield16" bis_skin_checked="1">
                                                        <input type="text" class="form-control " id="reasonfield16"
                                                            name="reasonfield16" value="" placeholder="Penjelasan">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" bis_skin_checked="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 mt-4 addborder float-left" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-md-12" bis_skin_checked="1">
                                            <div class="form-group" bis_skin_checked="1">
                                                <label for="field7" class="control-label col-form-label">8. Luas Area
                                                    yang
                                                    Dimanfaatkan Untuk Kegiatan Wisata </label> <a tabindex="0"
                                                    class="btn btn-light-danger d-inline-flex align-items-center text-danger font-medium mx-2 my-2"
                                                    role="button" data-bs-toggle="popover" data-bs-trigger="focus"
                                                    data-bs-content="Definisi Luas Area yang dimanfaatkan untuk kegiatan wisata: Luas area yang hanya digunakan atau dimanfaatkan untuk kegiatan wisatawaan. Catatan: Tidak semua lokasi memiliki perbedaan total luas area dengan luas area yang dimanfaatkan untuk kegiatan wisata, oleh sebab itu, total luas area &amp; total luas area yang dimanfaatkan untuk kegiatan wisata dapat memiliki nilai yang sama. Pertanyaan total luas area &amp; total luas area yang dimanfaatkan untuk kegiatan wisata dapat langsung ditanyakan kepada pihak pengelola (petugas survei tidak perlu melakukan pengisian secara langsung)."
                                                    data-bs-original-title="Keterangan"><i
                                                        class="ti ti-alert-octagon me-2 fs-4"></i> Info
                                                </a>
                                                <input type="text" class="form-control " id="field7"
                                                    name="field7" value=""
                                                    placeholder="Luas Area yang Dimanfaatkan Untuk Kegiatan Wisata  ">
                                                <p>*dalam (m<sup>2</sup>)</p>
                                            </div>
                                            <div class="form-group" bis_skin_checked="1">
                                                <div class="row" bis_skin_checked="1">
                                                    <div class="col-md-3" bis_skin_checked="1">
                                                        <label for="tiadafield7"
                                                            class="control-label col-form-label me-2">Tidak ada
                                                            data</label>
                                                        <input type="checkbox" class=" showhidereason"
                                                            data-shid="shfield7" id="tiadafield7" name="tiadafield7"
                                                            value="1">
                                                    </div>
                                                    <div class="col-md-9 d-none " id="shfield7" bis_skin_checked="1">
                                                        <input type="text" class="form-control " id="reasonfield7"
                                                            name="reasonfield7" value="" placeholder="Penjelasan">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" bis_skin_checked="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 mt-4 addborder float-left" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-md-12" bis_skin_checked="1">
                                            <div class="form-group" bis_skin_checked="1">
                                                <label for="field8" class="control-label col-form-label">9. Jam
                                                    Operasional</label> <a tabindex="0"
                                                    class="btn btn-light-danger d-inline-flex align-items-center text-danger font-medium mx-2 my-2"
                                                    role="button" data-bs-toggle="popover" data-bs-trigger="focus"
                                                    data-bs-content="Definisi Jam Operasional: Jam beroprasinya layanan untuk wisatawan, dimulai dari jam buka dan buka tutup untuk melayani."
                                                    data-bs-original-title="Keterangan"><i
                                                        class="ti ti-alert-octagon me-2 fs-4"></i> Info
                                                </a>
                                                <div class="row d-flex" bis_skin_checked="1">
                                                    <div class="col-md-6 mt-2" bis_skin_checked="1">
                                                        <div class="acdropdown w-100" bis_skin_checked="1"><input
                                                                type="text" name="field8_label[]" id="field8_0_label"
                                                                class="form-control field8 ui-autocomplete-input"
                                                                value="" placeholder="Pilih atau ketik baru"
                                                                autocomplete="off"><i
                                                                class="fa fa-caret-down arrowdown"></i>
                                                        </div>
                                                        <div class="row d-flex" bis_skin_checked="1">
                                                            <div class="col-md-6" bis_skin_checked="1"><label
                                                                    class="control-label">Buka</label> <input
                                                                    type="text" class="form-control" name="field8[]"
                                                                    value="" placeholder="Teks"></div>
                                                            <div class="col-md-6" bis_skin_checked="1"><label
                                                                    class="control-label">Tutup</label> <input
                                                                    type="text" class="form-control" name="field8[]"
                                                                    value="" placeholder="Teks"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="" bis_skin_checked="1"><a href="#"
                                                        id="addfield8">Tambah Record</a></div>
                                                <p></p>
                                            </div>
                                            <div class="form-group" bis_skin_checked="1">
                                                <div class="row" bis_skin_checked="1">
                                                    <div class="col-md-3" bis_skin_checked="1">
                                                        <label for="tiadafield8"
                                                            class="control-label col-form-label me-2">Tidak ada
                                                            data</label>
                                                        <input type="checkbox" class=" showhidereason"
                                                            data-shid="shfield8" id="tiadafield8" name="tiadafield8"
                                                            value="1">
                                                    </div>
                                                    <div class="col-md-9 d-none " id="shfield8" bis_skin_checked="1">
                                                        <input type="text" class="form-control " id="reasonfield8"
                                                            name="reasonfield8" value="" placeholder="Penjelasan">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" bis_skin_checked="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 mt-4 addborder float-left" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-md-12" bis_skin_checked="1">
                                            <div class="form-group" bis_skin_checked="1">
                                                <label for="field17" class="control-label col-form-label">10. Jumlah
                                                    Pengunjung</label> <a tabindex="0"
                                                    class="btn btn-light-danger d-inline-flex align-items-center text-danger font-medium mx-2 my-2"
                                                    role="button" data-bs-toggle="popover" data-bs-trigger="focus"
                                                    data-bs-content="Definisi Jumlah Pengunjung: Total jumlah pengunjung dalam 1 bulan."
                                                    data-bs-original-title="Keterangan"><i
                                                        class="ti ti-alert-octagon me-2 fs-4"></i> Info
                                                </a>
                                                <div class="row d-flex" bis_skin_checked="1">
                                                    <div class="col-md-6 mt-2" bis_skin_checked="1">
                                                        <div class="acdropdown w-100" bis_skin_checked="1"><input
                                                                type="text" name="field17_label[]"
                                                                id="field17_0_label"
                                                                class="form-control field17 ui-autocomplete-input"
                                                                value="" placeholder="Pilih atau ketik baru"
                                                                autocomplete="off"><i
                                                                class="fa fa-caret-down arrowdown"></i>
                                                        </div>
                                                        <div class="row d-flex" bis_skin_checked="1">
                                                            <div class="col-md-6" bis_skin_checked="1"><label
                                                                    class="control-label">Wisatawan Nusantara</label>
                                                                <input type="number" class="form-control"
                                                                    name="field17[]" value="" placeholder="Angka">
                                                            </div>
                                                            <div class="col-md-6" bis_skin_checked="1"><label
                                                                    class="control-label">Wisatawan Mancanegara</label>
                                                                <input type="number" class="form-control"
                                                                    name="field17[]" value="" placeholder="Angka">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="" bis_skin_checked="1"><a href="#"
                                                        id="addfield17">Tambah Record</a></div>
                                                <p>*data diambil dari tahun terbaru</p>
                                            </div>
                                            <div class="form-group" bis_skin_checked="1">
                                                <div class="row" bis_skin_checked="1">
                                                    <div class="col-md-3" bis_skin_checked="1">
                                                        <label for="tiadafield17"
                                                            class="control-label col-form-label me-2">Tidak ada
                                                            data</label>
                                                        <input type="checkbox" class=" showhidereason"
                                                            data-shid="shfield17" id="tiadafield17" name="tiadafield17"
                                                            value="1">
                                                    </div>
                                                    <div class="col-md-9 d-none " id="shfield17" bis_skin_checked="1">
                                                        <input type="text" class="form-control " id="reasonfield17"
                                                            name="reasonfield17" value="" placeholder="Penjelasan">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" bis_skin_checked="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 mt-4 addborder float-left" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-md-12" bis_skin_checked="1">
                                            <div class="form-group" bis_skin_checked="1">
                                                <label for="field18" class="control-label col-form-label">11. Harga Tiket
                                                    Masuk </label> <a tabindex="0"
                                                    class="btn btn-light-danger d-inline-flex align-items-center text-danger font-medium mx-2 my-2"
                                                    role="button" data-bs-toggle="popover" data-bs-trigger="focus"
                                                    data-bs-content="Definisi Harga Tiket Masuk: Besaran tarif/harga tiket masuk ke dalam kawasan wisata.  Catatan: Apabila tidak ada tiket terusan &amp; rombongan, maka tidak perlu diisi.  Apabila tidak ada perbedaan tiket antara wisatawan nusantara/mancanegara, maka untuk tiket wisatawan mancanegara dapat diisi dengan nilai yang sama dengan tiket wisatawan nusantara."
                                                    data-bs-original-title="Keterangan"><i
                                                        class="ti ti-alert-octagon me-2 fs-4"></i> Info
                                                </a>
                                                <div class="row d-flex" bis_skin_checked="1">
                                                    <div class="col-md-6 mt-2" bis_skin_checked="1">
                                                        <div class="acdropdown w-100" bis_skin_checked="1"><input
                                                                type="text" name="field18_label[]"
                                                                id="field18_0_label"
                                                                class="form-control field18 ui-autocomplete-input"
                                                                value="" placeholder="Pilih atau ketik baru"
                                                                autocomplete="off"><i
                                                                class="fa fa-caret-down arrowdown"></i>
                                                        </div>
                                                        <div class="row d-flex" bis_skin_checked="1">
                                                            <div class="col-md-6" bis_skin_checked="1"><label
                                                                    class="control-label">Wisatawan Nusantara</label>
                                                                <input type="text" class="form-control"
                                                                    name="field18[]" value="" placeholder="Teks">
                                                            </div>
                                                            <div class="col-md-6" bis_skin_checked="1"><label
                                                                    class="control-label">Wisatawan Mancanegara</label>
                                                                <input type="text" class="form-control"
                                                                    name="field18[]" value="" placeholder="Teks">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="" bis_skin_checked="1"><a href="#"
                                                        id="addfield18">Tambah Record</a></div>
                                                <p>*dalam Rp (Rupiah)</p>
                                            </div>
                                            <div class="form-group" bis_skin_checked="1">
                                                <div class="row" bis_skin_checked="1">
                                                    <div class="col-md-3" bis_skin_checked="1">
                                                        <label for="tiadafield18"
                                                            class="control-label col-form-label me-2">Tidak ada
                                                            data</label>
                                                        <input type="checkbox" class=" showhidereason"
                                                            data-shid="shfield18" id="tiadafield18" name="tiadafield18"
                                                            value="1">
                                                    </div>
                                                    <div class="col-md-9 d-none " id="shfield18" bis_skin_checked="1">
                                                        <input type="text" class="form-control " id="reasonfield18"
                                                            name="reasonfield18" value="" placeholder="Penjelasan">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" bis_skin_checked="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 mt-4 addborder float-left" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-md-12" bis_skin_checked="1">
                                            <div class="form-group" bis_skin_checked="1">
                                                <label for="field15" class="control-label col-form-label">12. Rata-Rata
                                                    Lama/Durasi Kunjungan Per Orang</label> <a tabindex="0"
                                                    class="btn btn-light-danger d-inline-flex align-items-center text-danger font-medium mx-2 my-2"
                                                    role="button" data-bs-toggle="popover" data-bs-trigger="focus"
                                                    data-bs-content="Definisi rata-rata lama / durasi kunjungan per orang: Rata-rata durasi/lama kunjungan untuk setiap tamu saat berkunjung di area wisata.  Catatan: Nilai ini dapat diperoleh dengan dua cara,  1) pihak pengelola telah memiliki data terkait rata-rata lama kunjungan per orang 2) jika tidak ada data terkait dari pihak pengelola, maka petugas survei dapat menanyakan langsung kepada pihak pengelola mengenai perkiraan rata-rata lama / durasi kunjungan per orang setiap kali berkunjung ke lokasi."
                                                    data-bs-original-title="Keterangan"><i
                                                        class="ti ti-alert-octagon me-2 fs-4"></i> Info
                                                </a>
                                                <div class="form-group" bis_skin_checked="1">
                                                    <select name="field15[]" id="field15"
                                                        class="select2 form-control select2-hidden-accessible"
                                                        multiple="" tabindex="-1" aria-hidden="true"
                                                        data-select2-id="field15">
                                                        <option value="24jam">24jam</option>
                                                        <option value="&gt;1 jam s/d 6 jam">&gt;1 jam s/d 6 jam</option>
                                                        <option value="&gt;12 jam s/d 18 jam">&gt;12 jam s/d 18 jam
                                                        </option>
                                                        <option value="&gt;24 jam">&gt;24 jam</option>
                                                        <option value="&gt;6 jam s/d 12 jam">&gt;6 jam s/d 12 jam</option>
                                                    </select><span
                                                        class="select2 select2-container select2-container--default"
                                                        dir="ltr" data-select2-id="130" style="width: 1068px;"><span
                                                            class="selection"><span
                                                                class="select2-selection select2-selection--multiple"
                                                                role="combobox" aria-haspopup="true"
                                                                aria-expanded="false" tabindex="-1"
                                                                aria-disabled="false">
                                                                <ul class="select2-selection__rendered">
                                                                    <li class="select2-search select2-search--inline">
                                                                        <input class="select2-search__field"
                                                                            type="search" tabindex="0"
                                                                            autocomplete="off" autocorrect="off"
                                                                            autocapitalize="none" spellcheck="false"
                                                                            role="searchbox" aria-autocomplete="list"
                                                                            placeholder="" style="width: 0.75em;">
                                                                    </li>
                                                                </ul>
                                                            </span></span><span class="dropdown-wrapper"
                                                            aria-hidden="true"></span></span>
                                                </div>
                                                <p></p>
                                            </div>
                                            <div class="form-group" bis_skin_checked="1">
                                                <div class="row" bis_skin_checked="1">
                                                    <div class="col-md-3" bis_skin_checked="1">
                                                        <label for="tiadafield15"
                                                            class="control-label col-form-label me-2">Tidak ada
                                                            data</label>
                                                        <input type="checkbox" class=" showhidereason"
                                                            data-shid="shfield15" id="tiadafield15" name="tiadafield15"
                                                            value="1">
                                                    </div>
                                                    <div class="col-md-9 d-none " id="shfield15" bis_skin_checked="1">
                                                        <input type="text" class="form-control " id="reasonfield15"
                                                            name="reasonfield15" value="" placeholder="Penjelasan">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" bis_skin_checked="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 mt-4 addborder float-left" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-md-12" bis_skin_checked="1">
                                            <div class="form-group" bis_skin_checked="1">
                                                <label class="control-label col-form-label">13. Terdapat Data/Dokumen
                                                    Tentang
                                                    Kapasitas Pengunjung</label> <a tabindex="0"
                                                    class="btn btn-light-danger d-inline-flex align-items-center text-danger font-medium mx-2 my-2"
                                                    role="button" data-bs-toggle="popover" data-bs-trigger="focus"
                                                    data-bs-content="Definisi Kapasitas Pengunjung: Kemampuan daya tampung maksimal jumlah wisatawan di area wisata.  Catatan: Apabila pihak pengelola tidak memiliki data kapasitas maksimal daya tampung wisatawan, maka petugas survei dapat menanyakan secara langsung kepada pihak pengelola tentang berapa perikaraan jumlah pengunjung yang dapat ditampung/dilayani di dalam kawasan kepada pihak pengelola."
                                                    data-bs-original-title="Keterangan"><i
                                                        class="ti ti-alert-octagon me-2 fs-4"></i> Info
                                                </a>
                                                <div class="form-group clearfix" bis_skin_checked="1">
                                                    <div class="form-check form-check-inline" bis_skin_checked="1">
                                                        <input class="form-check-input success" type="radio"
                                                            name="field10" id="field100" value="Ada Dokumen"
                                                            checked="">
                                                        <label class="form-check-label" for="field100">Ada
                                                            Dokumen</label>
                                                    </div>
                                                    <div class="form-check form-check-inline" bis_skin_checked="1">
                                                        <input class="form-check-input success" type="radio"
                                                            name="field10" id="field101" value="Tidak Ada Dokumen">
                                                        <label class="form-check-label" for="field101">Tidak Ada
                                                            Dokumen</label>
                                                    </div>

                                                </div>
                                                <p></p>
                                            </div>
                                            <div class="form-group" bis_skin_checked="1">
                                                <div class="row" bis_skin_checked="1">
                                                    <div class="col-md-3" bis_skin_checked="1">
                                                        <label for="tiadafield10"
                                                            class="control-label col-form-label me-2">Tidak ada
                                                            data</label>
                                                        <input type="checkbox" class=" showhidereason"
                                                            data-shid="shfield10" id="tiadafield10"
                                                            name="tiadafield10" value="1">
                                                    </div>
                                                    <div class="col-md-9 d-none " id="shfield10" bis_skin_checked="1">
                                                        <input type="text" class="form-control " id="reasonfield10"
                                                            name="reasonfield10" value=""
                                                            placeholder="Penjelasan">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" bis_skin_checked="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 mt-4 addborder float-left" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-md-12" bis_skin_checked="1">
                                            <div class="form-group" bis_skin_checked="1">
                                                <label for="field279" class="control-label  col-form-label">14.
                                                    Kapasitas
                                                    Pengunjung</label> <a tabindex="0"
                                                    class="btn btn-light-danger d-inline-flex align-items-center text-danger font-medium mx-2 my-2"
                                                    role="button" data-bs-toggle="popover" data-bs-trigger="focus"
                                                    data-bs-content="Definisi Kapasitas Pengunjung: Kemampuan daya tampung maksimal jumlah wisatawan di area wisata.  Catatan: Apabila pihak pengelola tidak memiliki data kapasitas maksimal daya tampung wisatawan, maka petugas survei dapat menanyakan secara langsung kepada pihak pengelola tentang berapa perikaraan jumlah pengunjung yang dapat ditampung/dilayani di dalam kawasan kepada pihak pengelola."
                                                    data-bs-original-title="Keterangan"><i
                                                        class="ti ti-alert-octagon me-2 fs-4"></i> Info
                                                </a>
                                                <input type="number" step=".01" class="form-control "
                                                    id="field279" name="field279" value=""
                                                    placeholder="Kapasitas Pengunjung">
                                                <p>*orang</p>
                                            </div>
                                            <div class="form-group" bis_skin_checked="1">
                                                <div class="row" bis_skin_checked="1">
                                                    <div class="col-md-3" bis_skin_checked="1">
                                                        <label for="tiadafield279"
                                                            class="control-label col-form-label me-2">Tidak ada
                                                            data</label>
                                                        <input type="checkbox" class=" showhidereason"
                                                            data-shid="shfield279" id="tiadafield279"
                                                            name="tiadafield279" value="1">
                                                    </div>
                                                    <div class="col-md-9 d-none " id="shfield279"
                                                        bis_skin_checked="1">
                                                        <input type="text" class="form-control "
                                                            id="reasonfield279" name="reasonfield279" value=""
                                                            placeholder="Penjelasan">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" bis_skin_checked="1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab2" role="tabpanel" bis_skin_checked="1">
                                <h3 class="" id="link280" style="color: #007bff">Jumlah Pekera/Karyawan</h3>
                                <div class="col-md-12 col-sm-12 mt-4 addborder float-left" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-md-12" bis_skin_checked="1">
                                            <div class="form-group" bis_skin_checked="1">
                                                <label for="field281" class="control-label col-form-label">15. Jumlah
                                                    Pekerja/Karyawan Menurut Jenjang Pendidikan</label> <a tabindex="0"
                                                    class="btn btn-light-danger d-inline-flex align-items-center text-danger font-medium mx-2 my-2"
                                                    role="button" data-bs-toggle="popover" data-bs-trigger="focus"
                                                    data-bs-content="Definis Jumlah Pekerja/Karyawan: Jumlah jumlah pekerja atau karyaw, baik itu karyawan kontrak maupun karyawan tetap."
                                                    data-bs-original-title="Keterangan"><i
                                                        class="ti ti-alert-octagon me-2 fs-4"></i> Info
                                                </a>
                                                <div class="row d-flex" bis_skin_checked="1">
                                                    <div class="col-md-6 mt-2" bis_skin_checked="1"><input
                                                            type="text"
                                                            class="form-control field281 ui-autocomplete-input"
                                                            name="field281_label[]" id="field281_0_label"
                                                            value="" placeholder="Pilih atau ketik baru"
                                                            autocomplete="off"><input type="number"
                                                            class="form-control " name="field281[]" value=""
                                                            placeholder="Angka"></div>
                                                </div>
                                                <div class="" bis_skin_checked="1"><a href="#"
                                                        id="addfield281">Tambah Record</a></div>
                                                <p></p>
                                            </div>
                                            <div class="form-group" bis_skin_checked="1">
                                                <div class="row" bis_skin_checked="1">
                                                    <div class="col-md-3" bis_skin_checked="1">
                                                        <label for="tiadafield281"
                                                            class="control-label col-form-label me-2">Tidak ada
                                                            data</label>
                                                        <input type="checkbox" class=" showhidereason"
                                                            data-shid="shfield281" id="tiadafield281"
                                                            name="tiadafield281" value="1">
                                                    </div>
                                                    <div class="col-md-9 d-none " id="shfield281"
                                                        bis_skin_checked="1">
                                                        <input type="text" class="form-control "
                                                            id="reasonfield281" name="reasonfield281" value=""
                                                            placeholder="Penjelasan">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" bis_skin_checked="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 mt-4 addborder float-left" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-md-12" bis_skin_checked="1">
                                            <div class="form-group" bis_skin_checked="1">
                                                <label for="field282" class="control-label col-form-label">16. Jumlah
                                                    Pekerja/Karyawan Menurut Jenis Kelamin</label> <a tabindex="0"
                                                    class="btn btn-light-danger d-inline-flex align-items-center text-danger font-medium mx-2 my-2"
                                                    role="button" data-bs-toggle="popover" data-bs-trigger="focus"
                                                    data-bs-content="Definis Jumlah Pekerja/Karyawan: Jumlah jumlah pekerja atau karyaw, baik itu karyawan kontrak maupun karyawan tetap."
                                                    data-bs-original-title="Keterangan"><i
                                                        class="ti ti-alert-octagon me-2 fs-4"></i> Info
                                                </a>
                                                <div class="row d-flex" bis_skin_checked="1">
                                                    <div class="col-md-6 mt-2" bis_skin_checked="1"><input
                                                            type="text"
                                                            class="form-control field282 ui-autocomplete-input"
                                                            name="field282_label[]" id="field282_0_label"
                                                            value="" placeholder="Pilih atau ketik baru"
                                                            autocomplete="off"><input type="number"
                                                            class="form-control " name="field282[]" value=""
                                                            placeholder="Angka"></div>
                                                </div>
                                                <div class="" bis_skin_checked="1"><a href="#"
                                                        id="addfield282">Tambah Record</a></div>
                                                <p></p>
                                            </div>
                                            <div class="form-group" bis_skin_checked="1">
                                                <div class="row" bis_skin_checked="1">
                                                    <div class="col-md-3" bis_skin_checked="1">
                                                        <label for="tiadafield282"
                                                            class="control-label col-form-label me-2">Tidak ada
                                                            data</label>
                                                        <input type="checkbox" class=" showhidereason"
                                                            data-shid="shfield282" id="tiadafield282"
                                                            name="tiadafield282" value="1">
                                                    </div>
                                                    <div class="col-md-9 d-none " id="shfield282"
                                                        bis_skin_checked="1">
                                                        <input type="text" class="form-control "
                                                            id="reasonfield282" name="reasonfield282" value=""
                                                            placeholder="Penjelasan">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" bis_skin_checked="1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane " id="tab3" role="tabpanel" bis_skin_checked="1">
                                <h3 class="" id="link283" style="color: #007bff">Pendapatan dan Pengeluaran
                                </h3>
                                <div class="col-md-12 col-sm-12 mt-4 addborder float-left" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-md-12" bis_skin_checked="1">
                                            <div class="form-group" bis_skin_checked="1">
                                                <label for="field13" class="control-label col-form-label">17.
                                                    Pendapatan
                                                    dan Pengeluaran Dalam Satu Tahun</label> <a tabindex="0"
                                                    class="btn btn-light-danger d-inline-flex align-items-center text-danger font-medium mx-2 my-2"
                                                    role="button" data-bs-toggle="popover" data-bs-trigger="focus"
                                                    data-bs-content="Definisi: Pengeluaran yang dimaksud adalah total pengeluaran kotor (gross) dalam satu tahun, dan Pendapatan yang dimaksud adalah pendapatan/incone kotor (gross) dalam satu tahun. "
                                                    data-bs-original-title="Keterangan"><i
                                                        class="ti ti-alert-octagon me-2 fs-4"></i> Info
                                                </a>
                                                <div class="row d-flex" bis_skin_checked="1">
                                                    <div class="col-md-6 mt-2" bis_skin_checked="1"><input
                                                            type="text"
                                                            class="form-control field13 ui-autocomplete-input"
                                                            name="field13_label[]" id="field13_0_label" value=""
                                                            placeholder="Pilih atau ketik baru"
                                                            autocomplete="off"><input type="text"
                                                            class="form-control " name="field13[]" value=""
                                                            placeholder="Teks"></div>
                                                </div>
                                                <div class="" bis_skin_checked="1"><a href="#"
                                                        id="addfield13">Tambah Record</a></div>
                                                <p>*dalam Rp (Rupiah)</p>
                                            </div>
                                            <div class="form-group" bis_skin_checked="1">
                                                <div class="row" bis_skin_checked="1">
                                                    <div class="col-md-3" bis_skin_checked="1">
                                                        <label for="tiadafield13"
                                                            class="control-label col-form-label me-2">Tidak ada
                                                            data</label>
                                                        <input type="checkbox" class=" showhidereason"
                                                            data-shid="shfield13" id="tiadafield13"
                                                            name="tiadafield13" value="1">
                                                    </div>
                                                    <div class="col-md-9 d-none " id="shfield13" bis_skin_checked="1">
                                                        <input type="text" class="form-control " id="reasonfield13"
                                                            name="reasonfield13" value=""
                                                            placeholder="Penjelasan">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" bis_skin_checked="1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane " id="tab4" role="tabpanel" bis_skin_checked="1">
                                <h3 class="" id="link19" style="color: #007bff">Jenis Kegiatan</h3>
                                <div class="col-md-12 col-sm-12 mt-4 addborder float-left" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-md-12" bis_skin_checked="1">
                                            <div class="form-group" bis_skin_checked="1">
                                                <label for="field20" class="control-label col-form-label">18. Museum,
                                                    Operasional Bangunan, dan Situs Bersejarah</label> <a tabindex="0"
                                                    class="btn btn-light-danger d-inline-flex align-items-center text-danger font-medium mx-2 my-2"
                                                    role="button" data-bs-toggle="popover" data-bs-trigger="focus"
                                                    data-bs-content="Definisi Museum, Operasional Bangunan, dan Situs Bersejarah:  Kegiatan operasional museum seni, museum perhiasan, furnitur, pakaian, barang tembikar (keramik), barang perak  - Kegiatan operasional museum teknologi, ilmu pengetahuan dan sejarah alam, museum bersejarah, mencakup museum militer  - Kegiatan operasional museum khusus lainnya  - Kegiatan operasional museum di ruang terbuka atau di luar ruangan (open-air)  - Kegiatan operasional gedung dan situs bersejarah Subgolongan ini tidak mencakup : - Renovasi dan perbaikan gedung dan situs-situs bersejarah,  Perbaikan karya seni dan objek koleksi museum, - Kegiatan perpustakaan dan pengarsipan dokumen."
                                                    data-bs-original-title="Keterangan"><i
                                                        class="ti ti-alert-octagon me-2 fs-4"></i> Info
                                                </a>
                                                <div class="form-group" bis_skin_checked="1">
                                                    <select name="field20[]" id="field20"
                                                        class="select2 form-control select2-hidden-accessible"
                                                        multiple="" tabindex="-1" aria-hidden="true"
                                                        data-select2-id="field20">
                                                        <option value=" Peninggalan sejarah"> Peninggalan sejarah</option>
                                                        <option value=" Taman Budaya"> Taman Budaya</option>
                                                        <option value=" Wisata Budaya  Lainnya"> Wisata Budaya Lainnya
                                                        </option>
                                                        <option value="Museum">Museum</option>
                                                    </select><span
                                                        class="select2 select2-container select2-container--default"
                                                        dir="ltr" data-select2-id="136"
                                                        style="width: auto;"><span class="selection"><span
                                                                class="select2-selection select2-selection--multiple"
                                                                role="combobox" aria-haspopup="true"
                                                                aria-expanded="false" tabindex="-1"
                                                                aria-disabled="false">
                                                                <ul class="select2-selection__rendered">
                                                                    <li class="select2-search select2-search--inline">
                                                                        <input class="select2-search__field"
                                                                            type="search" tabindex="0"
                                                                            autocomplete="off" autocorrect="off"
                                                                            autocapitalize="none" spellcheck="false"
                                                                            role="searchbox" aria-autocomplete="list"
                                                                            placeholder="" style="width: 0.75em;">
                                                                    </li>
                                                                </ul>
                                                            </span></span><span class="dropdown-wrapper"
                                                            aria-hidden="true"></span></span>
                                                </div>
                                                <p>*dapat dipilih lebih dari satu</p>
                                            </div>
                                            <div class="form-group" bis_skin_checked="1">
                                                <div class="row" bis_skin_checked="1">
                                                    <div class="col-md-3" bis_skin_checked="1">
                                                        <label for="tiadafield20"
                                                            class="control-label col-form-label me-2">Tidak ada
                                                            data</label>
                                                        <input type="checkbox" class=" showhidereason"
                                                            data-shid="shfield20" id="tiadafield20"
                                                            name="tiadafield20" value="1">
                                                    </div>
                                                    <div class="col-md-9 d-none " id="shfield20" bis_skin_checked="1">
                                                        <input type="text" class="form-control " id="reasonfield20"
                                                            name="reasonfield20" value=""
                                                            placeholder="Penjelasan">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" bis_skin_checked="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 mt-4 addborder float-left" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-md-12" bis_skin_checked="1">
                                            <div class="form-group" bis_skin_checked="1">
                                                <label for="field11" class="control-label col-form-label">19. Aktifitas
                                                    Kebun Binatang, Taman Botani, dan Cadangan Alam</label> <a
                                                    tabindex="0"
                                                    class="btn btn-light-danger d-inline-flex align-items-center text-danger font-medium mx-2 my-2"
                                                    role="button" data-bs-toggle="popover" data-bs-trigger="focus"
                                                    data-bs-content="Definisi Aktifitas Kebun Binatang, Taman Botani, dan Cadangan Alam: Kegiatan operasional kebun binatang dan taman botani termasuk kebun binatang di mana anak-anak dapat berinteraksi langsung dengan binatang - Kegiatan operasional cadangan/kelestarian alam, mencakup pemeliharaan kehidupan liar, hutan lindung, suaka margasatwa dan cagar alam Subgolongan ini tidak mencakup: - Kegiatan pertamanan dan landscape, - Kegiatan operasional olahraga memancing dan berburu di cagar alam suaka margasatwa."
                                                    data-bs-original-title="Keterangan"><i
                                                        class="ti ti-alert-octagon me-2 fs-4"></i> Info
                                                </a>
                                                <div class="form-group" bis_skin_checked="1">
                                                    <select name="field11[]" id="field11"
                                                        class="select2 form-control select2-hidden-accessible"
                                                        multiple="" tabindex="-1" aria-hidden="true"
                                                        data-select2-id="field11">
                                                        <option
                                                            value=" Taman Konservasi di Luar Habitat  Alami (Ex-Situ)">
                                                            Taman Konservasi di Luar Habitat Alami (Ex-Situ)</option>
                                                        <option value="Aktivitas Kawasan Alam Lainnya">Aktivitas Kawasan
                                                            Alam
                                                            Lainnya</option>
                                                        <option value="Hutan Lindung">Hutan Lindung</option>
                                                        <option value="Kawasan Buru">Kawasan Buru</option>
                                                        <option value="Suaka Margasatwa &amp; cagar Alam">Suaka Margasatwa
                                                            &amp; cagar Alam</option>
                                                        <option value="Taman Hutan Raya">Taman Hutan Raya</option>
                                                        <option value="Taman Konservasi">Taman Konservasi</option>
                                                        <option value="Taman Laut">Taman Laut</option>
                                                        <option value="Taman Nasional">Taman Nasional</option>
                                                        <option value="Taman WIsata Alam">Taman WIsata Alam</option>
                                                    </select><span
                                                        class="select2 select2-container select2-container--default"
                                                        dir="ltr" data-select2-id="148"
                                                        style="width: auto;"><span class="selection"><span
                                                                class="select2-selection select2-selection--multiple"
                                                                role="combobox" aria-haspopup="true"
                                                                aria-expanded="false" tabindex="-1"
                                                                aria-disabled="false">
                                                                <ul class="select2-selection__rendered">
                                                                    <li class="select2-search select2-search--inline">
                                                                        <input class="select2-search__field"
                                                                            type="search" tabindex="0"
                                                                            autocomplete="off" autocorrect="off"
                                                                            autocapitalize="none" spellcheck="false"
                                                                            role="searchbox" aria-autocomplete="list"
                                                                            placeholder="" style="width: 0.75em;">
                                                                    </li>
                                                                </ul>
                                                            </span></span><span class="dropdown-wrapper"
                                                            aria-hidden="true"></span></span>
                                                </div>
                                                <p>*dapat dipilih lebih dari satu</p>
                                            </div>
                                            <div class="form-group" bis_skin_checked="1">
                                                <div class="row" bis_skin_checked="1">
                                                    <div class="col-md-3" bis_skin_checked="1">
                                                        <label for="tiadafield11"
                                                            class="control-label col-form-label me-2">Tidak ada
                                                            data</label>
                                                        <input type="checkbox" class=" showhidereason"
                                                            data-shid="shfield11" id="tiadafield11"
                                                            name="tiadafield11" value="1">
                                                    </div>
                                                    <div class="col-md-9 d-none " id="shfield11" bis_skin_checked="1">
                                                        <input type="text" class="form-control " id="reasonfield11"
                                                            name="reasonfield11" value=""
                                                            placeholder="Penjelasan">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" bis_skin_checked="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 mt-4 addborder float-left" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-md-12" bis_skin_checked="1">
                                            <div class="form-group" bis_skin_checked="1">
                                                <label for="field323" class="control-label col-form-label">20. Daya
                                                    Tarik
                                                    Wisata Alam </label> <a tabindex="0"
                                                    class="btn btn-light-danger d-inline-flex align-items-center text-danger font-medium mx-2 my-2"
                                                    role="button" data-bs-toggle="popover" data-bs-trigger="focus"
                                                    data-bs-content="Definisi Daya Tarik Wisata Alam: Kegiatan daya tarik wisata alam, seperti wisata pemandian alam, wisata gua, wisata petualangan alam, wisata pantai dan lainnya."
                                                    data-bs-original-title="Keterangan"><i
                                                        class="ti ti-alert-octagon me-2 fs-4"></i> Info
                                                </a>
                                                <div class="form-group" bis_skin_checked="1">
                                                    <select name="field323[]" id="field323"
                                                        class="select2 form-control select2-hidden-accessible"
                                                        multiple="" tabindex="-1" aria-hidden="true"
                                                        data-select2-id="field323">
                                                        <option value="Aktifitas Taman Bertema/Taman Hiburan">Aktifitas
                                                            Taman
                                                            Bertema/Taman Hiburan</option>
                                                        <option value="Pemandian Alam">Pemandian Alam</option>
                                                        <option value="Wisata Gua">Wisata Gua</option>
                                                        <option value="Wisata Pantai">Wisata Pantai</option>
                                                        <option value="Wisata Petualangan Alam">Wisata Petualangan Alam
                                                        </option>
                                                    </select><span
                                                        class="select2 select2-container select2-container--default"
                                                        dir="ltr" data-select2-id="155"
                                                        style="width: auto;"><span class="selection"><span
                                                                class="select2-selection select2-selection--multiple"
                                                                role="combobox" aria-haspopup="true"
                                                                aria-expanded="false" tabindex="-1"
                                                                aria-disabled="false">
                                                                <ul class="select2-selection__rendered">
                                                                    <li class="select2-search select2-search--inline">
                                                                        <input class="select2-search__field"
                                                                            type="search" tabindex="0"
                                                                            autocomplete="off" autocorrect="off"
                                                                            autocapitalize="none" spellcheck="false"
                                                                            role="searchbox" aria-autocomplete="list"
                                                                            placeholder="" style="width: 0.75em;">
                                                                    </li>
                                                                </ul>
                                                            </span></span><span class="dropdown-wrapper"
                                                            aria-hidden="true"></span></span>
                                                </div>
                                                <p>*dapat dipilih lebih dari satu</p>
                                            </div>
                                            <div class="form-group" bis_skin_checked="1">
                                                <div class="row" bis_skin_checked="1">
                                                    <div class="col-md-3" bis_skin_checked="1">
                                                        <label for="tiadafield323"
                                                            class="control-label col-form-label me-2">Tidak ada
                                                            data</label>
                                                        <input type="checkbox" class=" showhidereason"
                                                            data-shid="shfield323" id="tiadafield323"
                                                            name="tiadafield323" value="1">
                                                    </div>
                                                    <div class="col-md-9 d-none " id="shfield323"
                                                        bis_skin_checked="1">
                                                        <input type="text" class="form-control "
                                                            id="reasonfield323" name="reasonfield323" value=""
                                                            placeholder="Penjelasan">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" bis_skin_checked="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 mt-4 addborder float-left" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-md-12" bis_skin_checked="1">
                                            <div class="form-group" bis_skin_checked="1">
                                                <label for="field21" class="control-label col-form-label">21. Daya
                                                    Tarik
                                                    Wisata Buatan/Binaan Manusia </label> <a tabindex="0"
                                                    class="btn btn-light-danger d-inline-flex align-items-center text-danger font-medium mx-2 my-2"
                                                    role="button" data-bs-toggle="popover" data-bs-trigger="focus"
                                                    data-bs-content="Definisi Daya Tarik Wisata Buatan / Binaan Manusia: Kegiatan daya tarik wisata buatan/binaan manusia, seperti wisata agro, wisata outbound dan lainnya."
                                                    data-bs-original-title="Keterangan"><i
                                                        class="ti ti-alert-octagon me-2 fs-4"></i> Info
                                                </a>
                                                <div class="form-group" bis_skin_checked="1">
                                                    <select name="field21[]" id="field21"
                                                        class="select2 form-control select2-hidden-accessible"
                                                        multiple="" tabindex="-1" aria-hidden="true"
                                                        data-select2-id="field21">
                                                        <option
                                                            value=" Daya Tarik Wisata Buatan / Binaan Manusia Lainnya">
                                                            Daya Tarik Wisata Buatan / Binaan Manusia Lainnya</option>
                                                        <option value="Kolam Pemancingan">Kolam Pemancingan</option>
                                                        <option value="Taman Rekreasi/Taman WIsata">Taman Rekreasi/Taman
                                                            WIsata</option>
                                                        <option value="Wisata Argo">Wisata Argo</option>
                                                    </select><span
                                                        class="select2 select2-container select2-container--default"
                                                        dir="ltr" data-select2-id="161"
                                                        style="width: auto;"><span class="selection"><span
                                                                class="select2-selection select2-selection--multiple"
                                                                role="combobox" aria-haspopup="true"
                                                                aria-expanded="false" tabindex="-1"
                                                                aria-disabled="false">
                                                                <ul class="select2-selection__rendered">
                                                                    <li class="select2-search select2-search--inline">
                                                                        <input class="select2-search__field"
                                                                            type="search" tabindex="0"
                                                                            autocomplete="off" autocorrect="off"
                                                                            autocapitalize="none" spellcheck="false"
                                                                            role="searchbox" aria-autocomplete="list"
                                                                            placeholder="" style="width: 0.75em;">
                                                                    </li>
                                                                </ul>
                                                            </span></span><span class="dropdown-wrapper"
                                                            aria-hidden="true"></span></span>
                                                </div>
                                                <p>*dapat dipilih lebih dari satu</p>
                                            </div>
                                            <div class="form-group" bis_skin_checked="1">
                                                <div class="row" bis_skin_checked="1">
                                                    <div class="col-md-3" bis_skin_checked="1">
                                                        <label for="tiadafield21"
                                                            class="control-label col-form-label me-2">Tidak ada
                                                            data</label>
                                                        <input type="checkbox" class=" showhidereason"
                                                            data-shid="shfield21" id="tiadafield21"
                                                            name="tiadafield21" value="1">
                                                    </div>
                                                    <div class="col-md-9 d-none " id="shfield21" bis_skin_checked="1">
                                                        <input type="text" class="form-control " id="reasonfield21"
                                                            name="reasonfield21" value=""
                                                            placeholder="Penjelasan">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" bis_skin_checked="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 mt-4 addborder float-left" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-md-12" bis_skin_checked="1">
                                            <div class="form-group" bis_skin_checked="1">
                                                <label for="field22" class="control-label col-form-label">22. Wisata
                                                    Tirta</label> <a tabindex="0"
                                                    class="btn btn-light-danger d-inline-flex align-items-center text-danger font-medium mx-2 my-2"
                                                    role="button" data-bs-toggle="popover" data-bs-trigger="focus"
                                                    data-bs-content="Definisi Wisata Tirta: Kegiatan atau suatu usaha pengelolaan untuk mengadakan kegiatan kolam pemancingan, wisata memancing, selam, selancar, selancar angin, para layar dan motor air sebagai usaha pokok di suatu kawasan tertentu dan dilengkapi dengan penyediaan berbagai jenis termasuk jasa pelayanan makan dan minum serta akomodasi. Termasuk juga usaha pengelolaan dengan pemanfaatan sungai-sungai arus deras untuk mengadakan kegiatan arung jeram sebagai usaha pokok di kawasan tertentu."
                                                    data-bs-original-title="Keterangan"><i
                                                        class="ti ti-alert-octagon me-2 fs-4"></i> Info
                                                </a>
                                                <div class="form-group" bis_skin_checked="1">
                                                    <select name="field22[]" id="field22"
                                                        class="select2 form-control select2-hidden-accessible"
                                                        multiple="" tabindex="-1" aria-hidden="true"
                                                        data-select2-id="field22">
                                                        <option value="Aktivitas Wisata Air">Aktivitas Wisata Air</option>
                                                        <option value="Arung Jeram">Arung Jeram</option>
                                                        <option value="Dermaga Marina">Dermaga Marina</option>
                                                        <option value="Kolam Pemancingan">Kolam Pemancingan</option>
                                                        <option value="Wisata Memancing">Wisata Memancing</option>
                                                        <option value="Wisata Selam">Wisata Selam</option>
                                                        <option value="Wisata Tirta Lainnya">Wisata Tirta Lainnya</option>
                                                    </select><span
                                                        class="select2 select2-container select2-container--default"
                                                        dir="ltr" data-select2-id="170"
                                                        style="width: auto;"><span class="selection"><span
                                                                class="select2-selection select2-selection--multiple"
                                                                role="combobox" aria-haspopup="true"
                                                                aria-expanded="false" tabindex="-1"
                                                                aria-disabled="false">
                                                                <ul class="select2-selection__rendered">
                                                                    <li class="select2-search select2-search--inline">
                                                                        <input class="select2-search__field"
                                                                            type="search" tabindex="0"
                                                                            autocomplete="off" autocorrect="off"
                                                                            autocapitalize="none" spellcheck="false"
                                                                            role="searchbox" aria-autocomplete="list"
                                                                            placeholder="" style="width: 0.75em;">
                                                                    </li>
                                                                </ul>
                                                            </span></span><span class="dropdown-wrapper"
                                                            aria-hidden="true"></span></span>
                                                </div>
                                                <p>*dapat dipilih lebih dari satu</p>
                                            </div>
                                            <div class="form-group" bis_skin_checked="1">
                                                <div class="row" bis_skin_checked="1">
                                                    <div class="col-md-3" bis_skin_checked="1">
                                                        <label for="tiadafield22"
                                                            class="control-label col-form-label me-2">Tidak ada
                                                            data</label>
                                                        <input type="checkbox" class=" showhidereason"
                                                            data-shid="shfield22" id="tiadafield22"
                                                            name="tiadafield22" value="1">
                                                    </div>
                                                    <div class="col-md-9 d-none " id="shfield22" bis_skin_checked="1">
                                                        <input type="text" class="form-control " id="reasonfield22"
                                                            name="reasonfield22" value=""
                                                            placeholder="Penjelasan">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" bis_skin_checked="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 mt-4 addborder float-left" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-md-12" bis_skin_checked="1">
                                            <div class="form-group" bis_skin_checked="1">
                                                <label for="field23" class="control-label col-form-label">23. Aktifitas
                                                    Hiburan &amp; Rekreasi </label> <a tabindex="0"
                                                    class="btn btn-light-danger d-inline-flex align-items-center text-danger font-medium mx-2 my-2"
                                                    role="button" data-bs-toggle="popover" data-bs-trigger="focus"
                                                    data-bs-content="Definsi Aktifitias Hiburan &amp; Rekreasi: Subgolongan ini mencakup kegiatan hiburan dan rekreasi lain (kecuali taman hiburan dan taman bertema) yang tidak diklasifikasikan di tempat lain : - Kegiatan taman rekreasi, pantai, termasuk penyewaan fasilitas seperti kamar mandi, loker, tempat duduk dan lain-lain - Kegiatan operasional bukit ski - Penyewaan perlengkapan rekreasi dan hiburan yang merupakan bagian yang tidak terpisahkan dari fasilitas rekreasi - Kegiatan operasional pekan raya dan pertunjukan rekreasi alami - Kegiatan operasianal diskotek dan lantai dansa - Kegiatan hiburan dan rekreasi lainnya - Kegiatan produser atau pengusaha pertunjukan langsung selain pertunjukan olahraga atau seni, dengan atau tanpa fasilitas. Subgolongan ini tidak mencakup : - Pelayaran pemancingan, - Penyediaan tempat dan fasilitas untuk tinggal dalam waktu yang singkat oleh pengunjung di taman rekreasi dan hutan dan tempat kamping, - Taman tempat kereta rumah, kamping untuk rekreasi, perkemahan untuk berburu dan memancing, tempat kamping dan area kamping, - Kegiatan pelayanan minuman dalam diskotek,  - Persewaan peralatan untuk bersenang-senang dan mengisi waktu luang,- Kegiatan operasional mesin perjudian yang dioperasikan dengan koin, - Kegiatan taman hiburan dan taman bertema."
                                                    data-bs-original-title="Keterangan"><i
                                                        class="ti ti-alert-octagon me-2 fs-4"></i> Info
                                                </a>
                                                <div class="form-group" bis_skin_checked="1">
                                                    <select name="field23[]" id="field23"
                                                        class="select2 form-control select2-hidden-accessible"
                                                        multiple="" tabindex="-1" aria-hidden="true"
                                                        data-select2-id="field23">
                                                        <option value="Aktifitas Hiburan &amp; Rekreasi Lainnya">Aktifitas
                                                            Hiburan &amp; Rekreasi Lainnya</option>
                                                        <option value="Usaha Arena Permainan">Usaha Arena Permainan
                                                        </option>
                                                    </select><span
                                                        class="select2 select2-container select2-container--default"
                                                        dir="ltr" data-select2-id="174"
                                                        style="width: auto;"><span class="selection"><span
                                                                class="select2-selection select2-selection--multiple"
                                                                role="combobox" aria-haspopup="true"
                                                                aria-expanded="false" tabindex="-1"
                                                                aria-disabled="false">
                                                                <ul class="select2-selection__rendered">
                                                                    <li class="select2-search select2-search--inline">
                                                                        <input class="select2-search__field"
                                                                            type="search" tabindex="0"
                                                                            autocomplete="off" autocorrect="off"
                                                                            autocapitalize="none" spellcheck="false"
                                                                            role="searchbox" aria-autocomplete="list"
                                                                            placeholder="" style="width: 0.75em;">
                                                                    </li>
                                                                </ul>
                                                            </span></span><span class="dropdown-wrapper"
                                                            aria-hidden="true"></span></span>
                                                </div>
                                                <p>*dapat dipilih lebih dari satu</p>
                                            </div>
                                            <div class="form-group" bis_skin_checked="1">
                                                <div class="row" bis_skin_checked="1">
                                                    <div class="col-md-3" bis_skin_checked="1">
                                                        <label for="tiadafield23"
                                                            class="control-label col-form-label me-2">Tidak ada
                                                            data</label>
                                                        <input type="checkbox" class=" showhidereason"
                                                            data-shid="shfield23" id="tiadafield23"
                                                            name="tiadafield23" value="1">
                                                    </div>
                                                    <div class="col-md-9 d-none " id="shfield23" bis_skin_checked="1">
                                                        <input type="text" class="form-control " id="reasonfield23"
                                                            name="reasonfield23" value=""
                                                            placeholder="Penjelasan">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" bis_skin_checked="1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane " id="tab5" role="tabpanel" bis_skin_checked="1">
                                <h3 class="" id="link24" style="color: #007bff">Operasional</h3>
                                <div class="col-md-12 col-sm-12 mt-4 addborder float-left" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-md-12" bis_skin_checked="1">
                                            <div class="form-group" bis_skin_checked="1">
                                                <label for="field321" class="control-label col-form-label">24. Metode
                                                    Pemesanan /Penjualan Tiket (dapat diisi lebih dari 1 jawaban ) </label>
                                                <a tabindex="0"
                                                    class="btn btn-light-danger d-inline-flex align-items-center text-danger font-medium mx-2 my-2"
                                                    role="button" data-bs-toggle="popover" data-bs-trigger="focus"
                                                    data-bs-content="Definisi Metode Pemesanan / Penjualan Tiket: Pilihan cara pembayaran yang tersedia seperti cara pembayaran melalui kartu kredit/kredit online, point dari program berhadiah, transfer bank, uang elektronik (emoney), debit, voucher, tunai, dan lainnya."
                                                    data-bs-original-title="Keterangan"><i
                                                        class="ti ti-alert-octagon me-2 fs-4"></i> Info
                                                </a>
                                                <div class="form-group" bis_skin_checked="1">
                                                    <select name="field321[]" id="field321"
                                                        class="select2 form-control select2-hidden-accessible"
                                                        multiple="" tabindex="-1" aria-hidden="true"
                                                        data-select2-id="field321">
                                                        <option value="Langsung di Lokasi">Langsung di Lokasi</option>
                                                        <option value="Media Sosial">Media Sosial</option>
                                                        <option value="Pihak Ketiga :Traveloka/Tiket.com/dsb">Pihak Ketiga
                                                            :Traveloka/Tiket.com/dsb</option>
                                                        <option value="Website">Website</option>
                                                    </select><span
                                                        class="select2 select2-container select2-container--default"
                                                        dir="ltr" data-select2-id="180"
                                                        style="width: auto;"><span class="selection"><span
                                                                class="select2-selection select2-selection--multiple"
                                                                role="combobox" aria-haspopup="true"
                                                                aria-expanded="false" tabindex="-1"
                                                                aria-disabled="false">
                                                                <ul class="select2-selection__rendered">
                                                                    <li class="select2-search select2-search--inline">
                                                                        <input class="select2-search__field"
                                                                            type="search" tabindex="0"
                                                                            autocomplete="off" autocorrect="off"
                                                                            autocapitalize="none" spellcheck="false"
                                                                            role="searchbox" aria-autocomplete="list"
                                                                            placeholder="" style="width: 0.75em;">
                                                                    </li>
                                                                </ul>
                                                            </span></span><span class="dropdown-wrapper"
                                                            aria-hidden="true"></span></span>
                                                </div>
                                                <p></p>
                                            </div>
                                            <div class="form-group" bis_skin_checked="1">
                                                <div class="row" bis_skin_checked="1">
                                                    <div class="col-md-3" bis_skin_checked="1">
                                                        <label for="tiadafield321"
                                                            class="control-label col-form-label me-2">Tidak ada
                                                            data</label>
                                                        <input type="checkbox" class=" showhidereason"
                                                            data-shid="shfield321" id="tiadafield321"
                                                            name="tiadafield321" value="1">
                                                    </div>
                                                    <div class="col-md-9 d-none " id="shfield321"
                                                        bis_skin_checked="1">
                                                        <input type="text" class="form-control "
                                                            id="reasonfield321" name="reasonfield321" value=""
                                                            placeholder="Penjelasan">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" bis_skin_checked="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 mt-4 addborder float-left" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-md-12" bis_skin_checked="1">
                                            <div class="form-group" bis_skin_checked="1">
                                                <label for="field25" class="control-label col-form-label">25. Berapa
                                                    Persen
                                                    Tiket Terjual Melalui Internet/Online Selama Tahun Ini (%) </label> <a
                                                    tabindex="0"
                                                    class="btn btn-light-danger d-inline-flex align-items-center text-danger font-medium mx-2 my-2"
                                                    role="button" data-bs-toggle="popover" data-bs-trigger="focus"
                                                    data-bs-content="Definisi: Presentase jumlah tiket yang terjual melalui internet/online dalam satu tahun dari total penjualan tiket."
                                                    data-bs-original-title="Keterangan"><i
                                                        class="ti ti-alert-octagon me-2 fs-4"></i> Info
                                                </a>
                                                <input type="text" class="form-control " id="field25"
                                                    name="field25" value=""
                                                    placeholder="Berapa Persen Tiket Terjual Melalui Internet/Online Selama Tahun Ini (%) ">
                                                <p>*dalam %</p>
                                            </div>
                                            <div class="form-group" bis_skin_checked="1">
                                                <div class="row" bis_skin_checked="1">
                                                    <div class="col-md-3" bis_skin_checked="1">
                                                        <label for="tiadafield25"
                                                            class="control-label col-form-label me-2">Tidak ada
                                                            data</label>
                                                        <input type="checkbox" class=" showhidereason"
                                                            data-shid="shfield25" id="tiadafield25"
                                                            name="tiadafield25" value="1">
                                                    </div>
                                                    <div class="col-md-9 d-none " id="shfield25" bis_skin_checked="1">
                                                        <input type="text" class="form-control " id="reasonfield25"
                                                            name="reasonfield25" value=""
                                                            placeholder="Penjelasan">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" bis_skin_checked="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 mt-4 addborder float-left" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-md-12" bis_skin_checked="1">
                                            <div class="form-group" bis_skin_checked="1">
                                                <label for="field26" class="control-label col-form-label">26. Metode
                                                    Pembayaran Tiket</label> <a tabindex="0"
                                                    class="btn btn-light-danger d-inline-flex align-items-center text-danger font-medium mx-2 my-2"
                                                    role="button" data-bs-toggle="popover" data-bs-trigger="focus"
                                                    data-bs-content="Pilihan cara pembayaran yang tersedia seperti cara pembayaran melalui kartu kredit/kredit online, point dari program berhadiah, transfer bank, uang elektronik (emoney), debit, voucher, tunai, dan lainnya."
                                                    data-bs-original-title="Keterangan"><i
                                                        class="ti ti-alert-octagon me-2 fs-4"></i> Info
                                                </a>
                                                <div class="form-group" bis_skin_checked="1">
                                                    <select name="field26[]" id="field26"
                                                        class="select2 form-control select2-hidden-accessible"
                                                        multiple="" tabindex="-1" aria-hidden="true"
                                                        data-select2-id="field26">
                                                        <option value="Debit : Tarnsfer/Q-Ris/EDC">Debit :
                                                            Tarnsfer/Q-Ris/EDC
                                                        </option>
                                                        <option value="Kartu Kredit ">Kartu Kredit </option>
                                                        <option value="Tunai">Tunai</option>
                                                    </select><span
                                                        class="select2 select2-container select2-container--default"
                                                        dir="ltr" data-select2-id="185"
                                                        style="width: auto;"><span class="selection"><span
                                                                class="select2-selection select2-selection--multiple"
                                                                role="combobox" aria-haspopup="true"
                                                                aria-expanded="false" tabindex="-1"
                                                                aria-disabled="false">
                                                                <ul class="select2-selection__rendered">
                                                                    <li class="select2-search select2-search--inline">
                                                                        <input class="select2-search__field"
                                                                            type="search" tabindex="0"
                                                                            autocomplete="off" autocorrect="off"
                                                                            autocapitalize="none" spellcheck="false"
                                                                            role="searchbox" aria-autocomplete="list"
                                                                            placeholder="" style="width: 0.75em;">
                                                                    </li>
                                                                </ul>
                                                            </span></span><span class="dropdown-wrapper"
                                                            aria-hidden="true"></span></span>
                                                </div>
                                                <p>*dapat dipilih lebih dari satu</p>
                                            </div>
                                            <div class="form-group" bis_skin_checked="1">
                                                <div class="row" bis_skin_checked="1">
                                                    <div class="col-md-3" bis_skin_checked="1">
                                                        <label for="tiadafield26"
                                                            class="control-label col-form-label me-2">Tidak ada
                                                            data</label>
                                                        <input type="checkbox" class=" showhidereason"
                                                            data-shid="shfield26" id="tiadafield26"
                                                            name="tiadafield26" value="1">
                                                    </div>
                                                    <div class="col-md-9 d-none " id="shfield26" bis_skin_checked="1">
                                                        <input type="text" class="form-control " id="reasonfield26"
                                                            name="reasonfield26" value=""
                                                            placeholder="Penjelasan">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" bis_skin_checked="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 mt-4 addborder float-left" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-md-12" bis_skin_checked="1">
                                            <div class="form-group" bis_skin_checked="1">
                                                <label for="field27" class="control-label col-form-label">27. Sarana
                                                    Promosi / Iklan Yang Selama Ini Dilakukan Usaha Ini </label> <a
                                                    tabindex="0"
                                                    class="btn btn-light-danger d-inline-flex align-items-center text-danger font-medium mx-2 my-2"
                                                    role="button" data-bs-toggle="popover" data-bs-trigger="focus"
                                                    data-bs-content="Definisi: Sarana atau media promosi yang pernah / sedang dilakukan pengelola. "
                                                    data-bs-original-title="Keterangan"><i
                                                        class="ti ti-alert-octagon me-2 fs-4"></i> Info
                                                </a>
                                                <div class="form-group" bis_skin_checked="1">
                                                    <select name="field27[]" id="field27"
                                                        class="select2 form-control select2-hidden-accessible"
                                                        multiple="" tabindex="-1" aria-hidden="true"
                                                        data-select2-id="field27">
                                                        <option value="Media Cetak : Koran/ Buletin/dsb">Media Cetak :
                                                            Koran/
                                                            Buletin/dsb</option>
                                                        <option value="Media Elektronik: Radio/Televisi/dsb">Media
                                                            Elektronik:
                                                            Radio/Televisi/dsb</option>
                                                        <option value="Media Sosial : Facebook/Youtube/Tiktok/dsb">Media
                                                            Sosial : Facebook/Youtube/Tiktok/dsb</option>
                                                    </select><span
                                                        class="select2 select2-container select2-container--default"
                                                        dir="ltr" data-select2-id="190"
                                                        style="width: auto;"><span class="selection"><span
                                                                class="select2-selection select2-selection--multiple"
                                                                role="combobox" aria-haspopup="true"
                                                                aria-expanded="false" tabindex="-1"
                                                                aria-disabled="false">
                                                                <ul class="select2-selection__rendered">
                                                                    <li class="select2-search select2-search--inline">
                                                                        <input class="select2-search__field"
                                                                            type="search" tabindex="0"
                                                                            autocomplete="off" autocorrect="off"
                                                                            autocapitalize="none" spellcheck="false"
                                                                            role="searchbox" aria-autocomplete="list"
                                                                            placeholder="" style="width: 0.75em;">
                                                                    </li>
                                                                </ul>
                                                            </span></span><span class="dropdown-wrapper"
                                                            aria-hidden="true"></span></span>
                                                </div>
                                                <p>*dapat dipilih lebih dari satu</p>
                                            </div>
                                            <div class="form-group" bis_skin_checked="1">
                                                <div class="row" bis_skin_checked="1">
                                                    <div class="col-md-3" bis_skin_checked="1">
                                                        <label for="tiadafield27"
                                                            class="control-label col-form-label me-2">Tidak ada
                                                            data</label>
                                                        <input type="checkbox" class=" showhidereason"
                                                            data-shid="shfield27" id="tiadafield27"
                                                            name="tiadafield27" value="1">
                                                    </div>
                                                    <div class="col-md-9 d-none " id="shfield27" bis_skin_checked="1">
                                                        <input type="text" class="form-control " id="reasonfield27"
                                                            name="reasonfield27" value=""
                                                            placeholder="Penjelasan">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" bis_skin_checked="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 mt-4 addborder float-left" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-md-12" bis_skin_checked="1">
                                            <div class="form-group" bis_skin_checked="1">
                                                <label class="control-label col-form-label">28. Ada/Tidaknya Paket
                                                    Wisata</label> <a tabindex="0"
                                                    class="btn btn-light-danger d-inline-flex align-items-center text-danger font-medium mx-2 my-2"
                                                    role="button" data-bs-toggle="popover" data-bs-trigger="focus"
                                                    data-bs-content="Definisi paket wisata: paket wisata merupakan suatu perjalanan wisata yang direncanakan dan diselenggarakan oleh suatu travel agent atau biro perjalanan atas resiko dan tanggung jawab sendiri baik acara, lama waktu wisata dan tempat yang akan dikunjungi, akomodasi, transportasi, serta makanan dan minuman telah ditentukan oleh biro perjalanan dalam suatu harga yang telah ditentukan jumlahnya. Pertanyaan ini mengacu pada apakah destinasi wisata ini merupakan salah satu bagian destinasi dari sebuah paket wisata dari pihak biro perjalanan."
                                                    data-bs-original-title="Keterangan"><i
                                                        class="ti ti-alert-octagon me-2 fs-4"></i> Info
                                                </a>
                                                <div class="form-group clearfix" bis_skin_checked="1">
                                                    <div class="form-check form-check-inline" bis_skin_checked="1">
                                                        <input class="form-check-input success" type="radio"
                                                            name="field322" id="field3220" value="Ada"
                                                            checked="">
                                                        <label class="form-check-label" for="field3220">Ada</label>
                                                    </div>
                                                    <div class="form-check form-check-inline" bis_skin_checked="1">
                                                        <input class="form-check-input success" type="radio"
                                                            name="field322" id="field3221" value="Tidak Ada">
                                                        <label class="form-check-label" for="field3221">Tidak
                                                            Ada</label>
                                                    </div>

                                                </div>
                                                <p></p>
                                            </div>
                                            <div class="form-group" bis_skin_checked="1">
                                                <div class="row" bis_skin_checked="1">
                                                    <div class="col-md-3" bis_skin_checked="1">
                                                        <label for="tiadafield322"
                                                            class="control-label col-form-label me-2">Tidak ada
                                                            data</label>
                                                        <input type="checkbox" class=" showhidereason"
                                                            data-shid="shfield322" id="tiadafield322"
                                                            name="tiadafield322" value="1">
                                                    </div>
                                                    <div class="col-md-9 d-none " id="shfield322"
                                                        bis_skin_checked="1">
                                                        <input type="text" class="form-control "
                                                            id="reasonfield322" name="reasonfield322" value=""
                                                            placeholder="Penjelasan">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" bis_skin_checked="1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane " id="tab6" role="tabpanel" bis_skin_checked="1">
                                <h3 class="" id="link28" style="color: #007bff">Fasilitas</h3>
                                <div class="col-md-12 col-sm-12 mt-4 addborder float-left" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-md-12" bis_skin_checked="1">
                                            <div class="form-group" bis_skin_checked="1">
                                                <label for="field284" class="control-label col-form-label">29. Luas Area
                                                    Parkir</label> <a tabindex="0"
                                                    class="btn btn-light-danger d-inline-flex align-items-center text-danger font-medium mx-2 my-2"
                                                    role="button" data-bs-toggle="popover" data-bs-trigger="focus"
                                                    data-bs-content="Definisi luas area parkir: Besaran lahan yang tersedia untuk digunakan sebagai tempat parkir."
                                                    data-bs-original-title="Keterangan"><i
                                                        class="ti ti-alert-octagon me-2 fs-4"></i> Info
                                                </a>
                                                <input type="text" class="form-control " id="field284"
                                                    name="field284" value="" placeholder="Luas Area Parkir">
                                                <p>*dalam (m<sup>2</sup>) </p>
                                            </div>
                                            <div class="form-group" bis_skin_checked="1">
                                                <div class="row" bis_skin_checked="1">
                                                    <div class="col-md-3" bis_skin_checked="1">
                                                        <label for="tiadafield284"
                                                            class="control-label col-form-label me-2">Tidak ada
                                                            data</label>
                                                        <input type="checkbox" class=" showhidereason"
                                                            data-shid="shfield284" id="tiadafield284"
                                                            name="tiadafield284" value="1">
                                                    </div>
                                                    <div class="col-md-9 d-none " id="shfield284"
                                                        bis_skin_checked="1">
                                                        <input type="text" class="form-control "
                                                            id="reasonfield284" name="reasonfield284" value=""
                                                            placeholder="Penjelasan">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" bis_skin_checked="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 mt-4 addborder float-left" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-md-12" bis_skin_checked="1">
                                            <div class="form-group" bis_skin_checked="1">
                                                <label for="field285" class="control-label  col-form-label">30.
                                                    Kapasitas
                                                    Parkir Sepeda Motor </label> <a tabindex="0"
                                                    class="btn btn-light-danger d-inline-flex align-items-center text-danger font-medium mx-2 my-2"
                                                    role="button" data-bs-toggle="popover" data-bs-trigger="focus"
                                                    data-bs-content="Definsi kapasitas parkir sepeda motor: Jumlah sepeda motor yang dapat ditampung oleh pengelola."
                                                    data-bs-original-title="Keterangan"><i
                                                        class="ti ti-alert-octagon me-2 fs-4"></i> Info
                                                </a>
                                                <input type="number" step=".01" class="form-control "
                                                    id="field285" name="field285" value=""
                                                    placeholder="Kapasitas Parkir Sepeda Motor ">
                                                <p>*dalam unit</p>
                                            </div>
                                            <div class="form-group" bis_skin_checked="1">
                                                <div class="row" bis_skin_checked="1">
                                                    <div class="col-md-3" bis_skin_checked="1">
                                                        <label for="tiadafield285"
                                                            class="control-label col-form-label me-2">Tidak ada
                                                            data</label>
                                                        <input type="checkbox" class=" showhidereason"
                                                            data-shid="shfield285" id="tiadafield285"
                                                            name="tiadafield285" value="1">
                                                    </div>
                                                    <div class="col-md-9 d-none " id="shfield285"
                                                        bis_skin_checked="1">
                                                        <input type="text" class="form-control "
                                                            id="reasonfield285" name="reasonfield285" value=""
                                                            placeholder="Penjelasan">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" bis_skin_checked="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 mt-4 addborder float-left" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-md-12" bis_skin_checked="1">
                                            <div class="form-group" bis_skin_checked="1">
                                                <label for="field286" class="control-label  col-form-label">31.
                                                    Kapasitas
                                                    Parkir Mobil</label> <a tabindex="0"
                                                    class="btn btn-light-danger d-inline-flex align-items-center text-danger font-medium mx-2 my-2"
                                                    role="button" data-bs-toggle="popover" data-bs-trigger="focus"
                                                    data-bs-content="Definisi kapasitas parkir mobil: Jumlah mobil yang dapat ditampung oleh pengelola."
                                                    data-bs-original-title="Keterangan"><i
                                                        class="ti ti-alert-octagon me-2 fs-4"></i> Info
                                                </a>
                                                <input type="number" step=".01" class="form-control "
                                                    id="field286" name="field286" value=""
                                                    placeholder="Kapasitas Parkir Mobil">
                                                <p>*dalam unit</p>
                                            </div>
                                            <div class="form-group" bis_skin_checked="1">
                                                <div class="row" bis_skin_checked="1">
                                                    <div class="col-md-3" bis_skin_checked="1">
                                                        <label for="tiadafield286"
                                                            class="control-label col-form-label me-2">Tidak ada
                                                            data</label>
                                                        <input type="checkbox" class=" showhidereason"
                                                            data-shid="shfield286" id="tiadafield286"
                                                            name="tiadafield286" value="1">
                                                    </div>
                                                    <div class="col-md-9 d-none " id="shfield286"
                                                        bis_skin_checked="1">
                                                        <input type="text" class="form-control "
                                                            id="reasonfield286" name="reasonfield286" value=""
                                                            placeholder="Penjelasan">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" bis_skin_checked="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 mt-4 addborder float-left" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-md-12" bis_skin_checked="1">
                                            <div class="form-group" bis_skin_checked="1">
                                                <label for="field319" class="control-label  col-form-label">32.
                                                    Kapasitas
                                                    Parkir Bus</label> <a tabindex="0"
                                                    class="btn btn-light-danger d-inline-flex align-items-center text-danger font-medium mx-2 my-2"
                                                    role="button" data-bs-toggle="popover" data-bs-trigger="focus"
                                                    data-bs-content="Definisi Kapasitas parkir bus: Jumlah bus  yang dapat ditampung oleh pengelola."
                                                    data-bs-original-title="Keterangan"><i
                                                        class="ti ti-alert-octagon me-2 fs-4"></i> Info
                                                </a>
                                                <input type="number" step=".01" class="form-control "
                                                    id="field319" name="field319" value=""
                                                    placeholder="Kapasitas Parkir Bus">
                                                <p>*dalam unit</p>
                                            </div>
                                            <div class="form-group" bis_skin_checked="1">
                                                <div class="row" bis_skin_checked="1">
                                                    <div class="col-md-3" bis_skin_checked="1">
                                                        <label for="tiadafield319"
                                                            class="control-label col-form-label me-2">Tidak ada
                                                            data</label>
                                                        <input type="checkbox" class=" showhidereason"
                                                            data-shid="shfield319" id="tiadafield319"
                                                            name="tiadafield319" value="1">
                                                    </div>
                                                    <div class="col-md-9 d-none " id="shfield319"
                                                        bis_skin_checked="1">
                                                        <input type="text" class="form-control "
                                                            id="reasonfield319" name="reasonfield319" value=""
                                                            placeholder="Penjelasan">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" bis_skin_checked="1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane " id="tab7" role="tabpanel" bis_skin_checked="1">
                                <h3 class="" id="link29" style="color: #007bff">Sanitasi </h3>
                                <div class="col-md-12 col-sm-12 mt-4 addborder float-left" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-md-12" bis_skin_checked="1">
                                            <div class="form-group" bis_skin_checked="1">
                                                <label for="field30" class="control-label  col-form-label">33. Jumlah
                                                    Toilet Umum</label>
                                                <input type="number" step=".01" class="form-control "
                                                    id="field30" name="field30" value=""
                                                    placeholder="Jumlah Toilet Umum">
                                                <p>*dalam unit</p>
                                            </div>
                                            <div class="form-group" bis_skin_checked="1">
                                                <div class="row" bis_skin_checked="1">
                                                    <div class="col-md-3" bis_skin_checked="1">
                                                        <label for="tiadafield30"
                                                            class="control-label col-form-label me-2">Tidak ada
                                                            data</label>
                                                        <input type="checkbox" class=" showhidereason"
                                                            data-shid="shfield30" id="tiadafield30"
                                                            name="tiadafield30" value="1">
                                                    </div>
                                                    <div class="col-md-9 d-none " id="shfield30" bis_skin_checked="1">
                                                        <input type="text" class="form-control " id="reasonfield30"
                                                            name="reasonfield30" value=""
                                                            placeholder="Penjelasan">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" bis_skin_checked="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 mt-4 addborder float-left" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-md-12" bis_skin_checked="1">
                                            <div class="form-group" bis_skin_checked="1">
                                                <label class="control-label col-form-label">34. Ada Pembagian Antara
                                                    Toilet
                                                    laki-laki dan Perempuan</label>
                                                <div class="form-group clearfix" bis_skin_checked="1">
                                                    <div class="form-check form-check-inline" bis_skin_checked="1">
                                                        <input class="form-check-input success" type="radio"
                                                            name="field31" id="field310" value="Ada"
                                                            checked="">
                                                        <label class="form-check-label" for="field310">Ada</label>
                                                    </div>
                                                    <div class="form-check form-check-inline" bis_skin_checked="1">
                                                        <input class="form-check-input success" type="radio"
                                                            name="field31" id="field311" value="Tidak Ada">
                                                        <label class="form-check-label" for="field311">Tidak Ada</label>
                                                    </div>

                                                </div>
                                                <p></p>
                                            </div>
                                            <div class="form-group" bis_skin_checked="1">
                                                <div class="row" bis_skin_checked="1">
                                                    <div class="col-md-3" bis_skin_checked="1">
                                                        <label for="tiadafield31"
                                                            class="control-label col-form-label me-2">Tidak ada
                                                            data</label>
                                                        <input type="checkbox" class=" showhidereason"
                                                            data-shid="shfield31" id="tiadafield31"
                                                            name="tiadafield31" value="1">
                                                    </div>
                                                    <div class="col-md-9 d-none " id="shfield31" bis_skin_checked="1">
                                                        <input type="text" class="form-control " id="reasonfield31"
                                                            name="reasonfield31" value=""
                                                            placeholder="Penjelasan">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" bis_skin_checked="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 mt-4 addborder float-left" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-md-12" bis_skin_checked="1">
                                            <div class="form-group" bis_skin_checked="1">
                                                <label class="control-label col-form-label">35. Tersedia Toilet Khusus
                                                    Disabilitas dan Lansia</label>
                                                <div class="form-group clearfix" bis_skin_checked="1">
                                                    <div class="form-check form-check-inline" bis_skin_checked="1">
                                                        <input class="form-check-input success" type="radio"
                                                            name="field32" id="field320" value="Ada"
                                                            checked="">
                                                        <label class="form-check-label" for="field320">Ada</label>
                                                    </div>
                                                    <div class="form-check form-check-inline" bis_skin_checked="1">
                                                        <input class="form-check-input success" type="radio"
                                                            name="field32" id="field321" value="Tidak Ada">
                                                        <label class="form-check-label" for="field321">Tidak Ada</label>
                                                    </div>

                                                </div>
                                                <p></p>
                                            </div>
                                            <div class="form-group" bis_skin_checked="1">
                                                <div class="row" bis_skin_checked="1">
                                                    <div class="col-md-3" bis_skin_checked="1">
                                                        <label for="tiadafield32"
                                                            class="control-label col-form-label me-2">Tidak ada
                                                            data</label>
                                                        <input type="checkbox" class=" showhidereason"
                                                            data-shid="shfield32" id="tiadafield32"
                                                            name="tiadafield32" value="1">
                                                    </div>
                                                    <div class="col-md-9 d-none " id="shfield32" bis_skin_checked="1">
                                                        <input type="text" class="form-control " id="reasonfield32"
                                                            name="reasonfield32" value=""
                                                            placeholder="Penjelasan">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" bis_skin_checked="1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane " id="tab8" role="tabpanel" bis_skin_checked="1">
                                <h3 class="" id="link33" style="color: #007bff">Keamanan</h3>
                                <div class="col-md-12 col-sm-12 mt-4 addborder float-left" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-md-12" bis_skin_checked="1">
                                            <div class="form-group" bis_skin_checked="1">
                                                <label class="control-label col-form-label">36. Prosedur Kerja
                                                    Penyelenggaraan
                                                    Kegiatan (SOP)</label>
                                                <div class="form-group clearfix" bis_skin_checked="1">
                                                    <div class="form-check form-check-inline" bis_skin_checked="1">
                                                        <input class="form-check-input success" type="radio"
                                                            name="field34" id="field340" value="Ada"
                                                            checked="">
                                                        <label class="form-check-label" for="field340">Ada</label>
                                                    </div>
                                                    <div class="form-check form-check-inline" bis_skin_checked="1">
                                                        <input class="form-check-input success" type="radio"
                                                            name="field34" id="field341" value="Tidak Ada">
                                                        <label class="form-check-label" for="field341">Tidak Ada</label>
                                                    </div>

                                                </div>
                                                <p></p>
                                            </div>
                                            <div class="form-group" bis_skin_checked="1">
                                                <div class="row" bis_skin_checked="1">
                                                    <div class="col-md-3" bis_skin_checked="1">
                                                        <label for="tiadafield34"
                                                            class="control-label col-form-label me-2">Tidak ada
                                                            data</label>
                                                        <input type="checkbox" class=" showhidereason"
                                                            data-shid="shfield34" id="tiadafield34"
                                                            name="tiadafield34" value="1">
                                                    </div>
                                                    <div class="col-md-9 d-none " id="shfield34" bis_skin_checked="1">
                                                        <input type="text" class="form-control " id="reasonfield34"
                                                            name="reasonfield34" value=""
                                                            placeholder="Penjelasan">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" bis_skin_checked="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 mt-4 addborder float-left" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-md-12" bis_skin_checked="1">
                                            <div class="form-group" bis_skin_checked="1">
                                                <label class="control-label col-form-label">37. SOP Keamanan
                                                    Pengunjung</label>
                                                <div class="form-group clearfix" bis_skin_checked="1">
                                                    <div class="form-check form-check-inline" bis_skin_checked="1">
                                                        <input class="form-check-input success" type="radio"
                                                            name="field35" id="field350" value="Ada"
                                                            checked="">
                                                        <label class="form-check-label" for="field350">Ada</label>
                                                    </div>
                                                    <div class="form-check form-check-inline" bis_skin_checked="1">
                                                        <input class="form-check-input success" type="radio"
                                                            name="field35" id="field351" value="Tidak Ada">
                                                        <label class="form-check-label" for="field351">Tidak Ada</label>
                                                    </div>

                                                </div>
                                                <p></p>
                                            </div>
                                            <div class="form-group" bis_skin_checked="1">
                                                <div class="row" bis_skin_checked="1">
                                                    <div class="col-md-3" bis_skin_checked="1">
                                                        <label for="tiadafield35"
                                                            class="control-label col-form-label me-2">Tidak ada
                                                            data</label>
                                                        <input type="checkbox" class=" showhidereason"
                                                            data-shid="shfield35" id="tiadafield35"
                                                            name="tiadafield35" value="1">
                                                    </div>
                                                    <div class="col-md-9 d-none " id="shfield35" bis_skin_checked="1">
                                                        <input type="text" class="form-control " id="reasonfield35"
                                                            name="reasonfield35" value=""
                                                            placeholder="Penjelasan">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" bis_skin_checked="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 mt-4 addborder float-left" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-md-12" bis_skin_checked="1">
                                            <div class="form-group" bis_skin_checked="1">
                                                <label class="control-label col-form-label">38. Jalur Evakuasi</label>
                                                <div class="form-group clearfix" bis_skin_checked="1">
                                                    <div class="form-check form-check-inline" bis_skin_checked="1">
                                                        <input class="form-check-input success" type="radio"
                                                            name="field37" id="field370" value="Ada"
                                                            checked="">
                                                        <label class="form-check-label" for="field370">Ada</label>
                                                    </div>
                                                    <div class="form-check form-check-inline" bis_skin_checked="1">
                                                        <input class="form-check-input success" type="radio"
                                                            name="field37" id="field371" value="Tidak Ada">
                                                        <label class="form-check-label" for="field371">Tidak Ada</label>
                                                    </div>

                                                </div>
                                                <p></p>
                                            </div>
                                            <div class="form-group" bis_skin_checked="1">
                                                <div class="row" bis_skin_checked="1">
                                                    <div class="col-md-3" bis_skin_checked="1">
                                                        <label for="tiadafield37"
                                                            class="control-label col-form-label me-2">Tidak ada
                                                            data</label>
                                                        <input type="checkbox" class=" showhidereason"
                                                            data-shid="shfield37" id="tiadafield37"
                                                            name="tiadafield37" value="1">
                                                    </div>
                                                    <div class="col-md-9 d-none " id="shfield37" bis_skin_checked="1">
                                                        <input type="text" class="form-control " id="reasonfield37"
                                                            name="reasonfield37" value=""
                                                            placeholder="Penjelasan">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" bis_skin_checked="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 mt-4 addborder float-left" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-md-12" bis_skin_checked="1">
                                            <div class="form-group" bis_skin_checked="1">
                                                <label class="control-label col-form-label">39. Asuransi
                                                    Pengunjung</label>
                                                <div class="form-group clearfix" bis_skin_checked="1">
                                                    <div class="form-check form-check-inline" bis_skin_checked="1">
                                                        <input class="form-check-input success" type="radio"
                                                            name="field38" id="field380" value="Ada"
                                                            checked="">
                                                        <label class="form-check-label" for="field380">Ada</label>
                                                    </div>
                                                    <div class="form-check form-check-inline" bis_skin_checked="1">
                                                        <input class="form-check-input success" type="radio"
                                                            name="field38" id="field381" value="Tidak Ada">
                                                        <label class="form-check-label" for="field381">Tidak Ada</label>
                                                    </div>

                                                </div>
                                                <p></p>
                                            </div>
                                            <div class="form-group" bis_skin_checked="1">
                                                <div class="row" bis_skin_checked="1">
                                                    <div class="col-md-3" bis_skin_checked="1">
                                                        <label for="tiadafield38"
                                                            class="control-label col-form-label me-2">Tidak ada
                                                            data</label>
                                                        <input type="checkbox" class=" showhidereason"
                                                            data-shid="shfield38" id="tiadafield38"
                                                            name="tiadafield38" value="1">
                                                    </div>
                                                    <div class="col-md-9 d-none " id="shfield38" bis_skin_checked="1">
                                                        <input type="text" class="form-control " id="reasonfield38"
                                                            name="reasonfield38" value=""
                                                            placeholder="Penjelasan">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" bis_skin_checked="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 mt-4 addborder float-left" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-md-12" bis_skin_checked="1">
                                            <div class="form-group" bis_skin_checked="1">
                                                <label class="control-label col-form-label">40. Pos Keamanan</label>
                                                <div class="form-group clearfix" bis_skin_checked="1">
                                                    <div class="form-check form-check-inline" bis_skin_checked="1">
                                                        <input class="form-check-input success" type="radio"
                                                            name="field39" id="field390" value="Ada"
                                                            checked="">
                                                        <label class="form-check-label" for="field390">Ada</label>
                                                    </div>
                                                    <div class="form-check form-check-inline" bis_skin_checked="1">
                                                        <input class="form-check-input success" type="radio"
                                                            name="field39" id="field391" value="Tidak Ada">
                                                        <label class="form-check-label" for="field391">Tidak Ada</label>
                                                    </div>

                                                </div>
                                                <p></p>
                                            </div>
                                            <div class="form-group" bis_skin_checked="1">
                                                <div class="row" bis_skin_checked="1">
                                                    <div class="col-md-3" bis_skin_checked="1">
                                                        <label for="tiadafield39"
                                                            class="control-label col-form-label me-2">Tidak ada
                                                            data</label>
                                                        <input type="checkbox" class=" showhidereason"
                                                            data-shid="shfield39" id="tiadafield39"
                                                            name="tiadafield39" value="1">
                                                    </div>
                                                    <div class="col-md-9 d-none " id="shfield39" bis_skin_checked="1">
                                                        <input type="text" class="form-control " id="reasonfield39"
                                                            name="reasonfield39" value=""
                                                            placeholder="Penjelasan">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" bis_skin_checked="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 mt-4 addborder float-left" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-md-12" bis_skin_checked="1">
                                            <div class="form-group" bis_skin_checked="1">
                                                <label class="control-label col-form-label">41. Kamera
                                                    Pengawas/CCTV</label>
                                                <div class="form-group clearfix" bis_skin_checked="1">
                                                    <div class="form-check form-check-inline" bis_skin_checked="1">
                                                        <input class="form-check-input success" type="radio"
                                                            name="field287" id="field2870" value="Ada"
                                                            checked="">
                                                        <label class="form-check-label" for="field2870">Ada</label>
                                                    </div>
                                                    <div class="form-check form-check-inline" bis_skin_checked="1">
                                                        <input class="form-check-input success" type="radio"
                                                            name="field287" id="field2871" value="Tidak Ada">
                                                        <label class="form-check-label" for="field2871">Tidak
                                                            Ada</label>
                                                    </div>

                                                </div>
                                                <p></p>
                                            </div>
                                            <div class="form-group" bis_skin_checked="1">
                                                <div class="row" bis_skin_checked="1">
                                                    <div class="col-md-3" bis_skin_checked="1">
                                                        <label for="tiadafield287"
                                                            class="control-label col-form-label me-2">Tidak ada
                                                            data</label>
                                                        <input type="checkbox" class=" showhidereason"
                                                            data-shid="shfield287" id="tiadafield287"
                                                            name="tiadafield287" value="1">
                                                    </div>
                                                    <div class="col-md-9 d-none " id="shfield287"
                                                        bis_skin_checked="1">
                                                        <input type="text" class="form-control "
                                                            id="reasonfield287" name="reasonfield287" value=""
                                                            placeholder="Penjelasan">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" bis_skin_checked="1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane " id="tab9" role="tabpanel" bis_skin_checked="1">
                                <h3 class="" id="link288" style="color: #007bff">Makanan dan Minuman </h3>
                                <div class="col-md-12 col-sm-12 mt-4 addborder float-left" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-md-12" bis_skin_checked="1">
                                            <div class="form-group" bis_skin_checked="1">
                                                <label for="field289" class="control-label col-form-label">42.
                                                    Ketersediaan
                                                    Jasa Makanan dan Minuman (kios, tenant, dsb) di Dalam Destinasi</label>
                                                <div class="row d-flex" bis_skin_checked="1">
                                                    <div class="col-md-6 mt-2" bis_skin_checked="1"><input
                                                            type="text"
                                                            class="form-control field289 ui-autocomplete-input"
                                                            name="field289_label[]" id="field289_0_label"
                                                            value="" placeholder="Pilih atau ketik baru"
                                                            autocomplete="off"><input type="text"
                                                            class="form-control " name="field289[]" value=""
                                                            placeholder="Teks"></div>
                                                </div>
                                                <div class="" bis_skin_checked="1"><a href="#"
                                                        id="addfield289">Tambah Record</a></div>
                                                <p>*data dalam unit (jika ada)</p>
                                            </div>
                                            <div class="form-group" bis_skin_checked="1">
                                                <div class="row" bis_skin_checked="1">
                                                    <div class="col-md-3" bis_skin_checked="1">
                                                        <label for="tiadafield289"
                                                            class="control-label col-form-label me-2">Tidak ada
                                                            data</label>
                                                        <input type="checkbox" class=" showhidereason"
                                                            data-shid="shfield289" id="tiadafield289"
                                                            name="tiadafield289" value="1">
                                                    </div>
                                                    <div class="col-md-9 d-none " id="shfield289"
                                                        bis_skin_checked="1">
                                                        <input type="text" class="form-control "
                                                            id="reasonfield289" name="reasonfield289" value=""
                                                            placeholder="Penjelasan">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" bis_skin_checked="1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane " id="tab10" role="tabpanel" bis_skin_checked="1">
                                <h3 class="" id="link291" style="color: #007bff">Signage</h3>
                                <div class="col-md-12 col-sm-12 mt-4 addborder float-left" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-md-12" bis_skin_checked="1">
                                            <div class="form-group" bis_skin_checked="1">
                                                <label class="control-label col-form-label">43. Ada/Tidaknya
                                                    Signage</label>
                                                <a tabindex="0"
                                                    class="btn btn-light-danger d-inline-flex align-items-center text-danger font-medium mx-2 my-2"
                                                    role="button" data-bs-toggle="popover" data-bs-trigger="focus"
                                                    data-bs-content="Definisi signage: Papan tanda adalah rancangan dengan tanda dan simbol untuk menyampaikan suatu pesan. Papan tanda dapat berupa papan peringatan, papan petunjuk arah, papan reklame, dan papan nama. Bahan-bahannya bisa beraneka ragam, mulai dari kayu, besi, hingga akrilik."
                                                    data-bs-original-title="Keterangan"><i
                                                        class="ti ti-alert-octagon me-2 fs-4"></i> Info
                                                </a>
                                                <div class="form-group clearfix" bis_skin_checked="1">
                                                    <div class="form-check form-check-inline" bis_skin_checked="1">
                                                        <input class="form-check-input success" type="radio"
                                                            name="field290" id="field2900" value="Ada"
                                                            checked="">
                                                        <label class="form-check-label" for="field2900">Ada</label>
                                                    </div>
                                                    <div class="form-check form-check-inline" bis_skin_checked="1">
                                                        <input class="form-check-input success" type="radio"
                                                            name="field290" id="field2901" value="Tidak Ada">
                                                        <label class="form-check-label" for="field2901">Tidak
                                                            Ada</label>
                                                    </div>

                                                </div>
                                                <p></p>
                                            </div>
                                            <div class="form-group" bis_skin_checked="1">
                                                <div class="row" bis_skin_checked="1">
                                                    <div class="col-md-3" bis_skin_checked="1">
                                                        <label for="tiadafield290"
                                                            class="control-label col-form-label me-2">Tidak ada
                                                            data</label>
                                                        <input type="checkbox" class=" showhidereason"
                                                            data-shid="shfield290" id="tiadafield290"
                                                            name="tiadafield290" value="1">
                                                    </div>
                                                    <div class="col-md-9 d-none " id="shfield290"
                                                        bis_skin_checked="1">
                                                        <input type="text" class="form-control "
                                                            id="reasonfield290" name="reasonfield290" value=""
                                                            placeholder="Penjelasan">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" bis_skin_checked="1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane " id="tab11" role="tabpanel" bis_skin_checked="1">
                                <h3 class="" id="link41" style="color: #007bff">Lainnya</h3>
                                <div class="col-md-12 col-sm-12 mt-4 addborder float-left" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-md-12" bis_skin_checked="1">
                                            <div class="form-group" bis_skin_checked="1">
                                                <label class="control-label col-form-label">44. Pusat Informasi</label>
                                                <div class="form-group clearfix" bis_skin_checked="1">
                                                    <div class="form-check form-check-inline" bis_skin_checked="1">
                                                        <input class="form-check-input success" type="radio"
                                                            name="field42" id="field420" value="Ada"
                                                            checked="">
                                                        <label class="form-check-label" for="field420">Ada</label>
                                                    </div>
                                                    <div class="form-check form-check-inline" bis_skin_checked="1">
                                                        <input class="form-check-input success" type="radio"
                                                            name="field42" id="field421" value="Tidak Ada">
                                                        <label class="form-check-label" for="field421">Tidak Ada</label>
                                                    </div>

                                                </div>
                                                <p></p>
                                            </div>
                                            <div class="form-group" bis_skin_checked="1">
                                                <div class="row" bis_skin_checked="1">
                                                    <div class="col-md-3" bis_skin_checked="1">
                                                        <label for="tiadafield42"
                                                            class="control-label col-form-label me-2">Tidak ada
                                                            data</label>
                                                        <input type="checkbox" class=" showhidereason"
                                                            data-shid="shfield42" id="tiadafield42"
                                                            name="tiadafield42" value="1">
                                                    </div>
                                                    <div class="col-md-9 d-none " id="shfield42" bis_skin_checked="1">
                                                        <input type="text" class="form-control " id="reasonfield42"
                                                            name="reasonfield42" value=""
                                                            placeholder="Penjelasan">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" bis_skin_checked="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 mt-4 addborder float-left" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-md-12" bis_skin_checked="1">
                                            <div class="form-group" bis_skin_checked="1">
                                                <label class="control-label col-form-label">45. Kotak Saran</label>
                                                <div class="form-group clearfix" bis_skin_checked="1">
                                                    <div class="form-check form-check-inline" bis_skin_checked="1">
                                                        <input class="form-check-input success" type="radio"
                                                            name="field43" id="field430" value="Ada"
                                                            checked="">
                                                        <label class="form-check-label" for="field430">Ada</label>
                                                    </div>
                                                    <div class="form-check form-check-inline" bis_skin_checked="1">
                                                        <input class="form-check-input success" type="radio"
                                                            name="field43" id="field431" value="Tidak Ada">
                                                        <label class="form-check-label" for="field431">Tidak Ada</label>
                                                    </div>

                                                </div>
                                                <p></p>
                                            </div>
                                            <div class="form-group" bis_skin_checked="1">
                                                <div class="row" bis_skin_checked="1">
                                                    <div class="col-md-3" bis_skin_checked="1">
                                                        <label for="tiadafield43"
                                                            class="control-label col-form-label me-2">Tidak ada
                                                            data</label>
                                                        <input type="checkbox" class=" showhidereason"
                                                            data-shid="shfield43" id="tiadafield43"
                                                            name="tiadafield43" value="1">
                                                    </div>
                                                    <div class="col-md-9 d-none " id="shfield43" bis_skin_checked="1">
                                                        <input type="text" class="form-control " id="reasonfield43"
                                                            name="reasonfield43" value=""
                                                            placeholder="Penjelasan">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" bis_skin_checked="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 mt-4 addborder float-left" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-md-12" bis_skin_checked="1">
                                            <div class="form-group" bis_skin_checked="1">
                                                <label class="control-label col-form-label">46. Tempat Ibadah</label>
                                                <div class="form-group clearfix" bis_skin_checked="1">
                                                    <div class="form-check form-check-inline" bis_skin_checked="1">
                                                        <input class="form-check-input success" type="radio"
                                                            name="field44" id="field440" value="Ada"
                                                            checked="">
                                                        <label class="form-check-label" for="field440">Ada</label>
                                                    </div>
                                                    <div class="form-check form-check-inline" bis_skin_checked="1">
                                                        <input class="form-check-input success" type="radio"
                                                            name="field44" id="field441" value="Tidak Ada">
                                                        <label class="form-check-label" for="field441">Tidak Ada</label>
                                                    </div>

                                                </div>
                                                <p></p>
                                            </div>
                                            <div class="form-group" bis_skin_checked="1">
                                                <div class="row" bis_skin_checked="1">
                                                    <div class="col-md-3" bis_skin_checked="1">
                                                        <label for="tiadafield44"
                                                            class="control-label col-form-label me-2">Tidak ada
                                                            data</label>
                                                        <input type="checkbox" class=" showhidereason"
                                                            data-shid="shfield44" id="tiadafield44"
                                                            name="tiadafield44" value="1">
                                                    </div>
                                                    <div class="col-md-9 d-none " id="shfield44" bis_skin_checked="1">
                                                        <input type="text" class="form-control " id="reasonfield44"
                                                            name="reasonfield44" value=""
                                                            placeholder="Penjelasan">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" bis_skin_checked="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 mt-4 addborder float-left" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-md-12" bis_skin_checked="1">
                                            <div class="form-group" bis_skin_checked="1">
                                                <label class="control-label col-form-label">47. Apakah Memberlakukan
                                                    Konsep 3R
                                                    (Reduce, Reuse, Recycle)</label>
                                                <div class="form-group clearfix" bis_skin_checked="1">
                                                    <div class="form-check form-check-inline" bis_skin_checked="1">
                                                        <input class="form-check-input success" type="radio"
                                                            name="field45" id="field450" value="Ada"
                                                            checked="">
                                                        <label class="form-check-label" for="field450">Ada</label>
                                                    </div>
                                                    <div class="form-check form-check-inline" bis_skin_checked="1">
                                                        <input class="form-check-input success" type="radio"
                                                            name="field45" id="field451" value="Tidak Ada">
                                                        <label class="form-check-label" for="field451">Tidak Ada</label>
                                                    </div>

                                                </div>
                                                <p></p>
                                            </div>
                                            <div class="form-group" bis_skin_checked="1">
                                                <div class="row" bis_skin_checked="1">
                                                    <div class="col-md-3" bis_skin_checked="1">
                                                        <label for="tiadafield45"
                                                            class="control-label col-form-label me-2">Tidak ada
                                                            data</label>
                                                        <input type="checkbox" class=" showhidereason"
                                                            data-shid="shfield45" id="tiadafield45"
                                                            name="tiadafield45" value="1">
                                                    </div>
                                                    <div class="col-md-9 d-none " id="shfield45" bis_skin_checked="1">
                                                        <input type="text" class="form-control " id="reasonfield45"
                                                            name="reasonfield45" value=""
                                                            placeholder="Penjelasan">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" bis_skin_checked="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 mt-4 addborder float-left" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-md-12" bis_skin_checked="1">
                                            <div class="form-group" bis_skin_checked="1">
                                                <label class="control-label col-form-label">48. Sistem Pengolahan Limbah
                                                </label>
                                                <div class="form-group clearfix" bis_skin_checked="1">
                                                    <div class="form-check form-check-inline" bis_skin_checked="1">
                                                        <input class="form-check-input success" type="radio"
                                                            name="field50" id="field500" value="Ada"
                                                            checked="">
                                                        <label class="form-check-label" for="field500">Ada</label>
                                                    </div>
                                                    <div class="form-check form-check-inline" bis_skin_checked="1">
                                                        <input class="form-check-input success" type="radio"
                                                            name="field50" id="field501" value="Tidak Ada">
                                                        <label class="form-check-label" for="field501">Tidak Ada</label>
                                                    </div>

                                                </div>
                                                <p></p>
                                            </div>
                                            <div class="form-group" bis_skin_checked="1">
                                                <div class="row" bis_skin_checked="1">
                                                    <div class="col-md-3" bis_skin_checked="1">
                                                        <label for="tiadafield50"
                                                            class="control-label col-form-label me-2">Tidak ada
                                                            data</label>
                                                        <input type="checkbox" class=" showhidereason"
                                                            data-shid="shfield50" id="tiadafield50"
                                                            name="tiadafield50" value="1">
                                                    </div>
                                                    <div class="col-md-9 d-none " id="shfield50" bis_skin_checked="1">
                                                        <input type="text" class="form-control " id="reasonfield50"
                                                            name="reasonfield50" value=""
                                                            placeholder="Penjelasan">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" bis_skin_checked="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 mt-4 addborder float-left" bis_skin_checked="1">
                                    <div class="row" bis_skin_checked="1">
                                        <div class="col-md-12" bis_skin_checked="1">
                                            <div class="form-group" bis_skin_checked="1">
                                                <label for="field292" class="control-label col-form-label">49. Sumber
                                                    Air</label> <a tabindex="0"
                                                    class="btn btn-light-danger d-inline-flex align-items-center text-danger font-medium mx-2 my-2"
                                                    role="button" data-bs-toggle="popover" data-bs-trigger="focus"
                                                    data-bs-content="Jika terdapat jenis lainnya,input pada kolom bawah"
                                                    data-bs-original-title="Keterangan"><i
                                                        class="ti ti-alert-octagon me-2 fs-4"></i> Info
                                                </a>
                                                <div class="row d-flex" bis_skin_checked="1">
                                                    <div class="col-md-6 mt-2" bis_skin_checked="1"><input
                                                            type="text"
                                                            class="form-control field292 ui-autocomplete-input"
                                                            name="field292_label[]" id="field292_0_label"
                                                            value="" placeholder="Pilih atau ketik baru"
                                                            autocomplete="off"><input type="text"
                                                            class="form-control " name="field292[]" value=""
                                                            placeholder="Teks"></div>
                                                </div>
                                                <div class="" bis_skin_checked="1"><a href="#"
                                                        id="addfield292">Tambah Record</a></div>
                                                <p></p>
                                            </div>
                                            <div class="form-group" bis_skin_checked="1">
                                                <div class="row" bis_skin_checked="1">
                                                    <div class="col-md-3" bis_skin_checked="1">
                                                        <label for="tiadafield292"
                                                            class="control-label col-form-label me-2">Tidak ada
                                                            data</label>
                                                        <input type="checkbox" class=" showhidereason"
                                                            data-shid="shfield292" id="tiadafield292"
                                                            name="tiadafield292" value="1">
                                                    </div>
                                                    <div class="col-md-9 d-none " id="shfield292"
                                                        bis_skin_checked="1">
                                                        <input type="text" class="form-control "
                                                            id="reasonfield292" name="reasonfield292" value=""
                                                            placeholder="Penjelasan">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" bis_skin_checked="1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-6 col-sm-12 float-left " bis_skin_checked="1">
                    <div class="form-group" bis_skin_checked="1">
                        <label class="control-label " for="image">Foto Profil/Pendukung</label>
                        <div class="" bis_skin_checked="1">

                            <input type="file" name="image0" class="form-control ">
                            <input type="file" name="image1" class="form-control ">
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12 float-left  mt-3" bis_skin_checked="1">
                    <h3 class="" id="linkresponden" style="color: #007bff">Identifikasi Responden</h3>
                </div>

                <div class="col-md-6 col-sm-12 float-left " bis_skin_checked="1">
                    <div class="form-group" bis_skin_checked="1">
                        <label for="cp_nama" class="control-label ">Nama Responden</label>
                        <input id="cp_nama" class="cp_nama form-control" type="text" value=""
                            name="cp_nama">
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 float-left " bis_skin_checked="1">
                    <div class="form-group" bis_skin_checked="1">
                        <label for="cp_posisi" class="control-label ">Jabatan Responden</label>
                        <input id="cp_posisi" class="cp_posisi form-control" type="text" value=""
                            name="cp_posisi">
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 float-left " bis_skin_checked="1">
                    <div class="form-group" bis_skin_checked="1">
                        <label for="cp_phone" class="control-label ">Nomor HP Responden</label>
                        <input id="cp_phone" class="cp_phone form-control" type="text" value=""
                            name="cp_phone">
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('wisata.index') }}" class="btn btn-secondary">Batal</a>
        </form>



    </div>
@endsection
