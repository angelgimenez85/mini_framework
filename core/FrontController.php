<?php
namespace core;

class FrontController
{
    private $reg;

    private function __construct()
    {
        $this->reg = Registry::instance();
    }

    public static function run()
    {
        $instance = new FrontController();
        $instance->init();
        $instance->handleRequest();
    }

    private function init()
    {
        $this->reg->getApplicationHelper()->init();
    }

    private function handleRequest()
    {
        $request = $this->reg->getRequest();
        $resolver = new ControllerResolver();
        //valida y obtiene el comando correspondiente
        $controller = $resolver->getController($request);
        //obtiene y valida la acción y la ejecuta en el comando indicado
        $action = $request->getAction();
        $action = method_exists($controller, $action) ? $action : 'default';    
        $controller->execute($action);
    }
}
