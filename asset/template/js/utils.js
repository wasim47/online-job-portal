var v_mapdiv;
var v_lat;
var v_lng;
function initialize() {
	
	var mapOptions = {
		zoom: 12,
        center: new google.maps.LatLng(v_lat, v_lng)
    };
    var map = new google.maps.Map(document.getElementById(v_map), mapOptions);
	var location = new google.maps.LatLng(v_lat,v_lng);
	var marker = new google.maps.Marker({
		position: location,
        map: map,
        draggable: false
    });
}

function loadGoogleMap(map,lat,lng) {
	v_map = map;
	v_lat = lat;
	v_lng = lng;
	if (typeof google === 'object' && typeof google.maps === 'object'){
		initialize();
    }else{
		var script = document.createElement('script');
        script.type = 'text/javascript';
        script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=true&' +
					'callback=initialize';
        document.body.appendChild(script);
    }
}


function init_npf_tabs(id){
  $(id+' div').hide();
  $(id+' div:first').show();
  $(id+' ul li:first').addClass('active');

  $(id+' ul li a').click(function(){
  $(id+' ul li').removeClass('active');
  $(this).parent().addClass('active');
  var currentTab = $(this).attr('href');
  $(id+' div').hide();
  $(currentTab).show();
  return false;
  });

}