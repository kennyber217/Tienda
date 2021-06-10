$('#form_login').on('submit', function(e){
  e.preventDefault();
  validarLogin();
    // location.href =base_url+"Tienda/listar/"+dat;
});
  
function validarLogin(){
  var email = $('#txt_email').val();
  var password = $('#txt_password').val();
  if(email==''){
    alert('Ingrese email.');
  }else{
    if(password==''){
      alert('Ingrese password.');
    }else{
      login(email,password);
    }
  }
}

function login(email,password){
  $.ajax({
    url:base_url+'CLogin/'+'login',
    type:'post',
    data: 
    { 
      email:email,
      password:password
    },
    beforeSend: function(e){
      $('#load').addClass('load');
    },
    success: function(data){
      var c = JSON.parse(data);
      // console.log(c);
      if(c){
        location.href =base_url+"CTienda";
      }else{
        alert('Usuario no valido.');
      }
      $('#load').removeClass('load');
    },
    error: function(){
      $('#load').removeClass('load');
    }
  })
}