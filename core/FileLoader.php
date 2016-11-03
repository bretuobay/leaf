<?php
namespace Bretuobay\App;

class FileLoader{

    public static  function routeController($name)
    {
        $contrl = ucfirst($name);

        spl_autoload_register(function ($contrl) {

            require_once PATH_BASE.DS.CONTROLLERS.DS.$contrl.'.php';

        });
        return new  $contrl();
    }
}