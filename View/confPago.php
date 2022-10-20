
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Add meta tags for mobile and IE -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title> PayPal Checkout Integration | Client Demo </title>
</head>

<body>
  <script>
    /*var pagos;
    if(localStorage.getItem('pagos') === null ){
            pagos = [];
    }else{
      pagos = JSON.parse(localStorage.getItem('pagos'));
    }*/
    function obtenerPagoPaypal(){
      const totalPago = document.getElementById('totalEnvio').innerHTML;
      return totalPago;
    }


  </script>
    <!-- Set up a container element for the button -->
    <div id="paypal-button-container"></div>

    <!-- Include the PayPal JavaScript SDK -->
    <script src="https://www.paypal.com/sdk/js?client-id=Ab-hQShOOyOmN3HqPITj6ttzrnWPReFYPIMSeji_hC1X23QAnZl_fYjPQ6n8lriMw0JOn3e3MR0FhtVA&currency=MXN"></script>

    <script>
        // Render the PayPal button into #paypal-button-container
        paypal.Buttons({

          //const totalPago = document.getElementById('totalEnvio').innerHTML;

            // Set up the transaction
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: obtenerPagoPaypal() //'5' //pagos[2]
                        }
                    }]
                });
            },

            // Finalize the transaction
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(orderData) {
                    // Successful capture! For demo purposes:
                    console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                    var transaction = orderData.purchase_units[0].payments.captures[0];
                    // alert('Transaction '+ transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');

                    // Replace the above to show a success message within this page, e.g.
                    // const element = document.getElementById('paypal-button-container');
                    // element.innerHTML = '';
                    // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                    // Or go to another URL:  actions.redirect('thank_you.html');
                    const element = document.getElementById('paypal-button-container');
                    element.innerHTML = '<h3>Gracias por su pago por favor finalice su compra!</h3>';
                    datosEnvioU = [transaction.update_time,transaction.id,transaction.status];
                    localStorage.setItem('datosCompra',JSON.stringify(datosEnvioU));
                    activarBotonFinalizarCompra();
                    clearstatcache();
                });
            }


        }).render('#paypal-button-container');
    </script>
</body>

</html>