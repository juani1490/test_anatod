function EditClient(id){
	var data = $('#edit-client').serialize();

	$.ajax({
	        url: "db/DataAccess/Clients/edit-client.php?id=" + id,
	        type: "POST",
	        dataType: 'json',
	        data: data,
	        success: function(response) {
	        	$('#main-content').load('clients/list_client.html');
	        	GetClients();
	        }
	});
}