
<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "user";


try{
    $conn = new mysqli($servername, $username, $password, $dbname);
}
catch(Exception $e){
    die("".$e->getMessage());
}


// $custom_username = "mahesh";
// $custom_password = "1234";

// $sql = "INSERT INTO userIdpass ( username, password ) VALUES ('$custom_username', '$custom_password')";

// if ($conn->query($sql) === TRUE) {
//     echo "New record inserted successfully";
// } else {
//     echo "Error: { $conn->error } ";
// }



?>