function CheckInput(e, type) {
    tecla = (document.all) ? e.keyCode : e.which;

    if (tecla == 8) {
        return true;
    }

    if(type == 'text'){
      patron =/[A-Za-z\sáéíóú]/;
    } else if(type == 'number') {
      patron = /[0-9]/;
    }
    
    tecla_final = String.fromCharCode(tecla);

    return patron.test(tecla_final);
}

function AddClient(){
	var data = $('#add-client').serialize();

	$.ajax({
	        url: "db/DataAccess/clients/add-client.php",
	        type: "POST",
	        dataType: 'json',
	        data: data,
	        success: function(response) {
          	$('#messageSuccess').css('display', 'block');
          	setTimeout(function() {$('#messageSuccess').fadeOut("slow");},5000);
	        	document.getElementById("add-client").reset();
	        	GetLocations();
	        	$('#name').focus();
	        },
	        error: function(error){
	        	$('#messageError').css('display', 'block');
          	setTimeout(function() {$('#messageError').fadeOut("slow");},5000);
          	$('#name').focus();
	        }
	});
}