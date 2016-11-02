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


    public function testData()
    {


      $data =  $this->model->testFunction();


      $this->view->loadView('test',$data);

    }





}
