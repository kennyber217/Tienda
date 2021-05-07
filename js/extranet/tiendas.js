
$.ajax({
  url:base_url+'Tienda/'+'Search',
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
      $('#list_search').append(''+
        '<div class="col-sm-4">'+
          '<div class="card">'+
            '<img src="'+i.imagen_url+'" class="card-img-top" alt="'+i.nombre+'">'+
            '<div class="card-body">'+
              '<h5 class="card-title">'+i.nombre+'</h5>'+
              '<p class="card-text text-justify">'+i.descripcion+'</p>'+
              '<a href="#" class="btn btn-primary">Ver Tienda</a>'+
            '</div>'+
          '</div>'+
        '</div>'+
      '');
    });
    $('#load').removeClass('load');
  },
  error: function(){
    $('#load').removeClass('load');
  }
})