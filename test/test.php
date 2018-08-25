<?php
require '../lib/autoload.php';


$pdo = DbManager::getInstance();

/*INSERT

$editorialDAO = new EditorialDAO($pdo);
$editorial = $editorialDAO->obtener(16);

$autorDAO = new AutorDAO($pdo);

$libroDAO = new LibroDAO($pdo);
$libro = new Libro(-1, 'Cuentos2', '25/02/18', 'angel', 'Contenido del libro 2.');
$libro->setEditorial($editorial);
$libro->addAutor($autorDAO->obtener(3));
$libro->addAutor($autorDAO->obtener(6));

$libroDAO->insertar($libro);*/

//UPDATE

/*$autorDAO = new AutorDAO($pdo);
$libroDAO = new LibroDAO($pdo);

$libro = $libroDAO->obtener(16);
$libro->setContenido('Contenido del libro 16');
$libro->removeAutores();
$libro->addAutor($autorDAO->obtener(3));
$libro->addAutor($autorDAO->obtener(4));

$libroDAO->modificar($libro);

$libro2 = $libroDAO->obtener(16);
print_r($libro2);*/


//DELETE

/*$libroDAO = new LibroDAO($pdo);
$libro = $libroDAO->obtener(32);
$libroDAO->eliminar($libro);*/


//GET_BY_AUTHOR

/*$libroDAO = new LibroDAO($pdo);
$libros = $libroDAO->obtenerPorAutor(4);
print_r($libros);*/


/*$libroDAO = new LibroDAO($pdo);
$libro = $libroDAO->obtener(31);

$usuarioDAO = new UsuarioDAO($pdo);
$usuario = $usuarioDAO->obtener(1);

$publicacionDAO = new PublicacionDAO($pdo);
$fecha = new DateTime( 'now');
$publicacion = new Publicacion(
    $fecha->format('d/m/Y'), 
    $usuario, 
    $libro);

$publicacionDAO->insertar($publicacion);
print_r($publicacion);*/

/*$publicacionDAO = new PublicacionDAO($pdo);
print_r($publicacionDAO->obtener(1));*/