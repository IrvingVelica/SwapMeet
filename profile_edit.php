 <?php
    session_start();
 ?>
<?php
include("conexiondb.php");

?>
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
 <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
 
  
  <!-- Page Wrapper -->
    <div id="wrapper">
      <!-- Content Wrapper -->
          <div id="content-wrapper" class="d-flex flex-column">

               <!-- Main Content -->
               <div id="content">

                 <!-- Topbar -->
             
              <nav class="navbar navbar-expand navbar-light bg-danger topbar mb-4 static-top shadow">
                <a href="index.php">
                  <img src="img/Slogo_b.png" style="border-radius: 35px;" >
                </a>
            

          <!-- Topbar Search -->
        <form action="index.php" method="GET" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                <input type="text" name="q" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

          

            <!-- boton categorias -->
             <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <button type="button" class="btn btn-secondary btn-sm" style="border-radius: 25px;width : 150px; height: 50px">Categorias</button>
                <!-- Counter - Alerts -->
               
              </a>
              <!-- Dropdown - Alerts -->
             
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="index.php">Todos</a>
                        <a class="dropdown-item" href="index.php?category=Herramientas">Herramientas</a>
                        <a class="dropdown-item" href="index.php?category=Electronicos">Electronicos</a>
                        <a class="dropdown-item" href="index.php?category=Ropa">Ropa</a>
                         <a class="dropdown-item" href="index.php?category=Alimentos">Alimentos</a>
                        <a class="dropdown-item" href="index.php?category=Muebles">Muebles</a>
                        <a class="dropdown-item" href="index.php?category=otros">otros</a>
            </div>
            </li>

            <!-- boton mis arituclos -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" data-toggle="modal" data-target="#logoutModal">
               <button type="button" class="btn btn-secondary btn-sm" style="border-radius: 25px;width : 150px; height: 50px">Ofrecer</button>
              </a>
              
            </li>
            <!-- boton mis ofrecer -->
              <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dr" href="#">
               <button type="button" class="btn btn-secondary btn-sm" style="border-radius: 25px;width : 150px; height: 50px">Ventas</button>
              </a>
            </li>
            <div class="topbar-divider d-none d-sm-block"></div>
            <?php 
            
            if (isset($_SESSION['user_id'])) { 
                $getUserQuery = 'SELECT first_name, last_name FROM users_data WHERE user_id='.$_SESSION['user_id'];
                $getUser = mysqli_query($conexion, $getUserQuery);
                $user = mysqli_fetch_assoc($getUser);
              ?>
                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">  
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                            <label><?php echo $user['first_name']." ".$user['last_name'];?></label>
                        </span>
                        <img class="img-profile rounded-circle" src="img/user.jpg">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="user_profile.php">Visita tu perfil</a>
                        <a class="dropdown-item" href="product_register.php">Vende o cambia un articulo</a>
                        <a class="dropdown-item" href="cerrarsesion.php">Cerrar sesión</a>
                    </div>
                </li>
            <?php } else { ?>
                       <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">  
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                            <label>Invitado</label>
                        </span>
                        <img class="img-profile rounded-circle" src="img/user.jpg">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="login.html">Iniciar sesión</a>
                        <a class="dropdown-item" href="users_register.php">Registrate</a>
                    </div>
                </li>
            <?php } ?>
          </ul>

        </nav>       
                    <!-- End of Topbar -->
                    <div align="center">
                      <form id="userEdit" class="user">
                        <h1 class="h4 text-gray-900 mb-4">EDITAR PERFIL</h1>
                       
	                          <div class="row justify-content-center">

                               <div class="col-xl-10 col-lg-12 col-md-9">
                                 <?php
                              $getUserQuery = 'SELECT * FROM users_data WHERE user_id='.$_SESSION['user_id'];
                                $getUser = mysqli_query($conexion, $getUserQuery);
                                  $user = mysqli_fetch_assoc($getUser);
                              ?>

                                   <div class="row">
          	                          	 <div class="col-lg-6">
                                               <div class="form-group row">
                                                  <div class="col-lg-3">
                                                      <label id="lbl_nom" >Nombre</label>
                                                  </div>
                                                  <div class="col-lg-8">
                                                      <div class="col-sm-10 mb-3 mb-sm-0">  
                                                          <input type="text" class="form-control form-control-registro name" id="name" placeholder="nombre" value="<?php echo $user['first_name']; ?>">
                                                      </div>
                                                  </div>
                                                 </div>
                                                  <div class="form-group row">
                                                    <div class="col-lg-3">
                                                        <label id="lbl_app" >Apellidos</label>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="col-sm-10 mb-3 mb-sm-0">  
                                                            <input type="text" class="form-control form-control-registro " id="tbx_paterno" placeholder="apellido paterno" value="<?php echo $user['last_name']; ?>">
                                                        </div>
                                                    </div>
                                                 </div>
                                                  <div class="form-group row">
                                                    <div class="col-lg-3">
                                                        <label id="lbl_age">Edad</label>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="col-sm-10 mb-3 mb-sm-0">  
                                                            <input type="text" class="form-control form-control-registro " id="tbx_edad" placeholder="edad" value="<?php echo $user['age']; ?>">
                                                        </div>
                                                    </div>
                                                 </div>
                                                 <div class="form-group row">
                                                    <div class="col-lg-3">
                                                        <label id="lbl_dir">Direccion</label>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="col-sm-10 mb-3 mb-sm-0">  
                                                            <input type="text" class="form-control form-control-registro " id="tbx_direccion" placeholder="Direccion" value="<?php echo $user['address']; ?>">
                                                        </div>
                                                    </div>
                                                 </div>              
                                        </div>
                                        <div class="col-lg-6">
                                               <div class="form-group row">
                                                  <div class="col-lg-3">
                                                      <label id="lbl_pass">Contraseña</label>
                                                  </div>
                                                  <div class="col-lg-8">
                                                      <div class="col-sm-10 mb-3 mb-sm-0">  
                                                          <input type="text" class="form-control form-control-registro " id="tbx_clave" placeholder="********" value="<?php echo $user['password']; ?>">
                                                      </div>
                                                  </div>
                                                 </div>
                                                  <div class="form-group row">
                                                    <div class="col-lg-3">
                                                        <label id="lbl_passcon">Confirmar</label>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="col-sm-10 mb-3 mb-sm-0">  
                                                            <input type="text" class="form-control form-control-registro " id="tbx_confirmar" placeholder="********">
                                                        </div>
                                                    </div>
                                                 </div>
                                                  <div class="form-group row">
                                                    <div class="col-lg-3">
                                                        <label id="lbl_tel">Telefono</label>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="col-sm-10 mb-3 mb-sm-0">  
                                                            <input type="text" class="form-control form-control-registro " id="tbx_telefono" placeholder="646-455-55-55">
                                                        </div>
                                                    </div>
                                                 </div>

                                                 <div class="form-group row">
                                                    <div class="col-lg-3">
                                                        <label id="lbl_red">Red Social</label>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="col-sm-10 mb-3 mb-sm-0">  
                                                            <input type="text" class="form-control form-control-registro " id="tbx_reds" placeholder="https://www.facebook.com/profile/user1">
                                                        </div>
                                                    </div>
                                                 </div>
                                                 <div class="form-group row">
                                                      <div class="col-lg-3">
                                                            <label id="lbl_img">Imagen</label>
                                                      </div>
                                                      <div class="col-lg-8">
                                                      <div class="col-sm-10 mb-3 mb-sm-0">
                                                          
                                                              <div class="input-group mb-2">
                                                                <input type="text" class="form-control form-control-registro" id="tbx_img" placeholder="C://Imga">
                                                                 <div class="input-group-prepend">
                                                                      <div class="input-group-text"> 
                                                                          <a href="#" style="color:#4A4949;">
                                                                              <i class="fa fa-fw fa-image"></i>
                                                                          </a>
                                                                     </div>
                                                                 </div>
                                                               </div>
                                                          </div>
                                                      </div>
                                                </div>         
                                        </div>
                                  </div>
                                 
                                </div>
                              </div>
                          
                                <a href="" class="btn btn-primary btn-user">
                                  GUARDAR
                               </a>
                             </form>
                          
                           </div>  
                        
	                     
             </div>
                <!-- Footer -->
                  <footer class="sticky-footer bg-danger">
                    <div class="container my-auto">
                      <div class="copyright text-center my-auto">
                        <span>Swepmeet2020</span>
                      </div>
                    </div>
                  </footer>
                  <!-- End of Footer -->
         </div>
    </div>
          <!-- End of Page Wrapper -->
         

                 
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
</body>

</html>



<script>
  $('#userEdit').submit(function(e){
    e.preventDefault();
    var name = $('.name').val();
    console.log(name);
  }
</script>