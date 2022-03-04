$(function() {
    loaddatarekap();
})

function loaddatarekap() {
    $.ajax({
        url: BASE_URL + "/grafik/getRekapJumlahLp",
        type: "GET",
        async: false,
        headers: {
            Accept: "application/json",
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        success: function(res) {
            var json_grafik = [];
            var json_peta = [];
            var data = res.data;
            if (data.length > 0) {
                jumlahBb = data.length;
                $("#listdata").html("");
                var html = null;
                var number = 0;
                for (var i = 0; i < data.length; i++) {
                    number = i + 1;
                    html +=
                        `
                        <tr>
                            <td>` +number +`</td>
                            <td>` +data[i].satuan_name +`</td>
                            <td>` +data[i].jumlah_lp +`</td>
                        </tr>
                    `;
                    json_grafik.push({
                        id: data[i].satuan_id,
                        name: data[i].satuan_name,
                        y: data[i].jumlah_lp
                    });

                    json_peta.push({
                        id: data[i].satuan_id,
                        name: data[i].satuan_name,
                        value: data[i].jumlah_lp,
                        path : data[i].map_path
                    });
                }

                $("#listdata").html(html);
                rendergrafik(json_grafik);
                renderMap(json_peta);
            } else {
                $("#listdata").html(`<tr>
                    <td colspan="3">
                        <div class="alert alert-warning text-center">Data Kosong</div>
                    </td>
                </tr>`);
                rendergrafik(null);
            }
        },
        error: function(res) {
            Swal.fire(
                "Perhatian",
                "Terjadi Kesalahan, Silahkan coba lagi",
                "error"
            );
            rendergrafik(null);
        }
    });
}

function rendergrafik(data) {
    var desimal = 0;
    Highcharts.chart("area_grafik", {
        chart: {
            type: "column"
        },
        title: {
            text: "Jumlah LP disetiap Satuan"
        },
        series: [
            {
                showInLegend: false,
                name: "Jumlah",
                data: data
            }
        ],
        legend: {
            enabled: true,
            labelFormatter: function() {
                var count = 0;
                for (var i = 0; i < this.yData.length; i++) {
                    count += this.yData[i];
                }
                return this.name + " [" + count + "]";
            }
        },
        plotOptions: {
            series: {
                borderWidth: 1,
                dataLabels: {
                    enabled: true,
                    formatter: function() {
                        return Highcharts.numberFormat(this.y, desimal);
                    }
                },
                point: {
                    cursor: "pointer",
                }
            }
        },
        yAxis: {
            title: { text: "Jumlah", margin: 5 }
        },
        xAxis: {
            type: "category",
            scrollbar: {
                enabled: true
            },

            crosshair: true,
            labels: {
                enabled: true,
                rotation: -45,
                style: {
                    fontSize: "10px",
                    fontFamily: "Verdana, sans-serif"
                }
            }
        },
        credits: {
            enabled: true
        },
        tooltip: {
            useHTML: true,
            valueDecimals: desimal
        },
        responsive: {
            rules: [
                {
                    condition: {
                        maxWidth: 310
                    },
                    chartOptions: {
                        subtitle: {
                            text: null
                        },
                        navigator: {
                            enabled: false
                        }
                    }
                }
            ]
        }
    });
}

function renderMap(data){
    Highcharts.mapChart('area_peta', {
        title: {
          text: 'Jumlah LP disetiap Satuan'
        },
        subtitle: {
          text: ''
        },
        mapNavigation: {
          enabled: true,
          buttonOptions: {
            verticalAlign: 'bottom'
          }
        },
        colorAxis: {
          min: 0
        },
        series: [{
          data: data,
          name: 'Jumlah LP',
          dataLabels: {
            enabled: true,
            format: '{point.value}'
          },
          states: {
            hover: {
              color: '#a4edba'
            }
          }
        }],
        plotOptions: {
          series: {
            events: {
              click: function (e) {
                
              }
            }
          }
        }
      }, function (chart) {
        
      });
      $("#area_peta").show();
}