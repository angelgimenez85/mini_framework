<?php
namespace core;

abstract class Controller
{
    protected $request;
    protected $templateManager;
    protected $helperView;
    protected $pdo;

    public function __construct()
    {
        $reg = Registry::instance();
        $this->request = $reg->getRequest();
        $this->pdo = $reg->getPdo();
    }
    // ejecuta la acción pasada como argumento
    abstract public function execute(string $action);
}
