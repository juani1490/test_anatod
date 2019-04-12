function GetClients(){
	
	$.ajax({
	        url: "db/DataAccess/Clients/list-client.php",
	        type: "GET",
	        dataType: 'json',
	        success: function(response) {
	        	var clients = response.Clients;

	        	$('#tbody-client').empty(); 

	          for (var i = 0; i < clients.length; i++) {
  		      	$('#tbody-client').append("<tr onclick='ShowClient(" + clients[i].id + ");'>"+
									  											"<td>" + clients[i].id + "</td>"+
									  											"<td>" + clients[i].nombre + "</td>"+
									                				"<td>" + clients[i].dni + "</td>"+
									  											"<td>" + clients[i].LocationName + "</td>"+
												  							"</tr>");   
	          }
					},
					error: function(error){
						$('#tbody-client').empty();
					}
	});
}
function ShowClient(id){
	$('#main-content').load('clients/edit_client.html');
	GetLocations();

	$.ajax({
	        url: "db/DataAccess/Clients/search-client.php",
	        type: "POST",
	        data: {'Id': id},
	        dataType: 'json',
	        success: function(response) {
	        	setTimeout(function(){ 
		        	var client = response.Data;

		        	$('#name').val(client[0].nombre);
		        	$('#dni').val(client[0].dni);
		        	$('#location').val(client[0].localidad);
	        	}, 180);
	        	
        		$('#edit-client').removeAttr('onSubmit');
						$('#edit-client').attr('onSubmit', 'EditClient(' + id + '); return false');
					}
	});
}