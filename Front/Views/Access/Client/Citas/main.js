import {
  GetHost,
  SetTitle,
  SetCatchModal,
  SetLoading,
  ValidForm,
  SetSucessModal,
  FillSelect,
  FilldivCheckboxes
} from "../../../Assets/Js/globals.functions.js";
import {} from "../Assets/Helper/Client.Layout.js";
import { SetAsideActive } from "../../Utils/asidebar.js";
SetTitle("Citas");
SetAsideActive("Citas");
const inpFecha = document.getElementById("fecha");
inpFecha.min = new Date().toISOString().split("T")[0];

fetch(
  `${GetHost()}/Back/Controllers/clientes/controlador_id_nombre_cliente.php`
)
  .then((response) => response.json())
  .then((data) => {
    FillSelect("idCliente", data);
  })
  .catch((err) => {
    SetCatchModal(err);
  });

fetch(`${GetHost()}/Back/Controllers/clientes/controlador_servicio_cliente.php`)
  .then((response) => response.json())
  .then((data) => {
    FilldivCheckboxes("Servicios", data);
  })
  .catch((err) => {
    SetCatchModal(err);
  });


let btnReservar = document.getElementById("btnReservar");
btnReservar.addEventListener("click", () => {
  SetLoading(btnReservar);
  var formData = new FormData(document.querySelector('form'));
  // Valido si tiene todos los campos llenos
  let itemCount = 0;

  for (let item of formData.entries()) {
      itemCount++;
  }

  if (itemCount >= 4)
  {
    fetch(`${GetHost()}/Back/Controllers/ReservaCitas/controlador_insertar_cita.php`, {
      method: 'POST',
      body: formData
    })
    .then((response) => {
      return response.json() ;
    })
    .then((data)=> {
        if (data.access == true)
        {
          SetSucessModal(data.message)
        }
        else{
          SetCatchModal(data.message)
        }
    })
  }
  else
  {
    SetCatchModal('Tienes que llenar todos los campos del formulario.')
  }

});
