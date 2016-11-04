<?php

include 'connect_database.php';
include 'common.php';

if (!empty($_POST)) {
	//initial query
	$query = "INSERT INTO transaction ( id, donor, project_id, amount, description, created_time ) VALUES ( :id, :donor, :project_id, :amount, :description, :created_time ) ";

    //Update query
    $query_params = array(
    	':id' => $_POST['id'],
    	':donor' => $_POST['donor'],
        ':project_id' => $_POST['project_id'],
        ':amount' => $_POST['amount'],
        ':description' => $_POST['description'],
		':created_time' => $_POST['created_time']
    );
  
	//execute query
    try {
        $stmt   = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }
    catch (PDOException $ex) {
        // For testing, you could use a die and message. 
        die("Failed to run query: " . $ex->getMessage());
        
        //or just use this use this one:
        $response["success"] = 0;
        $response["message"] = "Database Error. Couldn't add transaction!";
        die(json_encode($response));
    }

    $response["success"] = 1;
    $response["message"] = "Transaction Successfully Added!";
    echo json_encode($response);
   
} else {
?>
		<h1>Add Transaction</h1> 
		<form action="create_transaction.php" method="post"> 
		    ID:<br /> 
		    <input type="text" name="id" placeholder="id" /> 
		    <br /><br /> 
		    Donor:<br /> 
		    <input type="text" name="donor" placeholder="name" /> 
		    <br /><br />
			Project ID:<br /> 
		    <input type="text" name="project_id" placeholder="project_id" /> 
		    <br /><br /> 
			Amount:<br /> 
		    <input type="double" name="amount" placeholder="amount" /> 
		    <br /><br /> 
			Description:<br /> 
		    <input type="text" name="description" placeholder="description" /> 
		    <br /><br /> 
			Time:<br /> 
		    <input type="datetime" name="time" placeholder="time" /> 
		    <br /><br /> 
		    <input type="submit" value="Add Transaction" /> 
		</form> 
	<?php
}

?> 
