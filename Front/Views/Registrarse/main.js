import { SetTitle, SetError, GetHost } from '../Assets/Js/globals.functions.js';
import {} from '../Assets/Helper/layout.js';
import { SetModal, ShowModal } from '../Assets/Js/modal.js';
SetTitle('Registrarse');
let btnRegistrarme = document.getElementById('btnRegistrarme');

btnRegistrarme.addEventListener('click', ()=>{
    let nombre_Completo = document.getElementById('nombre');
    let telefono = document.getElementById('telefono');
    let correo = document.getElementById('email');
    let apellidos = document.getElementById('apellido');
    let password = document.getElementById('password');
    let form = document.querySelector('form');
    let formData = new FormData(form);
    fetch(`${GetHost()}/Back/Controllers/registrarse/registrarse.php`, {
        method: 'POST',
        body:formData,
    })
    .then((response)=>{
        return response.json();
    })
    .then((data)=>{
        SetModal(data.Title,data.message);
        ShowModal();
        nombre_Completo.value="";
        telefono.value="";
        correo.value="";
        apellidos.value="";
        password.value="";
    })
 
});