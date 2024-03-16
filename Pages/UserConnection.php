
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

// <?php
// $servername = "localhost";
// $username = "root";
// $password = ""; 
// $dbname = "user";

// try {
//     $conn = new mysqli($servername, $username, $password, $dbname);
//     // Check connection
//     if ($conn->connect_error) {
//         die("Connection failed: " . $conn->connect_error);
//     }
    
//     // SQL query to create userIdpass table if it doesn't exist
//     $sql1 = "CREATE TABLE IF NOT EXISTS userIdpass (
//         id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//         username VARCHAR(50) NOT NULL,
//         password VARCHAR(50) NOT NULL,
//         userType VARCHAR(50) NOT NULL
//     )";

//     if ($conn->query($sql1) === TRUE) {
//         echo "Table userIdpass created successfully<br>";
//     } else {
//         echo "Error creating table: " . $conn->error . "<br>";
//     }

//     // SQL query to create shopcoupons table if it doesn't exist
//     $sql2 = "CREATE TABLE IF NOT EXISTS shopcoupons (
//         id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//         username VARCHAR(50) NOT NULL,
//         header VARCHAR(100) NOT NULL,
//         description TEXT,
//         image VARCHAR(100),
//         date DATE
//     )";

//     if ($conn->query($sql2) === TRUE) {
//         echo "Table shopcoupons created successfully<br>";
//     } else {
//         echo "Error creating table: " . $conn->error . "<br>";
//     }

//     // SQL query to create favouritedcoupons table if it doesn't exist
//     $sql3 = "CREATE TABLE IF NOT EXISTS favouritedcoupons (
//         id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//         username VARCHAR(50) NOT NULL,
//         couponid INT(6) NOT NULL
//     )";

//     if ($conn->query($sql3) === TRUE) {
//         echo "Table favouritedcoupons created successfully<br>";
//     } else {
//         echo "Error creating table: " . $conn->error . "<br>";
//     }

// } catch (Exception $e) {
//     die("" . $e->getMessage());
// }

// $conn->close();
// 


?>