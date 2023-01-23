<?php
session_start();
if(isset($_SESSION["logged_in_user"])){
    require_once 'dbconnectie.php';
    $query = "INSERT INTO reviews (user_id, name, review) VALUES ('{$_SESSION["logged_in_user"]}','{$_POST['name']}','{$_POST['review']}')";
    mysqli_query($db, $query);
    $query->bindParam("name", $name);
    $query->bindParam("review", $review);
 
    if ($query->execute())
    echo "Review added successfully";
} else {
    echo "Error: You must be logged in to leave a review";
}


?>
