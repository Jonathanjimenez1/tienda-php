 
 <?php

 include "carrito.php";

 include "config.php";

 include "conexion.php";

 

 session_destroy();
 
 ?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <script src="https://kit.fontawesome.com/91cc2bfe23.js" crossorigin="anonymous"></script>
    <title>pago completado</title>
</head>
<body>

<header>

<div class="logo"> <span>Tienda online</span></div>

<div id="hamburgesa">
  <i  class="fa-solid fa-bars" ></i> 
 </div>


   
 
    <nav>
        <ul> 

            <li> <a href="#"> Inicio</a></li>
            <li> <a href="#catalogo"> catálogo</a></li>
        


        </ul>
    </nav>

 

    <div class="carrito-login">
    
        <a href="login.php">  <span class="login"><i class="fa-solid fa-user"></i></span> </a> 
        <a href="mostrarcarrito.php"> <span class="login" >  <i class="fa-solid fa-cart-arrow-down"> </i>
        <?php echo (empty($_SESSION['carrito']))?0:count($_SESSION['carrito']); ?>  </span></a>

        
    </div>


 


</header> <br>



    <h1>Su compra ha sido realiza correctacmente</h1>

      <p class="centrar"> se la ve a redirigir a la ventana de inicio</p>


      

  <script type="text/javascript">
   
   setTimeout( function() { window.location.href = "index.php"; }, 3000 );
    </script>


     


    

      

    <script src="javascript/responsive.js"></script>
</body>
</html>