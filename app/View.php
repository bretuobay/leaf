<?php
namespace Bretuobay\App;

class View{

  public $data ;

  public static function loadHeader($header=null,$dir=null)
  {
    if($header ==null && $dir==null){

    require_once __DIR__.DS.'..'.DS.'views'.DS.'header.php';
    }

  }

  public static function loadFooter($footer=null,$dir=null)
  {

    if($footer ==null && $dir===null){

      require_once __DIR__.DS.'..'.DS.'views'.DS.'footer.php';

    }

  }

  public  function loadView($module,$data)
  {
    // this must be calls to the view
    $this->data = $data;
    self::loadHeader();
    require_once __DIR__.DS.'..'.DS.'views'.DS.$module.DS.$module.'.view.php';
    self::loadFooter();

  }





}
