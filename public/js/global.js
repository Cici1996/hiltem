mapboxgl.accessToken = "pk.eyJ1IjoiY2ljaXNhZXB1ZGluIiwiYSI6ImNqdnQ5eGI2azF3enM0YW8xOXFhaDhheHIifQ.i-KsZeQMP30xXZkzPTPfgg";
$(function() {
    $(".select2").select2();
    $(".modalcostume").appendTo("body"); 

    $(".datepicker").datepicker({
        autoclose: true,
        orientation: "bottom",
        todayHighlight: true,
        format: "yyyy-mm-dd",
        endDate: new Date(),
        clearBtn: true
    });

    $(".hurufangka").bind("keyup blur", function() {
        var node = $(this);
        node.val(node.val().replace(/[^a-zA-Z0-9 ]/g, ""));
    });

    $(".huruf").bind("keyup blur", function() {
        var node = $(this);
        node.val(node.val().replace(/[^a-zA-Z ]/g, ""));
    });

    $(".duit").bind("keyup blur", function() {
        var node = $(this);
        node.val(node.val().replace(/[^0-9.]/g, ""));
    });

    $(".angka").bind("keyup blur", function() {
        var node = $(this);
        node.val(node.val().replace(/[^0-9]/g, ""));
    });

    $(".huruf,.duit,.angka").on("paste", function(e) {
        e.preventDefault();
    });
});
function validasi(kontainer_id) {
    var validasi = 0;
    var cek = 0;
    var jml = 0;
    $("#" + kontainer_id)
        .find("[wajib]")
        .each(function() {
            jml = jml + 1;
            var nama_id = $(this).attr("id");
            if ($(this).val() == "" || $(this).val() == null) {
                if ($(this).is(".select2-hidden-accessible")) {
                    $(
                        "[aria-labelledby='select2-" + nama_id + "-container']"
                    ).addClass("unvalid");
                    $("[aria-owns='select2-" + nama_id + "-results']").addClass(
                        "unvalid"
                    );
                } else if ($(this).attr("multiple") == "multiple") {
                    $("#ms-" + nama_id + " > div > ul").addClass("unvalid");
                } else {
                    $(this).addClass("unvalid");
                }
                cek = cek + 0;
            } else {
                if ($(this).is(".select2-hidden-accessible")) {
                    $(
                        "[aria-labelledby='select2-" + nama_id + "-container']"
                    ).removeClass("unvalid");
                    $(
                        "[aria-owns='select2-" + nama_id + "-results']"
                    ).removeClass("unvalid");
                } else if ($(this).attr("multiple") == "multiple") {
                    $("#ms-" + nama_id + " > div > ul").removeClass("unvalid");
                } else {
                    $(this).removeClass("unvalid");
                }
                cek = cek + 1;
            }
        });
    if (jml == cek) {
        validasi = 1;
    } else {
        validasi = 0;
    }
    return validasi;
}
