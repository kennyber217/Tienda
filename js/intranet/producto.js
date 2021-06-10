window.onload = function() {
  listar_producto_Pag(1);
  getCategoriaProducto();
};

function listar_producto_Pag(pag){
  listar_producto(pag);
}

function listar_producto(pag){
  $.ajax({
    url:base_url+'CProducto/'+'getProductoByTienda',
    type:'post',
    data: 
    {
      tienda_id:tienda_id
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
        var estado = '';
        if( i.estado=='0' ){ estado = '<span class="circle_red" onClick="cambiarEstadoRegistro(\''+i.producto_id+'\',\''+i.nombre+'\',1);"></span>'; }
        if( i.estado=='1' ){ estado = '<span class="circle_green" onClick="cambiarEstadoRegistro(\''+i.producto_id+'\',\''+i.nombre+'\',0);"></span>'; }
        var option = ''+
          '<a href="javascript: void(0)" type="button" onClick="mFormRegistro('+i.producto_id+');">'+
            '<i class="fa fa-edit" title="Editar Registro" style="color: orange;"></i>'+
          '</a>'+
          '&nbsp;&nbsp;&nbsp;'+
          '<a href="javascript: void(0)"" type="button" onClick="desactivarRegistro(\''+i.producto_id+'\',\''+i.nombre+'\');">'+
            '<i class="fa fa-trash" title="Elimar Registro"style="color: red;"></i>'+
          '</a>'+
        '';
        $('#tbl_data tbody').append(''+
          '<tr>'+
            '<td class="align-middle text-center">'+(indice+1)+'</td>'+
            '<td class="align-middle text-left">'+i.nombre+'</td>'+
            '<td class="align-middle text-justify">'+i.descripcion+'</td>'+
            '<td class="align-middle text-left">'+i.categoria_producto_nom+'</td>'+
            '<td class="align-middle text-center">S/ '+i.precioCompra+'<br>S/ '+i.precioVenta+'</td>'+
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

function getCategoriaProducto(){
  $.ajax({
    url:base_url+'CProducto/'+'getCategoriaProducto',
    type:'post',
    data: 
    {
    },
    beforeSend: function(e){
      $('#load').addClass('load');
    },
    success: function(data){
      $('#load').removeClass('load');
      var c = JSON.parse(data); 
      // console.log(c);
      c.forEach( function(i, indice, array) {
        // console.log(i);
        $('#cbo_categoria_producto').append('<option value="'+i.categoria_producto_id+'">'+i.nombre+'</option>');
      })
    },
    error: function(){      
      $('#load').removeClass('load');
    }
  });
}

function cambiarEstadoRegistro(id,nombre,estado){
  Swal.fire({
    title: "Cambiar Estado",
    text: '¿Desea cambiar el estado de "'+nombre+'" ?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: "Si"
  }).then((result) => {
    if (result.value) {
      Swal.fire({
        title: "¿Esta seguro?",
        text: 'Cambiara el estado del registro "'+nombre+'".',
        icon: 'error',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "Si"
      }).then((result) => {
        if (result.value) {
          $.ajax({
            url:base_url+'CProducto/'+'change_estado_registro',
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
                  text: 'Se cambio el estado del registro"'+nombre+'".',
                  footer: '',              
                  showCancelButton: false,
                  showConfirmButton: false,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  cancelButtonText: 'cerrar',
                  confirmButtonText: 'Ok',
                  timer: 1000
                }).then((result) => {         
                  listar_producto_Pag(1);
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

function desactivarRegistro(id,nombre){
  Swal.fire({
    title: "Eliminar",
    text: '¿Desea eliminar el registro "'+nombre+'" ?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: "Si"
  }).then((result) => {
    if (result.value) {
      Swal.fire({
        title: "¿Esta seguro?",
        text: 'Eliminara el registro "'+nombre+'".',
        icon: 'error',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "Si"
      }).then((result) => {
        if (result.value) {
          $.ajax({
            url:base_url+'CProducto/'+'desactivar_registro',
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
                  text: 'Se Elimino el registro"'+nombre+'".',
                  footer: '',              
                  showCancelButton: false,
                  showConfirmButton: false,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  cancelButtonText: 'cerrar',
                  confirmButtonText: 'Ok',
                  timer: 1000
                }).then((result) => {  
                  listar_producto_Pag(1);
                  $('#mFormRegistro').modal('hide');
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

function mFormRegistro(id){
  $.ajax({
    url:base_url+'CProducto/'+'getProductoByID',
    type:'post',
    data: 
    {
      id:id
    },
    beforeSend: function(e){
      $('#load').addClass('load');
      limpiarFormRegistro();
      $('#txt_modal_titulo').text('Editar Registro');
      $('#btn_actualizarRegistro').show();
      $('#btn_nuevoRegistro').hide();
    },
    success: function(data){
      $('#load').removeClass('load');
      var c = JSON.parse(data); 
      // console.log(c);
      c.forEach( function(i, indice, array) {
        console.log(i);
        $('#txt_id').val(i.producto_id);
        $('#txt_codigo').val(i.codigo);
        $('#txt_nombre').val(i.nombre);
        $('#txt_descripcion').val(i.descripcion);        
        $('#cbo_categoria_producto').val(i.categoria_producto_id).trigger('change');
        $('#txt_precioCompra').val(i.precioCompra);
        $('#txt_precioVenta').val(i.precioVenta);
        $('#txt_existencia').val(i.existencia);
        $('#txt_img_url').val(i.imagen_url);
        $('#mFormRegistro').modal('toggle');
      })
    },
    error: function(){      
      $('#load').removeClass('load');
    }
  });
}

function mNuevoRegistro(){
  $('#load').addClass('load');
  limpiarFormRegistro();
  $('#txt_modal_titulo').text('Nuevo Registro');
  $('#btn_actualizarRegistro').hide();
  $('#btn_nuevoRegistro').show();
  $('#mFormRegistro').modal('toggle');
  $('#load').removeClass('load');
}

function limpiarFormRegistro(){
  $('#txt_id').val('');
  $('#txt_codigo').val('');
  $('#txt_nombre').val('');
  $('#txt_descripcion').val('');
  $('#cbo_categoria_producto').val('').trigger('change');
  $('#txt_precioCompra').val('');
  $('#txt_precioVenta').val('');
  $('#txt_existencia').val('');
  $('#txt_img_url').val('');
}

function editarRegistro(){
  var txt_id = $('#txt_id').val();
  var txt_codigo = $('#txt_codigo').val();
  var txt_nombre = $('#txt_nombre').val();
  var txt_descripcion = $('#txt_descripcion').val();
  var cbo_categoria_producto = $('#cbo_categoria_producto').val();  
  var txt_precioCompra = $('#txt_precioCompra').val();
  var txt_precioVenta = $('#txt_precioVenta').val();
  var txt_existencia = $('#txt_existencia').val();
  var txt_img_url = $('#txt_img_url').val();
  $.ajax({
    url:base_url+'CProducto/'+'updateProducto',
    type:'post',
    data: 
    {
      txt_id:txt_id,
      txt_codigo:txt_codigo,
      txt_nombre:txt_nombre,
      txt_descripcion:txt_descripcion,
      cbo_categoria_producto:cbo_categoria_producto,      
      txt_precioCompra:txt_precioCompra,
      txt_precioVenta:txt_precioVenta,
      txt_existencia:txt_existencia,
      txt_img_url:txt_img_url
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
          text: 'Se actualizo el registro"'+txt_nombre+'".',
          footer: '',              
          showCancelButton: false,
          showConfirmButton: false,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          cancelButtonText: 'cerrar',
          confirmButtonText: 'Ok',
          timer: 1000
        }).then((result) => {
          listar_producto_Pag(1);
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
  var txt_codigo = $('#txt_codigo').val();
  var txt_nombre = $('#txt_nombre').val();
  var txt_descripcion = $('#txt_descripcion').val();
  var cbo_categoria_producto = $('#cbo_categoria_producto').val();  
  var txt_precioCompra = $('#txt_precioCompra').val();
  var txt_precioVenta = $('#txt_precioVenta').val();
  var txt_existencia = $('#txt_existencia').val();
  var txt_img_url = $('#txt_img_url').val();
  $.ajax({
    url:base_url+'CProducto/'+'setProducto',
    type:'post',
    data: 
    {
      tienda_id:tienda_id,
      txt_codigo:txt_codigo,
      txt_nombre:txt_nombre,
      txt_descripcion:txt_descripcion,
      cbo_categoria_producto:cbo_categoria_producto,      
      txt_precioCompra:txt_precioCompra,
      txt_precioVenta:txt_precioVenta,
      txt_existencia:txt_existencia,
      txt_img_url:txt_img_url
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
          text: 'Se registro el registro"'+txt_nombre+'".',
          footer: '',              
          showCancelButton: false,
          showConfirmButton: false,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          cancelButtonText: 'cerrar',
          confirmButtonText: 'Ok',
          timer: 1000
        }).then((result) => {
          listar_producto_Pag(1);
          $('#mFormRegistro').modal('hide');
        })                     
      }
    },
    error: function(){      
      $('#load').removeClass('load');
    }
  });
}