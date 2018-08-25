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