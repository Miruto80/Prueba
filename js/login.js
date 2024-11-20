const Contrasena=document.getElementById("Contrasena");
const ojo=document.querySelector(".ojo");

ojo.addEventListener("click",()=>{
    if(Contrasena.type==="password"){
        Contrasena.type="text";
        ojo.classList.replace("fa-eye-slash","fa-eye");
    }else{
        Contrasena.type="password";
        ojo.classList.replace("fa-eye","fa-eye-slash");
    }
});




$(document).ready(function(){
//Seccion para mostrar lo enviado en el modal mensaje//
    
//Función que verifica que exista algo dentro de un div
 //oculto y lo muestra por el modal
 if($.trim($("#mensajes").text()) != ""){
        muestraMensaje($("#mensajes").html());
}
//Fin de seccion de mostrar envio en modal mensaje//		
        
        
        $("#CedulaU").on("keypress",function(e){
            validarkeypress(/^[0-9-\b]*$/,e);
        });
        
        $("#CedulaU").on("keyup",function(){
            validarkeyup(/^[0-9]{7,8}$/,$(this),
            $("#sCedulaU"),"El formato debe ser 9999999");
        });
        
        $("#Contrasena").on("keypress",function(e){
            validarkeypress(/^[A-Za-z0-9\b]*$/,e);
        });
        
        $("#Contrasena").on("keyup",function(){
            
            validarkeyup(/^[A-Za-z0-9]{3,30}$/,
            $(this),$("#sContrasena"),"Solo letras y numeros entre 3 y 30 caracteres");
        });
        
        
        
    //FIN DE VALIDACION DE DATOS
    
    
    
    //CONTROL DE BOTONES
    
    
    $("#entrar").on("click",function(){
        if(validarenvio()){
    
            $("#accion").val("entrar");	
            $("#f").submit();
            
        }
    });
    
    
    
    
        
        
    });
    
    //Validación de todos los campos antes del envio
    function validarenvio(){
        if(validarkeyup(/^[0-9]{3,8}$/,$("#CedulaU"),
            $("#sCedulaU"),"El formato debe ser 9999999")==0){
            muestraMensaje("La CedulaU debe coincidir con el formato <br/>"+ 
                            "99999999");	
            return false;					
        }	
        else if(validarkeyup(/^[A-Za-z0-9]{3,30}$/,
            $("#Contrasena"),$("#sContrasena"),"Solo letras y numeros entre 3 y 30 caracteres")==0){
            muestraMensaje("<br/>Solo letras y numeros entre 3 y 30 caracteres");
            return false;
        }
        
        
        return true;
    }
    
    
    //Funcion que muestra el modal con un mensaje
    function muestraMensaje(mensaje){
        
        $("#contenidodemodal").html(mensaje);
                $("#mostrarmodal").modal("show");
                setTimeout(function() {
                        $("#mostrarmodal").modal("hide");
                },5000);
    }
    
    
    //Función para validar por Keypress
    function validarkeypress(er,e){
        
        key = e.keyCode;
        
        
        tecla = String.fromCharCode(key);
        
        
        a = er.test(tecla);
        
        if(!a){
        
            e.preventDefault();
        }
        
        
    }
    //Función para validar por keyup
    function validarkeyup(er,etiqueta,etiquetamensaje,
    mensaje){
        a = er.test(etiqueta.val());
        if(a){
            etiquetamensaje.text("");
            return 1;
        }
        else{
            etiquetamensaje.text(mensaje);
            return 0;
        }
    }
    
    
    
    
    
    
    
    
    
    
    
    
    