<?php
require "./UserConnection.php";

if ($_SERVER['REQUEST_METHOD']=="POST") {
    $data = json_decode(file_get_contents("php://input"), true);


    $id= $data["id"];

    $response = array();
      
    $sql = "DELETE FROM shopcoupons WHERE id='$id'";

  if ($conn->query($sql) === TRUE) {
    $response['status'] = 'success';
    $response['message'] = 'Coupon stored successfully!';
    } else {
    $response['status'] = 'error';
    $response['message'] = 'Failed to store coupon: ' ;             
    }
    echo json_encode($response);
}