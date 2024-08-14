
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

      if (data.message == "Existe") {
        // ? Con otro if se valida el id y de acuerdo a el se elige que botones se van usar
        if(data.data[0].rol == 1)
        {
          window.location.href = "../Access/Admin/Empleados";
        }

      } else {
        // ? No le doy permiso
        window.location.href = "./index.php";
      }
    });
});
