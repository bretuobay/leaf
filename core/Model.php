<?php

namespace Bretuobay\App;
use PDO;

class Model{

    use ErrorUtilities;

    private static  $dbh=NULL;
    public $json_err;
    public $json_success;
    protected $db;
    public $config;
    private $errors = [];


    public function __construct()
    {

    }

    private function __clone()
    {


    }


    public static function dbInstance()
    {
        if (!isset(self::$dbh)) {

            $options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;

            try{

                self::$dbh = new PDO('mysql:host=localhost;dbname=demoapp', DBUSER, DBPASS, $options);

            }catch(\PDOException $e){

                echo "Connection error: " . $e->getMessage();

            }
        }
        return self::$dbh;
    }






    public  function delete($id,$table)
    {
        $this->dbh = self::dbInstance();

        $query = "DELETE FROM " . $table . " WHERE id = :id";

        try {

            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam("id", $id);

            if($stmt->execute()){

                echo json_encode($this->retSuccess());

            }else{

                echo  json_encode($this->retFailure());
            }

        } catch(\PDOException $e) {

            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }

    /**
     * @param $table
     * Modified to grab on data of the current user
     *  This has lost its intended purpose, but can be used on both tables
     *
     */
    public function index($table)
    {

        $this->dbh = self::dbInstance();

        $sql = "SELECT * FROM $table WHERE curr_user=:curr_user";

        try {

            $stmt = $this->dbh->prepare($sql);
            $stmt->bindParam(':curr_user', $_SESSION['curr_user']);
            $stmt->execute();
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

            echo json_encode(array_merge($this->retSuccess(),["data"=>$users]));

        } catch(\PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }

    }

    /**
     * @param $id
     * @param $table
     * No need to use user as primary is id
     */
    public function findById($id,$table)
    {

        $this->dbh = self::dbInstance();

        $sql="SELECT * FROM $table WHERE id = :id";

        try {

            $stmt = $this->dbh->prepare($sql);

            $stmt->execute(array(':id'=>$id));

            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            echo json_encode(array_merge($this->retSuccess(),['data' =>$data]));

        } catch(\PDOException $e) {

            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }

    }

    /*
    *@model | takes model name of table name and capitalize first letter
    */
    public function upCaseModel($model)
    {
      return ucfirst($model);
    }


}
