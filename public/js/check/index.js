$(function() {
    datatables.init();
    getSatker();
});

var datatables = $("#myTable").DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url: BASE_URL + "/check/list",
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
            data: "id_bb",
            render: function(data, type, full, meta) {
                var html ='<button onclick="loadModalStatus('+data+')" class="mb-2 mr-2 btn btn-info">Status</button>';
                return html;
            }
        },
        { data: "nomor" },
        { data: "tanggal" },
        { data: "nomor_registrasi" },
        {
            data: "isFound",
            render: function(data, type, full, meta) {
                if(data == 1){
                    return "Ditemukan"
                }else{
                    return "Belum ditemukan"
                }
            }
        },
        { data: "nama_satker" }
    ],
    scrollX:true
});

function getSatker() {
    $.ajax({
        url: BASE_URL + "/satker/",
        type: "GET",
        async: true,
        headers: {
            Accept: "application/json",
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        success: function(res) {
            var data = res.data;
            var html = null;
            for(var i = 0; i < data.length; i++){
                html += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
            }
            $("#status").html(html);
            
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
                url: BASE_URL + "/check/updatestatus",
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