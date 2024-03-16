<?php
require "./UserConnection.php";

if ($_SERVER['REQUEST_METHOD']=="POST") {
    $data = json_decode(file_get_contents("php://input"), true);

    $username=$data["username"];
    $couponid=$data["couponid"];


    $response = array();
      
  $sql = "INSERT INTO favouritedcoupons ( username, couponid ) VALUES ('$username', $couponid)";

  if ($conn->query($sql) === TRUE) {
      // header("Location: Login.php");
    $response['status'] = 'success';
    $response['message'] = 'Coupon Favourited!';
    } else {
    $response['status'] = 'error';
    $response['message'] = 'There was some error in favouriting Coupon';
    }
    echo json_encode($response);
}