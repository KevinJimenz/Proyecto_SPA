import { GetHost, CreateScript } from '../../Assets/Js/globals.functions.js';
CreateScript(`${GetHost()}/Front/Views/Assets/Js/bootstrap.bundle.min.js`);
function SetAsideActive(title) {
    var asideButtons = document.querySelectorAll('.nav-link.text-dark')
    asideButtons.forEach(item => {
        if (item.textContent.trim() == title) {
            item.classList.replace('text-dark', 'text-light');
            item.parentElement.classList.add('bg-primary', 'rounded-3', 'shadow');
        };
    });
};
const SetAside = (jsonButtons) => {
    let asideBar = document.getElementById('asideBar');
    asideBar.innerHTML = `
    <li class="nav-item border-bottom pb-0 pb-md-2">
        <div class="dropdown">
            <button class="btn btn-lg bg-body-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                 <i class="bi bi-person-circle me-1"></i> User
             </button>
         <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <li>
                <a class="dropdown-item" href="http://localhost/proyecto_Spa/Front/Views/CerrarSesion/logout.php">
                    <i class="bi bi-box-arrow-right me-1"></i> Cerrar sesión
                </a>
            </li>
         </ul>
        </div>
    </li>
    `;
    jsonButtons.forEach(item => {
        asideBar.innerHTML += `
        <li class="nav-item">
            <a class="nav-link text-dark fs-5 d-flex justify-content-center w-100 me-2" href="${GetHost()}${item.href}">
                <i class="bi ${item.icon} me-3"></i>
                ${item.text}
            </a>
        </li>
        `;
    });
};
export {
    SetAside,
    SetAsideActive
};