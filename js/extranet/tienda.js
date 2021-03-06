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
        Ubicacion(i.latitud,i.longitud);
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
      getProductoByTiendaId(id);      
    },
    error: function(){      
      $('#load').removeClass('load');
    }
  });
}

function getProductoByTiendaId(id){
  $.ajax({
    url:base_url+'Tienda/'+'getProductoByTiendaId',
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
      })     
    },
    error: function(){      
      $('#load').removeClass('load');
    }
  });
}

function verProducto(producto_id){
  console.log('producto n: '+producto_id);
  location.href =base_url+"Tienda/producto/"+producto_id;
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
    draggable: false,
    animation: google.maps.Animation.DROP,
    position: new google.maps.LatLng(coords.lat,coords.lng),
  });  
  marker.addListener( 'dragend', function (event){
    // $('#txt_Longitud').val(this.getPosition().lng());
    // $('#txt_Latitud').val(this.getPosition().lat());
    console.log('Longitud: '+this.getPosition().lng());
    console.log('Latitud: '+this.getPosition().lat());
  });
}
// -----------------------------------------------------------------------------------------------------------------------------------------------------------------
