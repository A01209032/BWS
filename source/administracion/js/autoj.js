var pacienteActual   = { id: -1 };
var voluntarioActual = { id: -1 };

  var pacientes = {arr: []};
  
function cargarPacientes() {
    $.ajax({
      url: "../registros/listar_pacientes.php",
      method: 'GET',
      data: {pattern: 'all'},
      type: 'text',
      success: function(data) {
        console.log("Pacientes:" + data);
        data = JSON.parse(data);
        data = data.arr;
        if (data[0] == "Error") {
          alert("There was a critical error on the server!");
          return;
        }
        //console.log(data);
        var nombres = [];
        for (var i=0; i < data.length; i++) {
          //console.log(data[i])
          nombres.push({val: (data[i]['fname']+" - "+data[i]['edad']+" años - "+data[i]['nivel']) , id: data[i]['id']});
        }
        pacientes.arr = nombres;
        autocomplete(document.getElementById('paciente2'), pacientes, pacienteActual);
      }
    });
  }
  cargarPacientes();
 $.ajax({
    url: "../registros/listar_asistentes.php",
    method: 'GET',
    data: {pattern: 'all'},
    type: 'json',
    success: function(data) {
      console.log("Asistentes:" + data);
      data = JSON.parse(data);
      data = data.arr;
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
      autocomplete(document.getElementById('asistente2'), {arr: nombres }, voluntarioActual);
    }
  });

 $('#form_registros').on('submit', function(ev) {
    ev.preventDefault();



    $.ajax({
      url: 'controlador/editar_servicio.php',
      method: 'POST',
      data: {
        paciente2: pacienteActual.id,
        asistente2: voluntarioActual.id,
        date2: $('#date2').val(),
        servicio2: $('#servicio2').val(),
        Observaciones2: $('#Observaciones2').val(),
        cuota2: $('#cuota2').val(),
        depa2: $('#depa2').val(),
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
          $('#CuotaRecup').val(0);
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

