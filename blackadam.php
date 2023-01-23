<!DOCTYPE html>
  <html lang="en">
  <head>
  <?php include 'components/head.php'?>
  </head>
  <body>

  <?php include 'components/navbar.php'?>



  <!-- <div

  class="p-3 text-center bg-image"

  style="

    background-image: url('./movie-headers/blackpanther.jpg');
    height: 400px;

  "   

  >

  <div class="mask">

    <div class="d-flex justify-content-center align-items-center w-60">

      <div class="text-white">

      </div>

    </div>

  </div>

  </div> -->

  <div class="banner">
  <img src="./movie-banners/blackadamreview.jpeg" class="img-fluid"  alt="blackbanner">
  </div>




  <div class="movie-info">
      <div class="container">
          <div class="row">
              <h2 class="col-md-12 my-3 movie-title text-light">BLACK ADAM</h2>
              <div class="col-md-8 text-muted"><i class="bi bi-clock"></i> 124 min <span class="badge rounded-pill text-bg-warning">ACTION</span> <span class="badge rounded-pill text-bg-warning">DRAMA</span> <span class="badge rounded-pill text-bg-warning">COMEDY</span></div>

          <div class="col-md-8 text-muted mt-3">Nearly 5,000 years ago, Black Adam received extraordinary powers from the ancient gods, after which he was soon locked away in a tomb. Now he is free again and ready to unleash his own form of justice on the modern world.</div>


<?php
    
        $db = new PDO("mysql:host=localhost;dbname=moviemeter", "root", "");
          $query = $db->prepare("SELECT * FROM blackadam ");
            $query->execute();

      $result = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $data) {
          $data["name"];
          $data["lastName"];
          $data["review"];  	
        }
?>




          <h2 class="col-md-12 my-5 movie-title text-light">Reviews <?php echo  "(" . array_sum($data) . ")"; ?> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<button type="button" class="btn btn-warning rounded">Add Review</button></h2>


          <div class="card bg-dark shadow">
    <div class="card-body">
          <h3 class="review-text">
          <?php

  try {
      $db = new PDO("mysql:host=localhost;dbname=moviemeter", "root", "");

      $query = $db->prepare("SELECT * FROM blackadam ");
      $query->execute();
      $result = $query->fetchAll(PDO::FETCH_ASSOC);
      foreach($result as $data) {
        echo strtoupper($data["name"]).  " ";
          echo strtoupper($data["lastName"]) . " " . ":" . " ";
          echo $data["review"]. "<br>" . "<br>";  	
          
      }

  }   catch(PDOException $e) {
      die("Error! :" . $e->getMessage());
  }
  
      ?>

    </div>
  </div>



      </h3>


      <h2 class="col-md-12 mt-5 movie-title text-light">Trailer</h2>

      <section class="trailer">
      </section>


        <iframe width="560" height="650" src="https://www.youtube.com/embed/HvKXujyZALA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>



          </div>
      </div>
  </div>



  <?php include 'components/footer.php'?>
