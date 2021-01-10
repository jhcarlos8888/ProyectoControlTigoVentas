document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("login").addEventListener('submit', validarlogin);
});

function validarlogin(e){
    e.preventDefault();

    const $cedula = document.getElementById("cedula");
    const $contrasena = document.getElementById("clave");

    if (validarContrasena($contrasena) && validarCedula($cedula)) {
        this.submit();
    }
    else{
        console.log("Error en los parametros ingresados")
    }
}

document.addEventListener("focusout", (e) => {

    if (e.target.matches("#cedula")) {
        const $input = e.target;
        validarCedula($input);
    } else if (e.target.matches("#clave")) {
        const $input = e.target;
        validarContrasena($input);
    }
});

function validarCedula($input) {

    if($input.nextElementSibling.hasAttribute("role")){
        const $msj = $input.nextElementSibling;
        ($input.parentElement).removeChild($msj)
    }

    $input.classList.remove("invalido");
    $input.classList.remove("valido");

    if (notIsNumber($input) || isVacio($input.value)) {
        $input.classList.add("invalido");

        const $error = document.createElement("div");
        $error.classList.add("alert","alert-danger");
        $error.setAttribute("role","alert");

        const $msj = document.createElement("span")
        $msj.innerHTML = 'Debe ingresar una cedula valida';

        $error.appendChild($msj);

        $input.insertAdjacentElement('afterend', $error);

        return false;
    } else {
        $input.classList.add("valido");
        return true;
    }
}

function validarContrasena($input) {

    if($input.nextElementSibling.hasAttribute("role")){
        const $msj = $input.nextElementSibling;
        ($input.parentElement).removeChild($msj)
    }

    $input.classList.remove("invalido");
    $input.classList.remove("valido");

    if (isVacio($input.value.trim())) {
        $input.classList.add("invalido");
        $input.value = "";
        $fragment = document.createDocumentFragment();

        const $error = document.createElement("div");
        $error.classList.add("alert","alert-danger");
        $error.setAttribute("role","alert");

        const $msj = document.createElement("span")
        $msj.innerHTML = 'Debe ingresar una contraseña valida';

        $error.appendChild($msj);

        $input.insertAdjacentElement('afterend', $error);

        return false;
    } else {
        $input.classList.add("valido");
        return true;
    }
}

function notIsNumber(elemento) {
    return (isNaN(elemento.value));
}

function isVacio(elemento) {
    return (elemento.length === 0);
}