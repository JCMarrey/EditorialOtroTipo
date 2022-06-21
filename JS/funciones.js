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
    })


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
    //verificar sí el libro existe
    let librosLS = obtenerProductosLocalStorage();
    let auxLibro;


    librosLS.forEach(function(libroLS,index){
        if(libroLS.id === infoProducto.id){
            //index = librosLS.indexOf(libroLS);
            //librosLS[index].cantidad += 1;
            infoProducto.cantidad = libroLS.cantidad; 
            infoProducto.cantidad += 1;
            auxLibro = libroLS.id;
            listaProductos.removeChild(listaProductos.childNodes[index]);
            librosLS.splice(index,1);
        }
    });
    //actualizamos LocalStorage
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
    row.innerHTML=`
            <td></td>
            <td>
                <img src="${producto.imagen}" width=100>
            </td>
            <td>${producto.titulo}</td>
            <td>${producto.precio}</td>
            <td>${producto.cantidad}</td>
            <td>${producto.precio= producto.precio*producto.cantidad}
            <td>
                <a href="#" class="borrar-producto fas-fa-times.circle">X
                    <p style="display:none"; id="idCarritoP">${producto.id}</p>
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
        location.href = "/View/compra.php";
    }   
}

function leerPDF(){
  console.log("clcik...");
  var url =  $('#btnLeerF').val();
  console.log(url);
}






/*

function buscarLibros(libros){
    $.ajax({
        url : 'busquedaLibros.php',
        type : 'POST',
        dataType : 'php',
        data : {libros: libros},
    })
    .done(function(resultado){

        $("#listaBusqueda").html(resultado);
    })
}*/

