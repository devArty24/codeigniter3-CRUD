$(document).ready(function(){
    $(`tr td #delete`).click(function(ev){
        ev.preventDefault();
        /*Asi se puede escalar en el arbol del DOM para obtener valores de las tarjets*/
        nombre = $(this).parents(`tr`).find(`td:first`).text();
        id = $(this).attr("data-id");
        var self = this;
        Swal.fire({
            title: `Realmente quieres eliminar el registro de ${nombre}?`,
            text: "El registro sera eliminado permanentemente!!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si',
            cancelButtonText: 'No'
          }).then((result) => {
            if(result.value){
                $.ajax({
                    type:"post",
                    url:"users/delete",
                    data:{"id":id},
                    success:function(response){
                        /*Eliminar o remover del DOM*/
                        $(self).parents(`tr`).remove();
                        Swal.fire(
                          'Eliminado!',
                          'El registro se ha eliminado.',
                          'success'
                        );
                    },statusCode:{
                        400:function(error){
                            json = JSON.parse(error[`responseText`]);
                            Swal.fire(
                                'Error!',
                                json.msg,
                                'error'
                              );
                        }
                    }
                });
            }
          });
    });
});
