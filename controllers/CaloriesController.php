<?php

class CaloriesController extends Bretuobay\App\Controller {

    use Utility;

    public function home()
    {

        header('location:front_app.php');
    }

    public function index()
    {
        $this->useModel('Calories')->index('calories');
    }

    public function find()
    {
        $id = $_POST['id'];

        $this->useModel('Calories')->findById($id,'calories');
    }

    public function filter()
    {
        $begin =   $this->convertDateUtil($_POST['begin']);

        $end   =   $this->convertDateUtil($_POST['end']);

        $this->useModel('Calories')->filter($begin,$end);
    }


    public function save(){

        $params = $this->paramsArray();

        $this->useModel('Calories')->save($params);

    }

    public function edit(){

        $params = $this->paramsArray();

        $this->useModel('Calories')->edit($params);

    }

    public function delete()
    {
        $id = $_POST['id'];

        $this->useModel('Calories')->delete($id,'calories');

    }


    /**
     * @return array
     */
    public function paramsArray()
    {
        $extra_params = [
            'date' => $this->convertDateUtil($_POST['date']),
            'curr_user' => $_SESSION['curr_user']
        ];
        return array_merge($extra_params,$this->postParams());
    }

}
