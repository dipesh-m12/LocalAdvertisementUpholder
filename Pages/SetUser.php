<?php
require "./UserConnection.php";

if ($_SERVER['REQUEST_METHOD']=="POST") {
    $data = json_decode(file_get_contents("php://input"), true);

    $username=$data["username"];
    $password=$data["password"];
    $userType=$data["userType"];

    $hash=password_hash($password,PASSWORD_DEFAULT);
    $response = array();
      
  $sql = "INSERT INTO useridpass ( username, password ,usertype) VALUES ('$username', '$hash','$userType')";

  if ($conn->query($sql) === TRUE) {
      // header("Location: Login.php");
    $response['status'] = 'success';
    $response['message'] = 'User registered successfully';
    } else {
    $response['status'] = 'error';
    $response['message'] = 'Failed to register user';
    }
    echo json_encode($response);
}

