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
  
  if ($("#Tarea").length) {

    swal({
      title: "Desea agregar la Orden de Trabajo?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
          swal("La orden de trabajo fue agregada", {
              icon: "success",
          });
          setTimeout(() => {
            window.location = "/reparaciones";
          }, 1000);
       
      }
    });
    
  }
  else{
    $("#errorFaltaTarea").attr("hidden",false);
    console.log('gola');
  }

}

function agregarTarea(btn) {
  idOrden= $("#OrdenTrabajo").attr("value");
  window.location = "/agregarTarea/"+idOrden;

}