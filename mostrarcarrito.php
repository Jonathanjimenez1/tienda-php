<?php 

include "config.php";
include "carrito.php";


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/carrito.css">
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

      <li> <a href="index.php"> Inicio</a></li>
      <li> <a href="index.php #catalogo"> Catalogo</a></li>
      


      </ul>


      </nav>

      <div class="carrito-login">
      
        <a href="login.php">  <span class="login"><i class="fa-solid fa-user"></i></span> </a> 
        <a href="mostrarcarrito.php"> <span class="login" >  <i class="fa-solid fa-cart-arrow-down"> </i>
         <?php echo (empty($_SESSION['carrito']))?0:count($_SESSION['carrito']); ?>  </span></a>

         
      </div>
</header>

<h3> Lista del carrito</h3>
 
<?php if (!empty($_SESSION["carrito"])) {?>

<table class="table">
    
    <tbody>
        <tr>
            <th width="40%">Descripcion</th>
            <th width="15%" class="text-center">Cantidad</th>
            <th width="20%" class="text-center" >Precio</th>
            <th width="20%" class="text-center">Total</th>
            <th width="5%" class="text-center">--</th>
        </tr>
        <?php $total=0;  ?>

        <?php foreach($_SESSION["carrito"] as $indice=>$producto){ ?>

        <tr>
            <td width="40%"class="text-center"> <?php echo $producto["nombre"]  ?></td>
            <td width="15%" class="text-center"><?php echo $producto["cantidad"]  ?></td>
            <td width="20%"class="text-center"><?php echo $producto["precio"]?> €</td>
            <td width="20%"class="text-center"><?php echo number_format($producto["precio"]*$producto["cantidad"],2); ?> €</td>
            <td width="5%">

            <form action="" method="post">

            <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto["id"], COD,KEY);?>" > 
             <button type="submit" name="agregar" value="eliminar" class="btn ">Eliminar</button>
        
            </form>
        
            </td>
        </tr>

        <?php $total=$total+($producto["precio"]*$producto["cantidad"]);?>

        <?php }?>


        


        <tr>
        
         <td colspan="3" > <span><h3>Total</h3></span></td>
         <td aling="right"><h3><?php echo number_format($total,2); ?> € </h3></td>
         <td></td>



        </tr>

        <tr>

           <td colspan="5">

          <form action="pagar.php" method="post">
               
           <div class="mb-3">
             <label for="" class="form-label"> Correo de contacto: </label>
             <input type="email" name="email" id="email" class="form-control" placeholder="Escriba su correo" required>
             <small id="helpId" class="text-muted">los detalles se enviaran a este correo</small>
           </div> <br>

           <button type="submit" name="btnaccion"> Proceder a pagar </button>
        
          </form>
         


          </td>


        </tr>
        
    </tbody>
</table>
<?php } else{ ?>

    <span class="mensaje"> <h4>No hay productos en el carrito</h4></span>


<?php }?>


<footer class="pie">

      creado por <span>  © Jonathan jimenez</span>

      </footer>

    


    <script src="javascript/responsive.js"></script>
    
</body>
</html>



