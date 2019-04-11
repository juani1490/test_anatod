function LoadMain(num){
	switch(num){
		case 1:
			$('#main-content').fadeIn('slow').load('clients/add_client.html');
			GetLocations();
		break;

		case 2:
			$('#main-content').fadeIn('slow').load('clients/list_client.html');
			GetClients();
		break;
	}
}
