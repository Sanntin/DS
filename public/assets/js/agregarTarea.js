const piezasListado = document.getElementById("piezasListado");
// const piezaDropDown = document.getElementById("piezaDropDown");
const piezaPrecio = document.getElementById("piezaPrecio");
const piezaCantidad = document.getElementById("piezaCantidad");
const btnsQuitarPieza = document.getElementsByClassName("btn-quitar-pieza");

var id=0;
document.getElementById("btnAgregarPieza").onclick = function (e) {
    loadingScreen(true);
    console.log(Number(piezaCantidad.value) <= Number(piezaCantidad.max));
    if(piezaCantidad.value !== "" && piezaPrecio !== "" && piezasListado.value!=='0' && Number(piezaCantidad.value)> '0'  && Number(piezaCantidad.value) <= Number(piezaCantidad.max) && piezaPrecio !=='0'){
        const tr = document.createElement("tr");
        id=id+1;
        //Acá agregar como primer elemento el valor de piezaDropDown

        // var pieza=<input id="piezaPrecio" type="number" min="0" style="width: 100px;" value="" disabled></input>
        // var precio=
        // var cantidad=


        const values = [
            "<input class='piezaInput'  type='text' value='"+ piezasListado.options[piezasListado.selectedIndex].text +"' readonly disabled>",
            "<input class='piezaInput' name='precio N"+id+"' type='number' style='width: 100px;' value='"+ piezaPrecio.value +"' readonly>",
            "<input class='piezaInput' name='cantidad N"+id+"' type='number' style='width: 70px;' value='"+  piezaCantidad.value+"'  readonly>",
            '<button onclick="quitarTarea(this);" class="btn btn-primary btn-quitar-pieza" role="button" data-toggle="tooltip" data-bs-tooltip="" style="margin-left: 10px;background-color: rgb(223,78,95);" title="Quitar pieza"><i class="fa fa-times"></i></button>',
            "<input name='pieza N"+id+"' type='text'style='width: 0px' value='"+piezasListado.value +"' readonly hidden>",
        ]; 
        let td; let content;

        for (const value of values) {

            td = document.createElement("td");
            //content = document.createTextNode(value);
            //td.appendChild(content);
            td.innerHTML = value;
            tr.appendChild(td);
            piezaListado.appendChild(tr);
        } 



        var idValues = [];
        var fields = document.querySelectorAll("input[name^='pieza N'");
        for(var i = 0; i < fields.length; i++) {
            idValues.push(fields[i].value);
        }
        
        $.ajax({
            url: "/obtenerListadoPiezas",
            method: 'POST',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
               id: idValues,
            },
            success: function(result){
                loadingScreen(false);
                var selectBox = document.getElementById("piezasListado");
                while (selectBox.options.length > 0) {
                    selectBox.remove(0);
                }
          
                var newOption = document.createElement('option');
                var optionText = document.createTextNode("-");
                newOption.appendChild(optionText);
                newOption.setAttribute('value',"");
                newOption.setAttribute('selected',true);
                selectBox.appendChild(newOption);

               document.getElementById("piezaPrecio").value = "";
               var piezacantidad=document.getElementById("piezaCantidad")
               piezacantidad.value = "";
               piezacantidad.setAttribute('placeholder','');

                result.forEach(pieza => {
                    console.log(pieza['id']);
                    var newOption = document.createElement('option');
                    var optionText = document.createTextNode(pieza['nombre']+" - "+pieza['modelo']);
                    // set option text
                    newOption.appendChild(optionText);
                    // and option value
                    newOption.setAttribute('value',pieza['id']);
                    selectBox.appendChild(newOption);
                });
            }
          });


        if(  $('#AgregarTarea').attr("disabled")){
            $('#AgregarTarea').attr("disabled",false)
        }
    }
}

function obtenerPrecio(){
    $('#piezaPrecio').attr("disabled",true);
    $('#btnAgregarPieza').attr("disabled",true);
    $('#piezaCantidad').val(''); 

    
    let id=piezasListado.value;
    loadingScreen(true);
    $.ajax({
        url: "/obtenerPrecioPieza",
        method: 'GET',
        data: {
           _token: '{!! csrf_token() !!}',
           id: id,
        },
        success: function(result){
            loadingScreen(false);
        //    $('#piezaPrecio').attr("value",result[0].precio);
        //    $('#piezaPrecio').get(0).type = result[0].precio;
        //    $('#piezaPrecio').val("value",result[0].precio);
        console.log(result[0].cantidad);
        document.getElementById("piezaPrecio").setAttribute("value", result[0].precio);
        document.getElementById("piezaPrecio").value = result[0].precio;
        document.getElementById("piezaCantidad").setAttribute("placeholder","max: "+result[0].cantidad);
        document.getElementById("piezaCantidad").setAttribute("max",result[0].cantidad);
           $('#piezaPrecio').attr("disabled",false);
           $('#btnAgregarPieza').attr("disabled",false);
      
        }
      });
}

function quitarTarea(btn) {
    id=id-1;
    btn.parentElement.parentElement.remove();
}


function guardarTarea(params) {
    if( document.getElementById("acciones")!=0){
        console.log("hay acciones")
    }
    // idOrden= $("#OrdenTrabajo").attr("value");
    // window.location = "/agregarTarea/"+idOrden;
    

    // idOrden= $("#OrdenTrabajo").attr("value");
    // window.location = "/reparaciones/agregarOrdenTrabajo/Orden/"+idOrden;
}
