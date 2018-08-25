<?php
namespace core;

class HttpRequest extends Request
{
    private $controller = 'default';
    private $action = 'default';
    private $property = '';

    public function init()
    {
        //asocia la petición al controlador correspondiente
        //el controlador aparece en el índice 1, action en 2...
        $this->path = empty($_GET['path']) ? "/" : $_GET['path'];
        //descomponemos el url enviada.
        $arrayPath = explode('/', $this->path);

        for ($i = 0; $i < count($arrayPath); $i++) { 
            switch ($i) {
                case 0:
                    $controller = Utilidades::formato($arrayPath[$i]);
                    if ($controller != '') {
                        $this->controller =  $controller;
                    }
                    break;
                case 1:
                    $action = Utilidades::formato($arrayPath[$i]);
                    if ($action != '') {
                        $this->action =  $action;
                    }
                    break;
                case 2:
                    if (($property = Utilidades::formato($arrayPath[$i])) != ''){
                        if ($this->action == 'lista') {
                            $this->setProperty('page', $property);
                        }
                        if ($this->action == 'buscar') {
                            $this->setProperty('search', Utilidades::formato($property));
                        }
                    }
                    break;
                case 3:
                    if (($property = Utilidades::formato($arrayPath[$i])) != ''){
                        if ($this->action == 'buscar') {
                            $this->setProperty('page', $property);
                        }
                    }                    
            }
        }
        //se "arma" el nombre del controlador
        $this->controller = ucfirst($this->controller).'Controller';
    }

    public function getController(): string
    {
        return $this->controller;
    }

    public function getAction(): string
    {
        return $this->action;
    }
}
