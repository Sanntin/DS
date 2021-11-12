// ---- Event handlers ----

// -- General --
//When mouse hovers over a list item, turn it's background to a different color
$(".t-row").mouseenter(function() {
    $(this).addClass( "t-row-hover" );
});

$(".t-row").mouseout(function() {
    $(this).toggleClass("t-row-hover");
});

// -- Vehículos --
$("#btnAgregarVehiculo").click(function(){
    $.ajax({
        url: "/vehiculos/agregar",
        method: 'GET',
        data: {
           _token: '{!! csrf_token() !!}',
        },
        success: function(result){
    
      
           result['marcas'].forEach(i => {
              var txt1 = "<option>"+ i.nombre +"</option>";    
              $('#marcas').append(txt1);
           });
           result['modelos'].forEach(i => {
            var txt1 = "<option>"+ i.nombre +"</option>";    
            $('#modelos').append(txt1);
         });
         result['clientes'].forEach(i => {
            var txt1 = "<option>"+ i.apellido+  ' '+i.nombre + ' DNI: '+i.dni+"</option>";    
            $('#clientes').append(txt1);
         });
           $('#clientes').attr("disabled",false);
           $('#modelos').attr("disabled",false);
           $('#marcas').attr("disabled",false);
        }
      });
    showElement($("#vehiculos-main"), $("#vehiculos-agregar"));

});

$("#btnVolverAgregarVehiculo").click(function(){
    window.location = "/vehiculos";
    // showElement($("#vehiculos-agregar"), $("#vehiculos-main"));
});

$("#btnGuardarVehiculo").click(function(){
    showElement($("#vehiculos-agregar"), $("#vehiculos-main"));
});

// -- Clientes --
$("#btnAgregarCliente").click(function(){
    showElement($("#clientes-main"), $("#clientes-agregar"));
});

$("#btnVolverAgregarCliente").click(function(){
    showElement($("#clientes-agregar"), $("#clientes-main"));
});

$("#btnGuardarAgregarCliente").click(function(){
    showElement($("#clientes-agregar"), $("#clientes-main"));
});

$("#btnModificarCliente").click(function(){
    showElement($("#clientes-main"), $("#clientes-modificar"));
});

$("#btnVolverModificarCliente").click(function(){
    showElement($("#clientes-modificar"), $("#clientes-main"));
});

$("#btnGuardarModificarCliente").click(function(){
    showElement($("#clientes-modificar"), $("#clientes-main"));
});

// -- Reparaciones --

function obtenerVehiculos() {
  console.log("cambio");
  $('#generarReparacion').attr("disabled",true);
  $('#vehiculosListado').attr("disabled",true);
  let id=clientesListado.value;
  $.ajax({
      url: "/obtenerVehiculoCliente",
      method: 'GET',
      data: {
         _token: '{!! csrf_token() !!}',
         id: id,
      },
      success: function(result){
        $('#vehiculosListado').empty();
        result['vehiculos'].forEach(i => {
          var txt1 = "<option name='"+i.patente+"'value'"+i.patente+"'>"+ i.patente+"</option>";    
          $('#vehiculosListado').append(txt1);
       });
       $('#vehiculosListado').attr("disabled",false);
       $('#generarReparacion').attr("disabled",false);
      }
    });
}

$("#btnCancelarReparacion").click(function(){
    swal({
        title: "Desea cancelar la reparación?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          $.ajax({
            url: "/reparaciones/cancelar",
            method: 'post',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
               idReparacion : $("#btnCancelarReparacion").attr("value"),
               
            },
            success: function(result){
                swal("Reparación cancelada exitosamente", {
                    icon: "success",
                  })
                  .then((value) => {
                    location.reload();
                  });
                
            }
           
          });
        } else {
          swal("La reparación no se ha cancelado");
        }
      });
});

$("#btnGenerarComprobante").click(function(){
  // revisar... esto esta para que corra primero la funcion de contextemenu y le ponga en el value el id de la reparacion.. habria que hacerlo antes
  setTimeout(() => {
      window.location = "/reparaciones/comprobante/"+ $("#btnGenerarComprobante").attr("value");
    }, 1);
  
});

$("#btnVerOrdenesTrabajo").click(function(){
    // revisar... esto esta para que corra primero la funcion de contextemenu y le ponga en el value el id de la reparacion.. habria que hacerlo antes
    setTimeout(() => {
        window.location = "/reparaciones/ordenesDeTrabajo/"+ $("#btnVerOrdenesTrabajo").attr("value");
      }, 1);
   
    
});

$("#btnAgregarOrdenTrabajo").click(function(){
  // revisar... esto esta para que corra primero la funcion de contextemenu y le ponga en el value el id de la reparacion.. habria que hacerlo antes
  setTimeout(() => {
      window.location = "/reparaciones/agregarOrdenTrabajo/"+ $("#btnAgregarOrdenTrabajo").attr("value");
    }, 1);
 
  
});



// -- Ordenes de trabajo --

function aceptarOrdenTrabajo(btn) {
  console.log(btn);
  console.log(btn.value);
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

swal({
    title: "¿Esta seguro que desea aceptar la orden de trabajo?",
    icon: "info",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
        $.ajax({
            url: "/reparaciones/ordenesDeTrabajo/aceptarOrdenTrabajo",
            method: 'post',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
               idOrdenTrabajo :btn.value,
               
            },
            success: function(result){
                swal("La orden de trabajo fue aceptada correcamente", {
                    icon: "success",
                  })
                  .then((value) => {
                    location.reload();
                  });
                
            }
           
          });
    } else {
      swal("La orden de trabajo no se acepto");

    }
  });
}

function rechazarOrdenTrabajo(btn) {
  console.log(btn);
  console.log(btn.value);
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

swal({
    title: "¿Esta seguro que desea eliminar la orden de trabajo?",
    icon: "info",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
        $.ajax({
            url: "/reparaciones/cancelarOrdenTrabajo/vista",
            method: 'post',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
               idOrdenTrabajo :btn.value,
               
            },
            success: function(result){
                swal("La orden de trabajo fue eliminada correcamente", {
                    icon: "success",
                  })
                  .then((value) => {
                    location.reload();
                  });
                
            }
           
          });
    } else {
      swal("La orden de trabajo no fue elimada");

    }
  });
}
// $("#btnAceptarOrdendeTrabajo").click(function(){
     
// });


// --Tareas --
function completarTarea(btn) {
console.log(btn.value);

swal({
    title: "¿Esta seguro que desea completar la Tarea?",
    icon: "info",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
        $.ajax({
            url: "/reparaciones/ordenesDeTrabajo/completarTarea",
            method: 'post',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
               idTarea : btn.value,
               
            },
            success: function(result){
                swal("La tarea fue completada correcamente", {
                    icon: "success",
                  })
                  .then((value) => {
                    location.reload();
                  });
                
            }
           
          });
    } else {
      swal("La tarea no fue completada");

    }
  });
}


function cancelarTarea(btn) {
  console.log(btn);
  console.log(btn.value);
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

swal({
    title: "¿Esta seguro que desea cancelar la tarea?",
    icon: "info",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
        $.ajax({
            url: "/eliminarTarea",
            method: 'post',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
               idtarea :btn.value,
               
            },
            success: function(result){
                swal("La tarea fue cancelada correcamente", {
                    icon: "success",
                  })
                  .then((value) => {
                    location.reload();
                  });
                
            }
           
          });
    } else {
      swal("La tarea no fue cancelada");

    }
  });
}
// ---- Functions ----

//When switching from one page to another in the same view, hide the last one and show the current one
function showElement(pageFrom, pageTo) {
    pageFrom.css("display", "none");
    pageTo.css("display", "block");
}