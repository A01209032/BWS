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
/*
window.onload(requestCuentas());

function requestCuentas(){
  $.get( "controlador/obtenerCuentas.php")
        .done(function( data ) {
            var ajaxResponse = document.getElementById('reporteCuentas');
            ajaxResponse.innerHTML = data;
            ajaxResponse.style.visibility = "visible";
        });
}*/


$(document).ready(function(){  
  $('form.ajax').on("submit", function(){  
    
      var that=$(this),
        url = 'controlador/guardar_contrasena.php',
        type=that.attr('method'),
        data={};
      that.find('[name]').each(function(index,value){
        var eso=$(this);
        name=eso.attr('name'),
        value=eso.val();

        data[name]=value;
      });  
      //var boton=data[id];
      //boton='#'+boton;

      $.ajax({
        url: url,
        type:type,
        data: data,
        /*
        beforeSend:function(){
          echo (boton);
          $(boton).val("Insertando");  
        }, */
        success: function(data) {
          alert(data);
          that[0].reset();
          window.location="cuentas.php";
        }
      });
      return false;
      
  });





});
/*
$(document).ready(function(){  
  $('submit').on("click", function(event){  
           event.preventDefault(); 

           if($('#contrasenaNueva').val() == "")  
           {  
                alert("Ingrese contasena");  
           }  
           else if($('#id').val() == '')  
           {  
                alert("error id");  
           }  
           else  
           {  
                var contrasenaNueva= this.find('#contrasenaNueva');
                var id= this.find('#id');
                alert(contrasenaNueva);
                alert(id);
                $.ajax({  
                     url:"controlador/guardar_contrasena.php",  
                     method:"POST",  
                     data:{
                      contrasenaNueva:contrasenaNueva,
                      id:id
                     },  
                     beforeSend:function(){
                          $('#insert').val("Insertando");  
                     },  
                     success:function(data){  

                          $('#insert_form')[0].reset();  
                          //$('#add_data_Modal').modal('hide');  
                          //$('#employee_table').html(data);  
                     }  
                });  
           }  
      });  
});*/
/*
function myFunction(){
  //alert("SI");
  let var=$(this);
  $.ajax({
        url: 'controlador/guardar_contrasena.php',
        method: 'POST',
        data: {
          contrasenaNueva: this.attr('contrasenaNueva').val(),
          id: this.attr('id').val()
        },
        success: function(data) {
        alert("SI");
        this.attr('contrasenaNueva').val('');
        this.attr('id').val('');
        },
        dataType: 'text'
      });
}*/

/*
function selectValue() {

   var list=document.getElementById("list");
   var userInput=document.getElementById("userInput");
   var ajaxResponse=document.getElementById('ajaxResponse');
   userInput.value=list.options[list.selectedIndex].text;
   ajaxResponse.style.visibility="hidden";
   userInput.focus();
}*/