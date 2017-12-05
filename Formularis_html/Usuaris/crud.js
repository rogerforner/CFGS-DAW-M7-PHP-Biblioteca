/*******************************************************************************
 *********************************************************************** "ÍNDEX"
 * # Afegir
 * # Eliminar
 * # Obtenir dades usuari (modal editar)
 * # Editar
 ******************************************************************************/

/*
# Afegir
------------------------------------------------------------------------------*/
function afegirUsuari() {
	// Obtenim el valors de tots els camps del formulari.
	formData = $("form#afegirUsuari").serialize();

  // AJAX Request
  $.ajax({
  	type: "POST",
  	url: "Usuaris/insertUsuari.php",
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
$('.eliminar-usuari').click(function() {
	// Ens quedem amb el valor de la id del botó (#).
  var el = this;
  var buttonID = this.id;
	var splitUserID = buttonID.split("-");
	var userID = splitUserID[1];
	// alert(userID);

  // AJAX Request
  $.ajax({
  	type: "POST",
  	url: "Usuaris/deleteUsuari.php",
  	data: { id:userID },
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
}); //fi_function


/*
# Obtenir dades usuari (modal editar)
------------------------------------------------------------------------------*/
$('.obtenir-usuari').click(function() {
	// Ens quedem amb el valor de la id del botó (#).
	var el = this;
  var buttonID = this.id;
	var splitUserID = buttonID.split("-");
	var userID = splitUserID[1];
	// alert(userID);

  // AJAX Request
  $.ajax({
  	type: "POST",
  	url: "Usuaris/selectUsuari.php",
  	data: { id:userID },
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
}); //fi_function

/*
# Editar
------------------------------------------------------------------------------*/
function editarUsuari() {
} //fi_function
