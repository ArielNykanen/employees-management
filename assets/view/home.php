
<?php 

$dal = new BusinessLogic();
$worker = new BLWorker();
$allWorkers = $worker->get();
$errors = [];


?>

<hr>
<form action="home" method='POST'>
<div class="row">
<div class="form-group col-md-12"  align=center>
<h2>Find Worker By Id Number</h2>
</div>
<div class="form-group col-md-12"  align=center>
<input class='form-control text-center w-50' type="number" name='workerId'>
</div>
<div class="form-group col-md-12" align=center>
<button class='btn btn-primary' name="searchWorker">Search</button>
</div>
</div>
<?php
if (isset($_POST['searchWorker'])) {
    $worker = new BLWorker();
    if ($oneWorker = $worker->getOne($_POST['workerId'])) {
        
        ?>
        <table class="table table-dark">
            <tr>
      <td><?php echo $oneWorker->worker_id ?></td>
      <td><?php echo $oneWorker->worker_name ?></td>
      <td><?php echo $oneWorker->worker_lastname ?></td>
      <td><?php echo $oneWorker->worker_workstart ?></td>
    </tr>
    </table>
<?php
    }
 if (!$oneWorker) {
    $workerIdSearched = $_POST['workerId'];
    echo "<p class='bg-danger text-center'>Worker With The ID $workerIdSearched Not Found!</p>";
 }
} 



?>
</form>
<hr>
