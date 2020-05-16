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
  <?php session_start(); ?>

</head>

<body id="page-top">
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
             
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Herramientas</a>
                        <a class="dropdown-item" href="product_register.html">Electronicos</a>
                        <a class="dropdown-item" href="cerrarsesion.php">Ropa</a>
                         <a class="dropdown-item" href="#">Alimentos</a>
                        <a class="dropdown-item" href="product_register.html">Muebles</a>
                       
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
                        <a class="dropdown-item" href="product_register.html">Vende o cambia un articulo</a>
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

        <!-- Begin Page Content -->
      


           <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">

          <div class="col-lg-4" >
             
            <div align="center">
                <img  src="img/SlogoMax.jpg" class="img-fluid" alt="Responsive image">
               </div>
          </div>
          <div class="col-lg-8">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Registrar Articulo</h1>
              </div>


            <form enctype="multipart/form-data" method="post" class="user" id="addProduct">    
               <div class="row">             
                  <div class="col-sm-6 mb-3 mb-sm-0">
                      <div class="form-group">
                          <label>Nombre del Articulo</label>
                          <input type="text" class="form-control form-control-user" name="product_name" id="tbx_nombre" placeholder="nombre">
                      </div>
                  </div>

                  <div class="col-sm-6">
                      <div class="form-group">
                          <label>Seleccione Categoria</label>
                          <select class="form-control form-control-registro" name="category_product" id="tbx_selec_categori ">
                              <option>Herramientas</option>
                              <option>Electronicos</option>
                              <option>Ropa</option>
                              <option>Alimentos</option>
                              <option>Renta</option>
                              <option>Muebles</option>
                              <option>Otros</option>
                          </select>
                      </div>
                  </div>
               </div>   
                    
                <div class="form-group">
                    <label>Seleccione estado</label>
                    <select class="form-control form-control-registro " name="product_status" id="tbx_selec_estado">
                        <option value="Nuevo">Nuevo</option>
                        <option value="Usado">Usado</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label>Descripcion del Articulo</label>
                    <input type="description" class="form-control form-control-registro " name="description_product" id="tbx_descripcion" placeholder="descripcion...." style="padding: 2rem 1rem;">
                </div>

                <div class="form-group">
                    <label >Subir Imagen</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <a href="#" style="color:#4A4949;">
                                    <i class="fa fa-fw fa-image"></i>
                                </a>
                            </div>
                        </div>
                        <input type="file" class="form-control" name="file" id="tbx_img" placeholder="C://Imga">
                    </div>
                </div>
           
                <div class="form-group">
                    <label>Tipo de venta</label>
                    <select class="form-control form-control-registro" name="type_sale" id="tbx_selec_estado">
                        <option>Venta</option>
                        <option>Intercambio</option>
                        <option>Renta</option>
                        <option>Venta/intercambio</option>
                    </select>
                </div>

                <div class="form-group row">
                    <div class="col-sm-4">
                        <label class="form-check-label" for="exampleCheck1">Venta</label>
                        <label>Precio</label>
                        <input type="text" class="form-control" name="price_sale" id="tbx_precio" placeholder="precio">
                    </div>
                  <div class="col-sm-4">
                        <label class="form-check-label" for="exampleCheck1">Intercambio</label>
                        <br>

                        <select  type="text" class="form-control form-control-registro" name="category_change" id="tbx_selec_categori">
                            <option>Herramientas</option>
                            <option>Electronicos</option>
                            <option>Ropa</option>
                            <option>Alimentos</option>
                            <option>Muebles</option>
                            <option>Otros</option>
                        </select>
          
                        <div class="form-group">
                            <label>Descripcion del Articulo</label>
                            <input type="description" class="form-control form-control-registro" name="description_change" id="tbx_descripcion_inter" placeholder="descripcion...." style="padding: 2rem 1rem;">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-check-label" for="exampleCheck1">Renta</label>
                        <label >Precio</label>
                        <input type="text" class="form-control" name="price_rental" id="tbx_precio_renta" placeholder="precio por renta">
                        <label >Tiempo</label>
                        <input type="text" class="form-control" name="time_rental" id="tbx_tiempo" placeholder="tiempo de renta">
                    </div>
                </div>
                <input type="submit" class="btn btn-primary btn-user btn-block" value="Registrar">               
                <hr>
            </form>
              <hr>
             
            </div>
          </div>
        </div>
      </div>
    </div>
          <!--  end gallery -->
       </div>   
        <!-- /.container-fluid -->
      
    </div>

      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-danger">
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
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
 <!-- Logout Debes iniciar secion para ofrecer articulo-->

 
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
$('#addProduct').submit(function(e){
    e.preventDefault();
    var formData = new FormData(document.getElementById('addProduct')); 
    $.ajax({
        url: 'products_engine', 
        type: "post", 
        dataType: "html", 
        data: formData, cache: false,
        contentType: false,
        processData: false 
    })
    .done(function(res){ 
        console.log(res) 
    });
});
</script>




