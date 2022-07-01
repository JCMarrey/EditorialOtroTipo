<!DOCTYPE <!DOCTYPE html>
<html>

<?php  require_once("../common/head.php"); ?>

<body>

    <?php require_once("../common/header.php"); ?>

    <div class="grid">
        <div id="Contacto">
            <form  action="email.php" method="POST">

            
                <input class="texto12" type="text" id="nombreDestinatario" name="nombreDestinatario" value="Nombre">

                <input class="texto12" type="email" class="form-control" name="destinatario" id="destinatario" placeholder="ejemplo@gmail.com">

                <input class="texto12" class="form-control" type="text" id="asunto" name="asunto" placeholder="Asunto del correo electrónico">

                <input class="texto13" type="text"  class="form-control" id="contenido" name="contenido" placeholder="Escribe aquí..">
                <button id="boton2" class="btn btn-success" type="submit"><i class="fas fa-paper-plane"></i> Enviar</button>
            </form>
        </div>

        <div id="datoscontacto">

            <div id="titulo">
                <h1>Contacto</h1> <br>

                <ul>
                    <li>Editorial y Servicios

                    </li><br>
                    <li>T. (55) 5675 0240

                    </li><br>
                    <li>C. (55) 2959 4951

                    </li><br>
                    <li>Distribución y Ventas

                    </li><br>
                    <li>C. (55) 1473 2482

                    </li><br>
                    <li>contacto@deotrotio.mx

                </ul>


            </div>

        </div>


    </div>

    <?php require_once("../common/footer.php"); ?>

</body>

</html>