//Precarga de páginas
var obj_contain = document.getElementById('contain');
var obj_loadingMessage = document.getElementById('loadingMessage');

$(document).ready(function(){
    obj_loadingMessage.style.display = 'none';
    obj_contain.style.display = 'block';
});

obj_contain.style.display = 'none';
obj_loadingMessage.style.display = 'block';