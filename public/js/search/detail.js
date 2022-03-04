var jenis = null;
$(function() {
    const urlParams = new URLSearchParams(window.location.search);
    const keyword = urlParams.get("q");
    const category = urlParams.get("c");
    jenis = category;
    var textCategory = $(".dropdown-menu a[data-isi=" + category + "]").text();
    if (category != "" && textCategory != "") {
        $(".dropdown-toggle").text(textCategory);
    } else {
        $(".dropdown-toggle").text("Kategori");
    }
    $("#txtcari").val(keyword);
    $(".dropdown-menu a").click(function() {
        var selText = $(this).text();
        var selText1 = $(this).data("isi");
        jenis = selText1;
        $(".dropdown-toggle").text(selText);
    });

    $("a.dropdown-item").click(function() {
        $(".dropdown-menu.show").removeClass("show");
    });

    if (keyword != "" && category != "") {
        $("#txtcari").val(keyword);
        search();
    }
    datatables.init();
});

function search() {
    datatables.ajax.reload();
}

var datatables = $("#tableSearch").DataTable({
    processing: true,
    ajax: {
        url: BASE_URL + "/search/list",
        method: "GET",
        headers: {
            Accept: "application/json",
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        data: function(d) {
            d.txtcari = $("#txtcari").val();
            d.jenis = jenis;
        }
    },
    destroy: true,
    drawCallback: function(settings) {
        // Here the response
        // var response = settings.json;
        // if(response != null && response.data.length <= 0){
        //     Swal.fire(
        //         "Perhatian",
        //         "Data tidak ditemukan, Silahkan Coba Lagi",
        //         "warning"
        //     );
        // }
    },
    searching: false,
    columns: [
        {
            render: function(data, type, full, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            }
        },
        {
            data: "id",
            render: function(data, type, full, meta) {
                var link = BASE_URL + "/search/" + data + "/exportpdf";
                var button =
                    `<button onclick="window.location.href='` +
                    link +
                    `';" class="mb-2 mr-2 btn btn-primary">Export Data</button>`;
                return button;
            }
        },
        {
            data: "nama"
        },
        {
            data: "alamat"
        },
        {
            data: "nomor_registrasi"
        },
        {
            data: "nomor_rangka"
        },
        {
            data: "nomor_mesin"
        }
    ],
    scrollX: true
});

function setDefaultDisplayError() {
    $("#datakosong").show();
    $("#dataloading").hide();
    $("#datalist").hide();
    $("#datalist").html(``);

    $("#txtcari").val("");
    $("#txtcari").focus();
}
