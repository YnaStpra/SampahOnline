  // fungsi initialize untuk mempersiapkan peta
  function initialize() {
    var propertiPeta = {
    center:new google.maps.LatLng(-8.582861,116.109806),
    zoom:13,
    mapTypeId:google.maps.MapTypeId.ROADMAP
    };

    var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);
  }




