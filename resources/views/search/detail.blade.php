@extends('mainlayout')

@section('styles')
@endsection

@section('content')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div>Pencarian Data Kendaraan</div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="main-card mb-3 card">
                <div class="card-header">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="input-group">
                            <input type="text" id="txtcari" class="form-control">
                            <div class="input-group-append">
                                <button id="dr-cari" class="btn btn-outline-secondary dropdown-toggle" type="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Kategori</button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" data-isi="1" href="#">Nomor Polisi</a>
                                    <a class="dropdown-item" data-isi="2" href="#">Nomor STNK</a>
                                    <a class="dropdown-item" data-isi="3" href="#">Nomor Mesin</a>
                                </div>
                            </div>
                            <div class="input-group-append">
                                <button onclick="search()" class="btn btn-primary">Cari Data</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12"></div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="tableSearch" style="width: 100%;">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th style="width: 13%">Export</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th style="width: 13%">Nomor Registrasi</th>
                                <th style="width: 13%">Nomor Rangka</th>
                                <th style="width: 13%">Nomor Mesin</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="/js/search/detail.js"></script>
@endsection