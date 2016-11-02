<?php


class Users extends \Bretuobay\App\Model{

    public $id;
    public $email;
    public $password;
    public $table_name = 'users';

    public function index($table){

        $this->dbh = self::dbInstance();

        $sql = "SELECT * FROM users";

        try {

            $stmt = $this->dbh->prepare($sql);
            $stmt->execute();
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

            echo json_encode(array_merge($this->retSuccess(),$users));

        } catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }


    }

    public function register($params_array)
    {

        extract($params_array);

          $this->dbh = self::dbInstance();

        $pass_as_hash =  hash('sha256', $password, false);

        $sql = "INSERT INTO users (id,email, password) VALUES (:id, :email, :password)";

        try {

            $stmt = $this->dbh->prepare($sql);
            $stmt->bindParam("id", $id);
            $stmt->bindParam("email", $email);
            $stmt->bindParam("password", $pass_as_hash);
            $ret=$stmt->execute();
            $this->dbh = null;
                if($ret)
                   echo json_encode(array_merge($this->retSuccess(),['res'=>$ret]));
              else
                  echo json_encode($this->retFailure());


        } catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }

    }

    public function login($params_array)
    {

        $this->dbh = self::dbInstance();

        extract($params_array);

        $email_query = $email;

        $pass_as_hash =  hash('sha256', $password, false);

        try {

        $sql = "SELECT * FROM users WHERE UPPER(email) LIKE :query ORDER BY email";

            $stmt = $this->dbh->prepare($sql);
            $query = "%".$email_query."%"; // TODO: Clean up to  remove like, be exact
            $stmt->bindParam("query", $query);
            $stmt->execute();
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC)[0]; // TODO : Clean up
            $this->dbh = null;

           // print_r($users);

            if($users['password'] === $pass_as_hash && $users['email'] === $email){

                $_SESSION['curr_user']= $users['email'];
                $_SESSION['daily_cal'] = $users['daily_cal'];
                $_SESSION['logged_in']= true;

                echo json_encode($this->retSuccess());

            }else{

                echo json_encode($this->retFailure());
            }



        } catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }

    }

    public function setCalories($daily_cal)
    {

        $this->dbh = self::dbInstance();

        $curr_user = $_SESSION['curr_user'];
        // if reset, set new
        $_SESSION['daily_cal'] = $daily_cal;

        $sql = "UPDATE users SET daily_cal=:daily_cal WHERE email=:email";
        try {

            $stmt = $this->dbh->prepare($sql);
            $stmt->bindParam("daily_cal", $daily_cal);
            $stmt->bindParam("email", $curr_user);
            $stmt->execute();
            $this->dbh = null;

            echo json_encode($this->retSuccess());

        } catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }


    public function logout()
    {

       if(isset($_SESSION)){
           session_unset();
           session_destroy();
       }
        return true;


    }



}
