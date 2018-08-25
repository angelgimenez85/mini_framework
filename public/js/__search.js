$(document).ready(function() {
    $("#resultadoBusqueda").html('');

    $("#modal-442171").click(function(){
        $("#resultadoBusqueda").html('');
        $("input#busqueda").val('');
    });
});

function buscar() {
    control = $('h4#myModalLabel').text();
    var clase = '';

    if (control == 'Autores') {
        clase = 'autor';
    }
    if (control == 'Editoriales') {
        clase = 'autor'; //editorial
    }

    if ($("input#busqueda").val() != "") {
        var textoBusqueda = $("input#busqueda").val();
        /*var parametros = {
            'valorBusqueda' : textoBusqueda,
            'clase' : clase
        };*/

        $.ajax({
            url: 'http://localhost/books_app/05/books/public/index.php/libros/editar',
            type: 'POST',
            dataType: 'json',
            async: true,
            data: {'valorBusqueda':textoBusqueda, 'clase':clase},
        })
        .done(function(data) {
            $("#resultadoBusqueda").html("");
            $.each (data, function(i, item) {
                if ($("table#resultadoBusqueda") )
                $("table#resultadoBusqueda").append('<tr class="resultado" onclick="asignar(this);"><td hidden>'
                    +item.id+'</td><td>'+item.apenom+'</td></tr>');
            });
        })
        .fail(function(data) {
            console.log("Error al cargar el arreglo");
            alert(data);
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
    var apenom = '';
    $(e).children('td').each (function(index) {
        switch(index) {
            case 0: 
                id = $(this).text();
                break;
            case 1: 
                apenom = $(this).text();
                break;
        }
    }); 
    //Verificar que no haya campos duplicados
    $("#autores").append('<div><input type="text" name="autor_id" value="' + id 
                            + '" hidden="true" />' 
                            + '<input class="form-control" type="text" name="autor" value="'+ apenom 
                            +'" disabled="true"/><a href="#" class="btn" ' 
                            + 'onclick="eliminar(this);">eliminar</a></div>');
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
