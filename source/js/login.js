let account = -1;

function getCuentaEl(cuentaNum) {
	return document.getElementById('cuenta-'+cuentaNum);
}

document.querySelector('#cuenta-1 a').addEventListener('click', function() {
		getCuentaEl(2).classList.add('deactivate');
		getCuentaEl(3).classList.add('deactivate');
		getCuentaEl(4).classList.add('deactivate');

		account = 1;
	});

document.querySelector('#cuenta-2 a').addEventListener('click', function() {
		getCuentaEl(3).classList.add('deactivate');
		getCuentaEl(4).classList.add('deactivate');
		getCuentaEl(1).classList.add('deactivate');

		account = 2;
	});

document.querySelector('#cuenta-3 a').addEventListener('click', function() {
		getCuentaEl(4).classList.add('deactivate');
		getCuentaEl(1).classList.add('deactivate');
		getCuentaEl(2).classList.add('deactivate');

		account = 3;
	});

document.querySelector('#cuenta-4 a').addEventListener('click', function() {
		getCuentaEl(1).classList.add('deactivate');
		getCuentaEl(2).classList.add('deactivate');
		getCuentaEl(3).classList.add('deactivate');

		account = 4;
	});



document.getElementById('enter-btn').addEventListener('click', function() {
	var currUrl = window.location.href;
	var urlParts = currUrl.split('/');
	var file = urlParts[urlParts.length-1];

	var newUrl = currUrl.substring(0, currUrl.length-file.length);
	
	if (account == 1) {
		newUrl += "admin.html";
	} else {
		newUrl += "registro_servicio.html";
	}
	window.location.href = newUrl;
});