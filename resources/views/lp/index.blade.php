@extends('mainlayout')

@section('styles')
@endsection

@section('content')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div>Laporan Polisi</div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">
                    <div class="btn-actions-pane-right">
                        <button onclick="window.location = '/laporanpolisi/form'" class="mb-2 mr-2 btn btn-primary"><i
                                class="fa fa-plus-circle"></i> Tambah Data</button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="mb-0 table table-bordered" id="myTable" style="width:100%">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th width="23%">Opsi</th>
                                <th>Nomor Laporan Polisi</th>
                                <th>Tanggal</th>
                                <th>Status</th>
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
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Status Laporan  Polisi</h5>
            </div>
            <div class="modal-body">
            <form id="formPelapor">
                <input type="hidden" id="id-lp">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                    <select name="status" wajib id="status" class="form-control">
                        <option value="1">P21</option>
                        <option value="2">TAHAP II</option>
                        <option value="3">SP 3</option>
                    </select>
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
<script src="/js/lp/index.js"></script>
@endsection