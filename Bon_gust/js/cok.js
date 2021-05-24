/**
 * @author xènia pardo ullod 
 */
/* 

/* 
comprova el localstorage si ja te una variable guardada
 */
function checkAcceptCookies() {
    if (localStorage.acceptCookies == 'true') {
        echo("esto es una coockies");
    } else {
        $('#div-cookies').show();
    }
}
/** 
Aqui guardem la variable de que s 'ha aceptat el us de las cookies aixi no mostrem el misatge de nou 
*/
function acceptCookies() {
    localStorage.acceptCookies = 'true';
    $('#div-cookies').hide();
}
/** 
ejecuta cuan la web esta cargada 
*/
$(document).ready(function() {
    checkAcceptCookies();
});