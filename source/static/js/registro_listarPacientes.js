



function getXMLObject() {
	if (window.XMLHttpRequest) {
		return new XMLHttpRequest();
	} else if (window.ActiveXObject) {
		return new ActiveXObject("Microsoft.XMLHTTP");
	} else {
		return null;
	}
}


function sendNombreQuery() {

	var req = getXMLObject();

	if (req != null) {
		var pacienteQuery = document.getElementById('paciente').value;
		var url = "registros/listar_pacientes.php?pattern=" + pacienteQuery;

		req.open('GET', url, true);
		req.onreadystatechange = 
			function() {
				if (req.readyState == 4) {
					var res = req.responseText;
					console.log(res);
					updateListaPacientes(res);
				}
			};

		req.send(null);
	}

}

function updateListaPacientes(res) {
	var pacientesStr = res.split('#');

	if (pacientesStr[0] == "Error") {
		alert("Error: " + pacientesStr[1]);
		return;
	}

	for (var i=0; i < pacientesStr.length; i++) {
		var pAttrs = pacientesStr[i].split('|');
		alert("Nombre: " + pAttrs[1] + " - Id: " + pAttrs[0]);
	}
}

function seleccionarPaciente() {

}