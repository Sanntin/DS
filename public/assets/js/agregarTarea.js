const piezaListado = document.getElementById("piezaListado");
const piezaDropDown = document.getElementById("piezaDropDown");
const piezaPrecio = document.getElementById("piezaPrecio");
const piezaCantidad = document.getElementById("piezaCantidad");
const btnsQuitarPieza = document.getElementsByClassName("btn-quitar-pieza");

document.getElementById("btnAgregarPieza").onclick = function (e) {
    //Verificar que todos los campos de la pieza estén llenos
    //Agregar a la verificacion que piezaDropdown no esté vacío
    if(piezaCantidad.value !== "" && piezaPrecio !== ""){
        const tr = document.createElement("tr");
        
        //Acá agregar como primer elemento el valor de piezaDropDown
        const values = [piezaPrecio.value, piezaCantidad.value, '<button onclick="quitarTarea(this);" class="btn btn-primary btn-quitar-pieza" role="button" data-toggle="tooltip" data-bs-tooltip="" style="margin-left: 10px;background-color: rgb(223,78,95);" title="Quitar pieza"><i class="fa fa-times"></i></button>']; 
        let td; let content;

        for (const value of values) {
            td = document.createElement("td");
            //content = document.createTextNode(value);
            //td.appendChild(content);
            td.innerHTML = value;
            tr.appendChild(td);
            piezaListado.appendChild(tr);
        } 
    }
}

function quitarTarea(btn) {
    btn.parentElement.parentElement.remove();
}