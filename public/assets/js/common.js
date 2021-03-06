// ---- Event handlers ----

// -- General --
var esperaCorta = 2500;
var esperaLarga = 5000;

//When mouse hovers over a list item, turn it's background to a different color
function turnListHover() {
  $(".t-row").mouseenter(function() {
      $(this).addClass( "t-row-hover" );
  });
  
  $(".t-row").mouseout(function() {
      $(this).toggleClass("t-row-hover");
  });
}

turnListHover();

function loadingScreen(loading){
  if(loading){
    $(".loading").css("display", "block");
  }else{
    $(".loading").css("display", "none");
  }
}

$( document ).ready(function() {
  let searchResults = document.getElementsByClassName("searchResult");

  let searchValueReparaciones;
  let searchValueClientes;
  let searchValueStock;
  let searchValueVehiculos;

  if(window.location.href === "http://localhost/reparaciones"){
    searchValueReparaciones = $("#searchBarReparaciones")[0].value
    
    if(searchValueReparaciones !== ""){
      for (const result of searchResults) {
        if(result.innerHTML.includes(searchValueReparaciones)){
          result.classList.add("bold");
        }
      }
    }
  }

  if(window.location.href === "http://localhost/clientes"){
    searchValueClientes = $("#searchBarClientes")[0].value
    
    if(searchValueClientes !== ""){
      for (const result of searchResults) {
        if(result.innerHTML.includes(searchValueClientes)){
          result.classList.add("bold");
        }
      }
    }
  }

  if(window.location.href === "http://localhost/stock"){
    searchValueStock = $("#searchBarStock")[0].value
    
    if(searchValueStock !== ""){
      for (const result of searchResults) {
        if(result.innerHTML.includes(searchValueStock)){
          result.classList.add("bold");
        }
      }
    }
  }

  if(window.location.href === "http://localhost/vehiculos"){
    searchValueVehiculos = $("#searchBarVehiculos")[0].value
    
    if(searchValueVehiculos !== ""){
      for (const result of searchResults) {
        if(result.innerHTML.includes(searchValueVehiculos)){
          result.classList.add("bold");
        }
      }
    }
  }
/*
  let searchValueClientes = $("#searchBarClientes")[0].value;


  if(searchValueClientes !== ""){
    for (const result of searchResults) {
      if(result.innerHTML.includes(searchValueClientes)){
        result.classList.add("bold");
      }
    }
  }*/
});

// -- Veh??culos --
$("#btnAgregarVehiculo").click(function(){

    loadingScreen(true);
    $.ajax({
        url: "/vehiculos/agregar",
        method: 'GET',
        data: {
           _token: '{!! csrf_token() !!}',
        },
        success: function(result){
    
      
           result['marcas'].forEach(i => {
              var txt1 = "<option value="+i.id+">"+ i.nombre +"</option>";    
              $('#marcas').append(txt1);
           });
           result['modelos'].forEach(i => {
            var txt1 = "<option value="+i.id+">"+ i.nombre +"</option>";    
            $('#modelos').append(txt1);
         });
         result['clientes'].forEach(i => {
            var txt1 = "<option value="+i.dni+">"+ i.apellido+  ' '+i.nombre + ' DNI: '+i.dni+"</option>";    
            $('#clientes').append(txt1);
         });
           $('#clientes').attr("disabled",false);
           $('#modelos').attr("disabled",false);
           $('#marcas').attr("disabled",false);
           loadingScreen(false);
        }
      });
    showElement($("#vehiculos-main"), $("#vehiculos-agregar"));

});

function volverAgregarVehiculo() {
  loadingScreen(true);
  setTimeout(() => {
    window.location = "/vehiculos";
  }, 1); 
}

$("#btnGuardarVehiculo").click(function(){
  loadingScreen(true);
  submit();
  setTimeout(() => {
    loadingScreen(false);
  }, esperaCorta);
});

$("#btnCambiarTitularidadVehiculo").click(function(){
  loadingScreen(true);  
  setTimeout(() => {
      window.location = "/vehiculo/modificar/"+ $("#btnCambiarTitularidadVehiculo").attr("value");
      loadingScreen(false); 
    }, 1);
});

// -- Clientes --
$("#btnGuardarCliente").click(function(){
  loadingScreen(true);
  setTimeout(() => {
    loadingScreen(false);
  }, esperaCorta);
});

$("#btnAgregarCliente").click(function(){
  loadingScreen(true);  
  setTimeout(() => {
    window.location = "/agregarCliente";
      loadingScreen(false); 
    }, 1);
 
});

$("#btnModificarCliente").click(function(){ 
  loadingScreen(true);  
  setTimeout(() => {
      window.location = "/cliente/modificar/"+ $("#btnModificarCliente").attr("value");
      loadingScreen(false); 
    }, 1);
});

$("#btnBorrarCliente").click(function(){
  swal({
    title: "Desea borrar al cliente? ",
    icon: "warning",
    buttons: true,
    dangerMode: true,
    buttons: {
      cancel: {
        text: "No",
        visible: true,
        className: "redBg",
        closeModal: true,
      },
      confirm: {
        text: "S??",
        visible: true,
        className: "greenBg",
        closeModal: true,
      }
    }
  })
  .then((willDelete) => {
    if (willDelete) {
      loadingScreen(true);
      $.ajax({
        url: "/cliente/cancelar",
        method: 'post',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {
           idCliente : $("#btnBorrarCliente").attr("value"),
           
        },
        success: function(result){
            // loadingScreen(false);
            swal("El cliente se elimino exitosamente", {
                icon: "success",
              })
              .then((value) => {
                loadingScreen(true);
                location.reload();
              });
            
        }
       
      });
    } else {
      loadingScreen(false);
      swal("La cliente no se ha eliminado");
    }
  });
});

// -- Reparaciones --
$("#generarReparacion").click(function(){
  loadingScreen(true);
  setTimeout(() => {
    loadingScreen(false);
  }, esperaLarga);
});

$("#btnCancelarGenerarReparacion").click(function(){
  loadingScreen(true);
  setTimeout(() => {
    loadingScreen(false);
  }, esperaCorta);
});

function obtenerVehiculos() {

  $('#generarReparacion').attr("disabled",true);
  $('#vehiculosListado').attr("disabled",true);
  let id=clientesListado.value;
  loadingScreen(true);
  $.ajax({
      url: "/obtenerVehiculoCliente",
      method: 'GET',
      data: {
         _token: '{!! csrf_token() !!}',
         id: id,
      },
      success: function(result){
        loadingScreen(false);
        $('#vehiculosListado').empty();
     
        if( result['vehiculos'].length === 0){
          $('#noVehiculo').attr("hidden",false);
        }
        else{
          result['vehiculos'].forEach(i => {
            $('#noVehiculo').attr("hidden",true);
            var txt1 = "<option name='"+i.patente+"'value'"+i.patente+"'>"+ i.patente+"</option>";    
            $('#vehiculosListado').append(txt1);
         });
         $('#vehiculosListado').attr("disabled",false);
         $('#generarReparacion').attr("disabled",false);
        }
 
       loadingScreen(false);
      }
    });
}

$("#btnCancelarReparacion").click(function(){
    swal({
        title: "Desea cancelar la reparaci??n?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        buttons: {
          cancel: {
            text: "No",
            visible: true,
            className: "redBg",
            closeModal: true,
          },
          confirm: {
            text: "S??",
            visible: true,
            className: "greenBg",
            closeModal: true,
          }
        }
      })
      .then((willDelete) => {
        if (willDelete) {
          loadingScreen(true);
          $.ajax({
            url: "/reparaciones/cancelar",
            method: 'post',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
               idReparacion : $("#btnCancelarReparacion").attr("value"),
               
            },
            success: function(result){
                //loadingScreen(false);
                swal("Reparaci??n cancelada exitosamente", {
                    icon: "success",
                  })
                  .then((value) => {
                    loadingScreen(true);
                    location.reload();
                  });
                
            }
           
          });
        } else {
          loadingScreen(false);
          swal("La reparaci??n no se ha cancelado");
        }
      });
});

$("#btnGenerarComprobante").click(function(){




  loadingScreen(true);  
  setTimeout(() => {
      window.location = "/reparaciones/comprobante/"+ $("#btnGenerarComprobante").attr("value");
      
    }, 1);
    setTimeout(() => {
      loadingScreen(false); 
    }, 2000);
});

$("#btnVerOrdenesTrabajo").click(function(){
  loadingScreen(true);  
  // revisar... esto esta para que corra primero la funcion de contextemenu y le ponga en el value el id de la reparacion.. habria que hacerlo antes
    setTimeout(() => {
        window.location = "/reparaciones/ordenesDeTrabajo/"+ $("#btnVerOrdenesTrabajo").attr("value");
      }, 1);
});

$("#btnAgregarOrdenTrabajo").click(function(){
  // revisar... esto esta para que corra primero la funcion de contextemenu y le ponga en el value el id de la reparacion.. habria que hacerlo antes
  loadingScreen(true);  
  setTimeout(() => {
      window.location = "/reparaciones/agregarOrdenTrabajo/"+ $("#btnAgregarOrdenTrabajo").attr("value");
    }, 1);
});

var modal = document.getElementById("modalReporteInput");

$("#btnGenerarReporte").click(async function(){
  modal.style.display = "block";
});

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
// span.onclick = function() {
//   modal.style.display = "none";
// }

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
} 

// -- Ordenes de trabajo --

function aceptarOrdenTrabajo(btn) {
//Para que no hagan cagadas descativo todos los botones

  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

swal({
    title: "??Esta seguro que desea aceptar la orden de trabajo?",
    icon: "info",
    buttons: true,
    dangerMode: true,
    buttons: {
      cancel: {
        text: "No",
        visible: true,
        className: "redBg",
        closeModal: true,
      },
      confirm: {
        text: "S??",
        visible: true,
        className: "greenBg",
        closeModal: true,
      }
    }
  })
  .then((willDelete) => {
    if (willDelete) {
      loadingScreen(true);
        $.ajax({
            url: "/reparaciones/ordenesDeTrabajo/aceptarOrdenTrabajo",
            method: 'post',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
               idOrdenTrabajo :btn.value,
               
            },
            success: function(result){
              loadingScreen(false);
                swal("La orden de trabajo fue aceptada correcamente", {
                    icon: "success",
                  })
                  .then((value) => {
                    loadingScreen(true);
                    location.reload();
                  });
                
            }
           
          });
    } else {
      loadingScreen(false);
      swal("La orden de trabajo no se acepto");
    }
  });
}

function rechazarOrdenTrabajo(btn) {
  //Para que no hagan cagadas descativo todos los botones

  console.log(btn);
  console.log(btn.value);
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

swal({
    title: "??Esta seguro que desea eliminar la orden de trabajo?",
    icon: "info",
    buttons: true,
    dangerMode: true,
    buttons: {
      cancel: {
        text: "No",
        visible: true,
        className: "redBg",
        closeModal: true,
      },
      confirm: {
        text: "S??",
        visible: true,
        className: "greenBg",
        closeModal: true,
      }
    }
  })
  .then((willDelete) => {
    if (willDelete) {
      loadingScreen(true);
        $.ajax({
            url: "/reparaciones/cancelarOrdenTrabajo/vista",
            method: 'post',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
               idOrdenTrabajo :btn.value,
               
            },
            success: function(result){
              loadingScreen(false);
                swal("La orden de trabajo fue eliminada correcamente", {
                    icon: "success",
                  })
                  .then((value) => {
                    loadingScreen(true);
                    location.reload();
                  });
                
            }
           
          });
    } else {
      loadingScreen(false);
      swal("La orden de trabajo no fue cancelada");

    }
  });
}
// $("#btnAceptarOrdendeTrabajo").click(function(){
     
// });
$("#btnGenerarOrden").click(function(){
  loadingScreen(true);
  setTimeout(() => {
    loadingScreen(false);
  }, esperaLarga);
});

$("#btnCancelarGenerarOrden").click(function(){
  loadingScreen(true);
  setTimeout(() => {
    loadingScreen(false);
  }, esperaCorta);
});

$("#btnAgregarTarea").click(function(){
  loadingScreen(true);
  setTimeout(() => {
    loadingScreen(false);
  }, esperaCorta);
});

// --Tareas --
function completarTarea(btn) {
console.log(btn.value);
//Para que no hagan cagadas descativo todos los botones

swal({
    title: "??Esta seguro que desea completar la Tarea?",
    icon: "info",
    buttons: true,
    dangerMode: true,
    buttons: {
      cancel: {
        text: "No",
        visible: true,
        className: "redBg",
        closeModal: true,
      },
      confirm: {
        text: "S??",
        visible: true,
        className: "greenBg",
        closeModal: true,
      }
    }
  })
  .then((willDelete) => {
    if (willDelete) {
        loadingScreen(true);
        $.ajax({
            url: "/reparaciones/ordenesDeTrabajo/completarTarea",
            method: 'post',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
               idTarea : btn.value,
               
            },
            success: function(result){
                loadingScreen(false);
                swal("La tarea fue completada correcamente", {
                    icon: "success",
                  })
                  .then((value) => {
                    loadingScreen(true);
                    location.reload();
                  });
                
            }
           
          });
    } else {
      loadingScreen(false);
      swal("La tarea no fue completada");
    }
  });
}

function cancelarTarea(btn) {
  //Para que no hagan cagadas descativo todos los botones

  console.log(btn);
  console.log(btn.value);
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

swal({
    title: "??Esta seguro que desea cancelar la tarea?",
    icon: "info",
    buttons: true,
    dangerMode: true,
    buttons: {
      cancel: {
        text: "No",
        visible: true,
        className: "redBg",
        closeModal: true,
      },
      confirm: {
        text: "S??",
        visible: true,
        className: "greenBg",
        closeModal: true,
      }
    }
  })
  .then((willDelete) => {
    loadingScreen(true);
    if (willDelete) {
        $.ajax({
            url: "/eliminarTarea",
            method: 'post',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
               idtarea :btn.value,
               
            },
            success: function(result){
              loadingScreen(false);
                swal("La tarea fue cancelada correcamente", {
                    icon: "success",
                  })
                  .then((value) => {
                    loadingScreen(true);
                    location.reload();
                  });
                
            }
           
          });
    } else {
      loadingScreen(false);
      swal("La tarea no fue cancelada");

    }
  });
}

$("#AgregarTarea").click(function(){
  loadingScreen(true);
  setTimeout(() => {
    loadingScreen(false);
  }, esperaCorta);
});

$("#btnCancelarAgregarTarea").click(function(){
  loadingScreen(true);
  idOrden= $("#OrdenTrabajo").attr("value");
  console.log("/reparaciones/agregarOrdenTrabajo/Orden/"+idOrden);
  window.location = "/reparaciones/agregarOrdenTrabajo/Orden/"+idOrden;
  setTimeout(() => {
    loadingScreen(false);
  }, esperaCorta);
});

// Clientes

function cancelarAgregarCliente() {
  swal({
      title: "Desea cancelar?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
      buttons: {
        cancel: {
          text: "No",
          visible: true,
          className: "redBg",
          closeModal: true,
        },
        confirm: {
          text: "S??",
          visible: true,
          className: "greenBg",
          closeModal: true,
        }
      }
    })
    .then((willDelete) => {
      if (willDelete) {
          loadingScreen(true);
          window.location = "/clientes";
      }
    });
}

$("#btnModificarCliente").click(function(){
  loadingScreen(true);
  setTimeout(() => {
    loadingScreen(false);
  }, esperaCorta);
  //submit();
});

$("#btnCancelarModificarCliente").click(function(){
  loadingScreen(true);
  setTimeout(() => {
    loadingScreen(false);
  }, esperaCorta);
});

//Stock piezas
$("#btnCargarStock").click(function(){
  console.log("Aprete");
  loadingScreen(true);  
    setTimeout(() => {
        window.location = "/cargarStock/"+ $("#btnCargarStock").attr("value");
      }, 5);
});

$("#btnPrueba").click(function(){
  console.log("Aprete");
});


$("#btnRealizarPedido").click(function(){
  loadingScreen(true);  
  // revisar... esto esta para que corra primero la funcion de contextemenu y le ponga en el value el id de la reparacion.. habria que hacerlo antes
    setTimeout(() => {
        window.location = "/realizarPedido/"+ $("#btnRealizarPedido").attr("value");
      }, 1);
      //loadingScreen(false);  
});

$("#btnConfirmarRealizarPedido").click(function(){
  document.getElementById("formRealizarPedido").submit();
  swal({
    title: "El mail se envi?? correctamente",
    icon: "info",
    buttons: true,
    dangerMode: true,
    buttons: {
      confirm: {
        text: "Ok",
        visible: true,
        className: "greenBg",
        closeModal: true,
      }
    }
  })
  .then((willDelete) => {
    if (willDelete) {
        loadingScreen(true);
        window.location = "/stock";
    }
  });
});

$("#btnCancelarRealizarPedido").click(function(){
  loadingScreen(true);
  window.location = "/stock";
});

$("#btnGuardarStock").click(function(){
  loadingScreen(true);
  setTimeout(() => {
    loadingScreen(false);
  }, esperaCorta);
});

$("#btnCancelarGuardarStock").click(function(){
  loadingScreen(true);
  setTimeout(() => {
    loadingScreen(false);
  }, esperaCorta);
});



// SEARCH

function searchCliente(input) {
  console.log(input.value);

  $.ajax({
    url: "/clientesAjaxSearch",
    method: 'POST',
    data: {
       _token: '{!! csrf_token() !!}',
       id: id,
    },
    success: function(result){
        loadingScreen(false);
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

$(document).ready(function() {
  $('.js-example-basic-single').select2();
});

function activar() {
  $('.js-example-basic-single').select2();
}
// ---- Functions ----

//When switching from one page to another in the same view, hide the last one and show the current one
function showElement(pageFrom, pageTo) {
    pageFrom.css("display", "none");
    pageTo.css("display", "block");
}