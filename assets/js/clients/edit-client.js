function EditClient(){
	var data = $('#edit-client').serialize();

	$.ajax({
	        url: "db/DataAccess/clients/edit-client.php",
	        type: "POST",
	        dataType: 'json',
	        data: data,
	        success: function(response) {
	        	$('#main-content').load('clients/list_client.html');
	        	GetClients();
	        }
	});
}