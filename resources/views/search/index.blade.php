@extends('mainlayout')

@section('styles')
<link rel="stylesheet" href="/assets/theme/css/search.css">
@endsection

@section('content')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div>Pencarian Data Barang Bukti</div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="s013">
                <form>
                    <fieldset>
                        <legend>Cari Data Kendaraan</legend>
                    </fieldset>
                    <div class="inner-form">
                        <div class="left">
                            <div class="input-wrap first">
                                <div class="input-field first">
                                    <label>Kata Kunci</label>
                                    <input type="text" id="txtcari" />
                                </div>
                            </div>
                            <div class="input-wrap second">
                                <div class="input-field second">
                                    <label>Kategori</label>
                                    <div class="input-select">
                                        <select id="jenis" data-trigger="" name="choices-single-defaul">
                                            <option value="1">Nomor Polisi</option>
                                            <option value="2">Nomor STNK</option>
                                            <option value="3">Nomor Mesin</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn-search" onclick="search()" type="button">Cari</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="/assets/theme/js/choices.js"></script>
<script>
    const choices = new Choices('[data-trigger]',
        {
            searchEnabled: false,
            itemSelectText: '',
        });

function search() {
    var search = $("#txtcari").val();
    var jenis = $("#jenis :selected").val();

    if(search != '' && jenis != ''){
        if(search.length >=3){
            var link = BASE_URL + "/search/detail?q="+search+"&c="+jenis;
            window.location.href = link;
        }else{
            Swal.fire(
                "Perhatian",
                "Kata Pencarian Minimal 3 Karakter",
                "warning"
            );
        }
    }else{
        Swal.fire(
            "Perhatian",
            "Masih ada inputan yang belum diisi",
            "warning"
        );
    }
}
</script>
@endsection