window.onload = function() {
  getUsuarioData();
};

function getUsuarioData(){
  $.ajax({
    url:base_url+'CUsuario/'+'getUsuarioData',
    type:'post',
    data: 
    {
    },
    beforeSend: function(e){
      $('#load').addClass('load');
      $('#txt_email').prop('readonly', true);
    },
    success: function(data){      
      var c = JSON.parse(data); 
      // console.log(c);
      c.forEach( function(i, indice, array) {
        console.log(i);
        $('#txt_id').val(i.usuario_id);
        $('#txt_email').val(i.email);
        $('#txt_nombre').val(i.nombre);
        $('#txt_apellido_paterno').val(i.apellido_paterno);
        $('#txt_apellido_materno').val(i.apellido_materno);
        $('#cbo_rol').val(i.rol_id);
      })
      $('#div_btn').hide();
      $('#load').removeClass('load');
    },
    error: function(){      
      $('#load').removeClass('load');
    }
  });
}

function cacelarEditarRegistro(){
  getUsuarioData();
}

function activarDivChange(){
  $('#div_btn').show();
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
          getUsuarioData();
        })                     
      }
    },
    error: function(){      
      $('#load').removeClass('load');
    }
  });
}