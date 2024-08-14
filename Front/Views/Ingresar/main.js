import {SetModal, ShowModal} from '../Assets/Js/modal.js';
import { GetHost } from '../Assets/Js/globals.functions.js';
let btnEntrar = document.getElementById("btnEntrar");
btnEntrar.addEventListener('click', () => {
  let form = document.querySelector("form");
  let formData = new FormData(form);
  console.log(formData)
  fetch(`http://localhost/Proyecto_SPA/Back/Controllers/iniciarSesion/iniciarSesion.php`, {
    method: "POST",
    body: formData
  })
    .then((response) => response.json())
    .then((data) => {

      if (data.message == "Existe")
      {
        if(data.data[0].rol == 1)
        {
          window.location.href =  GetHost() + data.route;
        }
        else
        {
          window.location.href =  GetHost() + '/Front/Views/Access/Client/Citas';
        }

      } else {
        SetModal(data.title, data.message)
        ShowModal();
      }
    });
});
