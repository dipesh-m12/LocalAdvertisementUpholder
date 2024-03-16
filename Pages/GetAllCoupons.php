<?php
require "./UserConnection.php";

if ($_SERVER['REQUEST_METHOD']=="POST") {
    $data = json_decode(file_get_contents("php://input"), true);

    $response = array();

    $sql = "SELECT * FROM shopcoupons ";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $rows = array();
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        $response['status'] = 'success';
        $response['message'] = 'Heavy savings!';
        $response['data'] = $rows;
    } else {
        $response['status'] = 'error';
        $response['message'] = 'No hosted Coupons!';
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}
