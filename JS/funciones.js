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
    infoProducto.precio = parseFloat(infoProducto.precio);
    console.log("precio leido: "+infoProducto.precio);
    console.log("precio leido: "+typeof infoProducto.precio);
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

        //console.log("cantidadLibro",infoProducto.cantidad);
        insertarProductoCarrito(infoProducto);
    
}
function insertarProductoCarrito(producto){

    var cantididad = parseInt (producto.cantidad);
    var precio =    parseFloat (producto.precio);
    var subtotal = cantididad*precio;
    console.log(subtotal);

    const row = document.createElement('tr');
    row.innerHTML=`
            <td></td>
            <td>
                <img src="${producto.imagen}" width=100>
            </td>
            <td>${producto.titulo}</td>
            <td>${producto.precio}</td>
            <td>${producto.cantidad}</td>
            <td>${ subtotal.toString().replace('.', ',')}</td>

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
    eliminarProductoLocalStorage(productoID,e);
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

function eliminarProductoLocalStorage(productoID,e){
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
            <td id="cantidadLibros">${producto.cantidad}</td>
            <td>${producto.precio}</td>
            <td>
                <a href="#" class="borrar-producto fas-fa-times.circle">
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
          });
    }else{
        location.href = "/View/carrito.php";
    }   
}


function cambiarCantidad(e){

    e.preventDefault();
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
                cargarLocalStorageFormulario();
                //location.reload();
                
            }
            if(e.target.classList.contains('aumentar-cantidad')){
                libroLS.cantidad +=1;
                console.log("aumentar... cantidad",libroLS.cantidad);
                localStorage.setItem('productos',JSON.stringify(librosLS));
                cargarLocalStorageFormulario();
                //location.reload();
                //se cargar los datos del usuario en los formularios..
                
            }   
        }
    });

}
