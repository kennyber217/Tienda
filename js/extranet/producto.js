window.onload = function() {
  getProductoById(producto_id);  
};

function getProductoById(id){
  $.ajax({
    url:base_url+'Tienda/'+'getProductoById',
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
        $('#txt_desc').text(i.descripcion);
        $('#txt_precio').text('S/ '+i.precioVenta);
        $('#txt_categoria').text('Categoria: '+i.categoria_producto_nom);
        if(i.estado=='1'){
          $('#div_cantidad').append('<input class="form-control" type="number"  id="txt_cantidad" min="1" max="'+i.existencia+'"/>');
          $('#div_btn_carrito').show();
        }
      })     
    },
    error: function(){      
      $('#load').removeClass('load');
    }
  });
}

function agregarCarrito(){
  var cantidad = $('#txt_cantidad').val();
  if(cantidad==0){
    alert("Ingrese cantidad valida");
  }else{
    alert("producto agregado al carrito");
  }
}