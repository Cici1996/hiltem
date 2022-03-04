$(function() {
    datatables.init();
    getRoles();
    getSatker();
});

var datatables = $("#myTable").DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url: BASE_URL + "/pengguna/getListData",
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
                var html = null;
                if(data != 1){
                    html = "<button onclick=\"editPengguna("+data+")\" class=\"mb-2 mr-2 btn btn-primary\">Edit</button>";
                }
                return html;
            }
        },
        { data: "name" },
        { data: "email" },
        { data: "RoleName" },
        { data: "SatkerName" }
    ],
    scrollX:true
});

function addPengguna(){
    $("#modal-add-user").modal('show');
}

function editPengguna(id){
    $("#password-edit,#name-edit").val('')
    $("#modal-edit-user").modal('show');

    $.ajax({
        url: BASE_URL + "/pengguna/"+id,
        type: "GET",
        async: true,
        headers: {
            Accept: "application/json",
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        success: function(res) {
            var data = res.data;
            $("#id").val(data.id);
            $("#name-edit").val(data.name)
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

function getRoles() {
    $.ajax({
        url: BASE_URL + "/roles/",
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
            $("#role").html(html);
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
            $("#satker").html(html);
            
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

function addUser() {
    $("#error-msg").html('');
    var name  = $("#name").val();
    var email  = $("#email").val();
    var password  = $("#password").val();
    var role  = $("#role :selected").val();
    var satker  = $("#satker :selected").val();

    $.ajax({
        url: BASE_URL + "/pengguna/",
        type: "POST",
        async: true,
        headers: {
            Accept: "application/json",
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        data : {
            name : name,
            email : email,
            password : password,
            role_id : role,
            satker_id : satker
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
                datatables.ajax.reload();
                $("#modal-add-user").modal('hide');
            }
        },
        error: function(res) {
            Swal.fire(
                "Perhatian",
                "Terjadi Kesalahan, Silahkan coba lagi",
                "error"
            );
            var arrField = ['name','email','password','role_id','satker_id'];
            var data = res.responseJSON.data;
            var html = '';
            for(var i = 0; i<arrField.length; i++){
                if(data[arrField[i]] != null && data[arrField[i]].length > 0){
                    html += '<li>'+data[arrField[i]][0]+'</li>';
                }
                $("#error-msg").html(html);
            }
        }
    });
}

function updateUser() {
    $("#error-msg-edit").html('');

    var id = $("#id").val();
    var name  = $("#name-edit").val();
    var password  = $("#password-edit").val();

    $.ajax({
        url: BASE_URL + "/pengguna/update",
        type: "POST",
        async: true,
        headers: {
            Accept: "application/json",
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        data : {
            id:id,
            name : name,
            password : password,
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
                datatables.ajax.reload();
                $("#modal-edit-user").modal('hide');
            }
        },
        error: function(res) {
            Swal.fire(
                "Perhatian",
                "Terjadi Kesalahan, Silahkan coba lagi",
                "error"
            );
            var arrField = ['name','email','password','role_id','satker_id'];
            var data = res.responseJSON.data;
            var html = '';
            for(var i = 0; i<arrField.length; i++){
                if(data[arrField[i]] != null && data[arrField[i]].length > 0){
                    html += '<li>'+data[arrField[i]][0]+'</li>';
                }
                $("#error-msg-edit").html(html);
            }
        }
    });
}