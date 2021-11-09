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
    showElement($("#vehiculos-main"), $("#vehiculos-agregar"));
});

$("#btnVolverAgregarVehiculo").click(function(){
    showElement($("#vehiculos-agregar"), $("#vehiculos-main"));
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


// ---- Functions ----

//When switching from one page to another in the same view, hide the last one and show the current one
function showElement(pageFrom, pageTo) {
    pageFrom.css("display", "none");
    pageTo.css("display", "block");
}