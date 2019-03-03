/* ************************************* *
 * Modulo: login.js
 *
 * Autor: Juan Jose Olivera 
 * Matricula: A01702832
 * Instituo: Tec de Monterrey CQ
 *
 * Descripcion: Todo el JS para asignar el comportamiento deseado al login.
 * SubFunciones:
 * - Efectos Visuales de Sombreado y Seleccion en los perfiles de las cuentas
 * - Creacion de la Contraseña tipo Rosario
 * - Ingreso de Contraseña
 *
 * ************************************ */


/********************************
 * For Effect Account Selection */

let account = -1;

function getCuentaEl(cuentaNum) {
	return document.getElementById('cuenta-'+cuentaNum);
}

function resetCuenta(el) {
	el.classList.remove('deactivate');
}

document.querySelector('#cuenta-1 a').addEventListener('click', function() {
		for (var i = 1; i <= 4; i++) resetCuenta(getCuentaEl(i));
		getCuentaEl(2).classList.add('deactivate');
		getCuentaEl(3).classList.add('deactivate');
		getCuentaEl(4).classList.add('deactivate');

		account = 1;
	});

document.querySelector('#cuenta-2 a').addEventListener('click', function() {
		for (var i = 1; i <= 4; i++) resetCuenta(getCuentaEl(i));
		getCuentaEl(3).classList.add('deactivate');
		getCuentaEl(4).classList.add('deactivate');
		getCuentaEl(1).classList.add('deactivate');

		account = 2;
	});

document.querySelector('#cuenta-3 a').addEventListener('click', function() {
		for (var i = 1; i <= 4; i++) resetCuenta(getCuentaEl(i));
		getCuentaEl(4).classList.add('deactivate');
		getCuentaEl(1).classList.add('deactivate');
		getCuentaEl(2).classList.add('deactivate');

		account = 3;
	});

document.querySelector('#cuenta-4 a').addEventListener('click', function() {
		for (var i = 1; i <= 4; i++) resetCuenta(getCuentaEl(i));
		getCuentaEl(1).classList.add('deactivate');
		getCuentaEl(2).classList.add('deactivate');
		getCuentaEl(3).classList.add('deactivate');

		account = 4;
	});



// document.getElementById('enter-btn').addEventListener('click', function() {
// 	var currUrl = window.location.href;
// 	var urlParts = currUrl.split('/');
// 	var file = urlParts[urlParts.length-1];

// 	var newUrl = currUrl.substring(0, currUrl.length-file.length);
	
// 	if (account == 1) {
// 		newUrl += "admin.html";
// 	} else {
// 		newUrl += "registro_servicio.html";
// 	}
// 	window.location.href = newUrl;
// });


/********************
 * Creacion Rosario */

var rosarioEl = document.getElementById('rosario');
var primary_nodes = [
	{x: 360, y: 150},   // 1) Padre Nodo - Centro,Abajo
	{x: 500, y: 260},   // 2) Padre Nodo - Derecha,Medio
	{x: 440, y: 400},   // 3) Padre Nodo - Derecha,Arriba
	{x: 280, y: 400},   // 4) Padre Nodo - Izquierda,Arriba
	{x: 220, y: 260}    // 5) Padre Nodo - Izquierda,Medio
];

// Crear Nodos Padres
for (var i = 0; i < primary_nodes.length; i++) {
	crearNodoPadre(i+1, primary_nodes[i].x, primary_nodes[i].y);
}	

// Crear Nodos Aves
var AVES_MARIAS_COUNT = 10;
for (var i = 0; i < primary_nodes.length; i++) {
	//console.log('Interpolacion #'+(i+1) + ' y #' + (((i+1)%5)+1));
	var nStart = primary_nodes[i];
	var nEnd   = primary_nodes[(i+1) % primary_nodes.length]; // When nStart is End Node+1, nEnd = Node 1 

	// Calcular las 10 posiciones de Interpolacion entre los Nodos start y end
	var nPositions = nodeInterpolation(nStart, nEnd, AVES_MARIAS_COUNT);

	for (var j = 0; j < AVES_MARIAS_COUNT; j++) {
		crearNodoAVM( nPositions[j].x, nPositions[j].y );
	}
}

// Crear Aves Marias a Imagen de Cruz
var AVES_MARIAS_INICIO = 3;
var cruzPos = {x: 360, y: 100};
var nPositions = nodeInterpolation(primary_nodes[0], cruzPos, AVES_MARIAS_INICIO);
for (var j = 0; j < AVES_MARIAS_INICIO; j++) {
	crearNodoAVM( nPositions[j].x, nPositions[j].y );
}
var cruzImg = document.getElementById('ros-cruz');
cruzImg.style.left   = (cruzPos.x - cruzImg.width/4) + 'px';
cruzImg.style.bottom = (cruzPos.y - cruzImg.height) + 'px';

/***********************************************
 * Funciones de Utilidad Para Crear el Rosario */

function nodeInterpolation(start, end, step) {
	var posistions = [];

	var v = {
		x: end.x-start.x, 
		y: end.y-start.y
	};

	//console.log('v: (' + v.x + ',' + v.y + ')')

	var ang = Math.atan2(v.y, v.x);

	var distTotal = Math.sqrt(v.x*v.x + v.y*v.y) ;
	var distChunk = distTotal / step - 2;

	//console.log("Dir: " + ang);

	for (var i = 0; i < step; i++) {
		var node = {};

		var xOff = start.x + 16*Math.cos(ang);
		var yOff = start.y + 16*Math.sin(ang);
		node.x = Math.floor(xOff + i*distChunk*Math.cos(ang));
		node.y = Math.floor(yOff + i*distChunk*Math.sin(ang));

		posistions.push(node);
	}

	//console.log(posistions)

	return posistions;
}

function crearNodoPadre(id, x, y) {
	var node = document.createElement('div');

	node.id = "padre-node-" + id;
	node.classList.add('padre-node');

	node.style.left   = (x - 16) + 'px';
	node.style.bottom = (y - 16) + 'px';

	node.onclick = onNodeClick;

	rosarioEl.appendChild(node);
}

function crearNodoAVM(x, y) {
	var node = document.createElement('div');

	node.classList.add('avm-node');

	node.style.left   = (x-8) + 'px';
	node.style.bottom = (y-8) + 'px';

	rosarioEl.appendChild(node);
}


/*********************
 * Contraseña Logica */

var padNodeClicks = [];
for (var i = 0; i < 5; i++) {
	padNodeClicks[i] = 0;
}

var padNodeCode = [];
padNodeCode[0] = ['0', '5', '6', '3'];
padNodeCode[1] = ['_', '.', ',', '?'];
padNodeCode[2] = ['A', 'b', 'C', 'g'];
padNodeCode[3] = ['z', 'E', 'G', 'm'];
padNodeCode[4] = ['=', '-', ' ', '!'];

var sequence = [];

function onNodeClick(e) {
	var nEl = e.target;
	
	var idParts = nEl.id.split('-');
	var nId = parseFloat(idParts[idParts.length-1]);

	padNodeClicks[nId-1]++;
	//sequence.push(padNodeCode[nId-1][padNodeClicks[nId-1] % 5]);
	sequence.push(nId-1);
	var brightLevel = 67-padNodeClicks[nId-1]*18;

	nEl.style.backgroundColor = 'hsl(36, 53%, '+brightLevel+'%)';
}


document.getElementById('enter-btn').addEventListener('click', function() {
	var user = account + '';
	var pass = '';
	for (var i=0; i < sequence.length; i++) {
		pass += sequence[i];
		if (i != sequence.length-1)
			pass += ','
	}

	//alert('User: ' + user + ', Pass: ' + pass);

	// $.ajax({
	// 	url: '/login.php',
	// 	method: 'POST',
	// 	data: {
	// 		user: user,
	// 		password: pass
	// 	}
	// })
	// .done(function(res) {
	// 	console.log(res);
	// });

	if (account == 1 && pass != '0,4,1,4') {
		location.reload();
		return;
	}
	if (account == 2 && pass != '0,3,2,0,0') {
		location.reload();
		return;
	}
	if (account == 3 && pass != '3,2,1,0,4') {
		location.reload();
		return;
	}

	// if (account == 1 && pass != 'ajk34=d') {
	// 	location.reload();
	// 	return;
	// }
	// if (account == 2 && pass != 'sas3-da') {
	// 	location.reload();
	// 	return;
	// }
	// if (account == 3 && pass != 'd0f3fav') {
	// 	location.reload();
	// 	return;
	// }

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



