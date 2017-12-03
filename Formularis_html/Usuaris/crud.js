/*******************************************************************************
 *********************************************************************** "ÍNDEX"
 * # Afegir
 * # Eliminar
 * # Editar
 ******************************************************************************/

/*
# Afegir
------------------------------------------------------------------------------*/
function afegirUsuari() {
	formData = $("form#afegirUsuari").serialize();
  
  $.ajax({
  	type: "POST",
  	url: "Usuaris/altausuaris.php",
  	data: formData,
  })
  .done(function(data, textStatus, jqXHR) {
  	if (console && console.log) {
  		console.log("La sol·licitud s'ha completat correctament.");
  	}
  })
  .fail(function(jqXHR, textStatus, errorThrown) {
  	if (console && console.log) {
  		console.log("La sol·licitud ha fallat: " + textStatus);
  	}
  });
} //fi_function


/*
# Eliminar
------------------------------------------------------------------------------*/
function eliminarUsuari() {
} //fi_function


/*
# Editar
------------------------------------------------------------------------------*/
function editarUsuari() {
} //fi_function