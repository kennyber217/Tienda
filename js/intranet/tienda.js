window.onload = function() {
  listar_tienda_Pag(1);
  getCategoria();
};

function listar_tienda_Pag(pag){
  listar_tienda(pag);
}

function listar_tienda(pag){
  $.ajax({
    url:base_url+'CTienda/'+'getTiendaByUser',
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
        var estado = '';
        if( i.estado=='0' ){ estado = '<span class="circle_red" onClick="cambiarEstadoRegistro(\''+i.tienda_id+'\',\''+i.nombre+'\',1);"></span>'; }
        if( i.estado=='1' ){ estado = '<span class="circle_green" onClick="cambiarEstadoRegistro(\''+i.tienda_id+'\',\''+i.nombre+'\',0);"></span>'; }
        var option = ''+
          '<a href="javascript: void(0)" type="button" onClick="verPoductos('+i.tienda_id+');">'+
            '<i class="fa fa-shopping-cart" title="Productos" style="color: blue;"></i>'+
          '</a>'+
          '&nbsp;&nbsp;&nbsp;'+
          '<a href="javascript: void(0)" type="button" onClick="mFormRegistro('+i.tienda_id+');">'+
            '<i class="fa fa-edit" title="Editar Registro" style="color: orange;"></i>'+
          '</a>'+
          '&nbsp;&nbsp;&nbsp;'+
          '<a href="javascript: void(0)"" type="button" onClick="desactivarRegistro(\''+i.tienda_id+'\',\''+i.nombre+'\');">'+
            '<i class="fa fa-trash" title="Elimar Registro"style="color: red;"></i>'+
          '</a>'+
        '';
        $('#tbl_data tbody').append(''+
          '<tr>'+
            '<td class="align-middle text-center">'+(indice+1)+'</td>'+
            '<td class="align-middle text-left">'+i.nombre+'</td>'+
            '<td class="align-middle text-justify">'+i.descripcion+'</td>'+
            '<td class="align-middle text-left">'+i.categoria_nom+'</td>'+
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

function cambiarEstadoRegistro(id,nombre,estado){
  Swal.fire({
    title: "Cambiar Estado",
    text: '??Desea cambiar el estado de "'+nombre+'" ?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: "Si"
  }).then((result) => {
    if (result.value) {
      Swal.fire({
        title: "??Esta seguro?",
        text: 'Cambiara el estado del registro "'+nombre+'".',
        icon: 'error',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "Si"
      }).then((result) => {
        if (result.value) {
          $.ajax({
            url:base_url+'CTienda/'+'change_estado_registro',
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
                  listar_tienda_Pag(1);
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
    url:base_url+'CTienda/'+'getTiendaByID',
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
        // console.log(i);
        $('#txt_id').val(i.tienda_id);
        $('#txt_nombre').val(i.nombre);
        $('#txt_descripcion').val(i.descripcion);
        $('#cbo_categoria').val(i.categoria_id).trigger('change');
        $('#txt_img_url').val(i.imagen_url);
        $('#txt_cel').val(i.celular);
        $('#txt_direccion').val(i.direccion);
        $('#txt_telefono').val(i.telefono);
        $('#txt_Longitud').val(i.longitud);
        $('#txt_Latitud').val(i.latitud);
        Ubicacion(i.latitud,i.longitud);
        $('#mFormRegistro').modal('toggle');
      })
    },
    error: function(){      
      $('#load').removeClass('load');
    }
  });
}

function desactivarRegistro(id,nombre){
  Swal.fire({
    title: "Eliminar",
    text: '??Desea eliminar el registro "'+nombre+'" ?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: "Si"
  }).then((result) => {
    if (result.value) {
      Swal.fire({
        title: "??Esta seguro?",
        text: 'Eliminara el registro "'+nombre+'".',
        icon: 'error',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "Si"
      }).then((result) => {
        if (result.value) {
          $.ajax({
            url:base_url+'CTienda/'+'desactivar_registro',
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
                  listar_tienda_Pag(1);
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

function editarRegistro(){
  var txt_id = $('#txt_id').val();
  var txt_nombre = $('#txt_nombre').val();
  var txt_descripcion = $('#txt_descripcion').val();
  var cbo_categoria = $('#cbo_categoria').val();
  var txt_img_url = $('#txt_img_url').val();
  var txt_cel = $('#txt_cel').val();
  var txt_direccion = $('#txt_direccion').val();
  var txt_telefono = $('#txt_telefono').val();
  var txt_Longitud = $('#txt_Longitud').val();
  var txt_Latitud = $('#txt_Latitud').val();
  $.ajax({
    url:base_url+'CTienda/'+'updateTienda',
    type:'post',
    data: 
    {
      txt_id:txt_id,
      txt_nombre:txt_nombre,
      txt_descripcion:txt_descripcion,
      cbo_categoria:cbo_categoria,
      txt_img_url:txt_img_url,
      txt_cel:txt_cel,
      txt_direccion:txt_direccion,
      txt_telefono:txt_telefono,
      txt_Longitud:txt_Longitud,
      txt_Latitud:txt_Latitud
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
          listar_tienda_Pag(1);
          $('#mFormRegistro').modal('hide');
        })                     
      }
    },
    error: function(){      
      $('#load').removeClass('load');
    }
  });
}

function getCategoria(){
  $.ajax({
    url:base_url+'CTienda/'+'getCategoria',
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
        $('#cbo_categoria').append('<option value="'+i.categoria_id+'">'+i.nombre+'</option>');
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
  $('#txt_nombre').val('');
  $('#txt_descripcion').val('');
  $('#cbo_categoria').val('').trigger('change');
  $('#txt_img_url').val('');
  $('#txt_cel').val('');
  $('#txt_direccion').val('');
  $('#txt_telefono').val('');
  $('#txt_Longitud').val('');
  $('#txt_Latitud').val('');
}

function nuevoRegistro(){
  var txt_nombre = $('#txt_nombre').val();
  var txt_descripcion = $('#txt_descripcion').val();
  var cbo_categoria = $('#cbo_categoria').val();
  var txt_img_url = $('#txt_img_url').val();
  var txt_cel = $('#txt_cel').val();
  var txt_direccion = $('#txt_direccion').val();
  var txt_telefono = $('#txt_telefono').val();
  var txt_Longitud = $('#txt_Longitud').val();
  var txt_Latitud = $('#txt_Latitud').val();
  $.ajax({
    url:base_url+'CTienda/'+'setTienda',
    type:'post',
    data: 
    {
      txt_nombre:txt_nombre,
      txt_descripcion:txt_descripcion,
      cbo_categoria:cbo_categoria,
      txt_img_url:txt_img_url,
      txt_cel:txt_cel,
      txt_direccion:txt_direccion,
      txt_telefono:txt_telefono,
      txt_Longitud:txt_Longitud,
      txt_Latitud:txt_Latitud
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
          listar_tienda_Pag(1);
          $('#mFormRegistro').modal('hide');
        })                     
      }
    },
    error: function(){      
      $('#load').removeClass('load');
    }
  });
}

function verPoductos(tienda_id){
  location.href =base_url+"CProducto/productos/"+tienda_id;
}


// --------------------------------------------------------------MAPA----------------------------------------------------------------------------------
var marker;
var coords = {};
var map;

function IniMap(){
  coords =  {lat: -12.045271, lng: -77.031479};
  setMapa(coords);
}

function Ubicacion(latitud,longitud){
  coords =  {lat: latitud, lng: longitud};
  setMapa(coords);
}

function setMapa (coords){
  map = new google.maps.Map(document.getElementById('map'),
    {
      zoom: 18,
      scrollwheel: true,
      center:new google.maps.LatLng(coords.lat,coords.lng),
      mapTypeId: 'roadmap'
    });
  marker = new google.maps.Marker({
    map: map,
    draggable: true,
    animation: google.maps.Animation.DROP,
    position: new google.maps.LatLng(coords.lat,coords.lng),
  });  
  marker.addListener( 'dragend', function (event){
    $('#txt_Longitud').val(this.getPosition().lng());
    $('#txt_Latitud').val(this.getPosition().lat());
  });
}
// -----------------------------------------------------------------------------------------------------------------------------------------------------------------
