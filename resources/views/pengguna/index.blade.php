@extends('mainlayout')

@section('styles')
@endsection

@section('content')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div>Daftar Pengguna</div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">
                    <div class="btn-actions-pane-right">
                        <button onclick="addPengguna()" class="mb-2 mr-2 btn btn-primary"><i
                                class="fa fa-plus-circle"></i> Tambah Data</button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="mb-0 table table-bordered" id="myTable" style="width:100%">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th width="10%">Opsi</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Satuan Kerja</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade modalcostume" data-backdrop="static" data-keyboard="false" id="modal-add-user" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Pengguna</h5>
            </div>
            <div class="modal-body">
            <div>
                <ul id="error-msg" style="color:red"></ul>
            </div>
            <form id="formPengguna">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" id="name" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" id="email" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">password</label>
                    <div class="col-sm-10">
                        <input type="password" id="password" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Role</label>
                    <div class="col-sm-10">
                        <select name="role" id="role" class="form-control select2" style="width:100%"></select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Satker</label>
                    <div class="col-sm-10">
                        <select name="satker" id="satker" class="form-control select2" style="width:100%"></select>
                    </div>
                </div>
            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" onclick="addUser()" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade modalcostume" data-backdrop="static" data-keyboard="false" id="modal-edit-user" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Pengguna</h5>
            </div>
            <div class="modal-body">
            <div>
                <ul id="error-msg-edit" style="color:red"></ul>
            </div>
            <form id="formPenggunaEdit">
                <input type="hidden" id="id">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" id="name-edit" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">password</label>
                    <div class="col-sm-10">
                        <input type="password" id="password-edit" class="form-control">
                    </div>
                </div>
            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" onclick="updateUser()" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="/js/pengguna/index.js"></script>
@endsection