<style>
    .mapboxgl-canvas {
    height: 100%;
    width: 100%;
    }
</style>
<div class="float-right">
    <button id="btnModalBarbuk" onclick="$('input[type=text]').val('');$('#idbb').val(0)" data-toggle="modal" data-target="#modal-bb"
        class="mb-2 mr-2 btn btn-primary"><i class="fa fa-plus-circle"></i> Tambah Data</button>
</div>
<table class="table table-bordered" style="margin-top: 10px;">
    <thead>
        <tr>
            <th style="width: 10px">#</th>
            <th style="width: 12%">Opsi</th>
            <th>Identitas</th>
            <th>Jenis</th>
            <th>Nomor Rangka</th>
            <th>Nomor Mesin</th>
        </tr>
    </thead>
    <tbody id="listbb">
        <tr>
            <td colspan="6">
                <div class="alert alert-warning text-center">Data Kosong</div>
            </td>
        </tr>
    </tbody>
</table>

<div class="modal fade modalcostume" data-backdrop="static" data-keyboard="false" id="modal-bb" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Data STNK</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="max-height:400px; overflow-x:auto">
                <form role="form" id="formbarangbukti">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Nama Pemilik</label>
                                <input type="hidden" value="0" readonly id="idbb">
                                <input type="text" class="form-control huruf" wajib id="namabb">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>NIK</label>
                                <input type="text" class="form-control angka" wajib id="nikbb">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" class="form-control hurufangka" wajib id="alamatbb">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Nomor Registrasi</label>
                                <input type="text" class="form-control hurufangka" wajib id="nomor_registrasi">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Nomor Rangka</label>
                                <input type="text" class="form-control hurufangka" wajib id="nomor_rangka">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Nomor Mesin</label>
                                <input type="text" class="form-control hurufangka" wajib id="nomor_mesin">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Merk</label>
                                <input type="text" class="form-control hurufangka" wajib id="merk">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Warna</label>
                                <input type="text" class="form-control huruf" wajib id="warna">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Type</label>
                                <input type="text" class="form-control hurufangka" wajib id="type">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Bahan Bakar</label>
                                <input type="text" class="form-control huruf" wajib id="bahan_bakar">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Jenis</label>
                                <input type="text" class="form-control hurufangka" wajib id="jenis">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Warna TNKB</label>
                                <input type="text" class="form-control huruf" wajib id="warna_tnkb">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Model</label>
                                <input type="text" class="form-control hurufangka" wajib id="model">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Tahun Registrasi</label>
                                <input type="text" class="form-control angka" maxlength="4" wajib id="tahun_registrasi">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Tahun Pembuatan</label>
                                <input type="text" class="form-control angka" maxlength="4" wajib id="tahun_pembuatan">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Nomor BPKB</label>
                                <input type="text" class="form-control hurufangka" wajib id="nomor_bpkb">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Isi Silinder</label>
                                <input type="text" class="form-control angka" wajib id="isi_silinder">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            &nbsp;
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-4 col-sm-12">
                            <div class="form-group">
                                <label>Longitude</label>
                                <input type="text" class="form-control angka" wajib id="longitude">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group">
                                <label>Latitude</label>
                                <input type="text" class="form-control angka" wajib id="latitude">
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-12">
                            <button type="button"  class="btn btn-primary" data-toggle="modal" data-target="#modal-peta">Peta</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" onclick="simpanbarangbukti()">Simpan</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade modalcostume" data-backdrop="static" data-keyboard="false" id="modal-peta" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Peta Wilayah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="container-peta" style="height:600px;"></div>
            <div class="modal-footer">
                <button type="button" id="btn-tutup-peta" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>