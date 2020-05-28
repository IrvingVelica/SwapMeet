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

													<!-- Begin Page Content -->
									<div class="container-fluid">
                    <?php
                     $getProductQuery = 'SELECT * FROM products_data WHERE user_id='.$_SESSION['user_id'];
                $getProduct = mysqli_query($conexion, $getProductQuery);
                
                ?>
												<!-- Page Heading -->
												<h1 class="h3 mb-2 text-gray-800 text-center">GESTION ARTICULOS</h1>
												<!-- DataTales Example -->
												<div class="card shadow mb-4">
													<div class="card-header py-3 text-center">
														<h6 class="m-0 font-weight-bold text-primary">Mis Articulos</h6>
													</div>
													<div class="card-body">
														<div class="table-responsive">
															<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
																<thead>
																	<tr>
																		<th>Nombre</th>
																		<th>Categoria</th>
																		<th>Tipo de venta</th>
																		<th>Precio venta</th>
                                    <th>Precio renta</th>
                                    <th>Tiempo renta</th>
																		<th>Editar</th>
																		<th>Eliminar</th>
																	</tr>
																</thead>
															
																<tbody>
																 <?php while($Product = mysqli_fetch_assoc($getProduct)){?>

                                  
																	<tr>
																		<td><?php echo $Product['name'];?></td>
																		<td><?php echo $Product['product_category'];?></td>
																		<td><?php echo $Product['sale_type'];?></td>
                                    <?php if(empty($Product['price_sale'])){
                                      ?><td>N/A</td>
                                   <?php }else{?>                                    
																		<td>$<?php echo $Product['price_sale'];?></td>
                                  <?php } ?> 
                                  <?php if(empty($Product['price_rental'])){
                                      ?><td>N/A</td>
                                   <?php }else{?>                                    
                                    <td>$<?php echo $Product['price_rental'];?></td>
                                  <?php } ?> 
                                  <?php if(empty($Product['time_rental'])){
                                      ?><td>N/A</td>
                                   <?php }else{?>                                    
                                    <td><?php echo $Product['time_rental'];?></td>
                                  <?php } ?>                     
																		<td><a href="edit_product.php?edit_product=<?php echo $Product['product_id'];?>"><button class="btn btn-secondary " id="edit" value="">Editar</button></a></td>
																		<td><button class="btn btn-danger delete"  id="delete" data-toggle="modal" data-target="#logoutModal"  value="<?php echo $Product['product_id'];?>">Eliminar</button> </td>
                                    <?php } ?>  
																	</tr>
																
														
																</tbody>
															</table>
														</div>
													</div>
												</div>
									</div>
									<!-- /.container-fluid -->
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
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">AVISO</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Seguro que desear eliminar este articulo!</div>
        <div class="modal-footer">
        
          <div class="btn btn-danger confirmar_borrar" data-dismiss="modal">Aceptar</div>
          <div class="btn btn-secondary" href="#" data-dismiss="modal">Cancelar</div>
        </div>
      </div>
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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>  
	

</body>

</html>


<script>
  var borrar = 0;

  $('.delete').click(function(){
   product_idDelete = $(this).val();

});
  
  $('.confirmar_borrar').click(function(){
   console.log(borrar);
   var objDelUser = {
            'product_idDelete':product_idDelete,
            'action': 'delete'
            };

        $.post('products_engine.php', objDelUser, function(respuesta) {
                      //respuesta = JSON.parse(respuesta); 
                                          Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'Se ha removido el articulo',
  showConfirmButton: false,
  timer: 5500
})
        setTimeout(function(){ window.location.href="see_products.php"; }, 1500); 
                     
                                  
        });

});    
</script>