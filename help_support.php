
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
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' type='text/css'>
	<link rel="stylesheet" href="css/styles.css">

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
											<h1 class="h3 mb-2 text-gray-800 text-center">AYUDA</h1>
										<div class="row">
											<div class="col-lg-6 ">
												<!-- DataTales Example -->
												<div class="card shadow mb-4">
														<div class="card-header py-3 text-center">
															<h6 class="m-0 font-weight-bold text-primary">Soporte</h6>
														</div>
														<div class="card-body">
															<form id="support" class="form-1">
															<div class="form-group">
										 					 	<label>Seleccione Area</label>
															 	 <select class="form-control" id="support_area">
										   							 <option>Mejor Intercamnio</option>
										   							 <option>Mejora compra</option>
										    					 	<option>Mis articulos</option>
										    					 	<option>Perfik</option>
										  						</select>
															</div>
															
															<div class="form-group">
										                  		<label>Descripcion del problema</label>
										                  		<input type="description" class="form-control form-control-registro" id="description_support" placeholder="descripcion....">
										              		</div>
										              		<div align="center">
										              			<a id="send_support" class="btn btn-secondary" href="#" data-dismiss="modal">Enviar</a>
										              		</div>
										              	</form>
													  </div>
												</div>
											</div>






												<div class="col-lg-6 ">
													<!-- DataTales Example -->
													<div class="card shadow mb-4">
															<div class="card-header py-3 text-center">
																<h6 class="m-0 font-weight-bold text-primary">Sugerencias</h6>
															</div>
															<div class="card-body">
																<form id="evaluation" class="form-1">
																		<div class="form-group">
														 					 <label>Califique a SwapMeet?</label>
														 					 <section class="section" id="section-1">
																			
																				<div class="form-field">
																					<select id="stars" class="star-rating">
																						<option value="">Calificacion:</option>
																						<option value="5">Fantastico</option>
																						<option value="4">Genial</option>
																						<option value="3">Bueno</option>
																						<option value="2">Aceptable</option>
																						<option value="1">Terrible</option>
																					</select>
																				</div>
																			
																			</section>		 
																 		</div>
																			
																	 <div class="form-group">
													                  	<label>Sugerencias:</label>
													                   <input type="description" class="form-control form-control-registro" id="suggestion" placeholder="descripcion....">
													             	 </div>
													              	<div align="center">
													             	 	<a id="send_evauation" class="btn btn-secondary" href="#">Enviar</a>
													              	</div>
													              </form>
															</div>
													</div>
											</div>
										</div>			
									</div>
									<!-- /.container-fluid -->
						 	 </div>
						 <!-- End of Main Content -->
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
	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>

	 <!-- modal de eliminar articulo-->

 

	<!-- Bootstrap core JavaScript-->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
	
	<script src="js/star-rating.min.js"></script>
		<script>
			$('#send_evauation').click(function(e){
    		e.preventDefault();
    		var stars = $('#stars').val();
    		var suggestion = $('#suggestion').val();
    		//console.log(stars);
    		//console.log(suggestion);
    		
    		var objEvaluation = {    			
    		'stars': stars,
    		'suggestion' : suggestion, 
    		'action' : 'evaluation'

    		};
    		$.post('help_support_engine.php',objEvaluation,function(respuesta){
    			//alrert('gracias por enviarnos tu sugerencia');
    		})
			});

			$('#send_support').click(function(e){
    		e.preventDefault();
    		var support_area = $('#support_area').val();
    		var description_support = $('#description_support').val();
    		//console.log(support_area);
    		//console.log(description_support);
    		var objSupport = {
    			
    			'support_area' : support_area,
    			'description_support' : description_support, 
    			'action' : 'support'

    		};
    		$.post('help_support_engine.php',objSupport,function(respuesta){
    			//alrert('gracias por enviarnos tu sugerencia');
 				 swal({
                title: "Usuario Eliminado!",
                icon: "success",
                button: "Continuar",
            })

    		})
			});




		var destroyed = false;
		var starratings = new StarRating( '.star-rating', {
			onClick: function( el ) {
				console.log( 'Selected: ' + el[el.selectedIndex].text );
			},
		});
		document.querySelector( '.toggle-star-rating' ).addEventListener( 'click', function() {
			if( !destroyed ) {
				starratings.destroy();
				destroyed = true;
			}
			else {
				starratings.rebuild();
				destroyed = false;
			}
		});
	</script>

</body>

</html>


