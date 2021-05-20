$.ajax({
  url:base_url+'Tienda/'+'Search_productos',
  type:'post',
  data: 
  { 
    search:search
  },
  beforeSend: function(e){
    $('#load').addClass('load');
  },
  success: function(data){
    var c = JSON.parse(data);
    // console.log(c);
    // Inicio con Datos        
    c.forEach( function(i, indice, array) {
      console.log(i);
      $('#list_productos').append(''+
      '<li class="store-item">'+
        '<a class="cpg-card" title="'+i.nombre+'" onClick="verProducto('+i.producto_id+');">'+
          '<div class="cpg-img-container" style="text-align: center;background-color: '+random_bg_color()+';">'+
            '<img src="'+i.imagen_url+'" style="">'+
          '</div>'+
          '<h4 class="cpg-title">'+i.nombre+'</h4>'+
          '<h4 class="cpg-title">S/ '+i.precioVenta+'</h4>'+
        '</a>'+
      '</li>'+
    '');
    });
    $('#load').removeClass('load');
  },
  error: function(){
    $('#load').removeClass('load');
  }
})

function verProducto(producto_id){
  console.log('producto n: '+producto_id);
  location.href =base_url+"Tienda/producto/"+producto_id;
}