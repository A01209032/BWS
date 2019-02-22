
function getCuentaEl(cuentaNum) {
	return document.getElementById('cuenta-'+cuentaNum);
}


document.querySelector('#cuenta-1:after').addEventListener('click', function() {
	getCuentaEl(2).classList.add('deactivate');
	getCuentaEl(3).classList.add('deactivate');
	getCuentaEl(4).classList.add('deactivate');

});

