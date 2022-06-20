'use strict'

$(document).ready(function () {

    selectedTabsEfect();
    document.getElementById("systemName").innerHTML = "Catálogo";
    const inputBuscador = document.querySelector("#Criterio-busqueda");
    inputBuscador.addEventListener('input', buscarLibro);

    addLibro();
    viewLibro();
    editLibro();
    deleteLibro();
    buscarLibro();
});


function addLibro(){
    document.getElementById("btn-modal-add-Libro").onclick = function(){
        
        const titulo = $('#addL-Form-Titulo').val();
        const sinopsis = $('#addL-Form-Sinopsis').val();
        const precio = $('#addL-Form-Precio').val();
        const autor = $('#addL-Form-Autor').val();
        const isbn = $('#addL-Form-ISBN').val();
        const tema = $('#addL-Form-Tema').val();
        const tipo = $('#addL-Form-Tipo').val();
        const coleccion = $('#addL-Form-Coleccion').val();
        const aEdicion = $('#addL-Form-AEdicion').val();
        const edicion = $('#addL-Form-Edicion').val();
        const paginas = $('#addL-Form-Paginas').val();
        const peso = $('#addL-Form-Peso').val();
        const firma = $('#addL-Form-Firma').val();
        const imagen = $('#addL-Form-Imagen').val();
        const capitulo1 = $('#addL-Form-Capitulo1').val();
        const costo = $('#addL-Form-Costo').val();


        const infoAddLibro = new FormData();
        infoAddLibro.append('accion','addLibro');

        infoAddLibro.append('TITULO',titulo);
        infoAddLibro.append('SINOPSIS',sinopsis);
        infoAddLibro.append('PRECIO',precio);
        infoAddLibro.append('AUTOR',autor);
        infoAddLibro.append('ISBN',isbn);
        infoAddLibro.append('TEMA',tema);
        infoAddLibro.append('TIPO',tipo);
        infoAddLibro.append('COLECCION',coleccion);
        infoAddLibro.append('AEDICION',aEdicion);
        infoAddLibro.append('EDICION', edicion);
        infoAddLibro.append('PAGINAS', paginas);
        infoAddLibro.append('PESO', peso);
        infoAddLibro.append('FIRMA', firma);
        infoAddLibro.append('IMAGEN', imagen);
        infoAddLibro.append('CAPITULO1', capitulo1);
        infoAddLibro.append('COSTO', costo);

        
        

        //Es necesario hace un AJAX para agregar el registro a la BD

        //Llamado a AJAX (Crear el objeto)
        const xhr = new XMLHttpRequest();
        //Abrir la conexion
        xhr.open('POST', '../Admin/Proxy.php', true);
        //ProcesarRespuesta
        xhr.onload = function(){
            if(this.status === 200){  
                //Si esa petición regresa exitosamente entonces recargamos con AJAX el contenido de la BD
                //const respuesta = JSON.parse(xhr.responseText);
                //console.log(xhr.responseText);
                //console.log("Se insertó el registro en la BD");
                $("#ModalAddLibro").modal('hide');
                location.assign('http://localhost/EditorialOtroTipo/View/Admin/AdminDeOtroTipo.php?r=1');
            }
        }
        //Enviar los datos
        xhr.send(infoAddLibro);
        
        

    };
}

function viewLibro(){
    $('.icon-view').on('click', function(e){

        const isbnLibro = e.target.parentNode.id;

        const infoViewLibro = new FormData();
        infoViewLibro.append('accion','viewLibro');
        infoViewLibro.append('ISBN',isbnLibro);
        
        //Es necesario hace un AJAX para agregar el registro a la BD

        //Llamado a AJAX (Crear el objeto)
        const xhr = new XMLHttpRequest();
        //Abrir la conexion
        xhr.open('POST', '../Admin/Proxy.php', true);
        //ProcesarRespuesta
        xhr.onload = function(){
            if(this.status === 200){  
                //Si esa petición regresa exitosamente entonces recargamos con AJAX el contenido de la BD
                
                console.log(xhr.responseText);
                var data=xhr.responseText;
                var jsonResponse = JSON.parse(data);
       
                $("#viewL-Form-Titulo").attr('value',jsonResponse["Titulo"]);
                $("#viewL-Form-Sinopsis").attr('value',jsonResponse["Sinopsis"]);
                $("#viewL-Form-Precio").attr('value',jsonResponse["Precio"]);
                $("#viewL-Form-Autor").attr('value',jsonResponse["Autor"]);
                $("#viewL-Form-ISBN").attr('value',jsonResponse["ISBN"]);
                $("#viewL-Form-Tema").attr('value',jsonResponse["Tema"]);
                $("#viewL-Form-Tipo").attr('value',jsonResponse["Tipo"]);
                $("#viewL-Form-Coleccion").attr('value',jsonResponse["Coleccion"]);
                $("#viewL-Form-AEdicion").attr('value',jsonResponse["AEdicion"]);
                $("#viewL-Form-Edicion").attr('value',jsonResponse["Edicion"]);
                $("#viewL-Form-Paginas").attr('value',jsonResponse["Paginas"]);
                $("#viewL-Form-Peso").attr('value',jsonResponse["Peso"]);
                $("#viewL-Form-Firma").attr('value',jsonResponse["Firma"]);
                $("#viewL-Form-Imagen").attr('value',jsonResponse["Imagen"]);
                $("#viewL-Form-Capitulo1").attr('value',jsonResponse["Capitulo1"]);
                $("#viewL-Form-Costo").attr('value',jsonResponse["Costo"]);

            }
        }
        //Enviar los datos
        xhr.send(infoViewLibro);

    });
}

function editLibro(){
    $('.icon-edit').on('click', function(e){

        const isbnLibro = e.target.parentNode.id;

        const infoViewLibro = new FormData();
        infoViewLibro.append('accion','viewLibro');
        infoViewLibro.append('ISBN',isbnLibro);
        
        //Es necesario hace un AJAX para agregar el registro a la BD

        //Llamado a AJAX (Crear el objeto)
        const xhr = new XMLHttpRequest();
        //Abrir la conexion
        xhr.open('POST', '../Admin/Proxy.php', true);
        //ProcesarRespuesta
        xhr.onload = function(){
            if(this.status === 200){  
                //Si esa petición regresa exitosamente entonces recargamos con AJAX el contenido de la BD
                var data=xhr.responseText;
                var jsonResponse = JSON.parse(data);
       
                $("#editL-Form-Titulo").attr('value',jsonResponse["Titulo"]);
                $("#editL-Form-Sinopsis").attr('value',jsonResponse["Sinopsis"]);
                $("#editL-Form-Precio").attr('value',jsonResponse["Precio"]);
                $("#editL-Form-Autor").attr('value',jsonResponse["Autor"]);
                $("#editL-Form-ISBN").attr('value',jsonResponse["ISBN"]);
                $("#editL-Form-Tema").attr('value',jsonResponse["Tema"]);
                $("#editL-Form-Tipo").attr('value',jsonResponse["Tipo"]);
                $("#editL-Form-Coleccion").attr('value',jsonResponse["Coleccion"]);
                $("#editL-Form-AEdicion").attr('value',jsonResponse["AEdicion"]);
                $("#editL-Form-Edicion").attr('value',jsonResponse["Edicion"]);
                $("#editL-Form-Paginas").attr('value',jsonResponse["Paginas"]);
                $("#editL-Form-Peso").attr('value',jsonResponse["Peso"]);
                $("#editL-Form-Firma").attr('value',jsonResponse["Firma"]);
                $("#editL-Form-Imagen").attr('value',jsonResponse["Imagen"]);
                $("#editL-Form-Capitulo1").attr('value',jsonResponse["Capitulo1"]);
                $("#editL-Form-Costo").attr('value',jsonResponse["Costo"]);



//------------------------------------------------------------------------------------
                document.getElementById("btn-modal-edit-Libro").onclick = function(){

                    const titulo = $('#editL-Form-Titulo').val();
                    const sinopsis = $('#editL-Form-Sinopsis').val();
                    const precio = $('#editL-Form-Precio').val();
                    const autor = $('#editL-Form-Autor').val();
                    const isbn = $('#editL-Form-ISBN').val();
                    const tema = $('#editL-Form-Tema').val();
                    const tipo = $('#editL-Form-Tipo').val();
                    const coleccion = $('#editL-Form-Coleccion').val();
                    const aEdicion = $('#editL-Form-AEdicion').val();
                    const edicion = $('#editL-Form-Edicion').val();
                    const paginas = $('#editL-Form-Paginas').val();
                    const peso = $('#editL-Form-Peso').val();
                    const firma = $('#editL-Form-Firma').val();
                    const imagen = $('#editL-Form-Imagen').val();
                    const capitulo1 = $('#editL-Form-Capitulo1').val();
                    const costo = $('#editL-Form-Costo').val();


                    const infoEditLibro = new FormData();
                    infoEditLibro.append('accion','editLibro');

                    infoEditLibro.append('TITULO',titulo);
                    infoEditLibro.append('SINOPSIS',sinopsis);
                    infoEditLibro.append('PRECIO',precio);
                    infoEditLibro.append('AUTOR',autor);
                    infoEditLibro.append('ISBN',isbn);
                    infoEditLibro.append('TEMA',tema);
                    infoEditLibro.append('TIPO',tipo);
                    infoEditLibro.append('COLECCION',coleccion);
                    infoEditLibro.append('AEDICION',aEdicion);
                    infoEditLibro.append('EDICION', edicion);
                    infoEditLibro.append('PAGINAS', paginas);
                    infoEditLibro.append('PESO', peso);
                    infoEditLibro.append('FIRMA', firma);
                    infoEditLibro.append('IMAGEN', imagen);
                    infoEditLibro.append('CAPITULO1', capitulo1);
                    infoEditLibro.append('COSTO', costo);




                    //Es necesario hace un AJAX para agregar el registro a la BD

                    //Llamado a AJAX (Crear el objeto)
                    const xhr = new XMLHttpRequest();
                    //Abrir la conexion
                    xhr.open('POST', '../Admin/Proxy.php', true);
                    //ProcesarRespuesta
                    xhr.onload = function(){
                        if(this.status === 200){  
                            //Si esa petición regresa exitosamente entonces recargamos con AJAX el contenido de la BD
                            //const respuesta = JSON.parse(xhr.responseText);
                            //console.log(xhr.responseText);
                            
                            $("#ModalEditLibro").modal('hide');
                            location.assign('http://localhost/EditorialOtroTipo/View/Admin/AdminDeOtroTipo.php?r=2');
                        }
                    }
                    //Enviar los datos
                    xhr.send(infoEditLibro);

                }
//------------------------------------------------------------------------------------
            }
        }
        //Enviar los datos
        xhr.send(infoViewLibro);
        
 
    });
}

function deleteLibro(){
    $('.icon-delete').on('click', function(e){
        swal({
            title: "¿Eliminar Archivo?",
            text: "Recuerda que si eliminas este registro se eliminará del catálogo tambien para los usuarios.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {

                const isbnLibro = e.target.parentNode.id;
                
                const infoDeleteLibro = new FormData();
                infoDeleteLibro.append('accion','deleteLibro');
                infoDeleteLibro.append('ISBN',isbnLibro);
                
                //Es necesario hace un AJAX para agregar el registro a la BD
        
                //Llamado a AJAX (Crear el objeto)
                const xhr = new XMLHttpRequest();
                //Abrir la conexion
                xhr.open('POST', '../Admin/Proxy.php', true);
                //ProcesarRespuesta
                xhr.onload = function(){
                    if(this.status === 200){  
                        //Si esa petición regresa exitosamente entonces recargamos con AJAX el contenido de la BD
                        //console.log(xhr.responseText);
                        //var data=xhr.responseText;
                        //var jsonResponse = JSON.parse(data);

                        location.assign('http://localhost/EditorialOtroTipo/View/Admin/AdminDeOtroTipo.php?r=3');
                    }
                }
                //Enviar los datos
                xhr.send(infoDeleteLibro);
            } else {
              swal("Se canceló la operación.");
            }
          });
    });
}

function selectedTabsEfect(){
   
    $('#tabsAdmin').tabs();

    $('#controller-tab-catalogo').addClass("active"); 
        
   $('.nav-tabs').click(function(){
       

    switch ($("#tabsAdmin").tabs('option','active')){

        case 0: {
            if(!$('#controller-tab-catalogo').hasClass("active")){
                document.getElementById("systemName").innerHTML = "Catálogo";
                $('#controller-tab-eventos').removeClass("active");
                $('#controller-tab-estadisticas').removeClass("active");
                $('#controller-tab-blog').removeClass("active");
                $('#controller-tab-pagina').removeClass("active");
                $('#controller-tab-usuarios').removeClass("active");
                $('#controller-tab-catalogo').addClass("active"); 
            }
            break;
        }

        case 1: {
            if(!$('#controller-tab-eventos').hasClass("active")){
                document.getElementById("systemName").innerHTML = "Eventos";
                $('#controller-tab-catalogo').removeClass("active");
                $('#controller-tab-estadisticas').removeClass("active");
                $('#controller-tab-blog').removeClass("active");
                $('#controller-tab-pagina').removeClass("active");
                $('#controller-tab-usuarios').removeClass("active");
                $('#controller-tab-eventos').addClass("active");
            }
            break;
        }

        case 2: {

            if(!$('#controller-tab-estadisticas').hasClass("active")){
                document.getElementById("systemName").innerHTML = "Estadisticas";
                $('#controller-tab-catalogo').removeClass("active");
                $('#controller-tab-eventos').removeClass("active");
                $('#controller-tab-blog').removeClass("active");
                $('#controller-tab-pagina').removeClass("active");
                $('#controller-tab-usuarios').removeClass("active");
                $('#controller-tab-estadisticas').addClass("active");
            }
            break;
        }

        case 3:{
            if(!$('#controller-tab-blog').hasClass("active")){
                document.getElementById("systemName").innerHTML = "Blog";
                $('#controller-tab-catalogo').removeClass("active");
                $('#controller-tab-eventos').removeClass("active");
                $('#controller-tab-estadisticas').removeClass("active");
                $('#controller-tab-pagina').removeClass("active");
                $('#controller-tab-usuarios').removeClass("active");
                $('#controller-tab-blog').addClass("active");
            }
            break;
        }

        case 4:{
            if(!$('#controller-tab-pagina').hasClass("active")){
                document.getElementById("systemName").innerHTML = "Pagina";
                $('#controller-tab-catalogo').removeClass("active");
                $('#controller-tab-eventos').removeClass("active");
                $('#controller-tab-estadisticas').removeClass("active");
                $('#controller-tab-blog').removeClass("active");
                $('#controller-tab-usuarios').removeClass("active");
                $('#controller-tab-pagina').addClass("active");
            }
            break;
        }

        case 5:{
            if(!$('#controller-tab-usuarios').hasClass("active")){
                document.getElementById("systemName").innerHTML = "Usuarios";
                $('#controller-tab-catalogo').removeClass("active");
                $('#controller-tab-eventos').removeClass("active");
                $('#controller-tab-estadisticas').removeClass("active");
                $('#controller-tab-pagina').removeClass("active");
                $('#controller-tab-blog').removeClass("active");
                $('#controller-tab-usuarios').addClass("active");
            }
            break;
        }

        
    }  



   });



 
   
}

function mostrarNotificacion(mensaje,clase){
    const notificacion = document.createElement('div');
    const barraLateral = document.querySelector('#contenedor-Nav-Admin-id');
    notificacion.classList.add(clase, 'notificacion', 'sombra');
    notificacion.textContent = mensaje ;
    barraLateral.appendChild(notificacion);
    //Ocultar  o mostrar la notificación
    setTimeout(()=>{
        //Le agregamos la clase con JS puro
        notificacion.classList.add('visible');
        setTimeout(()=>{
            notificacion.classList.remove('visible');
            
            setTimeout(()=>{
                notificacion.remove();
            },500);

        },4000);
    },100);
}

function buscarLibro(){
    const busqueda = new RegExp(document.getElementById('Criterio-busqueda').value, "i");
    const registros = document.querySelectorAll('tbody tr');
    console.log(registros);
    registros.forEach(registro =>{
        registro.style.display = 'none';
        if(registro.childNodes[3].textContent.replace(/\s/g, " ").search(busqueda) != -1 ){
            registro.style.display = 'table-row';
            
        }
    });
}



