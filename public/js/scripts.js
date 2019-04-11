$.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

let direccion = window.location.origin;

const eliminar = (ruta,nombre) =>{
  swal({
    title: `Eliminar ${nombre}`,
    text: `Seguro que desea eliminar el/la ${nombre}`,
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#3085d6',
    confirmButtonText: 'Eliminar'
  }).then((result) => {
    console.log('Eliminado');
    if(result.value){
      $.ajax({
        url: ruta,
        method: 'DELETE',
        success:function(data){
          location.reload();
        }
      });
    }
  });
}
