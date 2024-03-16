<?php
require "./UserConnection.php";

if ($_SERVER['REQUEST_METHOD']=="POST") {
    $data = json_decode(file_get_contents("php://input"), true);

    $username=$data["username"];
    $response = array();

    $sql = "SELECT * FROM favouritedcoupons WHERE BINARY username='$username' ";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $rows = array();
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        $response['status'] = 'success';
        $response['message'] = 'Your favourite coupons are here!';
        $response['data'] = $rows;
    } else {
        $response['status'] = 'error';
        $response['message'] = 'You have no favourites!';
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}
