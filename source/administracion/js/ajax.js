function getRequestObject(){
    if(window.XMLHttpRequest){
        return (new XMLHttpRequest());
    }
    else if(window.ActiveXObject){
        return (new ActiveXObject("Microsoft.XMLHTTP"));
    }else{
        return (null);
    }
}
function sendRequest(){

  let NUEVO_CODIGO = 1;
   if (NUEVO_CODIGO) {
        $.post( "controlador/consulta_tabla.php", { date: document.getElementById('date').value ,depa: document.getElementById('depa').value })
          .done(function( data ) {
              var ajaxResponse = document.getElementById('ajaxResponse');
              ajaxResponse.innerHTML = data;
              ajaxResponse.style.visibility = "visible";
          });
   } else {
       
   }
   
}
function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }

function sendRequest3(){

  let NUEVO_CODIGO = 1;

   if (NUEVO_CODIGO) {

       $.get( "controlador/verificar.php", { pattern: document.getElementById('userInput').value  })
          .done(function( data ) {
              var ajaxResponse3= document.getElementById('ajaxResponse3');
              ajaxResponse3.innerHTML = data;
              ajaxResponse3.style.visibility = "visible";
          });
   } else {


   }

}


function sendRequest4(){

  let NUEVO_CODIGO = 1;
   
   if (NUEVO_CODIGO) {
       
       $.get( "controlador/verificarv.php", { pattern2: document.getElementById('userInput2').value  })
          .done(function( data ) {
              var ajaxResponse3= document.getElementById('ajaxResponse4');
              ajaxResponse3.innerHTML = data;
              ajaxResponse3.style.visibility = "visible";
          });
   } else {
   }

}
//reportes
function sendRequest2(){

  let NUEVO_CODIGO = 1;

   if (NUEVO_CODIGO) {

       $.post( "controlador/reporte_tabla.php", { date: document.getElementById('date').value ,date2: document.getElementById('date2').value })
          .done(function( data ) {
          
              var ajaxResponse2 = document.getElementById('ajaxResponse2');
              ajaxResponse2.innerHTML = data;
              ajaxResponse2.style.visibility = "visible";

            let tituloDispensario='Reporte de dispensario';
            $('#dispensario').DataTable( {
              "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json",
                        print: "Imprimir"
                    },
                    "responsive": true,
                    
                    dom: 'Bfrtip',
                    buttons: [ {
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
                } );

          let tituloAsist='Reporte de asistencias';
           $('#asistencias').DataTable( {
                "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json",
                        print: "Imprimir"
                    },
                    "responsive": true,
                    
                    dom: 'Bfrtip',
                    buttons: [ {
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
                } );
           let tituloNumAsist='Reporte de porteria';
           $('#porteria').DataTable( {
                "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json",
                        print: "Imprimir"
                    },
                    "responsive": true,
                    
                    dom: 'Bfrtip',
                    buttons: [ {
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
                } );

           let tituloNumAsist2='Número de asistencias';
           $('#asistenciasnum').DataTable( {
                
                "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json",
                        print: "Imprimir"
                    },
                    "responsive": true,
                    
                    dom: 'Bfrtip',
                    buttons: [ {
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
                } );

           let tituloTipoServicio='Reporte por tipo de servicio'
           $('#tiposdeservicio').DataTable( {
               "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json",
                        print: "Imprimir"
                    },
                    "responsive": true,
                    
                    dom: 'Bfrtip',
                    buttons: [ {
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
                } );
           let nivelSocioeconomico='Nivel socioeconómico';
           $('#socioeconomico').DataTable( {
                "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json",
                        print: "Imprimir"
                    },
                    "responsive": true,
                    
                    dom: 'Bfrtip',
                    buttons: [ {
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
                } );
          });
   } else {


   }
}
function sendRequest6(){

  let NUEVO_CODIGO = 1;
   
   if (NUEVO_CODIGO) {
       
        $.post( "controlador/reporteJAP.php", { date: document.getElementById('date').value ,date2: document.getElementById('date2').value })
          .done(function( data ) {
          
              var ajaxResponse6 = document.getElementById('ajaxResponse6');
              ajaxResponse6.innerHTML = data;
              ajaxResponse6.style.visibility = "visible";
          let tituloTipoServicio='Tipo de servicio';
           $('#tiposdeservicio').DataTable( {
                "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json",
                        print: "Imprimir"
                    },
                    "responsive": true,
                    
                    dom: 'Bfrtip',
                    buttons: [ {
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
                } );
          });
   } else {
     
       
   }
   
}
function sendRequest5(){

  let NUEVO_CODIGO = 1;
   
   if (NUEVO_CODIGO) {
       
        $.post( "controlador/reportelocal.php", { date: document.getElementById('date').value ,date2: document.getElementById('date2').value })
          .done(function( data ) {
          
              var ajaxResponse5 = document.getElementById('ajaxResponse5');
              ajaxResponse5.innerHTML = data;
              ajaxResponse5.style.visibility = "visible";
          let tituloReporteLocal='Reporte Local';
           $('#local').DataTable( {
                "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json",
                        print: "Imprimir"
                    },
                    "responsive": true,
                    
                    dom: 'Bfrtip',
                    buttons: [ {
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
                } );
           let tituloReligion='Religión';
            $('#religion').DataTable( {
                "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json",
                        print: "Imprimir"
                    },
                    "responsive": true,
                    
                    dom: 'Bfrtip',
                    buttons: [ {
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
                } );
          });
   } else {
     
       
   }
   
}
//
var auxiliar;
var auxiliar2;
function getval(first){
    auxiliar=first;
}
function getval2(second){
    auxiliar2=second;
}

function selectValue() {

   var list=document.getElementById("list");
   var userInput=document.getElementById("userInput");
   var ajaxResponse=document.getElementById('ajaxResponse3');

   userInput.value=list.options[list.selectedIndex].value
    var aux=userInput.value;
    var nombre=document.getElementById("userInput");
    nombre.value=list.options[list.selectedIndex].text;
   ajaxResponse.style.display="none";
   nombre.focus();


document.getElementById('paciente2').value=aux;
    //alert(aux);
}

function selectValue2() {

   var list=document.getElementById("list2");
   var userInput=document.getElementById("userInput2");
   var ajaxResponse=document.getElementById('ajaxResponse4');
   userInput.value=list.options[list.selectedIndex].value;
    var aux2=userInput.value;
    var nombre=document.getElementById("userInput2");
    nombre.value=list.options[list.selectedIndex].text;
   ajaxResponse.style.display="none";
   nombre.focus();


document.getElementById('asistente2').value=aux2;

   // alert(aux2);
}
