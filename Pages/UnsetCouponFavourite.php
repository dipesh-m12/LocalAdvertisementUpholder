<?php
require "./UserConnection.php";

if ($_SERVER['REQUEST_METHOD']=="POST") {
  $data = json_decode(file_get_contents("php://input"), true);

  $username = $data["username"];
  $couponid = $data["couponid"];

  $response = array();

  $sql = "DELETE FROM favouritedcoupons WHERE couponid=$couponid AND BINARY username='$username'";

  if ($conn->query($sql) === TRUE) {
    if ($conn->affected_rows > 0) {
      $response['status'] = 'success';
      $response['message'] = 'Coupon Unfavourited!';
    } else {
      $response['status'] = 'error';
      $response['message'] = 'Seems like coupon was unlisted!';
    }
  } else {
    $response['status'] = 'error';
    $response['message'] = 'Failed to unfavourite coupon: ';
  }
  echo json_encode($response);
}
