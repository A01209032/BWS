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
	console.log('Interpolacion #'+(i+1) + ' y #' + (((i+1)%5)+1));
	var nStart = primary_nodes[i];
	var nEnd   = primary_nodes[(i+1) % primary_nodes.length]; // When nStart is End Node+1, nEnd = Node 1 

	// Calcular las 10 posiciones de Interpolacion entre los Nodos start y end
	var nPositions = nodeInterpolation(nStart, nEnd, AVES_MARIAS_COUNT);

	for (var j = 0; j < AVES_MARIAS_COUNT; j++) {
		crearNodoAVM( nPositions[j].x, nPositions[j].y );
	}
}

// Crear Aves Marias a Cruz
var AVES_MARIAS_INICIO = 3;
var nPositions = nodeInterpolation(primary_nodes[0], {x: 360, y: 100}, AVES_MARIAS_INICIO);
for (var j = 0; j < AVES_MARIAS_INICIO; j++) {
	crearNodoAVM( nPositions[j].x, nPositions[j].y );
}

/***********************************************
 * Funciones de Utilidad Para Crear el Rosario */

function nodeInterpolation(start, end, step) {
	var posistions = [];

	var v = {
		x: end.x-start.x, 
		y: end.y-start.y
	};

	console.log('v: (' + v.x + ',' + v.y + ')')

	var ang = Math.atan2(v.y, v.x);

	var distTotal = Math.sqrt(v.x*v.x + v.y*v.y) ;
	var distChunk = distTotal / step - 2;

	console.log("Dir: " + ang);

	for (var i = 0; i < step; i++) {
		var node = {};

		var xOff = start.x + 16*Math.cos(ang);
		var yOff = start.y + 16*Math.sin(ang);
		node.x = Math.floor(xOff + i*distChunk*Math.cos(ang));
		node.y = Math.floor(yOff + i*distChunk*Math.sin(ang));

		posistions.push(node);
	}

	console.log(posistions)

	return posistions;
}

function crearNodoPadre(id, x, y) {
	var node = document.createElement('div');

	node.id = "padre-node-" + id;
	node.classList.add('padre-node');

	node.style.left   = x + 'px';
	node.style.bottom = y + 'px';

	node.onclick = onNodeClick;

	rosarioEl.appendChild(node);
}

function crearNodoAVM(x, y) {
	var node = document.createElement('div');

	node.classList.add('avm-node');

	node.style.left   = x + 'px';
	node.style.bottom = y + 'px';

	rosarioEl.appendChild(node);
}


/*********************
 * Contraseña Logica */


function onNodeClick(e) {
	var nEl = e.target;
	
	//var nId = nEl.id.split('-')
	nEl.style.backgroundColor = 'black';
}



