/* globals feather:false, esta funcion se requiere para el uso de los iconos feather*/
(function () {
    feather.replace()
})()

//funcion para realizar busqueda de usuarios y clientes

document.addEventListener("change", (e) => {

    const $search = e.target;
    const $generator = $search.getAttribute("data-generator")
    const modelo = ($generator === "Usuario") ? "usuario" : "cliente";
    const $table = document.getElementById("UserList");
    const $bodyTable = document.getElementById("bodyTable");
    const $tbody = document.createElement("tbody");
    $tbody.setAttribute("id", "bodyTable");
    const $fragment = document.createDocumentFragment();
    let valor = $search.value;
    //console.log($search, $table, $generator, valor);

    fetch("buscar/buscar" + $generator + "/" + valor)

        .then((res) => (res.ok ? res.json() : Promise.reject(res)))
        .then((json) => {
            //console.log(json);
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
            console.log(err);
            let message = err.statusText || "Ocurrió un error";
        })
});