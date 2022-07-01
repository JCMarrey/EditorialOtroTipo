'use strict'

$(document).ready(function () {

    selectedTabsEfect();
    document.getElementById("systemName").innerHTML = "Catálogo";
    const inputBuscador = document.querySelector("#Criterio-busqueda");
    inputBuscador.addEventListener('input', buscarLibro);

    selectedTabsEfectTabsPagina();
    addLibro();
    viewLibro();
    editLibro();
    deleteLibro();
    buscarLibro();

    viewArchivo();
    editArchivo();
    deleteArchivo();

    viewEvento();
    editEvento();
    deleteEvento();

    viewUsuario();
    editUsuario();
    deleteUsuario();

    viewBlog();
    deleteBlog();

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
        const imagen = $('#addL-Form-Imagen').val().replace(/C:\\fakepath\\/i, '');
        const capitulo1 = $('#addL-Form-Capitulo1').val().replace(/C:\\fakepath\\/i, '');
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

        console.log(sinopsis);
        console.log(imagen);
        console.log(capitulo1);

        
        

        

    };
}

function viewLibro(){
    $('.icon-view-Libro').on('click', function(e){

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

                $("#viewL-Form-Sinopsis").attr('value',jsonResponse["Sinopsis"]);
                $("#viewL-Form-Imagen").attr('value',jsonResponse["Imagen"]);
                $("#viewL-Form-Capitulo1").attr('value',jsonResponse["Capitulo1"]);
                $("#viewL-Form-Audio").attr('value',jsonResponse["Audio"]);
                
                if(jsonResponse["Firma"] === "FIRMADO" || jsonResponse["Firma"] === "on"){
                    $("#viewL-Form-Firma").prop('checked', true); 
                }

                if(jsonResponse["Gandhi"] === "DISPONIBLE"){
                    $("#viewL-Form-Gandhi").prop('checked', true); 
                }
                
                if(jsonResponse["Porrua"] === "DISPONIBLE"){
                    $("#viewL-Form-Porrua").prop('checked', true); 
                }

                if(jsonResponse["CarlosFuentes"] === "DISPONIBLE"){
                    $("#viewL-Form-CarlosFuentes").prop('checked', true); 
                }

                if(jsonResponse["Sotano"] === "DISPONIBLE"){
                    $("#viewL-Form-Sotano").prop('checked', true); 
                }

                if(jsonResponse["Amazon"] === "DISPONIBLE"){
                    $("#viewL-Form-Amazon").prop('checked', true); 
                }

            }
        }
        //Enviar los datos
        xhr.send(infoViewLibro);

    });
}

function editLibro(){
    $('.icon-edit-Libro').on('click', function(e){

        const isbnLibro = e.target.parentNode.id;

        const infoEditLibro = new FormData();
        infoEditLibro.append('accion','viewLibro');
        infoEditLibro.append('ISBN',isbnLibro);
        
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
       
                
                $("#editL-Form-idLibro").attr('value',jsonResponse["idLibro"]);
                $("#editL-Form-Titulo").attr('value',jsonResponse["Titulo"]);
               
                $("#editL-Form-Precio").attr('value',jsonResponse["Precio"]);
                $("#editL-Form-Autor").attr('value',jsonResponse["Autor"]);
                $("#editL-Form-ISBN").attr('value',jsonResponse["ISBN"]);
                $("#editL-Form-ISBNF").attr('value',jsonResponse["ISBN"]);
                $("#editL-Form-Tema").attr('value',jsonResponse["Tema"]);
                $("#editL-Form-Tipo").attr('value',jsonResponse["Tipo"]);
                $("#editL-Form-Coleccion").attr('value',jsonResponse["Coleccion"]);
                $("#editL-Form-AEdicion").attr('value',jsonResponse["AEdicion"]);
                $("#editL-Form-Edicion").attr('value',jsonResponse["Edicion"]);
                $("#editL-Form-Paginas").attr('value',jsonResponse["Paginas"]);
                $("#editL-Form-Peso").attr('value',jsonResponse["Peso"]);
                $("#editL-Form-Firma").attr('value',jsonResponse["Firma"]);
                $("#editL-Form-Imagen").attr('value',jsonResponse["Imagen"]);
   
                $("#editL-Form-Costo").attr('value',jsonResponse["Costo"]);

                
                if(jsonResponse["Firma"] === "FIRMADO" || jsonResponse["Firma"] === "on"){
                    $("#editL-Form-Firma").prop('checked', true); 
                }

                if(jsonResponse["Gandhi"] === "DISPONIBLE"){
                    $("#editL-Form-Gandhi").prop('checked', true); 
                }
                
                if(jsonResponse["Porrua"] === "DISPONIBLE"){
                    $("#editL-Form-Porrua").prop('checked', true); 
                }

                if(jsonResponse["CarlosFuentes"] === "DISPONIBLE"){
                    $("#editL-Form-CarlosFuentes").prop('checked', true); 
                }

                if(jsonResponse["Sotano"] === "DISPONIBLE"){
                    $("#editL-Form-Sotano").prop('checked', true); 
                }

                if(jsonResponse["Amazon"] === "DISPONIBLE"){
                    $("#editL-Form-Amazon").prop('checked', true); 
                }

            }
        }
        //Enviar los datos
        xhr.send(infoEditLibro);
        
 
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
                document.getElementById("systemName").innerHTML = "Carrusel Principal y Semblanzas";
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

function selectedTabsEfectTabsPagina(){
    $('#tabs-Pagina-Principal').tabs();

    $('#controller-tab-Carrusel-Main').addClass("active"); 
        
    $('.nav-tabs-Pagina-Principal').click(function(){
       
    switch ($("#tabs-Pagina-Principal").tabs('option','active')){

        case 0: {
            if(!$('#controller-tab-Carrusel-Main').hasClass("active")){
                document.getElementById("systemName").innerHTML = "Carrusel Principal y Semblanzas";
                $('#controller-tab-Videos-Main').removeClass("active");
                $('#controller-tab-Carrusel-Main').addClass("active"); 
            }
            break;
        }

        case 1: {
            if(!$('#controller-tab-Videos-Main').hasClass("active")){
                document.getElementById("systemName").innerHTML = "Pagina Principal - Videos";
                $('#controller-tab-Carrusel-Main').removeClass("active");
                $('#controller-tab-Videos-Main').addClass("active");
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
    registros.forEach(registro =>{
        registro.style.display = 'none';
        if(registro.childNodes[3].textContent.replace(/\s/g, " ").search(busqueda) != -1 ){
            registro.style.display = 'table-row';
            
        }
    });
}

function viewArchivo(){
    $('.view-Media').on('click', function(e){

        const idArchivo = e.target.parentNode.id;


        const infoViewLibro = new FormData();
        infoViewLibro.append('accion','viewArchivo');
        infoViewLibro.append('ID',idArchivo);
        
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
       
                $("#viewM-Form-Tipo").attr('value',jsonResponse["Tipo"]);
                $("#viewM-Form-Archivo").attr('value',jsonResponse["Archivo"]);
            }
        }
        //Enviar los datos
        xhr.send(infoViewLibro);

    });
}

function editArchivo(){
    $('.icon-edit-Archivo').on('click', function(e){

        const idArchivo = e.target.parentNode.id;

        const infoEditLibro = new FormData();
        infoEditLibro.append('accion','viewArchivo');
        infoEditLibro.append('ID',idArchivo);
        
        console.log(idArchivo);

        //Es necesario hace un AJAX para agregar el registro a la BD

        //Llamado a AJAX (Crear el objeto)
        const xhr = new XMLHttpRequest();
        //Abrir la conexion
        xhr.open('POST', '../Admin/Proxy.php', true);
        //ProcesarRespuesta
        xhr.onload = function(){
            if(this.status === 200){  
                var data=xhr.responseText;
                var jsonResponse = JSON.parse(data);
                $('#editM-Form-idArchivo').attr('value',jsonResponse["idMedia"]) ;
                $('#editM-Form-nameArchivo').attr('value',jsonResponse["Archivo"]) ;
                $('#editM-Form-Tipo').attr('value',jsonResponse["Tipo"]) ;
                $('#editM-Form-tipoArchivo').attr('value',jsonResponse["Tipo"]) ;
               
            }
        }
        //Enviar los datos
        xhr.send(infoEditLibro);
        
 
    });
}

function deleteArchivo(){
    $('.icon-delete-Archivo').on('click', function(e){
        swal({
            title: "¿Eliminar Archivo?",
            text: "Recuerda que si eliminas este registro se eliminará del catálogo tambien para los usuarios.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {

                const id = e.target.parentNode.id;
                const tipo = e.target.id ;
                const nameArchivo = e.target.previousElementSibling.previousElementSibling.parentNode.previousElementSibling.innerHTML;

                const infoDeleteArchivo = new FormData();
                infoDeleteArchivo.append('accion','deleteArchivo');
                infoDeleteArchivo.append('ID',id);
                infoDeleteArchivo.append('TIPO',tipo);
                infoDeleteArchivo.append('NAME',nameArchivo);

                
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
                xhr.send(infoDeleteArchivo);

                
            } else {
              swal("Se canceló la operación.");
            }
          });
    });
}

function viewEvento(){
    $('.view-Evento').on('click', function(e){

        const idEvento = e.target.parentNode.id;


        const infoViewLibro = new FormData();
        infoViewLibro.append('accion','viewEvento');
        infoViewLibro.append('ID',idEvento);
        
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
       
                $("#viewE-Form-Evento-Fecha").attr('value',jsonResponse["Fecha"]);
                $("#viewE-Form-Evento-INFO").html(jsonResponse["info"]);
                $("#viewE-Form-Evento-Banner").attr('value',jsonResponse["img"]);
            }
        }
        //Enviar los datos
        xhr.send(infoViewLibro);

    });
}

function editEvento(){
    $('.icon-edit-Evento').on('click', function(e){

        const idArchivo = e.target.parentNode.id;

        const infoEditLibro = new FormData();
        infoEditLibro.append('accion','viewEvento');
        infoEditLibro.append('ID',idArchivo);
        
        console.log(idArchivo);

        //Es necesario hace un AJAX para agregar el registro a la BD

        //Llamado a AJAX (Crear el objeto)
        const xhr = new XMLHttpRequest();
        //Abrir la conexion
        xhr.open('POST', '../Admin/Proxy.php', true);
        //ProcesarRespuesta
        xhr.onload = function(){
            if(this.status === 200){  
                var data=xhr.responseText;
                console.log(xhr.responseText);
                var jsonResponse = JSON.parse(data);

                $('#editE-Form-idEvento').attr('value',jsonResponse["idEvento"]) ;

                $('#editE-Form-nameArchivo-Viejo').attr('value',jsonResponse["img"]) ;                
                
                $('#editE-Form-Evento-INFO').html(jsonResponse["info"]) ;

                $('#editE-Form-Evento-Fecha').attr('value',jsonResponse["Fecha"]) ;
               
            }
        }
        //Enviar los datos
        xhr.send(infoEditLibro);
        
 
    });
}

function deleteEvento(){
    $('.icon-delete-Evento').on('click', function(e){
        swal({
            title: "¿Eliminar Archivo?",
            text: "Recuerda que si eliminas este registro se eliminará de la base de datos y tambien para los usuarios.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {

                const id = e.target.parentNode.id;
                const name = e.target.id ;

                const infoDeleteArchivo = new FormData();
                infoDeleteArchivo.append('accion','deleteEvento');
                infoDeleteArchivo.append('ID',id);
                infoDeleteArchivo.append('NAME',name);

                
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
                xhr.send(infoDeleteArchivo);

                
            } else {
              swal("Se canceló la operación.");
            }
          });
    });
}

function viewUsuario(){
    $('.icon-view-Usuario').on('click', function(e){

        const idUsuario = e.target.parentNode.id;


        const infoViewLibro = new FormData();
        infoViewLibro.append('accion','viewUsuario');
        infoViewLibro.append('ID',idUsuario);
        
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
       
                $("#viewU-Form-Nombre").attr('value',jsonResponse["Nombre"]);
                $("#viewU-Form-Correo").attr('value',jsonResponse["Correo"]);
                $("#viewU-Form-Pass").attr('value',jsonResponse["Pass"]);
                $("#viewU-Form-Rol").attr('value',jsonResponse["Rol"]);
            }
        }
        //Enviar los datos
        xhr.send(infoViewLibro);

    });
}

function editUsuario(){
    $('.icon-edit-Usuario').on('click', function(e){

        const idUsuario = e.target.parentNode.id;


        const infoViewLibro = new FormData();
        infoViewLibro.append('accion','viewUsuario');
        infoViewLibro.append('ID',idUsuario);
        
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

                $("#editU-Form-Nombre").attr('value',jsonResponse["Nombre"]);
                $("#editU-Form-Correo").attr('value',jsonResponse["Correo"]);
                $("#editU-Form-Pass").attr('value',jsonResponse["Pass"]);
                $("#editU-Form-Rol").attr('value',jsonResponse["Rol"]);
                $("#editU-Form-id").attr('value',jsonResponse["idUsuarios"]);

               
            }
        }
        //Enviar los datos
        xhr.send(infoViewLibro);

    });
}


function deleteUsuario(){
    $('.icon-delete-Usuario').on('click', function(e){
        swal({
            title: "¿Eliminar Registro?",
            text: "Recuerda que si eliminas este registro se eliminará de la base de datos.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {

                const id = e.target.parentNode.id;

                const infoDeleteUsuario = new FormData();
                infoDeleteUsuario.append('accion','deleteUsuario');
                infoDeleteUsuario.append('ID',id);


                
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

                        location.assign('http://localhost/EditorialOtroTipo/View/Admin/AdminDeOtroTipo.php?r=16');
                        //mostrarNotificacion('No se eliminó el registro.', 'error');
                    }
                }
                //Enviar los datos
                xhr.send(infoDeleteUsuario);

                
            } else {
              swal("Se canceló la operación.");
            }
          });
    });
}



function viewBlog(){
    $('.icon-view-Blog').on('click', function(e){

        const idBlog = e.target.parentNode.id;


        const infoViewLibro = new FormData();
        infoViewLibro.append('accion','viewBlog');
        infoViewLibro.append('ID',idBlog);
        
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
       
                $("#viewB-Form-Blog-Titulo").attr('value',jsonResponse["Titulo"]);
                $("#viewB-Form-Blog-Autor").attr('value',jsonResponse["Autor"]);
                $("#viewB-Form-Blog-Fecha").attr('value',jsonResponse["Fecha"]);

                

                $("#viewB-Form-Blog-Preview").html();
                $("#viewB-Form-Blog-Entrada").html(jsonResponse["Entrada"]);
            }
        }
        //Enviar los datos
        xhr.send(infoViewLibro);

    });
}

function deleteBlog(){
    $('.icon-delete-Blog').on('click', function(e){


        swal({
            title: "¿Eliminar Registro?",
            text: "Recuerda que si eliminas este registro se eliminará de la base de datos.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {

                const id = e.target.parentNode.id;
                const nav = document.getElementById(id);
                const titulo = nav.previousElementSibling.innerHTML;
                const autor = nav.previousElementSibling.previousElementSibling.innerHTML;
                
                const infoDeleteBlog = new FormData();
                infoDeleteBlog.append('accion','deleteBlog');
                infoDeleteBlog.append('ID',id);
                infoDeleteBlog.append('TITULO',titulo);
                infoDeleteBlog.append('AUTOR',autor);
                
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

                        location.assign('http://localhost/EditorialOtroTipo/View/Admin/AdminDeOtroTipo.php?r=16');
                        //mostrarNotificacion('No se eliminó el registro.', 'error');
                    }
                }
                //Enviar los datos
                xhr.send(infoDeleteBlog);

                
            } else {
              swal("Se canceló la operación.");
            }
          });
    });
}


