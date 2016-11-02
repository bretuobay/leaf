<?php


class Test extends \Bretuobay\App\Model{

    public function testFunction(){

        $this->dbh = \Bretuobay\App\Model::dbInstance();

        foreach($this->dbh->query('SELECT * from calories') as $key=>$row) {
            //print("<hr/>");
            $data[$key] = $row;
            //echo json_encode($row, JSON_PRETTY_PRINT);
        }
        return $data;
    }



   public function retData(){

     return [
       'wow' => ' Awesome Data response'
     ];

   }


}
