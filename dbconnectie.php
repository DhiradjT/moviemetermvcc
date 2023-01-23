<?php

try {
    $db = new PDO("mysql:host=localhost;dbname=moviemeter", "root", "");
}  
 catch(PDOException $e) {
    die("Error! : " . $e->getMessage());
}

    ?>