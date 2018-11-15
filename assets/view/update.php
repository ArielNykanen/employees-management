<?php 

$dal = new BusinessLogic();
$worker = new BLWorker();
$allWorkers = $worker->get();
$success;
$errors = [];

if (isset($_POST['delete'])) {
$worker->delete($_POST['delete']);
$allWorkers = $worker->get();
$success = "Worker Was Deleted Successfully";
}


if (isset($_POST['updateWorker'])){
    if (empty(
        $_POST['worker_id'] &&
        $_POST['worker_name'] &&
        $_POST['worker_lastname'])) {
            $errors[] = 'you cant leave the inputs empty!';
        }
        if (empty($errors)) {
            $success = 'Updated Successfully!';
            $worker = new BLWorker();
            $worker->update(
                $worker = new WorkerModel([
                    'worker_id' => $_POST['worker_id'],
                    'worker_name' => $_POST['worker_name'],
                    'worker_lastname' => $_POST['worker_lastname'],
                    'worker_workstart' => $_POST['worker_workstart'],
                    ])
                );
            } 
            $worker = new BLWorker();
            $allWorkers = $worker->get();
	}
?>

<div class="row">
<?php
if (!empty($errors)) {
    ?>
           <div class="col-md-12 col-md-offset-3" align=center>
      <?php foreach ($errors as $error) {
                echo "<p class='bg-danger'>$error</p>";
            } ?> 
           </div>

           <?php } else if (!empty($success)) {
               ?>
           <div class="col-md-12 col-md-offset-3" align=center>
           <?php
               echo "<p class='bg-success'>$success</p>";
               ?>
        </div>
               <?php }?>

</div>
<form action="update" method='POST'>

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
      if (isset($_POST['update']) && $_POST['update'] == $worker->worker_id) {
      ?>
    
    <tr>
      
      <td>
      <input type="hidden" name='worker_id' value='<?php echo $worker->worker_id ?>'>
      <input type="text" value='<?php echo $worker->worker_id ?>' disabled>
      </td>
      <td><input type="text" name='worker_name' value='<?php echo $worker->worker_name ?>'></td>
      <td><input type="text" name='worker_lastname' value='<?php echo $worker->worker_lastname ?>'></td>
      <td><input type="text" name='worker_workstart' value='<?php echo $worker->worker_workstart ?>'></td>
      <td><button type='submit' name='updateWorker' class='btn btn-primary' value='<?php echo $worker->worker_id ?>'>Update</button>
      <td><button type='submit'  class='btn btn-danger' value='<?php echo $worker->worker_id ?>'>Cancel</button>
    </tr>
    <?php
  } else {
    ?>
    <tr>
      <td><?php echo $worker->worker_id ?></td>
      <td><?php echo $worker->worker_name ?></td>
      <td><?php echo $worker->worker_lastname ?></td>
      <td><?php echo $worker->worker_workstart ?></td>
      <td><button type='submit' name='update' class='btn btn-primary' value='<?php echo $worker->worker_id ?>'>Update</button>
      <td><button type='submit' name='delete' class='btn btn-danger' value='<?php echo $worker->worker_id ?>'>Delete</button>
    </tr>
<?php
  }
}
  ?>
</form>
  </tbody>
</table>