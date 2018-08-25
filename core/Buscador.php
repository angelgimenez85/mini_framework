<?php
namespace core;

abstract class Buscador
{
    public function search(string $consultaBusqueda, string $class, \PDO $pdo)
    {

        $caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/");
        $caracteres_buenos = array("& lt;", "& gt;", "& quot;", "& #x27;", "& #x2F;", "& #060;", "& #062;", "& #039;", "& #047;");
        $consultaBusqueda = str_replace($caracteres_malos, $caracteres_buenos, $consultaBusqueda);

        $mensaje = "";

        if (isset($consultaBusqueda)) {
            $clase = new $class($pdo);
            $resultados = $clase->getArrayData($consultaBusqueda);

            if (is_null($resultados)) {
                $mensaje = "sin datos";
                
            /*} else {
                $mensaje = array();
                while ($resultados = mysqli_fetch_array($consulta)) {
                    $mensaje[] = $resultados;
                }*/
            } else {
                $mensaje = $resultados;
            }
        }

        return json_encode($mensaje);
    }
}
