<?php

#include helper php file
require 'pageWriter.php';

$id = null;
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}
	
	if ( null==$id ) {
		header("Location: crud_customers.php");
	} else {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM customers where id = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		Database::disconnect();
	}

writeHeader();
writeBodyOpen();

echo "<h2>CRUD - Customers</h2>";

?>

<div class="span10 offset1">
    				<div class="row">
		    			<h3>Read a Customer</h3>
		    		</div>
		    		
	    			<div class="form-horizontal" >
					  <div class="control-group">
					    <h4>Name</h4>
					    <div class="controls">
						    <label class="checkbox">
						     	<?php echo $data['name'];?>
						    </label>
					    </div>
					  </div>
					  <div class="control-group">
					    <h4>Email Address</h4>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['email'];?>
						    </label>
					    </div>
					  </div>
					  <div class="control-group">
					    <h4>Phone Number</h4>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['phone'];?>
						    </label>
					    </div>
					  </div>
					    <div class="form-actions">
						  <a class="btn btn-primary" href="crud_customers.php">Back</a>
					   </div>
					
					 
					</div>
				</div>

<?php writeClosingTags(); ?>