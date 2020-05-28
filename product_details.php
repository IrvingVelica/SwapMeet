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

    <!-- Custom styles for this template-->
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
                <button type="button" class="btn btn-secondary btn-sm" style="border-radius: 25px;width : 150px; height: 50px;  opacity: 0.5;">Categorias</button>
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
                   <a href="product_register.php" class="nav-link dropdown-toggle">
                      <button  type="button" class="btn btn-secondary btn-sm" style="border-radius: 25px;width : 150px; height: 50px;  opacity: 0.5;">Ofrecer</button>
                  </a>
                                   
              </li>
            <!-- boton mis ofrecer -->
              <li class="nav-item dropdown no-arrow mx-1">
                   <a href="help_support.php" class="nav-link dropdown-toggle">
                      <button  type="button" class="btn btn-secondary btn-sm" style="border-radius: 25px;width : 150px; height: 50px;  opacity: 0.5;">Ayuda</button>
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
                        <a class="dropdown-item" href="see_products.php">Mis articulos</a>
                        <a class="dropdown-item" href="see_sales.php">Mis gestiones</a>
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
   <?php
              $geProductQuery = 'SELECT * FROM products_data WHERE product_id='.$_GET['product_id'];
              $getProduct = mysqli_query($conexion,  $geProductQuery);
              $rowProduct =  mysqli_fetch_assoc($getProduct);
?>
    
  <div align="center">
  <h1 class="h4 text-gray-900 mb-4">
  	<label id="lbl_nombre_arti">Detalles del producto</label>
  </h1>
<div id="multi-item-example" class="carousel slide carousel-multi-item carousel-multi-item-2" data-ride="carousel">

  <!--Controls-->
  <div class="controls-top">
    <a class="black-text" href="#multi-item-example" data-slide="prev"><i class="fas fa-angle-left fa-3x pr-3"></i></a>
    <a class="black-text" href="#multi-item-example" data-slide="next"><i class="fas fa-angle-right fa-3x pl-3"></i></a>
  </div>
  <!--/.Controls-->

  <!--Slides-->
  <div class="carousel-inner" role="listbox">

    <!--First slide-->
    <div class="carousel-item active">

    
<div class="row">
      <div class="col-md-6 mb-3">
            <div class="card">
               <div class="card-body">
                        <div class="text-center">
                                <p><label><?php echo $rowProduct['product_description'];?></label></p>
                        </div>                   
                  </div>
          <img class="img-fluid" src="<?php echo $rowProduct['img'];?>"
            alt="Card image cap">
        </div>
      </div>



            <?php if($rowProduct['sale_type'] == 'Venta' || $rowProduct['sale_type'] == 'Venta/Intercambio' || $rowProduct['sale_type'] == 'Renta'){ ?>
            <div class="col-md-3 mb-3">
                <div class="card shadow mb-3 text-center">
                     <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">
                          <?php if($rowProduct['sale_type'] == 'Renta'){ ?>
                           <label id="lbl_precio">Precio de renta</label>
                            <label id="lbl_precio">$<?php echo $rowProduct['price_rental'];?></label>
                          <?php }else{?>
                            <label id="lbl_precio">Precio de venta</label>
                            <label id="lbl_precio">$<?php echo $rowProduct['price_sale'];?></label>
                          <?php } ?>
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                          <?php if($rowProduct['sale_type'] == 'Renta'){ ?>
                            <p><label id="lbl_precio">Tiempo de renta: <?php echo $rowProduct['time_rental'];?></label></p>
                            <?php }?>
                        </div>
                        <?php if(isset($_SESSION['user_id'])) {?>
                        <a <?php if($rowProduct['user_id'] != $_SESSION['user_id']){?>
                            rel="nofollow" href="sale.php?saller_id=<?php echo $rowProduct['user_id'];?>"
                        <?php } ?>> 
                        <?php } ?>
                  	          <button type="button" class="btn btn-secondary btn-sm "  style="border-radius: 25px;">Comprar</button>
                        </a>
                       
                    </div>
                </div>  
            </div>
            <?php } ?>

            <?php if( $rowProduct['sale_type'] == 'Intercambio' || $rowProduct['sale_type'] == 'Venta/Intercambio'){ ?>

            <div class="col-md-3 mb-3 ">
                <div class="card shadow mb-3 text-center">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">
                  	         <label id="lbl_categoria">Cambio por:</label>
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                                <p><label id="lbl_precio"><?php echo $rowProduct['change_description'];?></label></p>
                        </div>
                        <a rel="nofollow" href="#"> <button type="button" class="btn btn-secondary btn-sm" onclick="not_session2()" style="border-radius: 25px;">Intercambio</button></a>                
                    </div>
                </div>
            </div>
            <?php } ?>

  </div>

    </div>
    <!--/.First slide-->
  </div>
  <!--/.Slides-->
</div>
          <!--  end gallery -->
          
            
            
  

        
       </div>   
        <!-- /.container-fluid -->

      
    </div>
    <br><br><br><br>
       </div>
          </div>

      <!-- End of Main Content -->

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

    
    <!-- End of Content Wrapper -->

 
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->

 
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

</script>