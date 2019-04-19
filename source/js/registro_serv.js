var pacienteActual   = { id: -1 };
var voluntarioActual = { id: -1 };
window.addEventListener("load", function() {


  var pacientes = {arr: []};
  

  // Habilitar Ajax a los forms para que todo sea con js
  $('#form_pacientes').on('submit', function(ev) {
    ev.preventDefault();



    $.ajax({
      url: 'registro_paciente.php',
      method: 'POST',
      data: {
        nombre: $('#nombre').val(),
        apellido: $('#apellido').val(),
        enfermedad: $('#enfermedad').val(),
        direccion: $('#direccion').val(),
        telefono: $('#telefono').val(),
        celular: $('#celular').val(),
        fecha_nacimiento: $('#fecha_nacimiento').val(),
        sexo: $('#sexo').val(),
        religion: $('#religion').val(),
        nivel: $('#nivel').val()
      },
      success: function(data) {
        data = JSON.parse(data);
        if(data[0]=="Error: En insercion de base de datos!"){
          alert(data[0]);
          alert(data[1]);
        }
        else if(data[0]=="Success: Al ingresar datos"){
          alert('Se registro exitosamente el paciente');
          $('#nombre').val('');
          $('#fecha_nacimiento').val('');
          $('#apellido').val('');
          $('#direccion').val('');
          $('#telefono').val('');
          $('#celular').val(' ');
          $('#myModal').modal('hide');

          cargarPacientes();
        }
        else{
          $('#nombreErr').html(data[0]);
          $('#nivelErr').html(data[1]);
          $('#apellidoErr').html(data[2]);
          $('#fechaNacimientoErr').html(data[3]);
          $('#enfermedadErr').html(data[4]);
          $('#sexoErr').html(data[5]);
          $('#religionErr').html(data[6]);
          
        }
      },
      dataType: 'text'
    });

    
  });

  // Registro Servicio AJAX
  $('#form_registros').on('submit', function(ev) {
    ev.preventDefault();



    $.ajax({
      url: 'nuevo_registro.php',
      method: 'POST',
      data: {
        paciente: pacienteActual.id,
        asistente: voluntarioActual.id,
        fecha: $('#fecha').val(),
        tipo: $('#tipo').val(),
        observaciones: $('#observaciones').val(),
        CuotaRecup: $('#CuotaRecup').val(),
        submit: ''
      },
      success: function(data) {
        console.log(data);
        data = JSON.parse(data);
        if(data[0]=="Error: En insercion de base de datos!"){
          alert(data[0]);
        }
        else if(data[0]=="Success: Al ingresar datos"){
          alert('Se ingresaron los datos');
          $('#paciente').val('');
          pacienteActual.id = -1;
          $('#asistente').val('');
          voluntarioActual.id = -1;
          $('#fecha').val('');
          $('#tipo').val('');
          $('#observaciones').val('');
          $('#CuotaRecup').val('');
        }
        else{
          $('#pacienteErr').html(data[0]);
          $('#asistenteErr').html(data[1]);
          $('#fechaErr').html(data[2]);
          $('#tipoErr').html(data[3]);
          
        }
      },
      dataType: 'text'
    });

    
  });


  // Cargar Lista de Pacientes
  function cargarPacientes() {
    $.ajax({
      url: "listar_pacientes.php",
      method: 'GET',
      data: {pattern: 'all'},
      type: 'json',
      success: function(data) {
        console.log("Pacientes:" + data);
        data = JSON.parse(data);
        if (data[0] == "Error") {
          alert("There was a critical error on the server!");
          return;
        }
        //console.log(data);
        var nombres = [];
        for (var i=0; i < data.length; i++) {
          //console.log(data[i])
          nombres.push({val: (data[i]['fname']+" - "+data[i]['edad']+" años") , id: data[i]['id']});
        }
        pacientes.arr = nombres;
        autocomplete(document.getElementById('paciente'), pacientes, pacienteActual);
      }
    });
  }
  cargarPacientes();


  // Cargar Lista de Voluntarios/Asistentes
  $.ajax({
    url: "listar_asistentes.php",
    method: 'GET',
    data: {pattern: 'all'},
    type: 'json',
    success: function(data) {
      console.log("Asistentes:" + data);
      data = JSON.parse(data);
      if (data[0] == "Error") {
        alert("There was a critical error on the server!");
        return;
      }
      //console.log(data);
      var nombres = [];
      for (var i=0; i < data.length; i++) {
        //console.log(data[i])
        nombres.push({val: data[i]['fname'], id: data[i]['id']});
      }
      autocomplete(document.getElementById('asistente'), {arr: nombres }, voluntarioActual);
    }
  });


$('#registrarNuevoServicio').on('click', function(ev) {
    ev.preventDefault();



    $.ajax({
      url: 'tipodeservicio.php',
      method: 'POST',
      data: {
        nombreServicio: $('#nombreServicio').val()
      },
      success: function(data) {
        if(data="errord"){
          alert(data);
          $('#errorNS').html('Datos incompletos');
          //alert($('#nombreServicio').val());
        }
        else if(data="error"){
          alert(data);
        }
        else{
          alert(data);
          $('#nombreServicio').val('');
          $('#errorNS').html('');
          $('#crearServicio').modal('hide');
        }
       
      },
      dataType: 'text'
    });

    
  });



});