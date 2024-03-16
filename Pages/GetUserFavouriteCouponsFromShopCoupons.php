<?php
require "./UserConnection.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $data = json_decode(file_get_contents("php://input"), true);

    $couponIds = $data["couponid"];
    $response = array();
    
    if (!empty($couponIds)) {
        $couponIdsAsString = array_map('intval', $couponIds);
        $sql = "SELECT * FROM shopcoupons WHERE id IN (" . implode(',', $couponIdsAsString) . ")";

        $result = $conn->query($sql);

        if ($result) {
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
        } else {
            $response['status'] = 'error';
            $response['message'] = 'An error occurred while fetching your favourites. Please try again later.';
        }
    } else {
        $response['status'] = 'error';
        $response['message'] = 'No coupon IDs provided.';
    }
}

header('Content-Type: application/json');
echo json_encode($response);
