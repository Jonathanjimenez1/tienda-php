<?php

include "config.php";

include "conexion.php";

include "carrito.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <script src="https://kit.fontawesome.com/91cc2bfe23.js" crossorigin="anonymous"></script>

    <title>Document</title>
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


      


    </header>

    <div class="alerta"><H5>Esto no es una tienda real</H5></div>

    <p class="alerta-p">Se trata de un proyecto personal para llevar a la practica mis conocimientos adqueridos <br>
     la pagina es totalmente funcional con pasarela de pago, regristo de usuarios...etc <br>
      pero los productos son totalmente fictios.
    </p>

    <div class="slider">

     <ul>
      <li> <img src="imagenes/gafas.jpg" alt="gafas"> </li>
      <li> <img src="imagenes/reloj.jpg" alt="reloj"> </li>
      <li> <img src="imagenes/zapatillas.jpg" alt="zapatillas"></li>


     </ul>


    </div>

     
    
       
     

     


    <div class="alerta"><H5>catálogo</H5></div>
    
    <div class="mensaje">

      <a href="mostrarcarrito.php"> ver carrito</a>


     </div> 

      

     
       <?php 
       $sentencia=$pdo->prepare("SELECT * FROM `productos`");
       $sentencia->execute();
       $lista=$sentencia->fetchALL(PDO::FETCH_ASSOC);

       

       
       
       ?>
       
       

       

       

      

       
       

       

      <?php foreach ($lista as $producto) 
        

        

        



        
       { ?>  

        <section class="articulos" id="catalogo">


        

        <article id="articulo2">

          

         <h3><?php echo $producto["nombre"] ?></h3>

         <?php echo '<img src="data:image;base64,'.base64_encode($producto['imagenes']).'">'; ?>
           
  
          <p class="precio"> €<?php echo $producto["precio"] ?> </p>

         <form action="" method="post">

          <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto["id"], COD,KEY);?>" > 
         <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto["nombre"], COD,KEY);?>"  > 
         <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($producto["precio"], COD,KEY);?>" > 
         <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1,COD,KEY);?>">

         <button class="boton-articulo" name="agregar" value="carrito"> Agregrar  <i class="fa-solid fa-cart-arrow-down"></i>  </button>


          </form>
        </article>


        
 



      

          
          


          


          

         </section>
    
    
      
       
       
            
      

       
       
       <?php  } ?>


   
   

     <footer class="pie">

      creado por <span>  © Jonathan jimenez</span>

      </footer>

    


    <script src="javascript/responsive.js"></script>
</body>
</html>