var site = 'http://books-dev.com/';

$(document).ready(function() {
    $("#resultadoBusqueda").html('');
    $("#Autores").click(limpiarResultado);
    $("#Autores").click(openModal);
    $("#Editoriales").click(limpiarResultado);
    $("#Editoriales").click(openModal);
    $("#guardar").click(guardar);
});

function limpiarResultado(){
    $("#resultadoBusqueda").html('');
    $("input#busqueda").val('');
}

function buscar() {
    control = $('h4#myModalLabel').text();
    var path = '';
    var textoBusqueda = '';
    if (control == 'Autores') {
        //path = site + 'autores/buscar/';
        path = site + 'author_by_name';
    }
    if (control == 'Editoriales') {
        //path = site + 'editoriales/buscar/';
    }

        if ($("input#busqueda").val() != "") {
        var textoBusqueda = $("input#busqueda").val();
        $.ajax({
            url: path,
            type: 'POST', 
            dataType: 'json',
            async: true,
            data: {'s':textoBusqueda}
            //success: procesaRespuesta,
            //error: muestraError
        })
        .done(function(data) {
            $("#resultadoBusqueda").html("");
            $.each (data, function(i, item) {
                if ($("table#resultadoBusqueda") )
                $("table#resultadoBusqueda").append('<tr class="resultado" onclick="asignar(this);"><td hidden>'
                    +item.id+'</td><td>'+item.descripcion+'</td></tr>');
            });
        })
        .fail(function(data) {
            console.log("Error al cargar el arreglo");
        });
    } else {
        $("#resultadoBusqueda").html("");
    }
}

function eliminar(e)
{
    if (confirm('¿Desea eliminar este contenido?')) {
        $(e).parent("div:first").remove();
    }

}

//Asigna el contenido del cuadro de búsqueda al formulario.

function asignar(e) {
    var id = '';
    var descripcion = '';

    $(e).children('td').each (function(index) {
        switch(index) {
            case 0: 
                id = $(this).text();
                break;
            case 1: 
                descripcion = $(this).text();
                break;
        }
    }); 
    //Verificar que no haya campos duplicados

    if (control == 'Autores') {
        $("#autores").append('<div><input type="text" class="id_autor" name="autor[]" value="' + id 
                            + '" hidden />' 
                            + '<input class="form-control" type="text" value="'+ descripcion 
                            +'" disabled="true"/><a href="#" class="btn" ' 
                            + 'onclick="eliminar(this);">eliminar</a></div>');
    }
    if (control == 'Editoriales') {
        $("#id_editorial").val(id);
        $("#nom_editorial").val(descripcion);
    }

}

function openModal(e) {
    control = $(e).attr('id');
    $('h4#myModalLabel').text(control);
}



function guardar(event){
    //Comprobar los campos antes de enviar
    var url = site + "libros/insertar";                                      
    var id = $("input#id").val();
    var titulo = $("input#titulo").val();
    var id_editorial = $("input#id_editorial").val();
    //var autores = $(".id_autor").val();
    var autores = document.getElementsByClassName("id_autor");
    var id_autores = [];
    for (i = 0; i < autores.length; i++) {
        id_autores.push($(autores[i]).val());
    }
    var contenido = $("textarea#contenido").val();

    var parametros = {
        'id':id,
        'titulo':titulo,
        'editorial':id_editorial,
        'autores':id_autores,
        'contenido':contenido
    };
        $.ajax({                        
           type: "POST",                 
           url: url,                    
           //data: $("#formulario").serialize(),
           data: parametros,
           success: function(data)            
           {
             alert(data);           
           }
         });
    
    event.preventDefault();
}
