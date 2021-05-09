window.onload = function() {
  getTiendaByID(tienda_id);
};

function getTiendaByID(id){
  $.ajax({
    url:base_url+'Tienda/'+'getTiendaByID',
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
      c.forEach( function(i, indice, array) {
        // console.log(i);
        $('#div_logo').append('<img src="'+i.imagen_url+'" class="product-image" alt="'+i.nombre+'Product Image" style="max-height: 400px;width: auto;"></img>');
        $('#txt_titulo').text(i.nombre);
        $('#tbl_data tbody').append(''+
          '<tr>'+
            '<td>Categoria: </td>'+
            '<td>'+i.categoria_nom+'</td>'+
          '</tr>'+
          '<tr>'+
            '<td>Telefono: </td>'+
            '<td>'+i.telefono+'</td>'+
          '</tr>'+
          '<tr>'+
            '<td>Celular: </td>'+
            '<td>'+i.celular+'</td>'+
          '</tr>'+
          '<tr>'+
            '<td>Dirección: </td>'+
            '<td>'+i.direccion+'</td>'+
          '</tr>'+
        '');
        $('#product-desc').append(i.descripcion);
      })
    },
    error: function(){      
      $('#load').removeClass('load');
    }
  });
}