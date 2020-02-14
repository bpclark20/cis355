<?php

#include helper php file
require 'pageWriter.php';

if ( !empty($_POST)) {
		// keep track validation errors
		$nameError = null;
		$emailError = null;
		$phoneError = null;
		
		// keep track post values
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		
		// validate input
		$valid = true;
		if (empty($name)) {
			$nameError = 'Please enter Name';
			$valid = false;
		}
		
		if (empty($email)) {
			$emailError = 'Please enter Email Address';
			$valid = false;
		} else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
			$emailError = 'Please enter a valid Email Address';
			$valid = false;
		}
		
		if (empty($phone)) {
			$phoneError = 'Please enter a phone number.';
			$valid = false;
		}

		// insert data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO customers (name,email,phone) values(?, ?, ?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($name,$email,$phone));
			Database::disconnect();
			header("Location: crud_customers.php");
		}
	}

writeHeader();
writeBodyOpen();
?>

<div class="span10 offset1">
    				<div class="row">
		    			<h3>Add a new Customer</h3>
		    		</div>
    		
	    			<form class="form-horizontal" action="crud_customers_create.php" method="post">
					  <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
					    <label class="control-label">Name</label>
					    <div class="controls">
					      	<input name="name" type="text"  placeholder="Name" value="<?php echo !empty($name)?$name:'';?>">
					      	<?php if (!empty($nameError)): ?>
					      		<span class="help-inline"><?php echo $nameError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					  <div class="control-group <?php echo !empty($emailError)?'error':'';?>">
					    <label class="control-label">Email Address</label>
					    <div class="controls">
					      	<input name="email" type="text" placeholder="Email Address" value="<?php echo !empty($email)?$email:'';?>">
					      	<?php if (!empty($emailError)): ?>
					      		<span class="help-inline"><?php echo $emailError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
					  <div class="control-group <?php echo !empty($phoneError)?'error':'';?>">
					    <label class="control-label">Mobile Number</label>
					    <div class="controls">
					      	<input name="phone" type="text"  placeholder="Mobile Number" value="<?php echo !empty($phone)?$phone:'';?>">
					      	<?php if (!empty($phoneError)): ?>
					      		<span class="help-inline"><?php echo $phoneError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
					  <div class="form-actions">
						  <button type="submit" class="btn btn-success">Add</button>
						  <a class="btn btn-primary" href="index.php">Back</a>
						</div>
					</form>
				</div>

<?php writeClosingTags(); ?>