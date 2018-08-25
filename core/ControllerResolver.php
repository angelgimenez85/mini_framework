<?php
namespace core;

use controller\DefaultController;

class ControllerResolver
{
    private static $refCtrl = null;
    private static $defaultCtrl = DefaultController::class;

    public function __construct()
    {
        // could make this configurable
        self::$refCtrl = new \ReflectionClass(Controller::class);
    }

    public function getController(Request $request): Controller
    {
        $reg = Registry::instance();

        // obtener el modo de ejecución
        $mode = $reg->getOptions('debug-mode');
        //obtener la ruta de los comandos
        $pathControllers = $reg->getPathControllers();

        //obtener el comando y la acción correspondiente
        $controller = $request->getController();
        $action = $request->getAction();

        //crear la ruta al comando especificado
        $class = $pathControllers['path'].$controller;

        if (is_null($class)) {
            //$request->addFeedback("path '$path' not matched");
            if ($mode) echo "Es null <br/>";
            return new self::$defaultCtrl();            
        }

        if (! class_exists($class)) {
            //$request->addFeedback("class '$class' not found");
            if ($mode) echo "No existe la clase $class<br/>";
            return new self::$defaultCtrl();

        }

        $refclass = new \ReflectionClass($class);

        if (! $refclass->isSubClassOf(self::$refCtrl)) {
            //$request->addFeedback("command '$refclass' is not a Command");
            if ($mode) echo "No es un comando válido <br/>";
            return new self::$defaultCtrl();
        }

        return $refclass->newInstance();
    }
}
