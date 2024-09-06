const clave=document.getElementById("Clave");
const ojo=document.querySelector(".ojo");

ojo.addEventListener("click",()=>{
    if(clave.type==="password"){
        clave.type="text";
        ojo.classList.replace("fa-eye-slash","fa-eye");
    }else{
        clave.type="password";
        ojo.classList.replace("fa-eye","fa-eye-slash");
    }
});