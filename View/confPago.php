
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>
    <!-- Replace "test" with your own sandbox Business account app client ID -->
    <script src="https://www.paypal.com/sdk/js?client-id=AU0aGQ0AU9_WmJ61ilGeOiDQ5IYg-PUYXKlSYRg4npVwLtPr0XsQLVj7bXEbaZrfhl8EY5TuIPuUKM-n&commit=false"></script>
    <!-- Set up a container element for the button -->


    <script>
  
      //verificar si hay algún producto en el LS
 

    </script>

    <div id="paypal-button-container" style="display:block"></div>
    <script>
          
           if(localStorage.getItem('pagos') === null ){
            pagos = [];
          }else{
            pagos = JSON.parse(localStorage.getItem('pagos'));
          }
      paypal.Buttons({
        // Sets up the transaction when a payment button is clicked
        createOrder: (data, actions) => {
          return actions.order.create({
            purchase_units: [{
              amount: {
                value: pagos[2]// Can also reference a variable or function
              }
            }]
          });
        },
        // Finalize the transaction after payer approval
        onApprove: (data, actions) => {
          return actions.order.capture().then(function(orderData) {
            // Successful capture! For dev/demo purposes:
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
            transaction = orderData.purchase_units[0].payments.captures[0];

            //alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
            // When ready to go live, remove the alert and show a success message within this page. For example:
            if(transaction.status == "COMPLETED"){
              //guardar en BD
              const element = document.getElementById('paypal-button-container');
              element.innerHTML = '<h3>Gracias por su pago por favor finalice su compra!</h3>';
              datosEnvioU = [transaction.update_time,transaction.id,transaction.status];
              localStorage.setItem('datosCompra',JSON.stringify(datosEnvioU));
              activarBotonFinalizarCompra();
              clearstatcache();
            } 


          });
        }
      }).render('#paypal-button-container');
    </script>

  </body>
</html>




