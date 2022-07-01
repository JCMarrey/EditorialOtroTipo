const listaCompra =  document.querySelector('#lista-compra tbody');
const carritoC = document.getElementById('tablacarrito'); /*carrito de de la parte de compras */
const procesarCompraBtn = document.getElementById('finalizar-compra');
const correo = document.getElementById('correo');
const nombreCliente = document.getElementById('nombreCliente');



let estadoSeleccionado = "Ciudad de Mexico";


cargarEventos();

function cargarEventos(){
    
    console.log(estadoSeleccionado);
    document.addEventListener('DOMContentLoaded',leerProductosLocalStorageCompra());

    carritoC.addEventListener('click',(e)=>{
               eliminarProducto(e);
               cambiarCantidad(e);     
    });

    calcularTotal(estadoSeleccionado);

    procesarCompraBtn.addEventListener('click',(e) =>{
        procesarCompra(e);
    });

}

function leerProductosLocalStorageCompra(){
    let productosLS;
    productosLS = obtenerProductosLocalStorage();
    productosLS.forEach(function(producto){
        console.log("producto...",producto.titulo);
        const row = document.createElement('tr');
        row.innerHTML=`
            <td>
                <img src="${producto.imagen}" width=100>
            </td>
            <td>${producto.titulo}</td>
            <td>${producto.precio}</td>
             <td>
                <a href="#" class="disminuir-cantidad fa-solid fa-circle-x" style="font-size:30px">-
                    <p style="display:none";  id="idCarritoP">${producto.id}</p>
                </a>
            </td>          
            </td>
            <td>
               <input class="form-control cantidad" min="1" value=${producto.cantidad}>    
            <td>
            <td>
                <a href="#" class="aumentar-cantidad fa-solid fa-circle-x" style="font-size:30px">+
                    <p style="display:none";  id="idCarritoP">${producto.id}</p>
                </a>
            </td>      

            <td>${producto.cantidad*producto.precio}</td>
            <td>
                <a href="#" class="borrar-producto fa-solid fa-circle-x" style="font-size:30px" > X
                    <p style="display:none";  id="idCarritoP">${producto.id}</p>
                </a>
            </td>
        `;
        listaCompra.appendChild(row);
        
    });
}


function procesarCompra(e){
    e.preventDefault();
    if(obtenerProductosLocalStorage().length === 0){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Tu carrito esta vacío, agrega un producto por favor',
            time : 4000,
            showConfirmButton: true
          }).then(function(){
            window.location ="/View/Catalogo.php";
          });
    }else if(nombreCliente.value === '' || correo.value === ''){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Llene todos los campos porfavor',
            time : 4000,
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
                vaciarLocalStorage();
                window.location ="/View/catalogo.php";

            },2000)
        },3000)

    }
}




