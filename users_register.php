<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>swapmeet</title>

  <!-- Custom fonts for this template-->
<link href="css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-danger">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">

          <div class="col-lg-6 d-none d-lg-block" align="center">
              <br>
                <br>
                <br>  <br>
               
            
            <img  src="img/SlogoMax.jpg">
            <div class="alert alert-success" role="alert" style="display: none;">Registro exitoso!!!</div>
            <div class="alert alert-danger empty_fields" role="alert" style="display: none;">Hay campos vacios!!!</div>
            <div class="alert alert-danger data_difference" role="alert" style="display: none;">Correo o contraseña no coinciden!!!</div>
          </div>
          <div class="col-lg-6">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Crear Cuenta</h1>
              </div>
              <form class="user" id="addUser">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="exampleInputEmail1">Nombre</label>
                    <input type="text" class="form-control form-control-user user_name" id="tbx_nombre" placeholder="nombre..">
                  </div>
                  <div class="col-sm-6">
                    <label for="exampleInputEmail1">Apellido</label>
                    <input type="text" class="form-control form-control-user user_lastname" id="tbx_apellido" placeholder="apellido..">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="exampleInputEmail1">Edad</label>
                    <input type="text" class="form-control form-control-user user_age" id="tbx_edad" placeholder="edad..">
                  </div>
                  <div class="col-sm-6">
                    <label for="exampleInputEmail1">Direccion</label>
                    <input type="text" class="form-control form-control-user user_address" id="tbx_direccion" placeholder="direccion..">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Correo electronico</label>
                  <input type="email" class="form-control form-control-user user_email" id="tbx_correo" placeholder="correo..">
                </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Confirme su correo electronico</label>
                  <input type="email" class="form-control form-control-user confirm_user_email" id="tbx_correo_confir" placeholder="confirmar correo..">   
              </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label for="exampleInputEmail1">Contraseña</label>
                    <input type="password" class="form-control form-control-user user_password" id="tbx_clave" placeholder="clave...">
                  </div>
                  <div class="col-sm-6">
                  <label for="exampleInputEmail1">Confirme su contraseña</label>
                    <input type="password" class="form-control form-control-user confirm_user_password" id="tbx_clave_confir" placeholder="confirmar clave...">
                  </div>
                </div>
                <a href="#">
                 <button class="btn btn-primary btn-user btn-block">
                  Registrar
                </button>
                </a>
                <hr>
              </form>
              <a href="index.php">
                <button class="btn btn-secondary btn-user btn-block">Regresar</button>
              </a>
              <hr>
              <div class="text-center">
                <a class="small" href="#">Recuperar Contraseña</a>
              </div>
              <div class="text-center">
                <a class="small" href="login.html">Iniciar Sesion!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <br>
  <br>
  <!-- Footer -->
      <footer class="sticky-footer bg-danger" style="position: absolute;
  bottom: 0;width: 100%;">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Swapmeet 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

<!-- Bootstrap core JavaScript-->
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="js/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="js/Chart.min.js"></script>
  <script type="text/javascript" src="js/all.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script> 
</body>

</html>



<script>

$('#addUser').submit(function(e){
    e.preventDefault();

    var user_name = $('.user_name').val();
    var user_lastname =  $('.user_lastname').val();
    var user_age = $('.user_age').val();
    var user_email = $('.user_email').val();
    var user_address = $('.user_address').val();
    var user_password = $('.user_password').val();
    var confirm_user_email = $('.confirm_user_email').val();
    var confirm_user_password = $('.confirm_user_password').val();




    if (user_name && user_lastname  && user_age && user_email && user_address && user_password && confirm_user_email && confirm_user_password) {
       if(user_email!=confirm_user_email||user_password!=confirm_user_password){
        $('.data_difference').show();
        $('.data_difference').fadeOut(5000);
      }else{
            var objUser = {
            'user_name':user_name,
            'user_lastname': user_lastname,
            'user_age': user_age,
            'user_address': user_address,
            'user_email': user_email,            
            'user_password': user_password,
            'actions':'insert'
        };

        $.post('users_engine.php', objUser, function(respuesta) {
            
            if(parseInt(respuesta) == 1) {
              console.log(respuesta);
                                  Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'Usuario registrado...inicie sesion por favor',
  showConfirmButton: false,
  timer: 5500
})
        setTimeout(function(){ window.location.href="login.html"; }, 3000); 

                
            } 
        });
      }
    

    } else {

        if (!user_name) {
            $('.user_name').css("border","1px solid red");
        }

        if (!user_lastname) {
            $('.user_lastname').css("border","1px solid red");
        }

        if (!user_age) {
            $('.user_age').css("border","1px solid red");
        }
        if (!user_email) {
            $('.user_email').css("border","1px solid red");
        }
        if (!user_address) {
            $('.user_address').css("border","1px solid red");
        }
        if (!user_password) {
            $('.user_password').css("border","1px solid red");
        }

        $('.empty_fields').show();
        $('.empty_fields').fadeOut(5000); 
    }
}); 

$('.user_name, .user_lastname, user_age, .user_email, user_address, user_password').focusout(function(){
    $(this).css("border","1px solid #d1d3e2");
});    
</script>



