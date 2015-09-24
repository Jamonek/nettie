<?php

require("dbconnect.php");


$searchType = $_POST['searchType'];
$username = $_POST['username'];
$isOnline = $_POST['isOnline'];
$school = $_POST['school'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
 
require("queries.php");





if(!empty($_POST)){

try{

switch ($searchType) {
    case "location":
        $statement = $pdo->prepare($locationQuery);
$statement->execute(array($username, $password));
        break;
    case "username":
        $statement = $pdo->prepare($usernameQuery);
$statement->execute(array($username));
        break;
    case "school":
        $statement = $pdo->prepare($schoolQuery);
$statement->execute(array($school));
        break;
    default:
        break;
}

$result = $statement->fetchAll(PDO::FETCH_ASSOC);
$rowCount = $statement->rowCount();

}


catch(PDOException e){

        $response["success"] = false;
        $response["message"] = e->getMessage();
        die(json_encode($response));

}

if($rowCount = 0){

	$response["success"] = false;
        $response["message"] = "No results.";
        die(json_encode($response));

}

else{

	$response["success"] = true;
        $response["message"] = "Login Successful!";
	$response["results"] = $results;
        die(json_encode($response));


}


}
?>
