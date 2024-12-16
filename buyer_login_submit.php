<?php
$conn = new mysqli("localhost", "mmudunuri2", "mmudunuri2", "mmudunuri2");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $buyer_user_id = $_POST['buyer_user_id_login'];
    $buyer_password = $_POST['buyer_password_login'];
    
    // Use prepared statements
    $sql = "select * from buyer_data3 where buyer_user_id = '$buyer_user_id' and buyer_password = '$buyer_password'";  
    // echo($sql);
    $result = mysqli_query($conn, $sql);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result);  
      
    if($count == 1){  
        header("location: buyer_dashboard.php");
    }  
    else{  
        header('Location: login.php?error=invalid');
        exit();  
    } 

}

$conn->close();
?>