<?php
include "carrito.php";

include "config.php";

include "conexion.php";




?>

 <!DOCTYPE html>
 <html lang="es">
 <head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
  <script src="https://kit.fontawesome.com/91cc2bfe23.js" crossorigin="anonymous"></script>
  
 <title>Pago completado</title>
 </head>
 <body>

 <header>

  <div class="logo"> <span>Tienda online</span></div>

  <div id="hamburgesa">
  <i  class="fa-solid fa-bars" ></i> 
 </div>

  <nav>
      
    

    <ul> 

    <li> <a href="index.php"> Inicio</a></li>
    <li> <a href=" index.php #catalogo"> catálogo</a></li>
    


    </ul>


  </nav>

  <div class="carrito-login">
  
    <a href="login.php">  <span class="login"><i class="fa-solid fa-user"></i></span> </a> 
    <a href="mostrarcarrito.php"> <span class="login" >  <i class="fa-solid fa-cart-arrow-down"> </i>
      <?php echo (empty($_SESSION['carrito']))?0:count($_SESSION['carrito']); ?>  </span></a>

      
  </div>


 


</header> 
  

    <h1> Paso final para realizar su pedido </h1>

    
    
  <div class="pagar">


    


    <?php 

      if ($_POST) {

        $total=0;

        $SID=session_id();

        $correo=$_POST["email"];

        foreach($_SESSION['carrito'] as $indice=>$producto){

          $total=$total+($producto["precio"]*$producto["cantidad"]);





        }

        $sentencia=$pdo->prepare("INSERT INTO `ventas` (`id`, `clave`, `paypaldatos`, `fecha`, `correo`, `total`, `status`)
         VALUES (NULL, :clavetransacion, '', now(), :correo, :total , 'pendiente');");
          

          $sentencia ->bindParam(":clavetransacion", $SID);
          $sentencia ->bindParam(":correo", $correo);
          $sentencia ->bindParam(":total", $total);
          $sentencia->execute();
          $idventa=$pdo->lastInsertID();




         

      


      }

    ?> <br>
    
    <p> Estas a punto de pagar con paypal la cantidad:

     <h4><?php echo number_format($total,2)."€" ;?></h4> 
     
     
    
    
    </p>  


    <?php include "pago.php" ?>
    <div id="paypal-button-container"></div>


     




  
    
      

    
    
     



     <p>El pedido se completara una vez que se procese el pago. </p><br>


     <p>para cualquier duda que le pueda ocurrir durante el proceso de pago escribanos para poder resolver su duda. </p><br>

     <p> <a href="mailto:Jonathanweb@outlook.es">Enviar email <i class="fa-solid fa-envelopes-bulk"></i> </a> </p>

     <h2>¡OJO¡ como anteriormente se ha dicho esto no es una tienda real, <br>
         esta pagina esta dedicada a poner en practica conocmientos adqueridos <br>

          

  
    
    </h2>



  </div>

      


  
  

  <footer class="pie">

      creado por <span>  © Jonathan jimenez</span>

      </footer>

    


    <script src="javascript/responsive.js"></script>
 </body>
 </html>







 