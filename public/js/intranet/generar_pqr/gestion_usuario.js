window.addEventListener('DOMContentLoaded', function(){
    const id_pqr = document.querySelector('.id_pqr').value
    // Inicio Función para generar varios anexos en una consulta con validación.
    if(document.querySelectorAll('.crearAnexo').length){
        let btncrearAnexo = document.querySelectorAll('.crearAnexo')
        btncrearAnexo.forEach(btn => btn.addEventListener('click', crearNuevoAnexo))
        let btnEliminarAnexo = document.querySelector('.eliminaranexoConsulta')
        btnEliminarAnexo.addEventListener('click', agregarEliminarAnexo)
    
        function crearNuevoAnexo(e) {
            e.preventDefault()
            let consulta = e.target.parentNode.parentNode
            let nuevoAnexo = consulta.querySelectorAll('.anexoconsulta')[0].cloneNode(true)
            nuevoAnexo.querySelector('.titulo-anexoConsulta input').value = ''
            nuevoAnexo.querySelector('.descripcion-anexoConsulta input').value = ''
            nuevoAnexo.querySelector('.doc-anexoConsulta input').value = ''
            consulta.querySelector('.anexosConsulta').appendChild(nuevoAnexo)
            document.querySelectorAll('.eliminaranexoConsulta').forEach(item => item.addEventListener('click', agregarEliminarAnexo))
        }
    
        function agregarEliminarAnexo(e) {
            e.preventDefault()
            let consulta = e.target
            if (consulta.tagName === 'I') {
                consulta = consulta.parentNode.parentNode.parentNode.parentNode
            }else {
                consulta = consulta.parentNode.parentNode.parentNode
            }
            if (consulta.querySelectorAll('.anexoconsulta').length >= 2) {
                let idAnexo = e.target
                if (idAnexo.tagName === 'I') {
                    idAnexo = idAnexo.parentNode.parentNode.parentNode
                } else {
                    idAnexo = idAnexo.parentNode.parentNode
                }
                idAnexo.remove()
            }
        }
    }
    // Fin Función para generar varios anexos en una consulta con validación.
    
    // Inicio bloque para la funcion de tarjetas
    let menuCardLink = document.querySelectorAll('.card-step')
    menuCardLink.forEach(link => {
        link.addEventListener('click', menuscards)
    })

    function menuscards (link) {
        link.preventDefault()
        let seleccion = link.target
        switch (seleccion.tagName) {
            case 'I':
                seleccion = seleccion.parentNode.parentNode.parentNode
                break;
            case 'SPAN':
                seleccion = seleccion.parentNode.parentNode
                break;
            case 'H6':
                seleccion = seleccion.parentNode.parentNode
                break;
            case 'DIV':
                seleccion = seleccion.parentNode
                break;
        }

        menuCardLink.forEach(link => {
            if(link.classList.contains('activo')){
                link.classList.remove('activo')
            }
        })
        seleccion.classList.add('activo')
        if(seleccion.getAttribute('data-content') == 'menu-salir-inicio'){
            window.location = "/usuario/listado"
        }
        let menuCard = document.querySelectorAll('.menu-card')
        menuCard.forEach(content => {
            if(!content.classList.contains('d-none')){
                content.classList.add('d-none')
            }
        })
        let contenedores = document.querySelectorAll(`.${seleccion.getAttribute('data-content')}`)
        contenedores.forEach(contenedor => {
            contenedor.classList.remove('d-none')
        })
    }
    // Fin bloque para la funcion de tarjetas
    
    // Inicio bloque para la funcion de aclaraciones
    if(document.querySelectorAll('.btn-guardar-aclaracion')){
        let btnRespuestas = document.querySelectorAll('.btn-guardar-aclaracion')
        btnRespuestas.forEach(btn=> btn.addEventListener('click', guardarRespuestas))

        function guardarRespuestas(btn){
            btn.preventDefault()
            padreRespuesta = btn.target.parentElement.parentElement
            let url = btn.target.getAttribute('data_url')
            let url2 = btn.target.getAttribute('data_url2')
            let token = btn.target.getAttribute('data_token')
            let respuesta = padreRespuesta.querySelector('.aclaracionRespuesta').value
            let id_aclaracion = padreRespuesta.querySelector('.id_aclaracion').value
            let anexos = padreRespuesta.querySelectorAll('.anexoconsulta')
            if (respuesta != '') {
                data = {
                    url,
                    respuesta,
                    id_aclaracion
                }
                guardarRespuesta(data)
            }
            function guardarRespuesta(data){
                $.ajax({
                    url: url,
                    type: 'POST',
                    headers: { 'X-CSRF-TOKEN': token },
                    data: data,
                    success: function(respuesta) {
                        guardarRespuestaAnexo(anexos, respuesta)
                    },
                    error: function(error) {
                        console.log(error)
                    }
                });
            }

            function guardarRespuestaAnexo(anexos, idrespuesta){
                anexos.forEach(anexo => {
                    let titulo = anexo.querySelector('.titulo').value
                    let descripcion = anexo.querySelector('.descripcion').value
                    let archivo = anexo.querySelector('.documento').files[0]
                    if (archivo) {
                        let dataAnexo = new FormData();
                        dataAnexo.append('respuesta_id', idrespuesta.data.id);
                        dataAnexo.append('titulo', titulo);
                        dataAnexo.append('descripcion', descripcion);
                        dataAnexo.append('archivo', archivo);
                        dataAnexo.append('_token', token);
                        $.ajax({
                            async:false,
                            url: url2,
                            type: 'POST',
                            headers: { 'X-CSRF-TOKEN': token },
                            data: dataAnexo,
                            processData: false, 
                            contentType: false,
                            success: function(respuesta) {
                                // console.log(respuesta)
                            },
                            error: function(error) {
                                console.log(error)
                            }
                        });
                    }
                })
            }
            location.reload();
        }
    }
    // Fin bloque para la funcion de aclaraciones
    
    // Incio función para ocultar bloque de recursos
    let verificacionRecurso = document.querySelectorAll('.respuestaProcedeRecurso')
    verificacionRecurso.forEach(item => {
        if(item.value == 1){
            if(item.parentElement.querySelector('.recurso_procede_no')){
                item.parentElement.querySelector('.recurso_procede_no').setAttribute('checked','')
                item.parentElement.querySelector('.form-recursos').classList.add('d-none')
            }
        }
    })
    
    $('.recurso_procede_check').on('change', function(e) {
        let padre = e.target.parentNode.parentNode.parentNode
        switch (e.target.value) {
            case '1':
                padre.querySelector('.form-recursos').classList.remove('d-none');
                break;
            case '0':
                padre.querySelector('.form-recursos').classList.add('d-none');
                break;
            }
    });
    // Fin función para ocultar bloque de recursos

    // Inicio función para guardar recurso
    if(document.querySelectorAll('.btn-recurso')){

        let btnRecursosGuardar = document.querySelectorAll('.btn-recurso')
        btnRecursosGuardar.forEach(e => {
            e.addEventListener('click', guardarRecurso)
        })
        function guardarRecurso(e){
            e.preventDefault()
            let contenedor = e.target.parentNode.parentNode
            let url = e.target.getAttribute('data_url')
            let url2 = e.target.getAttribute('data_url_anexos')
            let token = e.target.getAttribute('data_token')
            let tipo_reposicion = contenedor.querySelector('.tipo_reposicion').value
            let respuestaRecurso = contenedor.querySelector('.respuestaRecurso').value
            let idPeticionRecurso = contenedor.querySelector('.id_peticionRecurso').value
            let anexos = contenedor.querySelectorAll('.anexoconsulta')
            if(tipo_reposicion != '' && respuestaRecurso != ''){
                if(tipo_reposicion == 4){
                    let data = {
                        peticion_id : idPeticionRecurso,
                        tipo_reposicion_id : 2,
                        recurso : respuestaRecurso,
                        id: id_pqr
                    }
                    $.ajax({
                        async:false,
                        url: url,
                        type: 'POST',
                        headers: { 'X-CSRF-TOKEN': token },
                        data: data,
                        success: function(respuesta) {
                            // console.log(respuesta)
                            guardarRespuestaAnexo(anexos, respuesta)
                        },
                        error: function(error) {
                            console.log(error)
                        }
                    });

                    let data2 = {
                        peticion_id : idPeticionRecurso,
                        tipo_reposicion_id : 3,
                        recurso : respuestaRecurso,
                        id: id_pqr
                    }
                    $.ajax({
                        async:false,
                        url: url,
                        type: 'POST',
                        headers: { 'X-CSRF-TOKEN': token },
                        data: data2,
                        success: function(respuesta) {
                            // console.log(respuesta)
                            guardarRespuestaAnexo(anexos, respuesta)
                        },
                        error: function(error) {
                            console.log(error)
                        }
                    });
                }else{
                    let data = {
                        peticion_id : idPeticionRecurso,
                        tipo_reposicion_id : tipo_reposicion,
                        recurso : respuestaRecurso,
                        id: id_pqr
                    }
                    $.ajax({
                        async:false,
                        url: url,
                        type: 'POST',
                        headers: { 'X-CSRF-TOKEN': token },
                        data: data,
                        success: function(respuesta) {
                            // console.log(respuesta)
                            guardarRespuestaAnexo(anexos, respuesta)
                        },
                        error: function(error) {
                            console.log(error)
                        }
                    });
                }
            }

            function guardarRespuestaAnexo(anexos, idrespuesta){
                anexos.forEach(anexo => {
                    let titulo = anexo.querySelector('.titulo').value
                    let descripcion = anexo.querySelector('.descripcion').value
                    let archivo = anexo.querySelector('.documento').files[0]
                    if (archivo) {
                        let dataAnexo = new FormData();
                        dataAnexo.append('recurso_id', idrespuesta.data.id);
                        dataAnexo.append('titulo', titulo);
                        dataAnexo.append('descripcion', descripcion);
                        dataAnexo.append('archivo', archivo);
                        dataAnexo.append('_token', token);
                        $.ajax({
                            async:false,
                            url: url2,
                            type: 'POST',
                            headers: { 'X-CSRF-TOKEN': token },
                            data: dataAnexo,
                            processData: false, 
                            contentType: false,
                            success: function(respuesta) {
                                // console.log(respuesta)
                            },
                            error: function(error) {
                                console.log(error)
                            }
                        });
                    }
                })
            }
            location.reload();
        }
    }       
    // Fin función para guardar recurso 
})
