function GetLocations(){
	$('#location').empty();
	
	$.ajax({
	        url: "db/DataAccess/Locations/list-location.php",
	        type: "GET",
	        dataType: 'json',
	        success: function(response) {
	        	var locations = response.Locations;
	        	
	        	$('#location').append('<option value="" disabled selected>Seleccione una opción</option>');

	          for (var i = 0; i < locations.length; i++) {
	          	$('#location').append('<option value="' + locations[i].id  + '">' + locations[i].nombre  + '</option>')
	          }
					},
					error: function(error){
						$('#location').append('<option value="0" disabled selected>No hay datos</option>');
					}
	});
}