$(function () {
    loadLpHarian();
    getlist();
});

function loadLpHarian() {
    $.ajax({
        url: BASE_URL + "/dashboard/lpharianuser",
        type: "GET",
        async: true,
        headers: {
            Accept: "application/json",
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (res) {
            var data = res.data;
            $("#lphariini").text(data.LpHariIni);
            $("#lpbulanini").text(data.LpBulanIni);
            $("#totallp").text(data.TotalLP);
        },
        error: function (res) {
            Swal.fire(
                "Perhatian",
                "Terjadi Kesalahan, Silahkan coba lagi",
                "error"
            );
        },
    });
}


function getlist() {
    $.ajax({
        url: BASE_URL + "/dashboard/listlpdashboarduser",
        type: "GET",
        async: true,
        headers: {
            Accept: "application/json",
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        success: function(res) {
            var data = res.data;
            console.log(data)
            if (data.length > 0) {
                $("#list-lp").html("");
                var html = null;
                var number = 0;
                for (var i = 0; i < data.length; i++) {
                    number = i + 1;
                    html +=
                        `
                        <tr>
                            <td>` +number +`</td>
                            <td><button onclick=\"window.location='` + BASE_URL + `/laporanpolisi/` + data[i].id + `/ubah\'" class="mb-2 mr-2 btn btn-sm btn-primary">Edit</button></td>
                            <td>` +data[i].nomor +`</td>
                            <td>` +data[i].tanggal +`</td>
                            <td>` +data[i].status_lp +`</td>
                        </tr>
                    `;
                }

                $("#list-lp").html(html);
            } else {
                $("#list-lp").html(`<tr>
                    <td colspan="5">
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