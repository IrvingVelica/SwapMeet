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

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <?php
    session_start();
    ?>
</head>

<body id="page-top">
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-danger topbar mb-4 static-top shadow">
            <img src="img/Slogo_b.png" style="border-radius: 35px;" >

          <!-- Topbar Search -->
        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
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
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div>
                    <div class="small text-gray-500">Herramientas</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div>
                    <div class="small text-gray-500">Electronicos</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div>
                    <div class="small text-gray-500">Ropa</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div>
                    <div class="small text-gray-500">Alimentos</div>
                  </div>
                </a>
                 <a class="dropdown-item d-flex align-items-center" href="#">
                  <div>
                    <div class="small text-gray-500">Renta</div>
                  </div>
                </a>
               
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div>
                    <div class="small text-gray-500">Muebles</div>
                  </div>
                </a>
               
               
                
                
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
                        <a class="dropdown-item" href="#">Visita tu perfil</a>
                        <a class="dropdown-item" href="register_product.html">Vende o cambia un articulo</a>
                        <a class="dropdown-item" href="cerrarsesion.php">Cerrar Session</a>
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
                        <a class="dropdown-item" href="login.html">Iniciar session</a>
                        <a class="dropdown-item" href="users_register.php">Registrate</a>
                    </div>
                </li>
            <?php } ?>
          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

  

          <!-- Content Row -->
          <div class="row">

            <div class="col-lg-2 ">

              <!-- Illustrations -->
              <div class="card shadow mb-3 text-center">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">NOMBRE</h6>
                </div>
                <div class="card-body">
                  <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-2 mb-3" style="width: 25rem;" src="img/imagen.png" alt="">
                  
                  <p><label>!!!!!!!Descripcion del articulo que se esta vendiendo!!!!!!!!!!!!!</label></p>
                  </div>
                  <a target="_blank" rel="nofollow" href="#"> <button type="button" class="btn btn-secondary btn-sm" style="border-radius: 25px;">Detalles</button></a>
                  <label>Cambio</label>
                
                </div>
              </div>
            </div>
             <div class="col-lg-2 ">

              <!-- Illustrations -->
              <div class="card shadow mb-3 text-center">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">NOMBRE</h6>
                </div>
                <div class="card-body">
                  <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-2 mb-3" style="width: 25rem;" src="img/imagen.png" alt="">
                  
                  <p><label>!!!!!!!Descripcion del articulo que se esta vendiendo!!!!!!!!!!!!!</label></p>
                  </div>
                  <a target="_blank" rel="nofollow" href="#"> <button type="button" class="btn btn-secondary btn-sm" style="border-radius: 25px;">Detalles</button></a>
                  <label>Cambio</label>
                
                </div>
              </div>
            </div>
             <div class="col-lg-2 ">

              <!-- Illustrations -->
              <div class="card shadow mb-3 text-center">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">NOMBRE</h6>
                </div>
                <div class="card-body">
                  <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-2 mb-3" style="width: 25rem;" src="img/imagen.png" alt="">
                  
                  <p><label>!!!!!!!Descripcion del articulo que se esta vendiendo!!!!!!!!!!!!!</label></p>
                  </div>
                  <a target="_blank" rel="nofollow" href="#"> <button type="button" class="btn btn-secondary btn-sm" style="border-radius: 25px;">Detalles</button></a>
                  <label>Cambio</label>
                
                </div>
              </div>
            </div>
             <div class="col-lg-2 ">

              <!-- Illustrations -->
              <div class="card shadow mb-3 text-center">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">NOMBRE</h6>
                </div>
                <div class="card-body">
                  <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-2 mb-3" style="width: 25rem;" src="img/imagen.png" alt="">
                  
                  <p><label>!!!!!!!Descripcion del articulo que se esta vendiendo!!!!!!!!!!!!!</label></p>
                  </div>
                  <a target="_blank" rel="nofollow" href="#"> <button type="button" class="btn btn-secondary btn-sm" style="border-radius: 25px;">Detalles</button></a>
                  <label>Cambio</label>
                
                </div>
              </div>
            </div>
             <div class="col-lg-2 ">

              <!-- Illustrations -->
              <div class="card shadow mb-3 text-center">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">NOMBRE</h6>
                </div>
                <div class="card-body">
                  <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-2 mb-3" style="width: 25rem;" src="img/imagen.png" alt="">
                  
                  <p><label>!!!!!!!Descripcion del articulo que se esta vendiendo!!!!!!!!!!!!!</label></p>
                  </div>
                  <a target="_blank" rel="nofollow" href="#"> <button type="button" class="btn btn-secondary btn-sm" style="border-radius: 25px;">Detalles</button></a>
                  <label>Cambio</label>
                
                </div>
              </div>
            </div>
             <div class="col-lg-2 ">

              <!-- Illustrations -->
              <div class="card shadow mb-3 text-center">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">NOMBRE</h6>
                </div>
                <div class="card-body">
                  <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-2 mb-3" style="width: 25rem;" src="img/imagen.png" alt="">
                  
                  <p><label>!!!!!!!Descripcion del articulo que se esta vendiendo!!!!!!!!!!!!!</label></p>
                  </div>
                  <a target="_blank" rel="nofollow" href="#"> <button type="button" class="btn btn-secondary btn-sm" style="border-radius: 25px;">Detalles</button></a>
                  <label>Cambio</label>
                
                </div>
              </div>
            </div>
            

          </div>

           <!-- Content Row -->
          <div class="row">

            <div class="col-lg-2 ">

              <!-- Illustrations -->
              <div class="card shadow mb-3 text-center">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">NOMBRE</h6>
                </div>
                <div class="card-body">
                  <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-2 mb-3" style="width: 25rem;" src="img/imagen.png" alt="">
                  
                  <p><label>!!!!!!!Descripcion del articulo que se esta vendiendo!!!!!!!!!!!!!</label></p>
                  </div>
                  <a target="_blank" rel="nofollow" href="#"> <button type="button" class="btn btn-secondary btn-sm" style="border-radius: 25px;">Detalles</button></a>
                  <label>Cambio</label>
                
                </div>
              </div>
            </div>
             <div class="col-lg-2 ">

              <!-- Illustrations -->
              <div class="card shadow mb-3 text-center">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">NOMBRE</h6>
                </div>
                <div class="card-body">
                  <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-2 mb-3" style="width: 25rem;" src="img/imagen.png" alt="">
                  
                  <p><label>!!!!!!!Descripcion del articulo que se esta vendiendo!!!!!!!!!!!!!</label></p>
                  </div>
                  <a target="_blank" rel="nofollow" href="#"> <button type="button" class="btn btn-secondary btn-sm" style="border-radius: 25px;">Detalles</button></a>
                  <label>Cambio</label>
                
                </div>
              </div>
            </div>
             <div class="col-lg-2 ">

              <!-- Illustrations -->
              <div class="card shadow mb-3 text-center">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">NOMBRE</h6>
                </div>
                <div class="card-body">
                  <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-2 mb-3" style="width: 25rem;" src="img/imagen.png" alt="">
                  
                  <p><label>!!!!!!!Descripcion del articulo que se esta vendiendo!!!!!!!!!!!!!</label></p>
                  </div>
                  <a target="_blank" rel="nofollow" href="#"> <button type="button" class="btn btn-secondary btn-sm" style="border-radius: 25px;">Detalles</button></a>
                  <label>Cambio</label>
                
                </div>
              </div>
            </div>
             <div class="col-lg-2 ">

              <!-- Illustrations -->
              <div class="card shadow mb-3 text-center">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">NOMBRE</h6>
                </div>
                <div class="card-body">
                  <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-2 mb-3" style="width: 25rem;" src="img/imagen.png" alt="">
                  
                  <p><label>!!!!!!!Descripcion del articulo que se esta vendiendo!!!!!!!!!!!!!</label></p>
                  </div>
                  <a target="_blank" rel="nofollow" href="#"> <button type="button" class="btn btn-secondary btn-sm" style="border-radius: 25px;">Detalles</button></a>
                  <label>Cambio</label>
                
                </div>
              </div>
            </div>
             <div class="col-lg-2 ">

              <!-- Illustrations -->
              <div class="card shadow mb-3 text-center">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">NOMBRE</h6>
                </div>
                <div class="card-body">
                  <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-2 mb-3" style="width: 25rem;" src="img/imagen.png" alt="">
                  
                  <p><label>!!!!!!!Descripcion del articulo que se esta vendiendo!!!!!!!!!!!!!</label></p>
                  </div>
                  <a target="_blank" rel="nofollow" href="#"> <button type="button" class="btn btn-secondary btn-sm" style="border-radius: 25px;">Detalles</button></a>
                  <label>Cambio</label>
                
                </div>
              </div>
            </div>
             <div class="col-lg-2 ">

              <!-- Illustrations -->
              <div class="card shadow mb-3 text-center">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">NOMBRE</h6>
                </div>
                <div class="card-body">
                  <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-2 mb-3" style="width: 25rem;" src="img/imagen.png" alt="">
                  
                  <p><label>!!!!!!!Descripcion del articulo que se esta vendiendo!!!!!!!!!!!!!</label></p>
                  </div>
                  <a target="_blank" rel="nofollow" href="#"> <button type="button" class="btn btn-secondary btn-sm" style="border-radius: 25px;">Detalles</button></a>
                  <label>Cambio</label>
                
                </div>
              </div>
            </div>
            

          </div>
             
        
          
        <!-- /.container-fluid -->

      </div>
    </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-danger">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Swapmeet2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

 
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
 <!-- Logout Debes iniciar secion para ofrecer articulo-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Bienvenido</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Iniciar sesion primero</div>
        <div class="modal-footer">
        
          <a class="btn btn-secondary" href="login.html">Iniciar sesion</a>
        </div>
      </div>
    </div>
  </div>
 

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
