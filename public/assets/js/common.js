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

$("#btnCancelarReparacion").click(function(){
    swal({
        title: "Desea cancelar la reparación?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          swal("Reparación cancelada exitosamente", {
            icon: "success",
          });
        } else {
          swal("La reparación no se ha cancelado");
        }
      });
});

$("#btnVerOrdenesTrabajo").click(function(){
    // revisar... esto esta para que corra primero la funcion de contextemenu y le ponga en el value el id de la reparacion.. habria que hacerlo antes
    setTimeout(() => {
        window.location = "/reparaciones/ordenesDeTrabajo/"+ $("#btnVerOrdenesTrabajo").attr("value");
      }, 1);
   
    
});



// -- Reparaciones --

$("#btnAceptarOrdendeTrabajo").click(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: "/reparaciones/ordenesDeTrabajo/1/aceptarOrdenTrabajo",
        method: 'post',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {
           idOrdenTrabajo : $("#btnAceptarOrdendeTrabajo").attr("value"),
        },
        success: function(result){
            console.log(result);
            swal("La orden de trabajo fue aceptada correcamente", {
                icon: "success",
              });
        }
      });
    // swal({
    //     title: "¿Esta seguro que desea aceptar la orden de trabajo?",
    //     icon: "info",
    //     buttons: true,
    //     dangerMode: true,
    //   })
    //   .then((willDelete) => {
    //     if (willDelete) {
         
        

    //     } else {
    //       swal("La orden de trabajo no se acepto");

    //     }
    //   });
});

// ---- Functions ----

//When switching from one page to another in the same view, hide the last one and show the current one
function showElement(pageFrom, pageTo) {
    pageFrom.css("display", "none");
    pageTo.css("display", "block");
}