<?php
require "./UserConnection.php";

if ($_SERVER['REQUEST_METHOD']=="POST") {
    $data = json_decode(file_get_contents("php://input"), true);


    $username=$data["username"];
    $header=$data["header"];
    $description=$data["description"];
    $image=$data["image"];

    $response = array();
      
  $sql = "INSERT INTO shopcoupons ( username, header, description ,image) VALUES ('$username', '$header','$description','$image')";

  if ($conn->query($sql) === TRUE) {
      // header("Location: Login.php");
    $last_id = $conn->insert_id;
    $response['status'] = 'success';
    $response['id'] = $last_id;
    $response['message'] = 'Coupon stored successfully!';
    } else {
    $response['status'] = 'error';
    $response['message'] = 'Failed to store coupon: ' ;             //. $conn->error
    }
    echo json_encode($response);
}