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
        <!-- End of Topbar -->
                    <!-- End of Topbar -->

                            <!-- Begin Page Content -->
                            <div class="container-fluid">
                                <div align="center">
                                         <h1 class="h4 text-gray-900 mb-4">COMPRA</h1>
                                 
                                 <!-- Content Row -->
                                 <form id="sale" class="user">
                                     <div class="row">
                                       <?php 
            
                $getUserQuery = 'SELECT * FROM users_data WHERE user_id='.$_GET['saller_id'];
                $getUser = mysqli_query($conexion, $getUserQuery);
                $user = mysqli_fetch_assoc($getUser);
              ?>

                                          <div class="col-lg-4 ">
                                              <!-- Illustrations -->
                                              <div class="card shadow mb-3 text-center">
                                                    <div class="card-header py-3">
                                                        <h6 class="m-0 font-weight-bold text-primary"><label id="lbl_nombre"><?php echo $user['first_name'].' '.$user['last_name']; ?></label></h6>
                                                    </div>
                                                    <div class="card-body">
                                                           <div class="text-center">
                                                                <img style="width: 60%;" class="img-fluid px-3 px-sm-4 mt-2 mb-3" style="width: 25rem;" src="<?php echo $user['img']; ?>" alt="">
                                                             <p>
                                                                 <label>Telefono</label>
                                                             </p>
                                                             <p>
                                                                 <label id="lbl_tel"><?php echo $user['phone'];?></label>
                                                             </p>
                                                          </div>
                                                  </div>
                                              </div>
                                         </div>
                                          <div class="col-lg-4">
                                              <?php
                                              $getProductQuery = 'SELECT * FROM products_data WHERE user_id='.$_SESSION['user_id'];
                $getProduct = mysqli_query($conexion, $getProductQuery);
                $Product = mysqli_fetch_assoc($getProduct);
              
?>
                                              <!-- Illustrations -->
                                              <div class="card shadow mb-3 text-center">
                                                
                                                    <div class="card-header py-3">
                                                        <h6 class="m-0 font-weight-bold text-primary"><label id="lbl_nombre_art"><?php echo $Product['name'];?></label></h6>
                                                    </div>
                                                    <div class="card-body">
                                                           <div class="text-center">
                                                                
                                                             <p>
                                                                 <label id="lbl_descp"><?php echo $Product['product_description']?></label>
                                                             </p>
                                                             <p>
                                                                 <label id="lbl_precio">Precio $<?php echo $Product['price_sale'];?></label>
                                                             </p>
                                                             <p>
                                                                 <label id="extra">Extra $<?php echo $Product['price_sale']*0.10;?></label>
                                                             </p>
                                                          </div>  
                                                  </div>
                                              </div>
                                         </div>
                                          <div class="col-lg-4 ">

                                              <!-- Illustrations -->
                                              <div class="card shadow text-left">  
                                                    <div class="card-body">
                                                          <label>Seleccione tipo de entrega</label>
                                                          <div class="form-group">
                                                              <select class="form-control form-control-registro " id="type_delivery">
                                                                 <option>Domicilio</option>
                                                                 <option>Reunion</option>
                                                             </select>
                                                        </div>
                                                    </div>
                                              </div>
                                              <!-- Illustrations -->
                                              <div class="card shadow text-left">  
                                                    <div class="card-body">
                                                          <label>Seleccione localizacion de entrega</label>
                                                          <div class="form-group">
                                                              <select class="form-control form-control-registro " id="delivery">
                                                                 <option>MacroPLaza</option>
                                                                 <option>Centro</option>
                                                                 <option>Colchonera</option>
                                                                 <option>Clinica 8</option>
                                                                 <option>Soriana bahia</option>
                                                             </select>
                                                        </div>
                                                    </div>
                                              </div>
                                               <div class="card shadow text-left">  
                                                    <div class="card-body">
                                                          <label>Seleccione horario de entrega</label>
                                                          <div class="form-group">
                                                              <select class="form-control form-control-registro " id="delivery_time">
                                                                 <option>8am</option>
                                                                 <option>10am</option>
                                                                 <option>12am</option>
                                                                 <option>2pm</option>
                                                                 <option>4pm</option>
                                                                 <option>6pm</option>
                                                                 <option>8pm</option>
                                                             </select>
                                                        </div>
                                                    </div>
                                                   
                                              </div>
                                              

                                         </div>

                                    </div>
                                    <input type="hidden" id="buyer_id" value="<?php echo $_SESSION['user_id']; ?>">
                                    <input type="hidden" id="saller_id" value="<?php echo $_GET['saller_id']; ?>">
                                    <input type="hidden" id="product_id" value=" <?php echo $Product['product_id']?>">
                                     <button href="#" class="btn btn-primary btn-user">
                                            COMPRAR
                                     </button>
                                    <br>
                                    
                                    
                                   </form>
                                </div>     
                            </div>
             </div>
             <!-- End of Main Content -->
             <br>
             <br>
             <br>
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
        </div>
    </div>
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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script> 
  

</body>

</html>



<script>
       $('#type_delivery').change(function(){
        $('#extra').hide();
          $('#delivery').attr('disabled',false);   
        var a = $(this).val();
        if(a == 'Domicilio'){
           $('#extra').show();
          $('#delivery').attr('disabled',true);            
        }
        
    });
        $('#type_delivery').change();





        $('#sale').submit(function(e){
    e.preventDefault();

   var buyer_id = $('#buyer_id').val();
    var saller_id =  $('#saller_id').val();
    var product_id = $('#product_id').val();
    var delivery = $('#delivery').val();
    var delivery_time = $('#delivery_time').val();
    var type_delivery = $('#type_delivery').val();


     var objSale = {
            'buyer_id':buyer_id,
            'saller_id': saller_id,
            'product_id': product_id,
            'delivery': delivery,
            'delivery_time': delivery_time,
            'type_delivery' : type_delivery,
            'type_sale':'Venta'
        };


          $.post('sale_engine.php', objSale, function(respuesta) {
             Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'Se ha enviado tu oferta......espera respuesta del vendedor ',
  showConfirmButton: false,
  timer: 5500
})

         setTimeout(function(){ window.location.href="see_sales.php"; }, 6500); 
            
        });

}); 



</script>
