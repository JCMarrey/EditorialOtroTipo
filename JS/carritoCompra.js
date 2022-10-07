const btnCalcularEnvio = document.getElementById('btnCalcularEnvio');


let datosEnvioU = [];

cargarEventos();

function cargarEventos(){
    btnCalcularEnvio.addEventListener('click',(e) =>{

        //verificar si hay productos en el carrito, si no mandar notificación....
        if(obtenerProductosLocalStorage().length === 0){
            /*Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Tu carrito esta vacío, agrega un producto para cotizar envío por favor',
                time : 4000,
                showConfirmButton: true
              }).then(function(){
                window.location ="/View/Catalogo.php";
              });*/
              console.log("carritoVacío");
        }else{
            datosEnvioU = guardarDatosEnvio();
            guardarDatosEnvioLocalStorage(datosEnvioU);
            calcularEnvio(datosEnvioU,e);
        }
       
    });
}

function guardarDatosEnvio(){
    $correo = $('#correo').val();
    $nombreCliente = $('#nombreCliente').val();
    $apellido = $('#apellido').val();
    $telefono = $('#telefono').val();
    $direccion = $('#direccion').val();
    $delegacion = $('#delegacion').val();
    $pais = $('#pais').val();
    $estado = $('#estado').val();
    $metodoEnvio = $('#metodoEnvio').val();
    $cp = $('#cp').val();

    let arreglo = [$direccion,$delegacion,$pais,$estado,$cp,$metodoEnvio,$correo,$nombreCliente,$apellido,$telefono];
    
    return arreglo;
}

function calcularEnvio(datosEnvioU,e){
    console.log("los datos del  usuario son:", datosEnvioU);
    let productosLS = [];
    productosLS = obtenerProductosLocalStorage();
    console.log("productosLS",productosLS);

    let pesoEnvio, alturaEnvio, anchoEnvio,largoEnvio;
    pesoEnvio = 200;

    let datosApi = `{
        "zip_from": "16020", 
        "zip_to": "000", 
        "parcel": { 
            "weight": "1.423", 
            "height": "40", 
            "width": "30", 
            "length": "50" 
        }, 
        "carriers":  
            [   {"name": "Fedex"},
                {"name": "UPS"},
                {"name": "Paquetexpress"},
                {"name": "Sendex"},
                {"name": "Carssa"},
                {"name": "Quiken"},
                {"name": "Tracusa"},
                {"name": "Dostavista"},
                {"name": "AMPM"},
                {"name": "Ninetynineminutes"},
                {"name": "Mensajerosurbanos"},
                {"name": "Moova"},
                {"name": "Uber"},
                {"name": "Dliver"},
                {"name": "Zubut"},
                {"name": "Treggo"},
                {"name": "Chazki"},
                {"name": "Estafeta"},
                {"name": "Redpack"}
            ]

    }`;        
    console.log (typeof datosApi);

    //parseo para manipular los atributos del objeto JSO

    const datosJson = JSON.parse(datosApi);
    console.log (typeof datosJson);

    //si no hay elementos entonces se mandan 0,0,0 dimensiones

    if(productosLS.length === 0){
          calcularTotalSinEnvio();
    }else{

        for(let i = 0 ; i < productosLS.length; i++){
            let subtotalProducto = Number(productosLS[i].precio * productosLS[i].cantidad);
            subtotal = subtotal + subtotalProducto;
            pesoEnvio += Number(productosLS[i].pesoLibro*productosLS[i].cantidad); 
        }
        console.log("pesoTotalEnvio",pesoEnvio);

            //modificación paquete  //se modifico la propiedad...
        datosJson.zip_to = datosEnvioU[4];
        //datosJson.weight  = pesoEnvio;
        datosJson.height = 40 ;
        datosJson.width = 30;
        datosJson.length = 50;
        //faltan estos últimos 3 datos..
        datosJson.weight  =  (pesoEnvio/1000);

        console.log(datosJson);

    //parseamos de nuevo a cadena para mandar por petición ajax..
        const datosEnvio = JSON.stringify(datosJson);

        $.ajax({
        url: 'https://api.skydropx.com/v1/quotations/',
        beforeSend: function (xhr) {
            console.log("Entro");
            xhr.setRequestHeader ( "Authorization", "Token token=0DlPnjVUYq24lXB7ZOFF4zzawwO8GwC1j1LQFEdXMKst");
        },
        method: 'post',
        dataType: 'json',
        contentType: 'application/json',
        //data: '{ "zip_from": "10350", "zip_to": "03400", "parcel": { "weight": "1", "height": "10", "width": "10", "length": "10" }, "carriers":  [ {"name": "Fedex"},{"name": "UPS"},{"name": "Paquetexpress"},{"name": "Sendex"},{"name": "Carssa"},{"name": "Quiken"},{"name": "Tracusa"},{"name": "Dostavista"},{"name": "AMPM"},{"name": "Ninetynineminutes"},{"name": "Mensajerosurbanos"},{"name": "Moova"},{"name": "Uber"},{"name": "Dliver"},{"name": "Zubut"},{"name": "Treggo"},{"name": "Chazki"},{"name": "Estafeta"},{"name": "Redpack"}] }',
        data : datosEnvio,
        error: function(e){
            console.log(e.status);
            console.log(e.statusText);
            },
            }).done(function(data){
            console.log("Salio");
            console.log(data);
            //se manda de los 2 mejores proveedores ya sea xpress o standar.
            console.log("Tipo de cotización",typeof data);
            var carriers;    
            var encontrado = false;
            var i = 0;
        
            if(datosEnvioU[5] == "STANDARD"){
                while(encontrado != true){
                    if(data[i].service_level_name == "Regular" || data[i].service_level_name == "STANDARD" || data[i].service_level_name == "Nacional"){
                        carriers = data[i];
                        encontrado = true;
                    }
                    i ++;
                }
            }else{ //envío express DIA_SIGUIENTE
        
                while(encontrado != true){
                    if((data[i].service_level_name == "Día siguiente" || data[i].service_level_name == "Ecoexpress" || data[i].service_level_name == "Express" || data[i].service_level_name == "ESTAFETA_STANDARD")){
                        carriers = data[i];
                        encontrado = true;
                    }
                    i ++;
                }
            }
            console.log("el envío selecionado es: ",datosEnvioU[5]);
            console.log("envío correspondiente: ",carriers);
            calcularTotal(carriers,e,datosEnvioU);
        });
    }
}

function guardarDatosEnvioLocalStorage(datosEnvioU){
    localStorage.setItem('datosUsuario',JSON.stringify(datosEnvioU));
}
function obtenerDatosUsuarioLocalStorage(){
        let datosUsuario;
    
        //verificar si hay algún producto en el LS
        if(localStorage.getItem('datosUsuario') === null ){
            datosUsuario = [];
        }else{
            datosUsuario = JSON.parse(localStorage.getItem('datosUsuario'));
        }
        console.log("datosUusario LS",datosUsuario);
        return datosUsuario;   
}

function cargarLocalStorageFormulario(){
    location.reload();
    let datosUsuario = obtenerDatosUsuarioLocalStorage();
    document.getElementById('direccion').innerHTML =datosUsuario[0];
    document.getElementById('delegacion').innerHTML =datosUsuario[1];
    document.getElementById('pais').innerHTML =datosUsuario[2];
    document.getElementById('estado').innerHTML =datosUsuario[3];
    document.getElementById('cp').innerHTML =datosUsuario[4];
    document.getElementById('metodoEnvio').innerHTML =datosUsuario[5];
    document.getElementById('correo').innerHTML =datosUsuario[6];
    document.getElementById('nombreCliente').innerHTML =datosUsuario[7];
    document.getElementById('apellido').innerHTML =datosUsuario[8];
    document.getElementById('telefono').innerHTML =datosUsuario[9];
    //location.reload();
}

function datosEnvio(){
    let productosLS;
    let subtotal = 0;
    productosLS = obtenerProductosLocalStorage();

    for(let i = 0 ; i < productosLS.length; i++){
        let subtotalProducto = Number(productosLS[i].precio * productosLS[i].cantidad);
        subtotal = subtotal + subtotalProducto;
    }
    return subtotal;
}

function calcularTotal(cotizacionEnvio,e){

        e.preventDefault();
        console.log("Tipo de cotización",typeof cotizacionEnvio);
        var costoEnvio = Number(cotizacionEnvio.amount_local);
        let subtotal = datosEnvio();
        let total = costoEnvio + subtotal;
        document.getElementById('subtotal').innerHTML = "$/ "+ subtotal;
        document.getElementById('costoEnvio').innerHTML = "$/  "+ costoEnvio;
        document.getElementById('totalEnvio').innerHTML = "$/ "+total;

        let pagos = [subtotal,costoEnvio,total];

        localStorage.setItem("pagos",JSON.stringify(pagos));

        const boton = document.getElementById('paypal-button-container');
        boton.style.display = 'block';
       
}
function calcularTotalSinEnvio(){
        let costoEnvio = 0 ;
        let subtotal  = datosEnvio();
        let total = costoEnvio + subtotal;
        document.getElementById('subtotal').innerHTML = "$/ "+ subtotal;
        document.getElementById('costoEnvio').innerHTML = "$/  "+ 0 ;
        document.getElementById('totalEnvio').innerHTML = "$/ "+ total;
}



