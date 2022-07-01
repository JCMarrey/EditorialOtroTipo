const botonForm1 = document.getElementById('botonEnviar');
const botonForm2 = document.getElementById('btnContinuarEnvio');
let datosF1 = [];

cargarEventos();

function cargarEventos(){
    botonForm1.addEventListener('click',(e) =>{
    datosF1 = guardarDatos1(e);
    console.log(datosF1[0]);
    });

    botonForm2.addEventListener('click',(e)=>{
    datosF1 = datosF1.concat(guardarDatos2(e));
    console.log(datosF1);
    });
}

function guardarDatos1(e){
    $correo = $('#correo').val();
    $nombreCliente = $('#nombreCliente').val();
    $apellido = $('#apellido').val();
    $telefono = $('#telefono').val();
    let arreglo = [$correo,$nombreCliente,$apellido,$telefono];
    return arreglo;
}

function guardarDatos2(e){
    $direccion = $('#direccion').val();
    $delegacion = $('#delegacion').val();
    $pais = $('#pais').val();
    $estado = $('#estado').val();
    $cp = $('#cp').val();
    $metodoEnvio = $('#metodoEnvio').val();
    calcularTotal($estado);
        
    let arreglo = [$direccion,$delegacion,$pais,$estado,$cp,$metodoEnvio];
    return arreglo;
}
