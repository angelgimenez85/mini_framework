<?php
namespace core;

class Registry
{
    private $pdo = null;
    private $applicationHelper = null;
    private static $instance = null;
    private $request; //almacena la petición del cliente
    private $pathControllers;
    private $assets;
    private $options; // opciones generales de configuración

    private function __construct()
    {

    }

    public static function instance(): self
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getApplicationHelper(): ApplicationHelper
    {
        if (is_null($this->applicationHelper)) {
            $this->applicationHelper = new ApplicationHelper();
        }

        return $this->applicationHelper;
    }

    public function setPdo(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    
    public function getPdo(): \PDO
    {
        return $this->pdo;
    }

    public function setRequest(Request $request)
    {
        $this->request = $request;
    }

    public function getRequest(): Request
    {
        if (is_null($this->request)) {
            throw new \Exception("No Request set");
        }

        return $this->request;
    }

    public function setpathControllers($controllers)
    {
        $this->pathControllers = $controllers;
    }

    public function getpathControllers()
    {
        return $this->pathControllers;
    }

    public function setAssets(array $assets)
    {
        $this->assets = $assets;
    }

    public function getAssets(string $key)
    {
        if (isset($this->assets[$key])) {
            return $this->assets[$key];
        }
        return null;
    }

    public function setOptions(array $options)
    {
        $this->options = $options;
    }

    public function getOptions(string $key)
    {
        if (isset($this->options[$key])) {
            return $this->options[$key];
        }
        return null;
    }
}
