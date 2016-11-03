<?php
namespace Bretuobay\App;

class Controller{

    protected $model;
    protected $view;
    protected $error;
    protected $message;

    public function __construct(){
       $this->view =  new View();
       $this->model  = NULL;
    }

    /**
     * @param $name
     * @return mixed
     */
    public function useModel($name)
    {
        $model = ucfirst($name);

        spl_autoload_register(function ($model) {

           require_once PATH_BASE.DS.MODELS.DS.$model.'.php';

        });
        return new $model;
    }

    


    /**
     * @return mixed
     */
    public function postParams()
    {
        foreach($_POST as $key=>$value){

            $params[$key] = $value;

        }
        return $params;
    }




}
