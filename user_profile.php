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

  <title>SWAPMEET</title>

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

                  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="row">
            <div class="col-md-6">
            <div class="form-group">
            <input type="text" class="form-control" placeholder="nombre" name="">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="">
          </div>
          </div>

           <div class="col-md-6">
            <div class="form-group">
            <input type="text" class="form-control" placeholder="nombre" name="">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="">
          </div>
          </div>
          </div>
   
        
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

                   
                    <!-- End of Topbar -->
                    <div align="center">
                        <h1 class="h4 text-gray-900 mb-4">PERFIN DE USUARIO</h1>
	                          <div class="row">
	                          	 	<div class="col-lg-2 ">
	                          	 	</div>
	                                <div class="col-lg-4 ">
	                                    <div class="card shadow mb-2 text-center">
	                                        <div class="card-body">
	                                           <div class="text-center">
	                                                <img class="img-fluid px-2 px-sm-4 mt-2 mb-3" style="width: 19.3rem;" src="img/user.jpg" alt="">  
	                                           </div>
	                                                 
	                                       </div>
	                                   </div>
	                              </div>
	                              <div class="col-mb-2 ">
	              							<div class="card shadow mb-1 text-left">
	                                    			<div class="card-header py-2">
	                                         			<h6 class="m-0 font-weight-bold text-primary">Nombre:</h6>
	                                    			</div>
	                                    			<div class="card-header py-2">
	                                         			<h6 class="m-0 font-weight-bold text-primary">Ap Paterno:</h6>
	                                    			</div>
	                                    			<div class="card-header py-2">
	                                         			<h6 class="m-0 font-weight-bold text-primary">Ap Materno:</h6>
	                                    			</div>
	                                    			<div class="card-header py-2">
	                                         			<h6 class="m-0 font-weight-bold text-primary">Edad:</h6>
	                                    			</div>
	                                    			<div class="card-header py-2">
	                                         			<h6 class="m-0 font-weight-bold text-primary">Correo:</h6>
	                                    			</div>
	                                    			<div class="card-header py-2">
	                                         			<h6 class="m-0 font-weight-bold text-primary">Contraseña:</h6>
	                                    			</div>
	                                    			<div class="card-header py-2">
	                                         			<h6 class="m-0 font-weight-bold text-primary">Direccion:</h6>
	                                    			</div>
	                                    			<div class="card-header py-2">
	                                         			<h6 class="m-0 font-weight-bold text-primary">Telefono:</h6>
	                                    			</div>
	                                    			<div class="card-header py-2">
	                                         			<h6 class="m-0 font-weight-bold text-primary">Redes social:</h6>
	                                    			</div>
	                                       </div>
	                         	 </div>
	                         	 <div class="col-mb-4 ">
	              							<div class="card shadow mb-1 text-left">
	                                    			<div class="card-header py-1">
	                                         			<h6 class="m-0 font-weight text-secundary">
	                                         				<label id="lblNom">usuario</label>
	                                         			</h6>
	                                    			</div>
	                                    			<div class="card-header py-1">
	                                         			<h6 class="m-0 font-weight text-secundary">
	                                         				<label id="lblPater">gonzales</label>
	                                         			</h6>
	                                    			</div>
	                                    			<div class="card-header py-1">
	                                         			<h6 class="m-0 font-weight text-secundary">
	                                         				<label id="lblMater">herrera</label>
	                                         			</h6>
	                                    			</div>
	                                    			<div class="card-header py-1">
	                                         			<h6 class="m-0 font-weight text-secundary">
	                                         				<label id="lblAge">25</label>
	                                         			</h6>
	                                    			</div>
	                                    			<div class="card-header py-1">
	                                         			<h6 class="m-0 font-weight text-secundary">
	                                         				<label id="lblEmail">asdasdas@uabc.edu.mx</label>
	                                         			</h6>
	                                    			</div>
	                                    			<div class="card-header py-1">
	                                         			<h6 class="m-0 font-weight text-secundary">
	                                         				<label id="lblPass">123165asdas</label>
	                                         			</h6>
	                                    			</div>
	                                    			<div class="card-header py-1">
	                                         			<h6 class="m-0 font-weight text-secundary">
	                                         				<label id="lblDir">Calle #54 fracc.valle de las palmas</label>
	                                         			</h6>
	                                    			</div>
	                                    			<div class="card-header py-1">
	                                         			<h6 class="m-0 font-weight text-secundary">
	                                         				<label id="lblTel">646-164-55-86</label>
	                                         			</h6>
	                                    			</div>
	                                    			<div class="card-header py-1">
	                                         			<h6 class="m-0 font-weight-bold text-secundary">
	                                         				<label id="lblRed">https://facebook;Profile:user/miperfil.com</label>
	                                         			</h6>
	                                    			</div>
	                                       </div>
	                         	 </div>
	                         </div>
                           <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                 Gestionar informacion
                          </button>
	              </div>  
                 <!-- /.container-fluid -->      
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
