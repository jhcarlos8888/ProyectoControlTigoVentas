/* globals feather:false, esta funcion se requiere para el uso de los iconos feather*/
(function () {
    feather.replace()
})()

//funcion para realizar busqueda de usuarios y clientes

document.addEventListener("change", (e) => {

    const $target = e.target;
    const $generator = $target.getAttribute("data-generator")

    let usuario = ($generator === "usuario");
    let cliente = ($generator === "cliente");
    let buscar = (cliente || usuario);

    if (buscar) {
        busqueda($target, $generator);
    } else if($generator === "archivo") {
        cambiarTextLabelInputFile($target);
    }
});

function busqueda(search, modelo) {

    let valor = search.value;
    const modeloBuscar = (modelo === "usuario") ? "Usuario" : "Cliente";
    const $table = document.getElementById("tableList");
    const $bodyTable = document.getElementById("bodyTable");
    const $tbody = document.createElement("tbody");
    $tbody.setAttribute("id", "bodyTable");
    const $fragment = document.createDocumentFragment();

    fetch("buscar/buscar" + modeloBuscar + "/" + valor)

        .then((res) => (res.ok ? res.json() : Promise.reject(res)))
        .then((json) => {

            json.forEach((el) => {
                const $tr = document.createElement("tr");
                if (modelo === "usuario") {
                    $tr.innerHTML = `<td>${el.identificacion}</td>
                                    <td>${el.nombre}</td>
                                    <td>${el.usuario}</td>
                                    <td>${el.email}</td>
                                    <td>${el.celular}</td>
                                    <td>${el.sede}</td>
                                    <td>${el.rol}</td>
                                    <td>
                                        <a href="/ProyectoControlTigoVentas/usuario/${modelo}/${el.id}" class="bnt"><span data-feather="edit-3"></span></a>
                                        <a href="/ProyectoControlTigoVentas/usuario/${modelo}/${el.id}" class="bnt"><span data-feather="trash-2"></span></a>
                                    </td>`;
                    $fragment.appendChild($tr);
                } else {
                    $tr.innerHTML = `<td>${el.identificacion}</td>
                                    <td>${el.nombre}</td>
                                    <td>${el.direccion}</td>
                                    <td>${el.email}</td>
                                    <td>${el.celular}</td>
                                    <td>
                                        <a href="/ProyectoControlTigoVentas/usuario/${modelo}/${el.id}" class="bnt"><span data-feather="edit-3"></span></a>
                                        <a href="/ProyectoControlTigoVentas/usuario/${modelo}/${el.id}" class="bnt"><span data-feather="trash-2"></span></a>
                                    </td>`;
                    $fragment.appendChild($tr);
                }
            });
            $tbody.appendChild($fragment);
            $table.removeChild($bodyTable);
            $table.appendChild($tbody);
            feather.replace()
        })
        .catch((err) => {
            let message = err.statusText || "Ocurrió un error";
            console.log(err, message);
        })
}

function cambiarTextLabelInputFile($input) {

    const $label = $input.nextElementSibling;
    let valor = $input.value;
    let archivo = valor.split("\\");
    let nombreArchivo = archivo[archivo.length - 1];

    $label.innerHTML = (valor.length) ? nombreArchivo : "Seleccionar Archivo"
}