<?php
require "./UserConnection.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $data = json_decode(file_get_contents("php://input"), true);

    $username = $data["username"]; 
    $response = array();

    $sql = "SELECT * FROM shopcoupons WHERE username = '$username'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $rows = array();
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        $response['status'] = 'success';
        $response['message'] = 'Your Coupons are here!';
        $response['data'] = $rows;
    } else {
        $response['status'] = 'error';
        $response['message'] = 'You have no  Coupons!';
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}
