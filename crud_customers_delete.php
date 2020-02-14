<?php

#include helper php file
require 'pageWriter.php';

$id = 0;
	
if ( !empty($_GET['id'])) {
	$id = $_REQUEST['id'];
}

if ( !empty($_POST)) {
	// keep track post values
	$id = $_POST['id'];
	
	// delete data
	$pdo = Database::connect();
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "DELETE FROM customers  WHERE id = ?";
	$q = $pdo->prepare($sql);
	$q->execute(array($id));
	Database::disconnect();
	header("Location: crud_customers.php");
}

writeHeader();
writeBodyOpen();
?>
<div class="span10 offset1">
	<div class="row">
		<h2>Delete a Customer</h2>
	</div>
		    		
	<form class="form-horizontal" action="crud_customers_delete.php" method="post">
		<input type="hidden" name="id" value="<?php echo $id;?>"/>
		  <p class="alert alert-error">Are you sure to delete ?</p>
	    <div class="form-actions">
			<button type="submit" class="btn btn-danger">Yes</button>
			<a class="btn btn-primary" href="crud_customers.php">No</a>
		</div>
	</form>
</div>

<?php writeClosingTags(); ?>