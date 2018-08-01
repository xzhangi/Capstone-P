function googleMap() {
	var map, infoWindow;
	var Locker1 = new google.maps.LatLng(1.379200,103.849604);
	var Locker2 = new google.maps.LatLng(1.378514,103.849695); 
	var Locker3 = new google.maps.LatLng(1.378374,103.848778); 
	var Locker4 = new google.maps.LatLng(1.379045,103.848735); 
	var Locker5 = new google.maps.LatLng(1.377849,103.848751); 
	var Locker6 = new google.maps.LatLng(1.380729,103.849668); 
	var Locker7 = new google.maps.LatLng(1.380911,103.848607); 
	var Locker8 = new google.maps.LatLng(1.381072,103.849856); 
	var Locker9 = new google.maps.LatLng(1.381281,103.848644); 
	var Locker10 = new google.maps.LatLng(1.381469,103.849899); 
	var Locker11 = new google.maps.LatLng(1.381951,103.848666); 
	var mapProp= {
		center:new google.maps.LatLng(1.380085,103.848973),
		zoom:20,
	}
	map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
	infoWindow = new google.maps.InfoWindow;
	
	var lockericon = '/assets/lockericon.png'
	
	var marker1 = new google.maps.Marker({
		position: Locker1,
		icon: lockericon,
		animation: google.maps.Animation.BOUNCE
	});
	marker1.setMap(map);
	var marker2 = new google.maps.Marker({
		position: Locker2,
		icon: lockericon,
		animation: google.maps.Animation.BOUNCE
	});
	marker2.setMap(map);
	var marker3 = new google.maps.Marker({
		position: Locker3,
		icon: lockericon,
		animation: google.maps.Animation.BOUNCE
	});
	marker3.setMap(map);
	var marker4 = new google.maps.Marker({
		position: Locker4,
		icon: lockericon,
		animation: google.maps.Animation.BOUNCE
	});
	marker4.setMap(map);
	var marker5 = new google.maps.Marker({
		position: Locker5,
		icon: lockericon,
		animation: google.maps.Animation.BOUNCE
	});
	marker5.setMap(map);
	var marker6 = new google.maps.Marker({
		position: Locker6,
		icon: lockericon,
		animation: google.maps.Animation.BOUNCE
	});
	marker6.setMap(map);
	var marker7 = new google.maps.Marker({
		position: Locker7,
		icon: lockericon,
		animation: google.maps.Animation.BOUNCE
	});
	marker7.setMap(map);
	var marker8 = new google.maps.Marker({
		position: Locker8,
		icon: lockericon,
		animation: google.maps.Animation.BOUNCE
	});
	marker8.setMap(map);
	var marker9 = new google.maps.Marker({
		position: Locker9,
		icon: lockericon,
		animation: google.maps.Animation.BOUNCE
	});
	marker9.setMap(map);
	var marker10 = new google.maps.Marker({
		position: Locker10,
		icon: lockericon,
		animation: google.maps.Animation.BOUNCE
	});
	marker10.setMap(map);
	var marker11 = new google.maps.Marker({
		position: Locker11,
		icon: lockericon,
		animation: google.maps.Animation.BOUNCE
	});
	marker11.setMap(map);
	
	// Try HTML5 geolocation.
	if (navigator.geolocation) {
	  navigator.geolocation.getCurrentPosition(function(position) {
		var pos = {
		  lat: position.coords.latitude,
		  lng: position.coords.longitude
		};

		infoWindow.setPosition(pos);
		infoWindow.setContent('Location found.');
		infoWindow.open(map);
		map.setCenter(pos);
	  }, function() {
		handleLocationError(true, infoWindow, map.getCenter());
	  });
	} else {
	  // Browser doesn't support Geolocation
	  handleLocationError(false, infoWindow, map.getCenter());
	}
	
	function handleLocationError(browserHasGeolocation, infoWindow, pos) {
		infoWindow.setPosition(pos);
		infoWindow.setContent(browserHasGeolocation ?
							  'Error: The Geolocation service failed.' :
							  'Error: Your browser doesn\'t support geolocation.');
		infoWindow.open(map);
	}
}