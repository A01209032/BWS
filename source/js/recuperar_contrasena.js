//Recuperar contraseña
$('#recuperarContrasena').on("submit", function(event){

	event.preventDefault();

    $.ajax({
          url: 'recuperarContrasena.php',
          method: 'POST',
          data: {
          },
          success: function(data) {
            alert(data);
          }
    });
    
	return false;
});

