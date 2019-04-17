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
function sendRequest2(){

  let NUEVO_CODIGO = 1;
   
   if (NUEVO_CODIGO) {
       
       $.post( "controlador/reporte_tabla.php", { date: document.getElementById('date').value ,date2: document.getElementById('date2').value })
          .done(function( data ) {
              var ajaxResponse2 = document.getElementById('ajaxResponse2');
              ajaxResponse2.innerHTML = data;
              ajaxResponse2.style.visibility = "visible";
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
   ajaxResponse.style.visibility="hidden";
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
   ajaxResponse.style.visibility="hidden";
   nombre.focus();
    
  
document.getElementById('asistente2').value=aux2;

   // alert(aux2);
}
