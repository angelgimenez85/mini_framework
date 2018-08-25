<?php
namespace controller;

use core\{Controller, HelperView};

class DefaultController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function execute(string $action)
    {
        $this->$action();
    }

    public function default()
    {
        //cada comando pasa sus datos (raw) al helperview
        //y muestra su plantilla
        $this->helperView = new HelperView(['titulo'=>'Bienvenido a My_Framework']);
        $this->helperView->setTemplate('index.tpl');
        $this->helperView->view();
    }
}