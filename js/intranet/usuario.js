window.onload = function() {
  listar_usuario_Pag(1);
};

function listar_usuario_Pag(pag){
  listar_usuario(pag);
}

function listar_usuario(pag){
  $.ajax({
    url:base_url+'CUsuario/'+'getUsusario',
    type:'post',
    data: 
    { 
    },
    beforeSend: function(e){
      $('#load').addClass('load');
    },
    success: function(data){
      var c = JSON.parse(data);
      // console.log(c);
      // Inicio con Datos
      $('#tbl_data tbody').remove();  
      $('#tbl_data').append('<tbody></tbody>');     
      c.forEach( function(i, indice, array) {
        // console.log(i);
        var rol = '';
        if( i.rol_id==1 ){ rol = 'Administrador'; }
        if( i.rol_id==2 ){ rol = 'Vendedor'; }
        var estado = '';
        if( i.estado=='0' ){ estado = '<span class="circle_red" onClick="cambiarEstadoRegistro(\''+i.usuario_id+'\',\''+i.nombre+'\',\''+i.apellido_paterno+'\',\''+i.apellido_materno+'\',1);"></span>'; }
        if( i.estado=='1' ){ estado = '<span class="circle_green" onClick="cambiarEstadoRegistro(\''+i.usuario_id+'\',\''+i.nombre+'\',\''+i.apellido_paterno+'\',\''+i.apellido_materno+'\',0);"></span>'; }
        var option = ''+
          '<a href="javascript: void(0)" type="button" onClick="reiniciarPassword(\''+i.usuario_id+'\',\''+i.nombre+'\',\''+i.apellido_paterno+'\',\''+i.apellido_materno+'\');">'+
            '<i class="fa fa-spinner" title="Reiniciar Contraseña" style="color: green;"></i>'+
          '</a>'+
          '&nbsp;&nbsp;&nbsp;'+
          '<a href="javascript: void(0)" type="button" onClick="mFormRegistro('+i.usuario_id+');">'+
            '<i class="fa fa-edit" title="Editar Registro" style="color: orange;"></i>'+
          '</a>'+
          '&nbsp;&nbsp;&nbsp;'+
          '<a href="javascript: void(0)"" type="button" onClick="desactivarRegistro(\''+i.usuario_id+'\',\''+i.nombre+'\',\''+i.apellido_paterno+'\',\''+i.apellido_materno+'\');">'+
            '<i class="fa fa-trash" title="Elimar Registro"style="color: red;"></i>'+
          '</a>'+
        '';
        $('#tbl_data tbody').append(''+
          '<tr>'+
            '<td class="align-middle text-center">'+(indice+1)+'</td>'+
            '<td class="align-middle text-left">'+i.apellido_paterno+' '+i.apellido_materno+', '+i.nombre+'</td>'+
            '<td class="align-middle text-left">'+i.email+'</td>'+
            '<td class="align-middle text-center">'+rol+'</td>'+
            '<td class="align-middle text-center">'+estado+'</td>'+
            '<td class="align-middle text-center">'+option+'</td>'+
          '</tr>'+
        '');
      });
      $('#load').removeClass('load');
    },
    error: function(){
      $('#load').removeClass('load');
    }
  })
}

function desactivarRegistro(id,nombre,apepa,apema){
  Swal.fire({
    title: "Eliminar",
    text: '¿Desea eliminar el registro de: "'+apepa+' '+apema+', '+nombre+'" ?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: "Si"
  }).then((result) => {
    if (result.value) {
      Swal.fire({
        title: "¿Esta seguro?",
        text: 'Eliminara el registro de: "'+apepa+' '+apema+', '+nombre+'".',
        icon: 'error',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "Si"
      }).then((result) => {
        if (result.value) {
          $.ajax({
            url:base_url+'CUsuario/'+'desactivar_registro',
            type:'post',
            data: 
            {
              id:id
            },
            beforeSend: function(e){
              $('#load').addClass('load');
            },
            success: function(data){
              $('#load').removeClass('load');
              var c = JSON.parse(data); 
              // console.log(c);
              if (c == false) { console.log("no se elimino");}                  
              if (c == true) { 
                // console.log("se creo");
                Swal.fire({
                  icon: 'success',
                  title: 'Exito',
                  text: 'Se Elimino el registro de: "'+apepa+' '+apema+', '+nombre+'".',
                  footer: '',              
                  showCancelButton: false,
                  showConfirmButton: false,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  cancelButtonText: 'cerrar',
                  confirmButtonText: 'Ok',
                  timer: 1000
                }).then((result) => {  
                  listar_usuario_Pag(1);
                })                     
              }
            },
            error: function(){      
              $('#load').removeClass('load');
            }
          });
        }
      })
    }
  })
}

function cambiarEstadoRegistro(id,nombre,apepa,apema,estado){
  Swal.fire({
    title: "Cambiar Estado",
    text: '¿Desea cambiar el estado de: "'+apepa+' '+apema+', '+nombre+'" ?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: "Si"
  }).then((result) => {
    if (result.value) {
      Swal.fire({
        title: "¿Esta seguro?",
        text: 'Cambiara el estado del registro de: "'+apepa+' '+apema+', '+nombre+'".',
        icon: 'error',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "Si"
      }).then((result) => {
        if (result.value) {
          $.ajax({
            url:base_url+'CUsuario/'+'change_estado_registro',
            type:'post',
            data: 
            {
              id:id,
              estado:estado
            },
            beforeSend: function(e){
              $('#load').addClass('load');
            },
            success: function(data){
              $('#load').removeClass('load');
              var c = JSON.parse(data); 
              // console.log(c);
              if (c == false) { console.log("no se elimino");}                  
              if (c == true) { 
                // console.log("se creo");
                Swal.fire({
                  icon: 'success',
                  title: 'Exito',
                  text: 'Se cambio el estado del registro de: "'+apepa+' '+apema+', '+nombre+'".',
                  footer: '',              
                  showCancelButton: false,
                  showConfirmButton: false,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  cancelButtonText: 'cerrar',
                  confirmButtonText: 'Ok',
                  timer: 1000
                }).then((result) => {         
                  listar_usuario_Pag(1);
                })                     
              }
            },
            error: function(){      
              $('#load').removeClass('load');
            }
          });
        }
      })
    }
  }) 
}


function reiniciarPassword(id,nombre,apepa,apema){
  Swal.fire({
    title: "Eliminar",
    text: '¿Desea reiniciar la contraseña de: "'+apepa+' '+apema+', '+nombre+'" ?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: "Si"
  }).then((result) => {
    if (result.value) {
      Swal.fire({
        title: "¿Esta seguro?",
        text: 'Reiniciara la contraseña de: "'+apepa+' '+apema+', '+nombre+'".',
        icon: 'error',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "Si"
      }).then((result) => {
        if (result.value) {
          $.ajax({
            url:base_url+'CUsuario/'+'reiniciar_password',
            type:'post',
            data: 
            {
              id:id
            },
            beforeSend: function(e){
              $('#load').addClass('load');
            },
            success: function(data){
              $('#load').removeClass('load');
              var c = JSON.parse(data); 
              // console.log(c);
              if (c == false) { console.log("no se elimino");}                  
              if (c == true) { 
                // console.log("se creo");
                Swal.fire({
                  icon: 'success',
                  title: 'Exito',
                  text: 'Se reinicio la contraseña de: "'+apepa+' '+apema+', '+nombre+'".',
                  footer: '',              
                  showCancelButton: false,
                  showConfirmButton: false,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  cancelButtonText: 'cerrar',
                  confirmButtonText: 'Ok',
                  timer: 1000
                }).then((result) => {  
                  listar_usuario_Pag(1);
                })                     
              }
            },
            error: function(){      
              $('#load').removeClass('load');
            }
          });
        }
      })
    }
  })
}

function limpiarFormRegistro(){
  $('#txt_id').val('');
  $('#txt_email').val('');
  $('#txt_nombre').val('');
  $('#txt_apellido_paterno').val('');
  $('#txt_apellido_materno').val('');
  $('#cbo_rol').val('').trigger('change');
}

function mNuevoRegistro(){
  $('#load').addClass('load');
  limpiarFormRegistro();
  $('#txt_email').prop('readonly', false);
  $('#txt_modal_titulo').text('Nuevo Registro');
  $('#btn_actualizarRegistro').hide();
  $('#btn_nuevoRegistro').show();
  $('#mFormRegistro').modal('toggle');
  $('#load').removeClass('load');
}

function mFormRegistro(id){
  $.ajax({
    url:base_url+'CUsuario/'+'getUsuarioByID',
    type:'post',
    data: 
    {
      id:id
    },
    beforeSend: function(e){
      $('#load').addClass('load');
      limpiarFormRegistro();
      $('#txt_email').prop('readonly', true);
      $('#txt_modal_titulo').text('Editar Registro');
      $('#btn_actualizarRegistro').show();
      $('#btn_nuevoRegistro').hide();
    },
    success: function(data){
      $('#load').removeClass('load');
      var c = JSON.parse(data); 
      // console.log(c);
      c.forEach( function(i, indice, array) {
        // console.log(i);
        $('#txt_id').val(i.usuario_id);
        $('#txt_email').val(i.email);
        $('#txt_nombre').val(i.nombre);
        $('#txt_apellido_paterno').val(i.apellido_paterno);
        $('#txt_apellido_materno').val(i.apellido_materno);
        $('#cbo_rol').val(i.rol_id).trigger('change');
        $('#mFormRegistro').modal('toggle');
      })
    },
    error: function(){      
      $('#load').removeClass('load');
    }
  });
}

function editarRegistro(){
  var txt_id = $('#txt_id').val();
  var txt_email = $('#txt_email').val();
  var txt_nombre = $('#txt_nombre').val();
  var txt_apellido_paterno = $('#txt_apellido_paterno').val();
  var txt_apellido_materno = $('#txt_apellido_materno').val();
  var cbo_rol = $('#cbo_rol').val();
  $.ajax({
    url:base_url+'CUsuario/'+'updateUsuario',
    type:'post',
    data: 
    {
      txt_id:txt_id,
      txt_email:txt_email,
      txt_nombre:txt_nombre,
      txt_apellido_paterno:txt_apellido_paterno,
      txt_apellido_materno:txt_apellido_materno,
      cbo_rol:cbo_rol
    },
    beforeSend: function(e){
      $('#load').addClass('load');
    },
    success: function(data){
      $('#load').removeClass('load');
      var c = JSON.parse(data); 
      // console.log(c);
      if (c == false) { console.log("no se actualizo");}                  
      if (c == true) { 
        // console.log("se creo");
        Swal.fire({
          icon: 'success',
          title: 'Exito',
          text: 'Se actualizo el registro de "'+txt_apellido_paterno+' '+txt_apellido_materno+', '+txt_nombre+'".',
          footer: '',              
          showCancelButton: false,
          showConfirmButton: false,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          cancelButtonText: 'cerrar',
          confirmButtonText: 'Ok',
          timer: 1000
        }).then((result) => {
          listar_usuario_Pag(1);
          $('#mFormRegistro').modal('hide');
        })                     
      }
    },
    error: function(){      
      $('#load').removeClass('load');
    }
  });
}

function nuevoRegistro(){
  var txt_email = $('#txt_email').val();
  var txt_nombre = $('#txt_nombre').val();
  var txt_apellido_paterno = $('#txt_apellido_paterno').val();
  var txt_apellido_materno = $('#txt_apellido_materno').val();
  var cbo_rol = $('#cbo_rol').val();
  $.ajax({
    url:base_url+'CUsuario/'+'setUsuario',
    type:'post',
    data: 
    {
      txt_email:txt_email,
      txt_nombre:txt_nombre,
      txt_apellido_paterno:txt_apellido_paterno,
      txt_apellido_materno:txt_apellido_materno,
      cbo_rol:cbo_rol
    },
    beforeSend: function(e){
      $('#load').addClass('load');
    },
    success: function(data){
      $('#load').removeClass('load');
      var c = JSON.parse(data); 
      // console.log(c);
      if (c == false) { console.log("no se registro");}                  
      if (c == true) { 
        // console.log("se creo");
        Swal.fire({
          icon: 'success',
          title: 'Exito',
          text: 'Se registro a "'+txt_apellido_paterno+' '+txt_apellido_materno+', '+txt_nombre+'".',
          footer: '',              
          showCancelButton: false,
          showConfirmButton: false,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          cancelButtonText: 'cerrar',
          confirmButtonText: 'Ok',
          timer: 1000
        }).then((result) => {
          listar_usuario_Pag(1);
          $('#mFormRegistro').modal('hide');
        })                     
      }
    },
    error: function(){      
      $('#load').removeClass('load');
    }
  });
}