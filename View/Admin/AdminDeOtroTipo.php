<?php 
    error_reporting(E_ALL ^ E_NOTICE); 
    session_start();  
    if(isset($_SESSION['usuario'])): 
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    </head>
    <body>

        
    </body>
    </html>

<?php else:?>

<?php
    
    header('Location: http://localhost/EditorialOtroTipo/View/Admin/Login.php?r=4');
endif;
?>