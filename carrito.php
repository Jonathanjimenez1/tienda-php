<?php

session_start();

define("KEY", "hamburgesa");
define("COD", "AES-128-ECB");

$mensaje="";

if (isset($_POST["agregar"])) {
    switch ($_POST["agregar"]) {
        case 'carrito':
                  

              if (is_numeric( openssl_decrypt($_POST["id"], COD,KEY ))) {

                $id=openssl_decrypt($_POST["id"],COD,KEY );
                
                $mensaje.="OK ID CORRECTO ".$id ."</br>";

              } 
              
              else {

                    $mensaje.="upsss id incorrecto".$id;
                    
                }


                if (is_string( openssl_decrypt($_POST["nombre"], COD,KEY ))) {

                    $nombre=openssl_decrypt($_POST["nombre"],COD,KEY );
                    $mensaje.="OK nombre ".$nombre."</br>";;

                   
                    
                   
    
                  } else {
    
                        $mensaje.="upsss nombre incorrecto".$nombre; break;
                        
                    }
                  
                  



                    if (is_numeric( openssl_decrypt($_POST["cantidad"], COD,KEY ))) {

                        $cantidad=openssl_decrypt($_POST["cantidad"],COD,KEY );

                        $mensaje.="OK cantidad ".$cantidad ."</br>";;

                       
                        
                       
        
                      } 
                      
                      else {
        
                            $mensaje.="upsss cantidad incorrecto".$cantidad; break;
                            
                        }



                        if (is_numeric( openssl_decrypt($_POST["precio"], COD,KEY ))) {

                            $precio=openssl_decrypt($_POST["precio"],COD,KEY );
                            $mensaje .= " ok precio " . $precio ."</br>";
                           
                            
                           
            
                          } 
                          
                          else {
            
                                $mensaje.="upsss nombre incorrecto". $precio; break;
                                
                            }


                    if(!isset($_SESSION['carrito'])){
                        $producto=array(
                            "id"=>$id,
                            "nombre"=>$nombre,
                            "cantidad"=>$cantidad,
                            "precio"=>$precio,);

                            $_SESSION["carrito"] [0]=$producto;


                        }
                        else {

                            $idproductos=array_column($_SESSION["carrito"], "id");

                            if (in_array($id,$idproductos)) {
                                echo"el producto ya ha sido selecionado";
                            }  

                            else {
                                
                            



                            $numero=count($_SESSION['carrito']);

                            $producto=array(
                                "id"=>$id,
                                "nombre"=>$nombre,
                                "cantidad"=>$cantidad,
                                "precio"=>$precio);

                                $_SESSION["carrito"] [$numero]=$producto;}


                            

                        }

                        $mensaje=print_r($_SESSION, true);
                    



                
             
            


            break;

            case 'eliminar':
                if (is_numeric( openssl_decrypt($_POST["id"], COD,KEY ))) {

                    $id=openssl_decrypt($_POST["id"],COD,KEY );
                    
                    foreach($_SESSION["carrito"] as $indice=>$producto){

                        if ($producto["id"]==$id) {
                            unset($_SESSION["carrito"] [$indice]);
                            echo" elemento borrado ";
                        }

                    }
    
                  } 
                  
                  else {
    
                        $mensaje.="upsss id incorrecto".$id;
                        
                    }

                break;
        
        
    }
}

?>