var site = 'http://books-dev.com/';

$(document).ready(function() {
    $("#resultadoBusqueda").html('');
    $("#Autores").click(limpiarResultado);
    $("#Editoriales").click(limpiarResultado);
    $("#guardar").click(guardar);
});

function limpiarResultado(){
    $("#resultadoBusqueda").html('');
    $("input#busqueda").val('');
}

function buscar() {
    control = $('h4#myModalLabel').text();
    var path = '';

    if (control == 'Autores') {
        path = site + 'autores/buscar/';
    }
    if (control == 'Editoriales') {
        path = site + 'editoriales/buscar/';
    }

    if ($("input#busqueda").val() != "") {
        var textoBusqueda = $("input#busqueda").val();
        //var parametros = {
            //'valorBusqueda':textoBusqueda,
        //};
        //path += textoBusqueda;

        $.ajax({
            url: path,
            type: 'GET',
            dataType: 'json',
            async: true,
            data: {'busqueda':textoBusqueda}
        })
        .done(function(data) {
            if (data != "null"){
                $("#resultadoBusqueda").html("");
                $.each (data, function(i, item) {
                    if ($("table#resultadoBusqueda")) {
                        $("table#resultadoBusqueda").append('<tr class="resultado" onclick="asignar(this);"><td hidden>'
                            +item.id+'</td><td>'+item.descripcion+'</td></tr>');
                    }
                });
            }
        })
        .fail(function(data) {
            console.log("Error al cargar el arreglo");
            //alert(data);
            //inspeccionar(data);
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

//Asigna el contenido de una fila a otra tabla.

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

//Función que permite inspeccionar los atributos y métodos de un objeto
function inspeccionar(obj){
    var msg = '';
     
    for (var property in obj){
        if (typeof obj[property] == 'function'){
            var inicio = obj[property].toString().indexOf('function');
            var fin = obj[property].toString().indexOf(')')+1;
            var propertyValue=obj[property].toString().substring(inicio,fin);
            msg +=(typeof obj[property])+' '+property+' : '+propertyValue+' ;\n';
        }
        else if (typeof obj[property] == 'unknown'){
           msg += 'unknown '+property+' : unknown ;\n';
        }
        else{
          msg +=(typeof obj[property])+' '+property+' : '+obj[property]+' ;\n';
        }
    }
    alert(msg);
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
