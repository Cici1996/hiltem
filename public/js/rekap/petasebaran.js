$(function() {
    loadDataMap();
});

function generateMap(dataMap) {
    var map = new mapboxgl.Map({
        container: "map",
        style: "mapbox://styles/mapbox/dark-v10",
        center: [107.610811, -6.913812],
        zoom: 12
    });

    map.on("style.load", function() {
        map.addSource("markers", {
            type: "geojson",
            data: {
                type: "FeatureCollection",
                features: dataMap
            }
        });

        map.addLayer({
            id: "circle",
            source: "markers",
            type: "circle",
            paint: {
                "circle-radius": 5,
                "circle-color": "#f44336",
                "circle-stroke-width": 0
            },
            filter: ["==", "modelId", 1]
        });
    });
}

function loadDataMap() {
    $.ajax({
        url: BASE_URL + "/grafik/petasebaran/data",
        type: "GET",
        async: false,
        headers: {
            Accept: "application/json",
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        success: function(res) {
            var dataJson = JSON.parse(res);
            generateMap(dataJson);
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
