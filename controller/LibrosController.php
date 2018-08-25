<?php
namespace controller;

use core\{Controller, HelperView};
use dao\LibroDAO;

class LibrosController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function execute(string $action)
    {
        $this->$action();
    }

    public function default() {
        echo "Acción por defecto...";
    }

    public function lista()
    {
        //cada comando pasa sus datos (raw) al helperview
        //y muestra su plantilla
        $page = (int)$this->request->getProperty('page');

        $query = 'SELECT * FROM libros LIMIT ?, ?';
        $libroDao = new LibroDAO($this->pdo);        
        $listaLibros = $libroDao->getAsObject($query, [$page, 6]);

        if (count($listaLibros) == 0) {
            echo "No se encontraron coincidencias.";
            exit;
        }

        $data = ['titulo'=>'Lista de libros', 'libros'=>$listaLibros];

        $this->helperView = new HelperView($data);
        $this->helperView->setTemplate('lista_libros.tpl');
        $this->helperView->view();
    }

    public function buscar()
    {
        $search = $this->request->getProperty('search');
        $page = (int)$this->request->getProperty('page');

        $query = 'SELECT * FROM libros WHERE titulo LIKE ? LIMIT ?, ?';
        $libroDao = new LibroDAO($this->pdo);        
        $listaLibros = $libroDao->getAsObject($query, ["%".$search."%", $page, 3]);

        if (count($listaLibros) == 0) {
            echo "No se encontraron coincidencias.";
            exit;
        }
        
        $data = ['titulo'=>'Lista de libros', 'libros'=>$listaLibros];

        $this->helperView = new HelperView($data);
        $this->helperView->setTemplate('lista_libros.tpl');
        $this->helperView->view();
    }
}
