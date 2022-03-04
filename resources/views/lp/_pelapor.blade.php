<form id="formPelapor">
    <div class="form-group row">
        <input type="hidden" id="idpelapor" value="0" readonly>
        <label for="inputEmail3" class="col-sm-2 col-form-label">NIK</label>
        <div class="col-sm-5">
            <input type="text" wajib class="form-control" id="nik">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-5">
            <input type="text" wajib class="form-control" id="nama">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Tanggal Lahir</label>
        <div class="col-sm-5">
            <div class="input-group">
                <input type="text" wajib readonly class="form-control datepicker" id="tgl_lahir">
                <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2"><i class="fas fa-calendar"></i></span>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Umur</label>
        <div class="col-sm-5">
            <input type="text" wajib class="form-control angka" id="umur">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Jenis Kelamin</label>
        <div class="col-sm-5">
           <select name="jk" wajib id="jk" class="form-control">
               <option value="1">Laki-laki</option>
                <option value="2">Perempuan</option>
           </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Alamat</label>
        <div class="col-sm-5">
            <textarea wajib name="alamat" id="alamat" class="form-control" cols="30" rows="10"></textarea>
        </div>
    </div>
</form>