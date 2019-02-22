let password;
let password2;
let tamanio=false;
let caracterEspec=false;
let num=false;
let letras=false;
let validadas=false;
let flagContValidada=0;
                    
document.getElementById("p1").addEventListener('keyup', function() {
    validarContraseña(document.getElementById("p1").value);
})
                
function validarContraseña(p) {
    if(p.length==0){
        tamanio=false;
        caracterEspec=false;
        num=false;
        letras=false;
        validadas=false;
        flagContValidada=0;
        document.getElementById("validacion").value=0;
    }if(p.length>6&&tamanio==false){
        document.getElementById("validacion").value+=30;
        tamanio=true;
        flagContValidada++;
    }if(p.match(/[a-z]/)&&letras==false){
        document.getElementById("validacion").value+=20;
        letras=true;
        flagContValidada++;
    }if(p.match(/[0-9]/)&&num==false){
        document.getElementById("validacion").value+=20;
        num=true;
        flagContValidada++;
    }if(p.match(/[!#$%<>*&?¿]/)&&caracterEspec==false){
        document.getElementById("validacion").value+=30;
        caracterEspec=true;
        flagContValidada++;
    }if(flagContValidada==4){
        validadas=true;
    }
}


function compararContraseñas() {
    password1 = document.getElementById("p1").value;
    password2 = document.getElementById("p2").value;
    if(password1==password2&&validadas==false){
        document.getElementById("feedback").innerHTML = "Las contraseñas coinciden pero no son seguras";
    }else if(password1==password2&&validadas==true){
        document.getElementById("feedback").innerHTML = "Las contraseñas coinciden y son seguras";
    }else{
        document.getElementById("feedback").innerHTML = "Las contraseñas no coinciden";
    }
}

function agregarProducto(){
    let cantidad_nintendo = document.getElementById("consola1").value;
    let cantidad_ps4 = document.getElementById("consola2").value;
    let cantidad_xbox = document.getElementById("consola3").value;
    let subtotal_nintendo=cantidad_nintendo*7000;
    let subtotal_ps4=cantidad_ps4*10000;
    let subtotal_xbox=cantidad_xbox*9000;
    let iva;
    let text="";
    if(cantidad_nintendo>0){
        text+=cantidad_nintendo+ " nintendo   "+subtotal_nintendo+ "<br/>";
    }if(cantidad_ps4>0){
        text+=cantidad_ps4+ " ps4   "+subtotal_ps4+ "<br/>";
    }if(cantidad_xbox>0){
        text+=cantidad_xbox +" xbox   "+subtotal_xbox+ "<br/>";
    }let total=subtotal_nintendo+subtotal_ps4+subtotal_xbox;
    iva=total*.16;
    let totalIVA=total+iva;
    text+="IVA= "+ iva+ " pesos. <br/>" ;

    text+="total in IVA= "+ total+ " pesos. <br/>" ;
    text+="total con IVA= "+ totalIVA+ " pesos. <br/>" ;
    document.getElementById("carrito").innerHTML = text;
}

function resultados(){
    let nom = document.getElementById("nombre").value;
    let mail = document.getElementById("correo").value;
    let elect = document.getElementById("elect").value;
    let gaslp = document.getElementById("glp").value;
    let gasprop = document.getElementById("gp").value;
    let huella;
    let bandera=0;
    //primero se validan los datos
    if(!nom.match(/[a-z]/)||nom==0){
        document.getElementById("retro1").innerHTML = "Ingresa un nombre válido";
        bandera++;
    }if(!mail.match(/[@]/)||mail==0){
        document.getElementById("retro2").innerHTML = "Ingresa un correo válido";
        bandera++;
    }
    if(isNaN(elect)||elect==0){
        document.getElementById("retro3").innerHTML = "Ingresa número";
        bandera++;
    }if(isNaN(gaslp)||gaslp==0){
        document.getElementById("retro4").innerHTML = "Ingresa número";
        bandera++;
    }if(isNaN(gasprop)||gasprop==0){
        document.getElementById("retro5").innerHTML = "Ingresa número";
        bandera++;
    }
    

/*
            La huella media por persona en Esatdos Unidos es de 16.49 toneladas.
            
            181 g de CO2/kWh
            2,96 kg CO2/kg de GLP genérico
            2,94 kg CO2/kg de gas propano
*/
    let text="";

    if(bandera==0){
        huella=(elect*181*0.12283503255128)+(gaslp*2.96)+(gasprop*2.94);
        huella=huella/1000; //Toneladas de CO2
        text+="Hola "+nom+"! ";
        text+="Tu huella de carbono es de: ";
        text+=huella;
        text+=" toneladas de CO2 al año."
        text+="La huella media por persona en Estados Unidos es de 16.49 toneladas. La huella de carbono media mundial es de unas 4 toneladas. "
        if(huella>4){
            text+="Debido a que tu huella es alta podrias usar focos ahorradores y calentadores solares"
        }
        document.getElementById("res").innerHTML = text;

    }else{
        alert("Necesitas llenar todos los campos correctamente");
    }


}




