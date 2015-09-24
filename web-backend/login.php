<?php

require("dbconnect.php");


$username = $_POST['username'];
$password = $_POST['password'];



if(!empty($_POST)){

try{
$statement = $pdo->prepare("SELECT username FROM User WHERE username=? AND password=?");
$statement->execute(array($username, $password));
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
        $response["message"] = "Invalid Credentials!";
        die(json_encode($response));

}

else{

	$response["success"] = true;
        $response["message"] = "Login Successful!";
        die(json_encode($response));


}
}
?>
