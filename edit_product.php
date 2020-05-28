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
                       <div class="card o-hidden border-0 shadow-lg my-5">
                        <?php
                     $getProductQuery = 'SELECT * FROM products_data WHERE product_id='.$_GET['edit_product'];
                $getProduct = mysqli_query($conexion, $getProductQuery);
                $Product = mysqli_fetch_assoc($getProduct);
                ?>
                
                            <div class="card-body p-0">
                                <div align="center">

                                        <h1 class="h4 text-gray-900 mb-4">EDITAR ARTICULO</h1>
                               
                              <form id="productEdit" class="user">
                                <!-- Nested Row within Card Body -->
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="p-5">
                                                <div class="form-group">
                                                     <label>Nombre del Articulo</label>
                                                     <input type="text" class="form-control form-control-registro" name="product_name" id="tbx_nombre" placeholder="nombre" value="<?php echo $Product['name'];?>">
                                                </div>
                                            
                                                <div class="form-group">
                                                    <label>Descripcion del Articulo</label>
                                                    <input type="description" class="form-control form-control-registro " name="product_description" id="tbx_descripcion" placeholder="descripcion" value="<?php echo $Product['product_description'];?>">
                                               </div>
                                                <div class="form-group">
                                                    <label class="form-check-label" for="exampleCheck1">Venta</label>
                                                    <label>Precio</label>
                                                    <input type="text" class="form-control" name="price_sale" id="price_sale" placeholder="precio" value="<?php echo $Product['price_sale'];?>">
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="p-5"> 
                                                  <div class="form-group">
                                                         <label>Seleccione Categoria</label>
                                                         <select class="form-control form-control-registro" name="product_category" id="product_category">
                                                            <option <?php if($Product['product_category'] == 'Herramientas'){echo 'selected';} ?>>Herramientas</option>
                                                            <option <?php if($Product['product_category'] == 'Electronicos'){echo 'selected';} ?>>Electronicos</option>
                                                            <option <?php if($Product['product_category'] == 'Ropa'){echo 'selected';} ?>>Ropa</option>
                                                            <option <?php if($Product['product_category'] == 'Alimentos'){echo 'selected';} ?>>Alimentos</option>
                                                            <option <?php if($Product['product_category'] == 'Muebles'){echo 'selected';} ?>>Muebles</option>
                                                            <option <?php if($Product['product_category'] == 'Otros'){echo 'selected';} ?>>Otros</option>
                                                         </select>
                                                  </div>
                                                  <div class="form-group">
                                                        <label>Seleccione estado</label>
                                                        <select class="form-control form-control-registro " name="product_status" id="tbx_selec_estado">
                                                            <option <?php if($Product['status'] == 'Nuevo'){echo 'selected';} ?>>Nuevo</option>
                                                            <option <?php if($Product['status'] == 'Usado'){echo 'selected';} ?>>Usado</option>
                                                        </select>
                                                  </div>
                                                  <div class="form-group">
                                                        <label class="form-check-label" for="exampleCheck1">Intercambio</label>
                                                        <br>
                                                        <select  type="text" class="form-control form-control-registro change_category" name="change_category" id="change_category">
                                                            <option <?php if($Product['change_category'] == 'Herramientas'){echo 'selected';} ?>>Herramientas</option>
                                                            <option <?php if($Product['change_category'] == 'Electronicos'){echo 'selected';} ?>>Electronicos</option>
                                                            <option <?php if($Product['change_category'] == 'Ropa'){echo 'selected';} ?>>Ropa</option>
                                                            <option <?php if($Product['change_category'] == 'Alimentos'){echo 'selected';} ?>>Alimentos</option>
                                                            <option <?php if($Product['change_category'] == 'Muebles'){echo 'selected';} ?>>Muebles</option>
                                                            <option <?php if($Product['change_category'] == 'Otros'){echo 'selected';} ?>>Otros</option>
                                                        </select>
                                                        <div class="form-group">
                                                            <label>Descripcion del Articulo</label>
                                                            <input type="description" class="form-control form-control-registro" name="change_description" id="change_description" placeholder="descripcion...." value="<?php echo $Product['change_description'];?>" style="padding: 2rem 1rem;">
                                                        </div>
                                                </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-4">
                                        <div class="p-5">  
                                        <style type="text/css">
                                          #preview img{width: 50%;};
                                        </style> 

                                                <div class="form-group">
                                                    <div id="preview">
                                                      <?php if($Product['img']){?>
                                                        <img  src="<?php echo $Product['img'];?>">
                                                      <?php } ?>
                                                      
                                                    </div>
                                                          <label >Subir Imagen</label>
                                                                <div class="input-group mb-2">
                                                                     <input type="file" class="form-control" name="file" id="file" placeholder="C://Imga" value="">
                                                                     <div class="input-group-prepend">
                                                                         <div class="input-group-text">
                                                                             <a href="#" style="color:#4A4949;">
                                                                                    <i class="fa fa-fw fa-image"></i>
                                                                             </a>
                                                                         </div>
                                                                    </div>
                                                                </div>
                                                </div>
                               
                                                <div class="form-group">
                                                    <label>Tipo de venta</label>
                                                    <select class="form-control form-control-registro sale_type" name="sale_type" id="sale_type">
                                                        <option value="">Selecciona de la lista</option>
                                                        <option <?php if($Product['sale_type'] == 'Venta'){echo 'selected';} ?>>Venta</option>
                                                        <option <?php if($Product['sale_type'] == 'Intercambio'){echo 'selected';} ?>>Intercambio</option>
                                                        <option <?php if($Product['sale_type'] == 'Renta'){echo 'selected';} ?>>Renta</option>
                                                        <option <?php if($Product['sale_type'] == 'Venta/Intercambio'){echo 'selected';} ?>>Venta/Intercambio</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                        <label class="form-check-label" for="exampleCheck1">Renta</label>
                                                        <label >Precio</label>
                                                        <input type="text" class="form-control" name="price_rental" id="price_rental" placeholder="precio por renta" value="<?php echo $Product['price_rental'];?>">
                                                        <label >Tiempo</label>
                                                        <input type="text" class="form-control" name="time_rental" id="time_rental" placeholder="tiempo de renta" value="<?php echo $Product['time_rental'];?>">
                                                        <input type="hidden" name="imagen" value="<?php echo $Product['img'];?>">
                                                        <input type="hidden" name="product_idEdit" value="<?php echo $_GET['edit_product'];?>">
                                                        <input type="hidden" name="action" value="edit">
                                                         
                                                        
                                                    </div>
                                            </div>
                                        </div>               
                                </div> 
                                
                                    <a href="see_products.php" class="btn btn-secondary">Atras</a>                          
                                            
                                <button class="btn btn-primary">Guardar</button>
                         
                                   </form>

                                </div>
                                <br>
                          </div>
                        </div>
                 </div>
                <!--  end content -->
          
                <!-- /.container-fluid -->
            

                     <!-- End of Main Content -->

                      <!-- Footer -->
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

 <!-- Logout Debes iniciar secion para ofrecer articulo-->

 
<!-- Bootstrap core JavaScript-->
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

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
      $('#sale_type').change(function(){

          $('#change_category').attr('disabled',false); 
          $('#change_description').attr('disabled',false);
          $('#price_rental').attr('disabled',false);  
          $('#time_rental').attr('disabled',false);
          $('#price_sale').attr('disabled',false);   
        var sale_type = $(this).val();
        if(sale_type == 'Venta'){
          $('#change_category').attr('disabled',true); 
          $('#change_description').attr('disabled',true);
          $('#price_rental').attr('disabled',true);  
          $('#time_rental').attr('disabled',true);     
        }
        if(sale_type == 'Intercambio'){
          $('#price_rental').attr('disabled',true);  
          $('#time_rental').attr('disabled',true); 
          $('#price_sale').attr('disabled',true);  
        }
        if(sale_type == 'Renta'){
           $('#change_category').attr('disabled',true);
           $('#change_description').attr('disabled',true); 
           $('#price_sale').attr('disabled',true);   
           } 
           if(sale_type == 'Venta/Intercambio'){
           $('#price_rental').attr('disabled',true);
           $('#time_rental').attr('disabled',true);   
           } 
    });
           $('#sale_type').change();


 document.getElementById("file").onchange = function(e) { let reader = new FileReader(); 
          reader.readAsDataURL(e.target.files[0]);
          reader.onload = function(){ 
            let preview = document.getElementById('preview'), image = document.createElement('img'); 
          image.src = reader.result; preview.innerHTML = ''; preview.append(image); 
        }; 
      }




$('#productEdit').submit(function(e){
    e.preventDefault();

    var formData = new FormData(document.getElementById('productEdit')); 
    $.ajax({
        url: 'edit_product_engine.php', 
        type: "post", 
        dataType: "html", 
        data: formData, cache: false,
        contentType: false,
        processData: false 
    })
    .done(function(res){  

       Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'Se han guardados los cambios',
  showConfirmButton: false,
  timer: 5500
})
         setTimeout(function(){ window.location.href="see_products.php"; }, 1500); 
    });
});          


</script>