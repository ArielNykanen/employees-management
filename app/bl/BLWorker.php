<?php
    require_once 'BusinessLogic.php';
    require_once 'app/models/WorkerModel.php';

class BLWorker extends BusinessLogic {

  public function get()
  {
      $query = 'SELECT * FROM `workers`';

      $result = $this->dal->select($query);
      $resultsArray = [];

      while ($row = $result->fetch()) {
          array_push($resultsArray, new WorkerModel($row));
      }
      return $resultsArray;
  }

  

  public function getOne($id)
  {

      $q = "SELECT * FROM `workers` WHERE worker_id= :id";

      $results = $this->dal->select($q, [
          'id' => $id
      ]);
      $row = $results->fetch();
      if ($row) {
          return new WorkerModel($row);
      }
      return false;
  }

  public function set($a)
  {   
      $query = "INSERT INTO `workers`( `worker_id`, `worker_name`, `worker_lastname`, `worker_workstart`) VALUES (:wid, :wn, :wln, :wws)";

      $params = array(
          "wid" => $a->worker_id,
          "wn" => $a->worker_name,
          "wln" => $a->worker_lastname,
          "wws" => $a->worker_workstart,
      );


      $this->dal->insert($query, $params);
  }

  public function update($a)
  {

      $query = "UPDATE `workers` SET 
        `worker_id`=?, 
        `worker_name`=?, 
        `worker_lastname`=?, 
        `worker_workstart`=? 
        WHERE `worker_id`=?";   

      $params = array(
        $a->worker_id,
        $a->worker_name,
        $a->worker_lastname,
        $a->worker_workstart,
        $a->worker_id
      );

      $this->dal->update($query, $params);
  }

  public function delete($id)
  {
      $query = "DELETE FROM `workers` WHERE `worker_id` = :wid";

      $params = array(
          "wid" => $id
      );

      $this->dal->delete($query, $params);
  }

}


?>