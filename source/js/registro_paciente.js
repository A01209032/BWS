var enfermedadActual = { id: -1 };
      var enfermedades = { arr: [], buscadorCreado: false };
      function cargarEnfermedades() {
        $.ajax({
          url: 'listar_enfermedades.php',
          method: 'GET',
          data: { pattern: 'all' },
          dataType: 'text',
          success: function(data) {
            console.log("Enfermedad Resp: ");
            console.log(data);
            data = JSON.parse(data);
            if (data[0] == "Error") {
              alert("There was a critical error in the database!");
              return;
            }
            var enfNombres = [];
            for (var i=0; i < data.length; i++) {
              enfNombres.push(
                {val: data[i]['nombre'], id: data[i]['id']}
              );
            }
            enfermedades.arr = enfNombres;
            if (!enfermedades.buscadorCreado) {
              enfermedades.buscadorCreado = true;
              autocomplete(document.getElementById('enfermedad'), 
              enfermedades ,enfermedadActual);
            }
            
          }
        });
      }

      window.addEventListener('load', function() {
        cargarEnfermedades();
      });