'use strict'

$(document).ready(function () {

    const inputBuscador = document.querySelector("#Criterio-busqueda-principal");
    inputBuscador.addEventListener('input', buscarLibro);

    function buscarLibro(){
        const busqueda = new RegExp(document.getElementById('Criterio-busqueda-principal').value, "i");
        const registros = document.querySelectorAll('tbody tr');
        const tabla = document.getElementById('IDresultadosBusqueda');
        
        registros.forEach(registro =>{
            registro.style.display = 'none';
            if(registro.childNodes[3].textContent.replace(/\s/g, " ").search(busqueda) != -1 ){
                registro.style.display = 'table-row';
            }
        });
    }

});


