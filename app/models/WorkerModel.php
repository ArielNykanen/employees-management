<?php
    require_once 'model.php';
    require_once 'app/bl/BLWorker.php';

class WorkerModel implements Imodel {

  private $worker_id;
  private $worker_name;
  private $worker_lastname;
  private $worker_workstart;

  public function __construct($arr) {
    
    $this->worker_id = $arr["worker_id"];
    $this->worker_name = $arr["worker_name"];
    $this->worker_lastname = $arr["worker_lastname"];
    $this->worker_workstart = $arr["worker_workstart"];

  }

function __get($data){
    return $this->$data;
  
}

function __set($data, $data2){

}



 // Lazy load
//  function someModel() {
//   if (empty($this->someModel)) {
//       $sbl= new BusinessLogicSome();
//       $this->someModel = $pbl->getOne($this->some_id);
//   }
//   return $this->someModel;
// }

}

?>