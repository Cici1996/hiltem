$(function() {
    datatables.init();
});

var datatables = $("#myTable").DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url: BASE_URL + "/laporanpolisi/getListData",
        method: "POST",
        headers: {
            Accept: "application/json",
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    },
    columns: [
        {
            render: function(data, type, full, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            }
        },
        {
            data: "id",
            render: function(data, type, full, meta) {
                var html =
                    "<button onclick=\"window.location='" +
                    BASE_URL +
                    "/laporanpolisi/" +
                    data +
                    '/ubah\'" class="mb-2 mr-2 btn btn-primary">Edit</button><button onclick="hapuslp(' +
                    data +
                    ')" class="mb-2 mr-2 btn btn-danger">Hapus</button><button onclick="loadModalStatus('+data+')" class="mb-2 mr-2 btn btn-info">Status</button>';
                return html;
            }
        },
        { data: "nomor" },
        { data: "tanggal" },
        { data: "status_lp" }
    ],
    scrollX:true
});

function hapuslp(id) {
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
                url: BASE_URL + "/laporanpolisi/",
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
                    datatables.ajax.reload();
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

function loadModalStatus(id){
    $("#id-lp").val(id);
    $("#modal-status-lp").modal('show');
}

function updatestatus(){
    var id = $("#id-lp").val();
    var status = $("#status :selected").val();
    Swal.fire({
        title: "Anda yakin?",
        text: "Merubah Status Laporan Polisi ini?",
        icon: "info",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Update"
    }).then(result => {
        if (result.value) {
            $.ajax({
                url: BASE_URL + "/laporanpolisi/updatestatus",
                type: "post",
                async: true,
                headers: {
                    Accept: "application/json",
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                data: {
                    id: id,
                    status:status
                },
                success: function(res) {
                    $("#modal-status-lp").modal('hide');
                    datatables.ajax.reload();
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