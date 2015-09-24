<?php

require("dbconnect.php");

$requestType = $_POST['requestType'];
$sender = $_POST['sender'];
$receiver = $_POST['receiver'];
require("queries.php");



if(!empty($_POST)){

if($requestType = "set"){

try{
$statement = $pdo->prepare("SELECT * FROM networkingRequest WHERE sender=? AND receiver=?");
$statement->execute(array($receiver, $sender));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
$rowCount = $statement->rowCount();

if($rowCount = 0){

$statement = $pdo->prepare("INSERT INTO networkingRequest('sender', 'receiver') VALUES(?,?)");
$statement->execute(array($sender, $receiver));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
$rowCount = $statement->rowCount();
$message = "Request made.";
}

else{

$statement = $pdo->prepare("INSERT INTO network('sender', 'receiver') VALUES(?,?)");
$statement->execute(array($receiver, $sender));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
$rowCount = $statement->rowCount();
$message = "Network expanded.";

}

catch(PDOException e){

        $response["success"] = false;
        $response["message"] = e->getMessage();
        die(json_encode($response));

}

if($rowCount >0){

$response["success"] = true;
        $response["message"] = $message;
        die(json_encode($response));

} else{

$response["success"] = false;
        $response["message"] = $message;
        die(json_encode($response));

}
}

if($requestType = "get"){
try{

$statement = $pdo->prepare("SELECT * FROM network WHERE sender=?");
$statement->execute(array($sender));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
$rowCount = $statement->rowCount();


}

catch(PDOException e){
        $response["success"] = false;
        $response["message"] = e->getMessage();
        die(json_encode($response));
}

if($rowCount > 0){
	$message = "Network returned.";
        $response["success"] = true;
        $response["message"] = $message;
	$response["results"] = $results;
        die(json_encode($response));
}else{
	$message = "Network doesn't exist.";
        $response["success"] = false;
        $response["message"] = $message;
        die(json_encode($response));

}


}
}
?>
