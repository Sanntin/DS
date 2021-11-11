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

