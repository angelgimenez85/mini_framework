$(document).ready(function() {
    $("#resultadoBusqueda").html('');
    $("#modal-442171").click(function(){
            //$("#search").html($(this.val()));
            $("#resultadoBusqueda").html('');
            $("input#busqueda").val('');
            /*if ($("#modal-container-442171").is("visible")) {
                $("input#busqueda").focus();
            }*/
    });
     $("#btnRecorrer").click(recorrer);
});

function buscar() {
    if ($("input#busqueda").val() != "") {
        var textoBusqueda = $("input#busqueda").val();
        $.ajax({
            url: 'http://localhost/books_app/05/books/public/index.php/libros/editar',
            type: 'POST', 
            dataType: 'json',
            async: true,
            data: {'valorBusqueda':textoBusqueda, 'clase':'autor'},
            //success: procesaRespuesta,
            //error: muestraError
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
    //Obtenemos el total de columnas (tr) del id "tabla"
    //var trs=$("#emails tr").length;
    //if(trs > 1) {
        // Eliminamos la ultima columna
        //$("#emails tr:last").remove();
        if (confirm('¿Desea eliminar este contenido?')) {
            $(e).parent("div:first").remove();
        }

    //}
}

//Asigna el contenido de una fila a otra tabla.
function asignar(e) {
    /*$('#emails tbody').append('<tr>' + $(e).html() 
        + '<td class="delete button" onclick="eliminar(this);">x</td></tr>');*/
        //$('#texto_id').val(e.children1());
        //$('#texto_apenom').val(e.children()[1]);
        var id = '';
        var apenom = '';
        $(e).children('td').each (function(index) {
            switch(index) {
                case 0: id = $(this).text();
                    break;
                case 1: apenom = $(this).text();
                    break;
            }
        }); 
        //Verificar que no haya campos duplicados
        $("#autores").append('<input type="text" name="autor_id" value="' + id 
                                + '" hidden="true" />' 
                                + '<input class="form-control" type="text" name="autor" value="'+ apenom 
                                +'" disabled="true"/><a href="#" class="btn">eliminar</a>');
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

function recorrer() {
    var arreglo = [];
    $("#emails tbody tr").each(function(index) 
    {
        $(this).children("td").each(function (index2) 
        {
            switch (index2) 
            {
                case 0: 
                    arreglo.push($(this).text());
                    break;
            }
                //$(this).css("background-color", "#ECF8E0");
        });
    });
    /*for (var i = 0; i < arreglo.length; i++) {
        alert(arreglo[i]);
    }*/
    var datos = [];
    nombre = $("#nombre").val();
    apellido = $("#apellido").val();
    datos.push({"nombre":nombre,"apellido":apellido, "emails":arreglo});
    if (arreglo.length > 0) {
        var jsonString = JSON.stringify(datos);
        $.ajax({
            url: 'process.php', //Tu archivo donde estará tu consulta
            type: 'POST',  //Método de envío
            cache: false,
            data: {data : jsonString}, 
            //success: function(){alert("OK");}
            //error: muestraError
        });
        //$(location).attr('href','process.php');
        //alert("nada");
        /*.done(function(data) {
            $.each (data, function(i, item) {
                if ($("table#resultadoBusqueda") )
                $("table#resultadoBusqueda").append('<tr class="resultado" onclick="asignar(this);"><td hidden>'
                    +item.id+'</td><td>'+item.email+'</td></tr>');
            });

        })
        .fail(function() {
            console.log("Error al cargar el arreglo");
        });*/
    }
}