<?php
namespace core;

class Utilidades
{
    public static function limpiarCadena(string $search)
    {
        $search = trim($search);
        $caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/");
        $caracteres_buenos = array("& lt;", "& gt;", "& quot;", "& #x27;", "& #x2F;", 
                                    "& #060;", "& #062;", "& #039;", "& #047;");
        $search = str_replace($caracteres_malos, $caracteres_buenos, $search);

        return $search;
    }

    public static function formato($url): string
    { 
        // Tranformamos todo a minusculas 
        $url = strtolower($url); 
        //Remplazamos caracteres especiales latinos 
        $find = array('á', 'é', 'í', 'ó', 'ú', 'ñ'); 
        $repl = array('a', 'e', 'i', 'o', 'u', 'n'); 
        $url = str_replace ($find, $repl, $url); 
        // Añadimos los guiones 
        $find = array(' ', '&', '\r\n', '\n', '+');
            $url = str_replace ($find, '-', $url); 
        // Eliminamos y Reemplazamos otros carácteres especiales 
        $find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/'); 
        $repl = array('', '-', ''); 
        $url = preg_replace ($find, $repl, $url);
     
        return $url; 
    }
    /*
      Sanitize function
      Devuelve la variable saneada o TRUE/FALSE si la variable valida/no valida
      $input: variable a sanear
      $type:  lo que queremos comprobar
    */
    public static function sanitize($input, string $type)
    {
        switch ($type) {
            // 1- Input Validation
         
            case 'int': // comprueba si $input es integer
                if (is_int($input)) {
                    $output = TRUE;
                } else {
                    $output = FALSE;
                }
                break;
         
            case 'str': // comprueba si $input es string
                if (is_string($input)) {
                    $output = TRUE;
                } else {
                    $output = FALSE;
                }
                 break;
         
            case 'digit': // comprueba si $input contiene solo numeros
                if (ctype_digit($input)) {
                    $output = TRUE;
                } else {
                    $output = FALSE;
                }
                break;
         
            case 'upper': // comprueba si $input contiene solo mayusculas
                if ($input == strtoupper($input)) {
                    $output = TRUE;
                } else {
                    $output = FALSE;
                }
                break;
         
            case 'lower': // comprueba si $input contiene solo minusculas
                if ($input == strtolower($input)) {
                    $output = TRUE;
                } else {
                    $output = FALSE;
                }
                break;
         
            case 'mobile': // comprueba si $input contiene 9 numeros
                if ((strlen($input) == 9) && (ctype_digit($input) == TRUE)) {
                    $output = TRUE;
                } else {
                    $output = FALSE;
                }
                break;
         
            case 'email': // comprueba si $input tiene formato de email
                $reg_exp = "/^[-.0-9A-Z]+@([-0-9A-Z]+.)+([0-9A-Z]){2,4}$/i";
                if (preg_match($reg_exp, $input)) {
                    $output = TRUE;
                } else {
                    $output = FALSE;
                }
              break;
         
            // 2- SQL Encoding
         
            case 'sql': // escapar los caracteres que no son legales en SQL
         
                // si magic_quotes_gpc esta activado primero aplicar stripslashes()
                // de lo contrario los datos seran escapados dos veces
                if (get_magic_quotes_gpc()) {
                    $input = stripslashes($input);
                }
         
                // requiere una conexion MySQL, de lo contrario dara error
                $output = mysql_real_escape_string(trim($input));
                break;
         
            // 3- Output Filtering
         
            case 'no_html': // los datos van a una pagina web, escapar para HTML
                $output = htmlentities(trim($input), ENT_QUOTES);
                break;
         
            case 'shell_arg': // los datos van al shell, escapar para shell argument
                $output = escapeshellarg(trim($input));
                break;
         
            case 'shell_cmd': // los datos van al shell, escapar para shell command
                $output = escapeshellcmd(trim($input));
                break;
         
            case 'url': // los datos forman parte de una URL, escapar para URL
         
                // htmlentities() traduce a HTML el separador &
                $output = htmlentities(urlencode(trim($input)));
                break;
         
            case 'comment': // los datos solo pueden contener algunos tags HTML
                $output = strip_tags($input, '<b><i><img>');
                break;
        }
        return $output;
    }

/*
// Ejemplo de uso 1:
// recepción de variable y guardado en la bd.

$input = $_POST['input'];

// si valida, escapar para SQL y guardar
if (Sanitize($input, 'str')) {
    // connect
    $link = mysql_connect('mysql_host', 'mysql_user', 'mysql_password')
        OR die(mysql_error());
 
    // escapar para SQL
    // requiere una conexion MySQL, de lo contrario dara error
    $input = Sanitize($input, 'sql');
 
    // query
    $query = "INSERT INTO comments (comment) VALUES ('$input')";
}


// Ejemplo de uso 2:

// los datos no deben contener tags HTML, excepto <b><i><img>
$input = Sanitize($input, 'comment');
 
// los datos van a una pagina web, escapar para HTML
$input = Sanitize($input, 'no_html');
echo $input;
*/

}
