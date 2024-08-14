import { GetHost, CreateCss, SetIcon, CreateScript } from '../Js/globals.functions.js';
CreateCss(`${GetHost()}/Front/Views/Assets/Css/styles.css`);
SetIcon(`${GetHost()}/Front/Views/Assets/Img/Logo.png`);
CreateScript(`${GetHost()}/Front/Views/Assets/Js/bootstrap.bundle.min.js`);