

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pago</title>
    <script src="https://www.paypal.com/sdk/js?client-id=ASKOaHndKEeNAZc1nlxlr8eDX2tM9p1gNNxdjkvH3_uhDjba0OUoxg8pdNBfIfMt3zhazB6-xsbpAymU&currency=EUR"></script>

</head>
<body> 

<div id="paypal-button-container"></div>


<script>
    paypal.Buttons({
        style:{
            color:"blue",
            shape: "pill",
            label: "pay",
        },

        createOrder: function (data,actions) {
            return actions.order.create({
                purchase_units:[{
                    amount:{
                        value:<?php echo $total ?>
                    }
                }]

            });
            
        },

        onApprove: function (data,actions){

            actions.order.capture().then(function(detalles){
                window.location.href="pagocompletado.php"

            });

        },

        onCancel: function(data){
            alert("pago cancelado")
        }


    }).render('#paypal-button-container');
</script>
 


    

    
   
    
</body>
</html>




