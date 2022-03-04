@extends('mainlayout')

@section('styles')
@endsection

@section('content')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div>Barang Bukti</div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <table class="mb-0 table table-bordered" id="myTable" style="width:100%">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th>Opsi</th>
                                <th>Nomor Laporan Polisi</th>
                                <th>Tanggal</th>
                                <th>Nomor Registrasi</th>
                                <th>Status</th>
                                <th>Wilayah Hukum</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade modalcostume" data-backdrop="static" data-keyboard="false" id="modal-status-lp" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Status Barang Bukti</h5>
            </div>
            <div class="modal-body">
            <form id="formPelapor">
                <input type="hidden" id="id-lp">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Wilayah Hukum</label>
                    <div class="col-sm-10">
                    <select name="status" style="width:100%" wajib id="status" class="form-control select2"></select>
                    </div>
                </div>
            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" onclick="updatestatus()" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="/js/check/index.js"></script>
@endsection