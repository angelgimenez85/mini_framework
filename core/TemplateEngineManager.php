<?php

namespace core;

class TemplateEngineManager
{
    private static $instance = null;

    private function __construct()
    {

    }

    public static function getTemplateEngine()
    {
        if (is_null(self::$instance)) {
            include __DIR__.'/../lib/smarty/Smarty.class.php';
            $smarty = new \Smarty();

            $smarty->template_dir = __DIR__.'/../view/templates/';
            $smarty->compile_dir = __DIR__.'/../view/compile/';
            $smarty->config_dir = __DIR__.'/../configs/';
            $smarty->cache_dir = __DIR__.'/../view/cache/';

            //$smarty->caching = 1;
            //$smarty->cache_lifetime = 10;
            //Cargando archivo de configuración con la sección "setup"
            //$smarty->configLoad('smarty.conf', 'setup');
            self::$instance = $smarty;
        }

        return self::$instance;
    }
}
