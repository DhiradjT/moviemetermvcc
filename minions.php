<!DOCTYPE html>
  <html lang="en">
  <head>
  <?php include 'components/head.php'?>
  </head>
  <body>

  <?php include 'components/navbar.php'?>




  <div class="banner">
  <img src="./movie-banners/minionsreviews.jpg" class="img-fluid" alt="blackbanner">
  </div>




  <div class="movie-info">
      <div class="container">
          <div class="row">
              <h2 class="col-md-12 my-3 movie-title text-light">MINIONS: THE RISE OF GRU</h2>
              <div class="col-md-8 text-muted"><i class="bi bi-clock"></i> 88 min <span class="badge rounded-pill text-bg-warning">KIDS</span> <span class="badge rounded-pill text-bg-warning">ANIMATION</span> <span class="badge rounded-pill text-bg-warning">COMEDY</span></div>

          <div class="col-md-8 text-muted mt-3">This summer, the world's greatest animated franchise goes back to the beginning. We see how the world's greatest supervillain meets his iconic Minions and forms with them the most terrible crew in movie history.</div>


<?php
    
        $db = new PDO("mysql:host=localhost;dbname=moviemeter", "root", "");
          $query = $db->prepare("SELECT * FROM reviews WHERE movie_id = 2");
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

      $query = $db->prepare("SELECT * FROM reviews WHERE movie_id = 2");
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


       <iframe width="560" height="650" src="https://www.youtube.com/embed/6DxjJzmYsXo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>


          </div>
      </div>
  </div>

  <?php include 'components/footer.php'?>