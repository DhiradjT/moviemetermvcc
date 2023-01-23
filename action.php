<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'components/head.php'?>
</head>
<body>
<?php include 'components/navbar.php'?>


<div class="current-movies">
<div class="container">
    <div class="row">
        <div class="col-md-12"> <h3 class="current text-light">CURRENT / ACTION MOVIES</h3></div>
        <span class="line rounded-pill m-3"></span>

        <div class="col">
        <div class="card rounded-0 bg-transparent" style="width: 18rem;">
        <a href="blackpanther.php">Write a Review!</a>
        <?php
try {
    $db = new PDO("mysql:host=localhost;dbname=moviemeter", "root", "");

    $query = $db->prepare("SELECT * FROM movies WHERE category_id = 1");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach($result as $data) {
      echo  "<br>" .  ($data["name"]);
      echo  "<img src='" . ($data["image"]) . "' alt='" . "image". "class=card-img-top" .  "alt=wakanda-banner" .  "'>";
      echo  ($data["time"]) . " " . " " ;
      echo  ($data["cat"]);
    
    }

}   catch(PDOException $e) {
    die("Error! :" . $e->getMessage());
}

    ?>
    </div>

    


</div>
</div>
</div>

  <!-- <div class="col">

      <div class="card rounded-0 bg-transparent" style="width: 18rem;">
        <img src="./movie-banners/wakandaforever.jpg" class="card-img-top" alt="wakanda-banner">
        <div class="card-body">
        <h5 class="card-title text-light">BLACK PANTHER: <br> WAKANDA FOREVER</h5>
        <h6 class="card-subtitle mb-2 text-muted">161 min ACTION,DRAMA</h6>
       </div>
      </div>

    </div> -->



    

<div class="coming-movies">
<div class="container my-5">
    <div class="row">
        <div class="col-md-12"> <h3 class="current text-light">COMING SOON / ACTION MOVIES</h3></div>
        <span class="line rounded-pill m-3"></span>
        
    </div>
</div>
</div>

<!-- <img src="<?php 
// echo ($data["image"])
?> -->
       