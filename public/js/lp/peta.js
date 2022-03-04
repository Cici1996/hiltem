var map = new mapboxgl.Map({
    container: "container-peta",
    style: "mapbox://styles/mapbox/streets-v11",
    center: [107.610811, -6.913812],
    zoom: 12
});

map.on("style.load", function() {
    map.on("click", clickEvent => {
        const lngLat = new Array(clickEvent.lngLat.lng, clickEvent.lngLat.lat);
        $("#longitude").val(lngLat[0]);
        $("#latitude").val(lngLat[1]);
        $(".modal-backdrop").remove();
        $("#modal-peta div.modal-footer button[data-dismiss='modal']").click();
    });
});

$("#modal-peta").on("shown.bs.modal", function() {
    map.resize();
});
