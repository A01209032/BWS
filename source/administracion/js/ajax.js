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
            $('#dispensario').DataTable( {
                    dom: 'Bfrtip',
                    buttons: [
                        'csv', 'excel', 'pdf', 'print'
                    ]
                } );
           $('#asistencias').DataTable( {
                    dom: 'Bfrtip',
                    buttons: [
                        'csv', 'excel', 'pdf', 'print'
                    ]
                } );
           $('#porteria').DataTable( {
                    dom: 'Bfrtip',
                    buttons: [
                        'csv', 'excel', 'pdf', 'print'
                    ]
                } );
           $('#asistenciasnum').DataTable( {
                    dom: 'Bfrtip',
                    buttons: [
                        'csv', 'excel', 'pdf', 'print'
                    ]
                } );
           $('#tiposdeservicio').DataTable( {
                    dom: 'Bfrtip',
                    buttons: [
                        'csv', 'excel', 'pdf', 'print'
                    ]
                } );
           $('#socioeconomico').DataTable( {
                    dom: 'Bfrtip',
                    buttons: [
                        'csv', 'excel', 'pdf', 'print'
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
           $('#tiposdeservicio').DataTable( {
                    dom: 'Bfrtip',
                    buttons: [
                        'csv', 'excel', 'pdf', 'print'
                    ]
                } );
            $('#totales').DataTable( {
                    dom: 'Bfrtip',
                    buttons: [
                        'csv', 'excel', 'pdf', 'print'
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
           $('#local').DataTable( {
                    dom: 'Bfrtip',
                    buttons: [
                        'csv', 'excel', 'pdf', 'print'
                    ]
                } );
            $('#religion').DataTable( {
                    dom: 'Bfrtip',
                    buttons: [
                        'csv', 'excel', 'pdf', 'print'
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


function eliminarServicio(Servicio) {
        var eliminarser = confirm("¿Esta seguro que desea eliminar el servicio"+" "+Servicio+"?");
               if( eliminarser == false ) {
                  //document.write ("User wants to continue!");
                  //document.write(eliminarser);
                   return false;

               } else {
                  //document.write ("User does not want to continue!");
                  return true;
               }
}
    function modificarServicio(Servicio) {
        var mod = confirm("¿Esta seguro que desea modificar el servicio"+" "+Servicio+"?");
               if( mod == false ) {
                  //document.write ("User wants to continue!");
                  return false;
               } else {
                  //document.write ("User does not want to continue!");
                  return true;
               }
}
    function reportes(){
        var mod = confirm("¿Esta seguro que desea generar el reporte"+"?");
               if( mod == false ) {
                  //document.write ("User wants to continue!");
                  return false;
               } else {
                  alert("Se creo el reporte!")
                  return true;
               }

    }

