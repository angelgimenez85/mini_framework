<?php
namespace core;

class ApplicationHelper
{
    private $values = [];
    private $optionfile = __DIR__ . "/../configs/options.ini";
    private $reg;

    private function setupOptions()
    {
        if (! file_exists($this->optionfile)) {
            throw new \Exception("Could not find options file");
        }

        $options = parse_ini_file($this->optionfile, true);

        $assets = array(
            'styles'=>$options['styles'], 
            'scripts'=>$options['scripts']
        );

        //guarda la ruta de los assets en Registry 
        $this->reg->setAssets($assets);

        //guardo la ruta de los controladores directamente en Registry
        $this->reg->setPathControllers($options['controllers']);

        // guardo las opciones generales de configuración.
        $this->reg->setOptions($options['options']);
    }

    public function init()
    {
        $this->reg = Registry::instance();
        //crea la conexión con la BD y la guarda en Registry
        $this->reg->setPdo($this->getDbManager());
        //obtiene el objeto HttpRequest y lo guarda en Registry
        $this->getRequest();
        //carga las configuraciones en Registry
        $this->setupOptions();
    }

    private function getRequest()
    {
        $request = new HttpRequest();
        $this->reg->setRequest($request);
    }

    public function set(string $key, $value)
    {
        $this->values[$key] = $value;
    }

    public function get(string $key)
    {
        return $this->values[$key];
    }

    public function getDbManager(): \PDO
    {
        return DbManager::getInstance();
    }
}
