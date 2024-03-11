<?php
require "./UserConnection.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $data = json_decode(file_get_contents("php://input"), true);

    $username = $data["username"];
    $password=$data["password"];

    $response = array();
      
    $sql = "SELECT * FROM useridpass WHERE username='$username'";

    $result = $conn->query($sql);

    if ($result->num_rows == 1) {     //only 1 result                                                                                      
       while ($row = $result->fetch_assoc()) {
           if(password_verify($password,$row["password"])){
               $response['status'] = 'success';
               $response['message'] = 'User found!';
            }
            else{
                $response['status'] = 'error';
                $response['message'] = 'Incorrect username or password';
            }
        }
    } else {
        $response['status'] = 'error';
        $response['message'] = 'No such user';
    }
    echo json_encode($response);
    
    }
               
