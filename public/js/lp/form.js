var STATUS = null;
var jumlahBb = 0;

$(function() {
    if (GLOBAL_ID > 0) {
        getdatalp(GLOBAL_ID, 0);
    }

    $("#smartwizard").smartWizard({
        selected: 0,
        theme: "arrows",
        transitionEffect: "fade",
        showStepURLhash: false,
        lang: {
            next: "Selanjutnya",
            previous: "Sebelumnya"
        },
        toolbarSettings: {
            toolbarButtonPosition: "end",
            toolbarExtraButtons: [btnFinish]
        }
    });

    //change color
    $(".sw-btn-next").removeClass("btn-secondary");
    $(".sw-btn-next").addClass("btn-primary");

    $("#smartwizard").on("showStep", function(
        e,
        anchorObject,
        stepNumber,
        stepDirection,
        stepPosition
    ) {
        //alert("You are on step "+stepNumber+" now");
        if (stepPosition === "first") {
            $("#prev-btn").addClass("disabled");
        } else if (stepPosition === "final") {
            $("#next-btn").addClass("disabled");
        } else {
            $("#prev-btn").removeClass("disabled");
            $("#next-btn").removeClass("disabled");
        }

        if (stepNumber == 0) {
            getdatalp(GLOBAL_ID, 0);
            $("#btnFinish").hide();
        } else if (stepNumber == 1) {
            getdatapelapor(GLOBAL_ID, 0);
            $("#btnFinish").hide();
        } else if (stepNumber == 2) {
            getlistbb();
            $("#btnFinish").show();
        }
    });

    $("#smartwizard").on("leaveStep", function(
        e,
        anchorObject,
        stepNumber,
        stepDirection
    ) {
        if (stepNumber == 0 && stepDirection == "forward") {
            var cek = validasi("formdatalp");
            if (cek == 1) {
                simpandatalp();
                return STATUS;
            } else {
                Swal.fire(
                    "Perhatian",
                    "Terdapat Isian yang masih kosong",
                    "warning"
                );
                return false;
            }
        } else if (stepNumber == 1 && stepDirection == "forward") {
            var cek = validasi("formPelapor");
            if (cek == 1) {
                simpanPelapor();
                return STATUS;
            } else {
                Swal.fire(
                    "Perhatian",
                    "Terdapat Isian yang masih kosong",
                    "warning"
                );
                return false;
            }
        } else if (stepNumber == 2 && stepDirection == "forward") {
        }
    });
});

var btnFinish = $("<button></button>")
    .text("Selesai")
    .attr("id", "btnFinish")
    .attr("style", "display:none")
    .addClass("btn btn-danger")
    .on("click", function() {
        if (jumlahBb > 0) {
            Swal.fire({
                icon: "success",
                title: "Pengisian LP selesai, Halaman akan memuat ulang.",
                showConfirmButton: false,
                timer: 1500
            }).then(function() {
                window.location.href = BASE_URL + "/laporanpolisi";
            });
        } else {
            Swal.fire("Perhatian", "Belum memilih Barang Bukti", "warning");
        }
    });

function simpandatalp() {
    var id = $("#id").val();
    var nomor = $("#nomor").val();
    var pidana = $("#pidana").val();
    var tanggal = $("#tanggal").val();

    var URL = id > 0 ? "/laporanpolisi/update" : "/laporanpolisi";

    $.ajax({
        url: BASE_URL + URL,
        type: "POST",
        async: false,
        data: {
            id: id,
            nomor: nomor,
            tanggal: tanggal,
            pidana: pidana
        },
        headers: {
            Accept: "application/json",
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        success: function(res) {
            STATUS = true;
            GLOBAL_ID = res.data.id;
            toastr.success("Simpan Data Berhasil", "Sukses", {
                closeButton: true,
                newestOnTop: true,
                progressBar: true,
                positionClass: "toast-top-right",
                showDuration: "200",
                hideDuration: "1000",
                timeOut: "2000",
                extendedTimeOut: "1000",
                showEasing: "swing",
                hideEasing: "linear",
                showMethod: "fadeIn",
                hideMethod: "fadeOut"
            });
        },
        error: function(res) {
            Swal.fire(
                "Perhatian",
                "Terjadi Kesalahan, Silahkan coba lagi",
                "error"
            );
            STATUS = false;
        }
    });
}

function getdatalp(id, index) {
    $.ajax({
        url: BASE_URL + "/laporanpolisi/" + id + "/edit",
        type: "GET",
        async: true,
        headers: {
            Accept: "application/json",
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        success: function(res) {
            if (res.data != null) {
                var data = res.data;
                $("#id").val(data.id);
                $("#nomor").val(data.nomor);
                $("#tanggal").val(data.tanggal);
                $("#pidana").val(data.pidana);
            }
        },
        error: function(res) {
            Swal.fire(
                "Perhatian",
                "Terjadi Kesalahan, Silahkan coba lagi",
                "error"
            );
        }
    });
}

function simpanPelapor() {
    var id = $("#idpelapor").val();
    var nik = $("#nik").val();
    var nama = $("#nama").val();
    var tgl_lahir = $("#tgl_lahir").val();
    var umur = $("#umur").val();
    var jk = $("#jk :selected").val();
    var alamat = $("#alamat").val();

    var URL = id > 0 ? "/pelapor/update" : "/pelapor";

    $.ajax({
        url: BASE_URL + URL,
        type: "POST",
        async: true,
        data: {
            id: id,
            lp_id: GLOBAL_ID,
            nik: nik,
            nama: nama,
            tgl_lahir: tgl_lahir,
            umur: umur,
            jk: jk,
            alamat: alamat
        },
        headers: {
            Accept: "application/json",
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        success: function(res) {
            STATUS = true;
            toastr.success("Simpan Data Berhasil", "Sukses", {
                closeButton: true,
                newestOnTop: true,
                progressBar: true,
                positionClass: "toast-top-right",
                showDuration: "200",
                hideDuration: "1000",
                timeOut: "2000",
                extendedTimeOut: "1000",
                showEasing: "swing",
                hideEasing: "linear",
                showMethod: "fadeIn",
                hideMethod: "fadeOut"
            });
        },
        error: function(res) {
            Swal.fire(
                "Perhatian",
                "Terjadi Kesalahan, Silahkan coba lagi",
                "error"
            );
            STATUS = false;
        }
    });
}

function getdatapelapor(id, index) {
    $.ajax({
        url: BASE_URL + "/pelapor/" + id + "/edit",
        type: "GET",
        async: false,
        headers: {
            Accept: "application/json",
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        success: function(res) {
            if (res.data != null) {
                var data = res.data;
                $("#idpelapor").val(data.id);
                $("#nik").val(data.nik);
                $("#nama").val(data.nama);
                $("#tgl_lahir").val(data.tgl_lahir);
                $("#umur").val(data.umur);
                $("#jk").val(data.jk);
                $("#alamat").val(data.alamat);
            }
        },
        error: function(res) {
            Swal.fire(
                "Perhatian",
                "Terjadi Kesalahan, Silahkan coba lagi",
                "error"
            );
        }
    });
}

//untuk tab 3 barang bukti
function simpanbarangbukti() {
    var cek = validasi("formbarangbukti");
    if (cek == 1) {
        var id = $("#idbb").val();
        var nama = $("#namabb").val();
        var nik = $("#nikbb").val();
        var nomor_rangka = $("#nomor_rangka").val();
        var nomor_mesin = $("#nomor_mesin").val();
        var merk = $("#merk").val();
        var warna = $("#warna").val();
        var typeBarang = $("#type").val();
        var bahan_bakar = $("#bahan_bakar").val();
        var jenis = $("#jenis").val();
        var warna_tnkb = $("#warna_tnkb").val();
        var model = $("#model").val();
        var tahun_registrasi = $("#tahun_registrasi").val();
        var tahun_pembuatan = $("#tahun_pembuatan").val();
        var nomor_bpkb = $("#nomor_bpkb").val();
        var alamat = $("#alamatbb").val();
        var isi_silinder = $("#isi_silinder").val();
        var nomor_registrasi = $("#nomor_registrasi").val();
        var longitude = $("#longitude").val();
        var latitude = $("#latitude").val();

        var URL = id > 0 ? "/barangbukti/update" : "/barangbukti";

        $.ajax({
            url: BASE_URL + URL,
            type: "POST",
            async: false,
            data: {
                id: id,
                lp_id: GLOBAL_ID,
                nama: nama,
                nik: nik,
                nomor_rangka: nomor_rangka,
                nomor_mesin: nomor_mesin,
                merk: merk,
                warna: warna,
                type: typeBarang,
                bahan_bakar: bahan_bakar,
                jenis: jenis,
                warna_tnkb: warna_tnkb,
                model: model,
                tahun_registrasi: tahun_registrasi,
                tahun_pembuatan: tahun_pembuatan,
                nomor_bpkb: nomor_bpkb,
                alamat: alamat,
                isi_silinder: isi_silinder,
                nomor_registrasi: nomor_registrasi,
                longitude: longitude,
                latitude: latitude
            },
            headers: {
                Accept: "application/json",
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            success: function(res) {
                if (res.code == 200) {
                    toastr.success("Simpan Data Berhasil", "Sukses", {
                        closeButton: true,
                        newestOnTop: true,
                        progressBar: true,
                        positionClass: "toast-top-right",
                        showDuration: "200",
                        hideDuration: "1000",
                        timeOut: "2000",
                        extendedTimeOut: "1000",
                        showEasing: "swing",
                        hideEasing: "linear",
                        showMethod: "fadeIn",
                        hideMethod: "fadeOut"
                    });
                    getlistbb();
                }
                $(".modal-backdrop").remove();
                $(
                    "#modal-bb div.modal-footer button[data-dismiss='modal']"
                ).click();
            },
            error: function(res) {
                Swal.fire(
                    "Perhatian",
                    "Terjadi Kesalahan, Silahkan coba lagi",
                    "error"
                );
                STATUS = false;
            }
        });
    } else {
        Swal.fire("Perhatian", "Terdapat Isian yang masih kosong", "warning");
    }
}

function getlistbb() {
    $.ajax({
        url: BASE_URL + "/barangbukti/" + GLOBAL_ID + "/list",
        type: "GET",
        async: false,
        headers: {
            Accept: "application/json",
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        success: function(res) {
            var data = res.data;
            if (data.length > 0) {
                jumlahBb = data.length;
                $("#listbb").html("");
                var html = null;
                var number = 0;
                for (var i = 0; i < data.length; i++) {
                    number = i + 1;
                    html +=
                        `
                        <tr>
                            <td>` +number +`</td>
                            <td><button onclick="geteditbb(` + data[i].id +`)" class="mb-2 mr-2 btn btn-primary">Edit</button><button onclick="hapusBb(` +data[i].id +`)" class="mb-2 mr-2 btn btn-danger">Hapus</button></td>
                            <td><strong>` +data[i].nama +`</strong> (` +data[i].nik +`)</td>
                            <td>` +data[i].type +`</td>
                            <td>` +data[i].nomor_rangka +`</td>
                            <td>` +data[i].nomor_mesin +`</td>
                        </tr>
                    `;
                }

                $("#listbb").html(html);
            } else {
                $("#listbb").html(`<tr>
                    <td colspan="6">
                        <div class="alert alert-warning text-center">Data Kosong</div>
                    </td>
                </tr>`);
            }
        },
        error: function(res) {
            Swal.fire(
                "Perhatian",
                "Terjadi Kesalahan, Silahkan coba lagi",
                "error"
            );
        }
    });
}

function geteditbb(id) {
    $.ajax({
        url: BASE_URL + "/barangbukti/" + id + "/edit",
        type: "GET",
        async: false,
        headers: {
            Accept: "application/json",
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        success: function(res) {
            //$("#btnModalBarbuk").click();
            $("#modal-bb").modal('show');
            var data = res.data;
            $("#idbb").val(data.id);
            $("#namabb").val(data.nama);
            $("#nikbb").val(data.nik);
            $("#nomor_rangka").val(data.nomor_rangka);
            $("#nomor_mesin").val(data.nomor_mesin);
            $("#merk").val(data.merk);
            $("#warna").val(data.warna);
            $("#type").val(data.type);
            $("#bahan_bakar").val(data.bahan_bakar);
            $("#jenis").val(data.jenis);
            $("#warna_tnkb").val(data.warna_tnkb);
            $("#model").val(data.model);
            $("#tahun_registrasi").val(data.tahun_registrasi);
            $("#tahun_pembuatan").val(data.tahun_pembuatan);
            $("#nomor_bpkb").val(data.nomor_bpkb);
            $("#alamatbb").val(data.alamat);
            $("#isi_silinder").val(data.isi_silinder);
            $("#nomor_registrasi").val(data.nomor_registrasi);
            $("#longitude").val(data.longitude);
            $("#latitude").val(data.latitude);
        },
        error: function(res) {
            Swal.fire(
                "Perhatian",
                "Terjadi Kesalahan, Silahkan coba lagi",
                "error"
            );
        }
    });
}

function hapusBb(id) {
    Swal.fire({
        title: "Anda yakin?",
        text: "Menghapus data ini",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Hapus"
    }).then(result => {
        if (result.value) {
            $.ajax({
                url: BASE_URL + "/barangbukti/",
                type: "DELETE",
                async: true,
                headers: {
                    Accept: "application/json",
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                data: {
                    id: id
                },
                success: function(res) {
                    getlistbb();
                },
                error: function(res) {
                    Swal.fire(
                        "Perhatian",
                        "Terjadi Kesalahan, Silahkan coba lagi",
                        "error"
                    );
                }
            });
        }
    });
}