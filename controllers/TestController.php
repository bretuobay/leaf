<?php
class TestController extends Bretuobay\App\Controller{


  public function __construct()
  {

    parent::__construct();

  	if(null === $this->model){
	       $this->model =$this->useModel('Test');
      }

	   return $this->model;

    }

    public function view()
    {

      $this->view->appendJs('test.js','test');
      $this->view->appendCss('bootstrap.min.css','test');
      $this->view->appendCss('custom.css','test');

    }


    public function testData()
    {

      $this->view->data =  $this->model->testFunction();
      $this->view();
      $this->view->loadView('test',$this->view->data);

    }





}
