function quitarTarea(btn){
    const tarea = btn.parentElement.parentElement.parentElement.parentElement;
    swal({
        title: "Desea remover la tarea?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            tarea.remove();
            swal("La tarea fue removida exitosamente", {
                icon: "success",
            });
        }
      });
}

function generarOrden(btn) {
  
  if ($("#Tarea1").length) {
    window.location = "/reparaciones";
  }
  else{
    $("#errorFaltaTarea").attr("hidden",false);
  }

}

function agregarTarea(btn) {
  idOrden= $("#OrdenTrabajo").attr("value");
  window.location = "/agregarTarea/"+idOrden;

}