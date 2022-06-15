
const carrito = document.getElementById('carrito');
const productos = document.getElementById('lista-productos');
const listaProductos = document.querySelector('#lista-carrito tbody');
const vaciarCarritoBtn = document.getElementById('vaciar-carrito'); 
const verMas = document.getElementById('btnVermas');

cargarEventos();


function cargarEventos(){

    //se ejecuta cuando se presiona agregar carrito
    productos.addEventListener('click',(e) => {
       /* document.getElementById("carrito").classList.toggle('active');*/
            comprarProducto(e);
       
    });
    carrito.addEventListener('click',(e) =>{
        eliminarProducto(e);
    });

    vaciarCarritoBtn.addEventListener('click',(e) =>{
        vaciarCarrito(e);
    });
}

function comprarProducto(e){
    /*e.preventDefault();*/
    if(e.target.classList.contains('agregar-producto-c')){
        const producto = e.target.parentElement.parentElement;
        //enviamos el producto seleccionado para tomar sus datos
        console.log(producto);
        leerDatosProductos(producto);
    }
}

//Leer datos del producto
function leerDatosProductos(producto){
    //nuevo objeto para cargar producto a la tabla..
    const infoProducto = {
        imagen : producto.querySelector('img').src,
        titulo: producto.querySelector('h5').textContent,
        precio: producto.querySelector('span').textContent,
        id : producto.querySelector('li').textContent,
        cantidad: 1
    }
    console.log(infoProducto)
    insertarProductoCarrito(infoProducto);
}
function insertarProductoCarrito(producto){
    const row = document.createElement('tr');
    row.innerHTML=`
        <td></td>
        <td>
            <img src="${producto.imagen}" width=100>
        </td>
        <td>${producto.titulo}</td>
        <td>${producto.precio}</td>
        <td>
            <a href="#" class="borrar-producto fas-fa-times.circle">X
                <p style="display:none";>${producto.id}</p>
            </a>
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
   
}
function vaciarCarrito(e){
    e.preventDefault();
    while(listaProductos.firstChild){
        listaProductos.removeChild(listaProductos.firstChild);

    }
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
    console.log("idRecibido...",productoID);
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

