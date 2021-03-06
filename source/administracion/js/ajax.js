function getRequestObject() {
    if (window.XMLHttpRequest) {
        return (new XMLHttpRequest());
    } else if (window.ActiveXObject) {
        return (new ActiveXObject("Microsoft.XMLHTTP"));
    } else {
        return (null);
    }
}

$(document).ready(function () {
    const loader = document.querySelector(".loader");
    //cargar
    //window.onload=fechas();

    function fechas() {

        let NUEVO_CODIGO = 1;
        if (NUEVO_CODIGO) {
            if (date === undefined && depa === undefined) {
                date = '00-00-0000';
                depa = 0;
            } else {


                $.post("controlador/consulta_tabla.php", {
                        date,
                        depa
                    })
                    .done(function (data) {
                        var ajaxResponse = document.getElementById('ajaxResponse');
                        ajaxResponse.innerHTML = data;
                        ajaxResponse.style.visibility = "visible";
                        let titulo = 'Consulta por mes';
                        $('#consultas').DataTable({
                            "language": {
                                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json",
                                print: "Imprimir"
                            },
                            "responsive": true,

                            dom: 'Bfrtip',
                            buttons: [{
                                    extend: 'csv',
                                    title: titulo
                }, {
                                    extend: 'pdf',
                                    title: titulo
                }, {
                                    extend: 'excel',
                                    title: titulo
                },
                                {
                                    extend: 'print',
                                    text: 'Imprimir',
                                    title: titulo
                      }
                    ]
                        });
                    });
            }
        } else {

        }

    }

    function confirmacion(mensaje, handler) {

        //Se agrega el modal de confirmación de cambio de contraseña
        $(`<div class="modal" id="confirmModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title"></h4></h4>
                <button type="button" class="close"  onclick="$('#confirmModal').hide();">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body" >
              <h2 id="confirmModalData"></h2>
              <div style="text-align: right;">
                <input type="button" name="confirmar" value="Confirmar" id="confirmar" class="clsButton btn btn-primary btn-yes">           
                <input type="button"  name="cancelar" value="Cancelar" id="cancelar" class="clsButton btn btn-danger btn-no">
              </div>
            </div>
          </div>
        </div>
      </div>`).appendTo('body');


        //Se muestra el modal
        $('#confirmModalData').html(mensaje);
        $('#confirmModal').show();

        //Pass true to a callback function
        $(".btn-yes").click(function () {
            handler(true);
            $("#confirmModal").hide();
            $("#confirmModal").remove();
        });

        //Pass false to callback function
        $(".btn-no").click(function () {
            handler(false);
            $("#confirmModal").hide();
            $("#confirmModal").remove();
        });

    }

    function eliminar() {
        var retVal = confirm("¿Esta seguro que desea eliminar el servicio?");
        if (retVal == true) {
            //document.write ("User wants to continue!");
            return true;
        } else {
            //document.write ("User does not want to continue!");
            return false;
        }
    }

    $(document).on('click', '.delete_data', function () {
        let employee_id = $(this).attr("id");
        confirmacion("Estas seguro de eliminar el registro?", function (res) {
            if (res) {

                // alert(employee_id);
                $.ajax({
                    url: "controlador/eliminar_servicio.php",
                    method: "POST",
                    data: {
                        employee_id: employee_id
                    },
                    success: function (data) {
                        $('#alertModal').show();
                        $('#alertModalData').html(data);
                        fechas();
                    }
                });
            }
        });

        return false;
    });
    //eliminar
    /*
       $(document).on('click', '.delete_data', function(){
         if (eliminar()){
           let employee_id = $(this).attr("id");
            // alert(employee_id);
           $.ajax({
             url:"controlador/eliminar_servicio.php",
             method:"POST",
             data: {employee_id: employee_id},
             success:function(data){
               alert(data);
                 fechas();
             }
           });
         }
       });*/
    //
    $('#modificar-registros').on("submit", function (event) {

        event.preventDefault();
        event.stopPropagation();
        console.log(event);
        $.ajax({
            url: 'controlador/editar_servicio.php',
            method: 'POST',
            data: {
                depa2: $('#depa2').val(),
                paciente2: $('#paciente2').val(),
                asistente2: $('#asistente2').val(),
                date2: $('#date2').val(),
                servicio2: $('#servicio2').val(),
                Observaciones2: $('#Observaciones2').val(),
                cuota2: $('#cuota2').val(),
                employee_id: $('#employee_id').val()
            },
            success: function (data) {

                $('#modificarServicio').modal('hide');
                //alert(data);
                //console.log(data);
                fechas();
                $('#alertModal').show();
                $('#alertModalData').html(data);
            }
        });
    });
    //
});

var date;
var depa;

function sendRequest() {

    let NUEVO_CODIGO = 1;
    if (NUEVO_CODIGO) {
        $.post("controlador/consulta_tabla.php", {
                date: document.getElementById('date').value,
                depa: document.getElementById('depa').value
            })
            .done(function (data) {
                var ajaxResponse = document.getElementById('ajaxResponse');
                ajaxResponse.innerHTML = data;
                ajaxResponse.style.visibility = "visible";
                let titulo = 'Consulta por mes';
                var aux1 = document.getElementById('date').value;
                var aux2 = document.getElementById('depa').value;
                date = aux1;
                depa = aux2;
                $('#consultas').DataTable({
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json",
                        print: "Imprimir"
                    },
                    "responsive": true,

                    dom: 'Bfrtip',
                    buttons: [{
                            extend: 'csv',
                            title: titulo
                }, {
                            extend: 'pdf',
                            title: titulo
                }, {
                            extend: 'excel',
                            title: titulo
                },
                        {
                            extend: 'print',
                            text: 'Imprimir',
                            title: titulo
                      }
                    ]
                });

            });
    } else {

    }

}

function soloLetras(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = "8-37-39-46";

    tecla_especial = false
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
    }
}

function sendRequest3() {

    let NUEVO_CODIGO = 1;

    if (NUEVO_CODIGO) {

        $.get("controlador/verificar.php", {
                pattern: document.getElementById('userInput').value
            })
            .done(function (data) {
                var ajaxResponse3 = document.getElementById('ajaxResponse3');
                ajaxResponse3.innerHTML = data;
                ajaxResponse3.style.visibility = "visible";
            });
    } else {


    }

}


function sendRequest4() {

    let NUEVO_CODIGO = 1;

    if (NUEVO_CODIGO) {

        $.get("controlador/verificarv.php", {
                pattern2: document.getElementById('userInput2').value
            })
            .done(function (data) {
                var ajaxResponse3 = document.getElementById('ajaxResponse4');
                ajaxResponse3.innerHTML = data;
                ajaxResponse3.style.visibility = "visible";
            });
    } else {}

}
//reportes
function sendRequest2() {

    let NUEVO_CODIGO = 1;

    if (NUEVO_CODIGO) {

        $.post("controlador/reporte_tabla.php", {
                date: document.getElementById('date').value,
                date2: document.getElementById('date2').value
            })
            .done(function (data) {

                var ajaxResponse2 = document.getElementById('ajaxResponse2');
                ajaxResponse2.innerHTML = data;
                ajaxResponse2.style.visibility = "visible";

                let tituloDispensario = 'Reporte de dispensario';
                $('#dispensario').DataTable({
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json",
                        print: "Imprimir"
                    },
                    "responsive": true,

                    dom: 'Bfrtip',
                    buttons: [{
                            extend: 'csv',
                            title: tituloDispensario
                }, {
                            extend: 'pdf',
                            title: tituloDispensario
                }, {
                            extend: 'excel',
                            title: tituloDispensario
                },
                        {
                            extend: 'print',
                            text: 'Imprimir',
                            title: tituloDispensario
                      }
                    ]
                });

                let tituloAsist = 'Reporte de asistencias';
                $('#asistencias').DataTable({
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json",
                        print: "Imprimir"
                    },
                    "responsive": true,

                    dom: 'Bfrtip',
                    buttons: [{
                            extend: 'csv',
                            title: tituloAsist
                }, {
                            extend: 'pdf',
                            title: tituloAsist
                }, {
                            extend: 'excel',
                            title: tituloAsist
                },
                        {
                            extend: 'print',
                            text: 'Imprimir',
                            title: tituloAsist
                      }
                    ]
                });
                let tituloNumAsist = 'Reporte de porteria';
                $('#porteria').DataTable({
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json",
                        print: "Imprimir"
                    },
                    "responsive": true,

                    dom: 'Bfrtip',
                    buttons: [{
                            extend: 'csv',
                            title: tituloNumAsist
                }, {
                            extend: 'pdf',
                            title: tituloNumAsist
                }, {
                            extend: 'excel',
                            title: tituloNumAsist
                },
                        {
                            extend: 'print',
                            text: 'Imprimir',
                            title: tituloNumAsist
                      }
                    ]
                });

                let tituloNumAsist2 = 'Número de asistencias';
                $('#asistenciasnum').DataTable({

                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json",
                        print: "Imprimir"
                    },
                    "responsive": true,

                    dom: 'Bfrtip',
                    buttons: [{
                            extend: 'csv',
                            title: tituloNumAsist2
                }, {
                            extend: 'pdf',
                            title: tituloNumAsist2
                }, {
                            extend: 'excel',
                            title: tituloNumAsist2
                },
                        {
                            extend: 'print',
                            text: 'Imprimir',
                            title: tituloNumAsist2
                      }
                    ]
                });

                let tituloTipoServicio = 'Reporte por tipo de servicio'
                $('#tiposdeservicio').DataTable({
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json",
                        print: "Imprimir"
                    },
                    "responsive": true,

                    dom: 'Bfrtip',
                    buttons: [{
                            extend: 'csv',
                            title: tituloTipoServicio
                }, {
                            extend: 'pdf',
                            title: tituloTipoServicio
                }, {
                            extend: 'excel',
                            title: tituloTipoServicio
                },
                        {
                            extend: 'print',
                            text: 'Imprimir',
                            title: tituloTipoServicio
                      }
                    ]
                });
                let nivelSocioeconomico = 'Nivel socioeconómico';
                $('#socioeconomico').DataTable({
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json",
                        print: "Imprimir"
                    },
                    "responsive": true,

                    dom: 'Bfrtip',
                    buttons: [{
                            extend: 'csv',
                            title: nivelSocioeconomico
                }, {
                            extend: 'pdf',
                            title: nivelSocioeconomico
                }, {
                            extend: 'excel',
                            title: nivelSocioeconomico
                },
                        {
                            extend: 'print',
                            text: 'Imprimir',
                            title: nivelSocioeconomico
                      }
                    ]
                });
            });
    } else {


    }
}

function sendRequest6() {

    let NUEVO_CODIGO = 1;

    if (NUEVO_CODIGO) {

        $.post("controlador/reporteJAP.php", {
                date: document.getElementById('date').value,
                date2: document.getElementById('date2').value
            })
            .done(function (data) {

                var ajaxResponse6 = document.getElementById('ajaxResponse6');
                ajaxResponse6.innerHTML = data;
                ajaxResponse6.style.visibility = "visible";
                let tituloTipoServicio = 'Tipo de servicio';
                $('#tiposdeservicio').DataTable({
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json",
                        print: "Imprimir"
                    },
                    "responsive": true,

                    dom: 'Bfrtip',
                    buttons: [{
                            extend: 'csv',
                            title: tituloTipoServicio
                }, {
                            extend: 'pdf',
                            title: tituloTipoServicio
                }, {
                            extend: 'excel',
                            title: tituloTipoServicio
                },
                        {
                            extend: 'print',
                            text: 'Imprimir',
                            title: tituloTipoServicio
                      }
                    ]
                });
                $('#totales').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'csv', 'excel', 'pdf', 'print'
                    ]
                });
            });
    } else {


    }

}

function sendRequest5() {

    let NUEVO_CODIGO = 1;

    if (NUEVO_CODIGO) {

        $.post("controlador/reportelocal.php", {
                date: document.getElementById('date').value,
                date2: document.getElementById('date2').value
            })
            .done(function (data) {

                var ajaxResponse5 = document.getElementById('ajaxResponse5');
                ajaxResponse5.innerHTML = data;
                ajaxResponse5.style.visibility = "visible";
                let tituloReporteLocal = 'Reporte Local';
                $('#local').DataTable({
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json",
                        print: "Imprimir"
                    },
                    "responsive": true,

                    dom: 'Bfrtip',
                    buttons: [{
                            extend: 'csv',
                            title: tituloReporteLocal
                }, {
                            extend: 'pdf',
                            title: tituloReporteLocal
                }, {
                            extend: 'excel',
                            title: tituloReporteLocal
                },
                        {
                            extend: 'print',
                            text: 'Imprimir',
                            title: tituloReporteLocal
                      }
                    ]
                });
                let tituloReligion = 'Religión';
                $('#religion').DataTable({
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json",
                        print: "Imprimir"
                    },
                    "responsive": true,

                    dom: 'Bfrtip',
                    buttons: [{
                            extend: 'csv',
                            title: tituloReligion
                }, {
                            extend: 'pdf',
                            title: tituloReligion
                }, {
                            extend: 'excel',
                            title: tituloReligion
                },
                        {
                            extend: 'print',
                            text: 'Imprimir',
                            title: tituloReligion
                      }
                    ]
                });

                let tituloNumAsist2 = 'Número de asistencias';
                $('#asistenciasnum').DataTable({

                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json",
                        print: "Imprimir"
                    },
                    "responsive": true,

                    dom: 'Bfrtip',
                    buttons: [{
                            extend: 'csv',
                            title: tituloNumAsist2
                }, {
                            extend: 'pdf',
                            title: tituloNumAsist2
                }, {
                            extend: 'excel',
                            title: tituloNumAsist2
                },
                        {
                            extend: 'print',
                            text: 'Imprimir',
                            title: tituloNumAsist2
                      }
                    ]
                });
                let nivelSocioeconomico = 'Nivel socioeconómico';
                $('#socioeconomico').DataTable({
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json",
                        print: "Imprimir"
                    },
                    "responsive": true,

                    dom: 'Bfrtip',
                    buttons: [{
                            extend: 'csv',
                            title: nivelSocioeconomico
                }, {
                            extend: 'pdf',
                            title: nivelSocioeconomico
                }, {
                            extend: 'excel',
                            title: nivelSocioeconomico
                },
                        {
                            extend: 'print',
                            text: 'Imprimir',
                            title: nivelSocioeconomico
                      }
                    ]
                });
            });
    } else {


    }

}
//
var auxiliar;
var auxiliar2;

function getval(first) {
    auxiliar = first;
}

function getval2(second) {
    auxiliar2 = second;
}

function selectValue() {

    var list = document.getElementById("list");
    var userInput = document.getElementById("userInput");
    var ajaxResponse = document.getElementById('ajaxResponse3');

    userInput.value = list.options[list.selectedIndex].value
    var aux = userInput.value;
    var nombre = document.getElementById("userInput");
    nombre.value = list.options[list.selectedIndex].text;
    ajaxResponse.style.display = "none";
    nombre.focus();


    document.getElementById('paciente2').value = aux;
    //alert(aux);
}

function selectValue2() {

    var list = document.getElementById("list2");
    var userInput = document.getElementById("userInput2");
    var ajaxResponse = document.getElementById('ajaxResponse4');
    userInput.value = list.options[list.selectedIndex].value;
    var aux2 = userInput.value;
    var nombre = document.getElementById("userInput2");
    nombre.value = list.options[list.selectedIndex].text;
    ajaxResponse.style.display = "none";
    nombre.focus();


    document.getElementById('asistente2').value = aux2;

    // alert(aux2);
}


function eliminarServicio(Servicio) {
    var eliminarser = confirm("¿Esta seguro que desea eliminar el servicio" + " " + Servicio + "?");
    if (eliminarser == false) {
        //document.write ("User wants to continue!");
        //document.write(eliminarser);
        return false;

    } else {
        //document.write ("User does not want to continue!");
        return true;
    }
}

function modificarServicio(Servicio) {
    var mod = confirm("¿Esta seguro que desea modificar el servicio" + " " + Servicio + "?");
    if (mod == false) {
        //document.write ("User wants to continue!");
        return false;
    } else {
        //document.write ("User does not want to continue!");
        return true;
    }
}

function reportes() {
    var mod = confirm("¿Esta seguro que desea generar el reporte" + "?");
    if (mod == false) {
        //document.write ("User wants to continue!");
        return false;
    } else {
        alert("Se creo el reporte!")
        return true;
    }

}
