<?php
// foreach ($allUsers as $user) {
  
//   echo $user->user_name . "<br>";
//   echo $user->user_email . "<br>";
//   echo $user->user_lastname . "<br>";
//   echo $user->user_password . "<br>";
  
// }

$dal = new BusinessLogic();
$worker = new BLWorker();
$allWorkers = $worker->get();
$errors = [];

if (isset($_POST['register-submit'])){
	$today = date("Y-m-d H:i:s");
	foreach ($allWorkers as $worker) {
		if ($worker->worker_id == $_POST['worker_id']) {
			$errors[] = 'The worker ID is all ready in the database!';
		}
	}

	if (empty($_POST['worker_id'] &&
	$_POST['worker_name'] &&
	$_POST['worker_lastname'])) {
		$errors[] = 'you need to fill all the fields';
	}

	if (empty($errors)) {
		$success = 'Registered Successfuly!';
		$worker = new BLWorker();
		$worker->set(
			$worker = new WorkerModel([
				'worker_id' => $_POST['worker_id'],
				'worker_name' => $_POST['worker_name'],
				'worker_lastname' => $_POST['worker_lastname'],
				'worker_workstart' => $today,
				])
			);
	} 
  // todo do some validation you need to.
//  var_dump($_POST['worker_workstart']);
	// todo if (empty etc...) {} 	
	
  
}

?>


<div id="loginRegisterWrap">
  <div align=center >
 <?php 
 if (!empty($errors)) {
	 ?>
			<div class="col-md-6 col-md-offset-3">
       <?php foreach ($errors as $error) {
				 echo "<p class='bg-danger'>$error</p>";
			 } ?> 
			</div>

			<?php } else if (!empty($success)) {
				?>
			<div class="col-md-6 col-md-offset-3">
			<?php
				echo "<p class='bg-success'>$success</p>";
				?>
		 </div>
				<?php }?>
			<div class="col-md-6 col-md-offset-3">
        <h1>Add New Worker</h1>
      </div>
          <hr>
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" action="register" method="post" role="form">
									<div class="form-group">
                  <label>Worker Id</label>
										<input type="number" name="worker_id" class="form-control w-50" placeholder="Enter Worker Id" value="">
                  
                  </div>
                  
									<div class="form-group">
                  <label>Worker Name</label>
										<input type="text" name="worker_name" id="lastname" class="form-control w-50" placeholder="Enter Name" value="">
                  
									</div>
									<div class="form-group">
                  <label>Worker Last Name</label>
										<input type="text" name="worker_lastname" class="form-control w-50" placeholder="Enter Last Name" value="">
                  
									</div>
									<!-- <div class="form-group text-center">
										<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
										<label for="remember"> Remember Me</label>
									</div> -->
									<div align=center class="form-group">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-success  w-50" value="Register">
											</div>
									</div>
					
        </form>
    </div>
  </div>
</div>

							