
const carrito = document.getElementById('carrito');
const productos = document.getElementById('btnComprar');
const listaProductos = document.querySelector('#lista-carrito tbody');


cargarEventos();


function cargarEventos(){
    //se ejecuta cuando se presioa agregar carrito
    productos.addEventListener('click',(e) => {
       /* document.getElementById("carrito").classList.toggle('active');*/
        comprarProducto(e);
        
    });
    carrito.addEventListener('click',(e) =>{
        eliminarProducto(e);
    });
}

function comprarProducto(e){
    e.preventDefault();
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
        id: document.getElementById('producto-id').textContent,
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
            <a href="#" class="borrar-producto fas-fa-times.circle data-id ="${producto.id}">X</a>
        </td>
    `;
    listaProductos.appendChild(row);
}    

}