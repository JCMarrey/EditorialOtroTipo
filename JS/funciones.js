const carrito = document.getElementById('carrito');
const productos = document.getElementById('lista-productos');
const listaProductos = document.querySelector('#lista-carrito tbody');
const vaciarCarritoBtn = document.getElementById('vaciar-carrito'); 
const verMas = document.getElementById('btnVermas');
const procesarPedidoBtn= document.getElementById('procesar-pedido');



cargarEventos();


function cargarEventos(){

    //se ejecuta cuando se presiona agregar carrito
    productos.addEventListener('click',(e) => {
            comprarProducto(e);
       
    });
    carrito.addEventListener('click',(e) =>{
        eliminarProducto(e);
    });

    vaciarCarritoBtn.addEventListener('click',(e) =>{
        vaciarCarrito(e);
    });

    document.addEventListener('DOMContentLoaded',leerProductosLocalStorage());

    procesarPedidoBtn.addEventListener('click',(e)=>{
                procesarPedido(e);
    });


}

function comprarProducto(e){
    /*e.preventDefault();*/
    if(e.target.classList.contains('agregar-producto-c')){
        const producto = e.target.parentElement.parentElement;
        //enviamos el producto seleccionado para tomar sus datos
        leerDatosProductos(producto);
    }
}

//Leer datos del producto
function leerDatosProductos(producto){
    //nuevo objeto para cargar producto a la tabla..
    console.log(producto);
    const infoProducto = {
        imagen : producto.querySelector('img').src,
        titulo: producto.querySelector('h5').textContent,
        precio: producto.querySelector('span').textContent,
        id : producto.querySelector('li').textContent,
        pesoLibro: producto.querySelector('h2').textContent,
        cantidad: 1
    }
    //verificar sí el libro existe
    let librosLS = obtenerProductosLocalStorage();
    let auxLibro;


    librosLS.forEach(function(libroLS,index){
        if(libroLS.id === infoProducto.id){
            infoProducto.cantidad = libroLS.cantidad; 
            infoProducto.cantidad += 1;
            auxLibro = libroLS.id;
            listaProductos.removeChild(listaProductos.childNodes[index]);
            librosLS.splice(index,1);
        }
    });
    localStorage.setItem('productos',JSON.stringify(librosLS));

    if(auxLibro === infoProducto.id){
        //console.log("cantidadLibro",infoProducto.cantidad);
        insertarProductoCarrito(infoProducto);
        //leerProductosLocalStorage();
    }else{
        insertarProductoCarrito(infoProducto);
    }
    
}
function insertarProductoCarrito(producto){

    const row = document.createElement('tr');
    const subTotal = (parseFloat(producto.precio)) * (parseFloat(producto.cantidad));
    console.log(subTotal);
    row.innerHTML=`
            <td></td>
            <td>
                <img src="${producto.imagen}" width=100>
            </td>
            <td>${producto.titulo}</td>
            <td>${producto.precio}</td>
            <td>${producto.cantidad}</td>
            <td>${subTotal}</td>
            
            <td>
                
                    <i class="fa-solid fa-x"></i>
                    <p style="display:none"; id="idCarritoP">${producto.id}</p>
                
            </td>

    `; 
    listaProductos.appendChild(row);
    guardarProductosLocalStorage(producto);
}   


function eliminarProducto(e){
    let producto, productoID;
    if(e.target.classList.contains('borrar-producto')){
        e.target.parentElement.parentElement.remove();
        producto = e.target.parentElement.parentElement;
        productoID = producto.querySelector('p').textContent;
    }
    eliminarProductoLocalStorage(productoID);
   calcularTotal();
}

function vaciarCarrito(e){
    e.preventDefault();
    while(listaProductos.firstChild){
        listaProductos.removeChild(listaProductos.firstChild);

    }
    vaciarLocalStorage();
    return false;

}

//si hay producto los debe agregar...
function obtenerProductosLocalStorage(){
    let productoLS;

    //verificar si hay algún producto en el LS
    if(localStorage.getItem('productos') === null ){
        productoLS = [];
    }else{
        productoLS = JSON.parse(localStorage.getItem('productos'));
    }
    return productoLS;
}

function guardarProductosLocalStorage(producto){
    let productos = [];
    productos=obtenerProductosLocalStorage();
    productos.push(producto);
    localStorage.setItem('productos',JSON.stringify(productos));

}

function eliminarProductoLocalStorage(productoID){
    let productosLS;
    productosLS = obtenerProductosLocalStorage();
    productosLS.forEach(function(productoLS,index){
        console.log("id de LS", productoLS.id);
        console.log("id de productoID",productoID);
        if(productoLS.id === productoID){
            productosLS.splice(index,1);
        }
    });
    //actualizamos el localStorage
    localStorage.setItem('productos',JSON.stringify(productosLS));
}

function leerProductosLocalStorage(){
    let productosLS;
    productosLS = obtenerProductosLocalStorage();
    productosLS.forEach(function(producto){
        const row = document.createElement('tr');
        row.innerHTML=`
            <td></td>
            <td>
                <img src="${producto.imagen}" width=100>
            </td>
            <td>${producto.titulo}</td>
            <td>${producto.precio}</td>
            <td>${producto.cantidad}</td>
            <td>${producto.precio}</td>
            <td>
                <a href="#" class="borrar-producto fas-fa-times.circle">X
                    <p style="display:none";  id="idCarritoP">${producto.id}</p>
                </a>
            </td>
        `;
        listaProductos.appendChild(row);
    });
}

function vaciarLocalStorage(){
    localStorage.clear();
}

function leerPDF(){
    console.log("clcik...");
    var url =  $('#btnLeerF').val();
    console.log(url);
  }

function procesarPedido(e){
    e.preventDefault();

    if(obtenerProductosLocalStorage().length === 0){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Tu carrito esta vacío, agrega un producto por favor',
            time : 2000,
            showConfirmButton: false
          })
    }else{
        location.href = "/EditorialOtroTipo/View/carrito.php";
    }   
}

function calcularTotal(estadoSeleccionado){

    $estado = estadoSeleccionado;
    console.log("estado..",$estado);

    let productosLS;
    let total = 0, subtotal = 0, pesoEnvio = 200;
    let precioEnvio = 0 ;
    productosLS = obtenerProductosLocalStorage();
    for(let i = 0 ; i < productosLS.length; i++){
        let subtotalProducto = Number(productosLS[i].precio * productosLS[i].cantidad);
        subtotal = subtotal + subtotalProducto;
        pesoEnvio += Number(productosLS[i].pesoLibro*productosLS[i].cantidad); 
        console.log(pesoEnvio);
    }
   /* if(pesoEnvio === 200){
        precioEnvio = 0;
    }
    else if(pesoEnvio >=1000  && $estado === 'Ciudad de Mexico'){
        console.log("límite de libros---");
        precioEnvio = 300;
    }else if(pesoEnvio <1000  && $estado === 'Ciudad de Mexico'){
        precioEnvio = 200;; //si es menor a 5000 el peso de envío la tarifa estándar será de 120;
    }else if(pesoEnvio >=1000  && $estado != 'Ciudad de Mexico' ){
        precioEnvio = 500;
    }else if(pesoEnvio <1000  && $estado != 'Ciudad de Mexico'){
        precioEnvio = 400;
    }*/

    if(pesoEnvio === 200){
        precioEnvio = 0;
    }else{
        if($estado == 'Ciudad de Mexico'){
            if(pesoEnvio >=1000){
                precioEnvio = 300;
            }else{
                //el peso es menor  a 1000
                precioEnvio = 200;;
            }
        }else{
            if(pesoEnvio >=1000){
                precioEnvio = 500;
            }else{
                //el peso es menor  a 1000
                precioEnvio = 400;
            }
        }   

    }

    console.log("precioEnvio..",precioEnvio);
    total =  precioEnvio + subtotal;
    console.log("total..",total);
    document.getElementById('subtotal').innerHTML = "$/ "+subtotal;
    document.getElementById('costoEnvio').innerHTML = "$/  "+precioEnvio;
    document.getElementById('totalEnvio').innerHTML = "$/ "+total;
}

function cambiarCantidad(e){

    let librosLS = obtenerProductosLocalStorage();
    let auxLibro;
    let producto = e.target.parentElement.parentElement;
    let productoID = producto.querySelector('p').textContent;

    librosLS.forEach(function(libroLS,index){
        if(libroLS.id === productoID){
            if(e.target.classList.contains('disminuir-cantidad')){
                console.log("disminuir... cantidad",libroLS.cantidad);
                //auxLibro = libroLS[index];
                libroLS.cantidad -=1;
                console.log("disminuir... cantidad",libroLS.cantidad);
                
                localStorage.setItem('productos',JSON.stringify(librosLS));
                location.reload();
                
            }
            if(e.target.classList.contains('aumentar-cantidad')){
                libroLS.cantidad +=1;
                console.log("aumentar... cantidad",libroLS.cantidad);
                localStorage.setItem('productos',JSON.stringify(librosLS));
                location.reload();
            }   
        }
    });

}
