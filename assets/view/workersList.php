<?php 

$dal = new BusinessLogic();
$worker = new BLWorker();
$allWorkers = $worker->get();
$errors = [];

?>
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Worker_ID</th>
      <th scope="col">Worker_Name</th>
      <th scope="col">Worker_Last_Name</th>
      <th scope="col">Worker_Date_Of_hiring</th>
    </tr>
  </thead>
  <tbody>
  <div class="form-group" align=center>
  <h1>All The Workers In Data Base</h1>
  </div>
  <?php
  foreach ($allWorkers as $worker) {
      ?>
  
    <tr>
      <td><?php echo $worker->worker_id ?></td>
      <td><?php echo $worker->worker_name ?></td>
      <td><?php echo $worker->worker_lastname ?></td>
      <td><?php echo $worker->worker_workstart ?></td>
    </tr>
    <?php
  }
  ?>

  </tbody>
</table>