const listaCompra =  document.querySelector('#lista-compra tbody');
const carritoC = document.getElementById('tablacarrito'); /*carrito de de la parte de compras */
const procesarCompraBtn = document.getElementById('finalizar-compra');
const correo = document.getElementById('correo');
const nombreCliente = document.getElementById('nombreCliente');



let estadoSeleccionado = "Ciudad de Mexico";


cargarEventos();

function guardarDatosBDManual(){
    
    //vaciarLocalStorage(); //para vacíar listaProductos
    const datosUsuarios = obtenerDatosUsuarioLocalStorage();
    //const datosProductos = obtenerProductosLocalStorage();
    
    const productoLS = obtenerProductosLocalStorage();

    const datosPagos = obtenerDatosPagos();
   

    //procesarDatosCompra
    var date = new Date();
	var current_date = date.getFullYear()+"-"+(date.getMonth()+1)+"-"+ date.getDate();

    var fechaPago = current_date;
    var idPaypal = 0;
    var status = "PENDIENTE";

    var subtotal = datosPagos[0];
    var precioEnvio = datosPagos[1];
    var total = datosPagos[2];


    //procesarDatosUsuarios:
    var direccion = datosUsuarios[0];
    var delegacion = datosUsuarios[1];
    var pais = datosUsuarios[3];
    var estado = datosUsuarios[3];
    var cp = datosUsuarios[4];
    var metodoEnvio = datosUsuarios[5];
    var correo = datosUsuarios[6];
    var nombreCliente = datosUsuarios[7];
    var apellido = datosUsuarios[8];
    var telefono = datosUsuarios[9];
    
    //probar ajax
   var cantidadLibro;
   var idLibro;

   //función bien...
   productoLS.forEach(function(producto){
        cantidadLibro = producto.cantidad;
        idLibro = producto.id;
        $.post('procesarDatosBD.php',{
            cantidadLibro:cantidadLibro,
            idLibro:idLibro,
            fechaPago:fechaPago,
            idPaypal:idPaypal,
            status:status,
            subtotal:subtotal,
            precioEnvio:precioEnvio,
            total:total
        },
        function(data,estado){
            if(data!=null){
                alert("datos envíados...enviandoo"+data+"\nEstado: " + estado);
            }else{
                alert("error en el proceso...");
            }
        });
    });
    
    //ahora mandamos correo electrónico... con el pedido...
    console.log("entrando al correo...");
    $.post('emailPedidoDeposito.php',{
        //datos del libro
        datosLibro:JSON.stringify(productoLS),
        //datos usuario
        direccion:direccion,
        delegacion:delegacion,
        pais:pais,
        estado:estado,
        cp:cp,
        metodoEnvio:metodoEnvio,
        correo:correo,
        nombreCliente:nombreCliente,
        apellido:apellido,
        telefono:telefono,
        
        //datos pago
        fechaPago:fechaPago,
        idPaypal:idPaypal,
        status:status,
        subtotal:subtotal,
        precioEnvio:precioEnvio,
        total:total
    },
    function(data,estado){
        if(data!=null){
            alert("mandando por corrreo...."+ estado);
        }else{
            alert("error en el proceso...");
        }
    });    
    vaciarLocalStorage(); //para vacíar listaProductos

}

function guardarDatosBDPaypal(){

    //vaciarLocalStorage(); //para vacíar listaProductos
    const datosUsuarios = obtenerDatosUsuarioLocalStorage();
    //const datosProductos = obtenerProductosLocalStorage();

    const productoLS = obtenerProductosLocalStorage();

    const datosPagos = obtenerDatosPagos();
    const datosPaypal = obtenerDatosPaypal();

    //procesarDatosCompra
    var fechaPago = datosPaypal[0];
    var idPaypal = datosPaypal[1];
    var status = datosPaypal[2];

    console.log("datoss..",idPaypal);
    //procesarDatosPagos

    var subtotal = datosPagos[0];
    var precioEnvio = datosPagos[1];
    var total = datosPagos[2];


    //procesarDatosUsuarios:
    var direccion = datosUsuarios[0];
    var delegacion = datosUsuarios[1];
    var pais = datosUsuarios[3];
    var estado = datosUsuarios[3];
    var cp = datosUsuarios[4];
    var metodoEnvio = datosUsuarios[5];
    var correo = datosUsuarios[6];
    var nombreCliente = datosUsuarios[7];
    var apellido = datosUsuarios[8];
    var telefono = datosUsuarios[9];
    
    //probar ajax
   var cantidadLibro;
   var idLibro;

   //función bien...
   productoLS.forEach(function(producto){
        cantidadLibro = producto.cantidad;
        idLibro = producto.id;
        $.post('procesarDatosBD.php',{
            cantidadLibro:cantidadLibro,
            idLibro:idLibro,
            fechaPago:fechaPago,
            idPaypal:idPaypal,
            status:status,
            subtotal:subtotal,
            precioEnvio:precioEnvio,
            total:total
        },
        function(data,estado){
            if(data!=null){
                alert("datos envíados...enviandoo"+data+"\nEstado: " + estado);
            }else{
                alert("error en el proceso...");
            }
        });
    });
    
    //ahora mandamos correo electrónico... con el pedido...
    $.post('emailPedidoPaypal.php',{
        //cantidadLibro:cantidadLibro,
        //idLibro:idLibro,
          //procesarDatosUsuarios:

        //datos del libro

        datosLibro:JSON.stringify(productoLS),
        //datos usuario
        direccion:direccion,
        delegacion:delegacion,
        pais:pais,
        estado:estado,
        cp:cp,
        metodoEnvio:metodoEnvio,
        correo:correo,
        nombreCliente:nombreCliente,
        apellido:apellido,
        telefono:telefono,
        
        //datos pago
        fechaPago:fechaPago,
        idPaypal:idPaypal,
        status:status,
        subtotal:subtotal,
        precioEnvio:precioEnvio,
        total:total
    },
    function(data,estado){
        if(data!=null){
            alert("datos envíados...enviandoo"+data+"\nEstado: " + estado);
        }else{
            alert("error en el proceso...");
        }
    });    
    vaciarLocalStorage(); //para vacíar listaProductos

}

function eliminarProductoCompra(e){
    let producto, productoID;
    if(e.target.classList.contains('borrar-producto')){
        e.target.parentElement.parentElement.remove();
        producto = e.target.parentElement.parentElement;
        productoID = producto.querySelector('p').textContent;
    }
    eliminarProductoLocalStorageCompra(productoID,e);
}

function eliminarProductoLocalStorageCompra(productoID,e){
    e.preventDefault();
    let productosLS;
    productosLS = obtenerProductosLocalStorage();
    productosLS.forEach(function(productoLS,index){
        console.log("id de LS", productoLS.id);
        console.log("id de productoID",productoID);
        if(productoLS.id === productoID){
            productosLS.splice(index,1);
        }
    });
    localStorage.setItem('productos',JSON.stringify(productosLS));
    //actualizamos el localStorage

    let datosEnvioU = [];
    datosEnvioU = guardarDatosEnvio();
    calcularEnvio(datosEnvioU,e);
}

function procesarCompra(e){
    e.preventDefault();
    if(obtenerProductosLocalStorage().length === 0){
        swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Tu carrito esta vacío, agrega un producto por favor',
            time : 4000,
            showConfirmButton: true
          }).then(function(){
            window.location ="/View/Catalogo.php";
          });
    }else if(nombreCliente.value === '' || correo.value === ''){
        swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Llene todos los campos porfavor',
            time : 5000,
            showConfirmButton: true
          });
    }else{
        const cargandoGif = document.querySelector('#progreso');
        cargandoGif.style.display = 'block';

        const enviado = document.createElement('img');
        enviado.src = '/img/cargando.gif';
        enviado.style.display = 'block';
        enviado.width = '150';

        setTimeout(() => {
            cargandoGif.style.display='none';
            document.querySelector('#loaders').appendChild(enviado);
            
            setTimeout(() =>{

                enviado.remove();
                
                const botonP = document.getElementById('pagoPaypal');
                const botonM = document.getElementById('pagoManual');
                if(botonM.style.display == 'block'){
                    console.log("procesar sólo pago con déposito");
                    guardarDatosBDManual();
                }
                if(botonP.style.display == 'block'){
                    console.log("procesar pagoPaypal");
                    guardarDatosBDPaypal();
                }
                window.location ="/View/catalogo.php";

            },2000)
        },3000)

    }
}

function leerProductosLocalStorageCompra(){
    let productosLS;
    productosLS = obtenerProductosLocalStorage();
    productosLS.forEach(function(producto){
        
        var cantididad = parseInt (producto.cantidad);
        var precio =    parseFloat (producto.precio);
        var subtotal = cantididad*precio;
        console.log("producto...",producto.titulo);
        const row = document.createElement('tr');
        row.innerHTML=`
            <td>
                <img src="${producto.imagen}" width=100>
            </td>
            <td>${producto.titulo}</td>
            <td>${producto.precio}</td>
             <td>
                <a href="#" class="disminuir-cantidad fa-solid fa-circle-x" style="font-size:15px; color: black"> -
                    <p style="display:none";  id="idCarritoP">${producto.id}</p>
                </a>
            </td>          
            
            <td>
               <input class="form-control cantidad" id="cantidadLibros min="1" value=${cantididad}>    
            </td>
            <td>
                <a href="#" class="aumentar-cantidad fa-solid fa-circle-x" style="font-size:15px; color: black"> +
                    <p style="display:none";  id="idCarritoP">${producto.id}</p>
                </a>
            </td>      

            <td>${subtotal}</td>
            <td>
                <a href="#" class="borrar-producto fa-solid fa-circle-x" style="font-size:15px; color: black"> X
                    <p style="display:none";  id="idCarritoP">${producto.id}</p>
                </a>
            </td>
        `;
        listaCompra.appendChild(row);
        
    });
}


function cargarEventos(){
    
    document.addEventListener('DOMContentLoaded',leerProductosLocalStorageCompra());

    carritoC.addEventListener('click',(e)=>{
               eliminarProductoCompra(e);
               cambiarCantidad(e);     
    });

    //calcularTotal(estadoSeleccionado);

    procesarCompraBtn.addEventListener('click',(e) =>{
        procesarCompra(e);
    });

}




function obtenerDatosPagos(){
    if(localStorage.getItem('pagos') === null ){
       const pagos = [];
      }else{
        pagos = JSON.parse(localStorage.getItem('pagos'));
      }

    return pagos;
}
function obtenerDatosPaypal(){
    if(localStorage.getItem('datosCompra') === null ){
        const pagos = [];
       }else{
         datosCompra = JSON.parse(localStorage.getItem('datosCompra'));
     return datosCompra;
}







}
