<?php
namespace core;

class Request
{
    private $path;
    private $controller;
    private $action;
    private $properties = [];

    public function __construct()
    {
        $this->init();
    }

    public function init()
    {
        $this->path = empty($_GET['resource']) ? "/" : $_GET['resource'];
        $arrayPath = explode('/', $this->path);
        $this->controller = isset($arrayPath[0]) ? $arrayPath[0] : 'default';
        $this->action = isset($arrayPath[1]) ? $arrayPath[1] : 'default';
    }

    public function setPath(string $path)
    {
        $this->path = $path;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function getProperty(string $key)
    {
        if (isset($this->properties[$key])) {
            return $this->properties[$key];
        }

        return null;
    }

    public function setProperty(string $key, $val)
    {
        $this->properties[$key] = $val;
    }

}
