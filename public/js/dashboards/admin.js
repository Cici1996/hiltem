$(function () {
    loadLpHarian();
    loadPieChart();
    loadLineChart();
});

function loadLpHarian() {
    $.ajax({
        url: BASE_URL + "/dashboard/lpharian",
        type: "GET",
        async: true,
        headers: {
            Accept: "application/json",
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (res) {
            var data = res.data[0];
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

function loadPieChart() {
    $.ajax({
        url: BASE_URL + "/dashboard/lpstatus",
        type: "GET",
        async: true,
        headers: {
            Accept: "application/json",
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (res) {
            renderPieChart(res.data[0]);
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

function loadLineChart() {
    $.ajax({
        url: BASE_URL + "/dashboard/lpbulan",
        type: "GET",
        async: true,
        headers: {
            Accept: "application/json",
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (res) {
            renderLineChart(res.data)
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

function renderPieChart(data) {
    var json_pie = [
        { name: "P21", y: parseInt(data.P21) },
        { name: "TAHAP II", y: parseInt(data.TAHAP2) },
        { name: "SP3", y: parseInt(data.SP3) },
    ];
    chartPie = Highcharts.chart("grafik-pie", {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: "pie",
        },
        title: {
            text: "Penyelesaian LP",
        },
        tooltip: {
            pointFormat:
                "<b>{series.name}</b><br/>Persentase : {point.percentage:.1f}% <br>Jumlah : {point.y}",
        },
        accessibility: {
            point: {
                valueSuffix: "% z",
            },
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: "pointer",
                dataLabels: {
                    enabled: true,
                    format:
                        "<b>{point.name}</b>: {point.percentage:.1f} %<br>Jumlah : {point.y}",
                },
            },
            series: {
                cursor: "pointer",
            },
        },
        series: [
            {
                name: "",
                colorByPoint: true,
                data: json_pie,
            },
        ],
    });
}

function renderLineChart(data) {
    Highcharts.chart("grafik-line", {
        chart: {
            type: "line",
        },
        title: {
            text: "Data LP Per Bulan Tahun "+new Date().getFullYear(),
        },
        subtitle: {
            text: "Semua Satuan",
        },
        series: [
            {
                showInLegend: false,
                name: "Jumlah LP",
                data: data,
            },
        ],
        legend: {
            enabled: true,
        },
        plotOptions: {
            series: {
                borderWidth: 1,
                dataLabels: {
                    enabled: true,
                    formatter: function () {
                        return Highcharts.numberFormat(this.y, 0);
                    },
                },
                point: {
                    cursor: "pointer",
                    events: {
                        click: function () {},
                    },
                },
            },
        },
        yAxis: {
            title: { text: "Jumlah", margin: 5 },
        },
        xAxis: {
            type: "category",
            scrollbar: {
                enabled: true,
            },

            crosshair: true,
            labels: {
                enabled: true,
                rotation: -45,
                style: {
                    fontSize: "10px",
                    fontFamily: "Verdana, sans-serif",
                },
            },
        },
        credits: {
            enabled: true,
        },
        tooltip: {
            useHTML: true,
            valueDecimals: 0,
        },
        responsive: {
            rules: [
                {
                    condition: {
                        maxWidth: 310,
                    },
                    chartOptions: {
                        subtitle: {
                            text: null,
                        },
                        navigator: {
                            enabled: false,
                        },
                    },
                },
            ],
        },
    });
}
