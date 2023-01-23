  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Review - Wakanda Forever</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
      <link rel="stylesheet" href="style.css">
  </head>
  <body>

  <?php include 'components/navbar.php'?>


  

  <div class="banner">
  <img src="./movie-banners/blackbanner.jpg" class="img-fluid" alt="blackbanner">
  </div>




  <div class="movie-info">
      <div class="container">
          <div class="row">
              <h2 class="col-md-12 my-3 movie-title text-light">BLACK PANTHER: WAKANDA FOREVER</h2>
              <div class="col-md-8 text-muted"><i class="bi bi-clock"></i> 161 min <span class="badge rounded-pill text-bg-warning">ACTION</span> <span class="badge rounded-pill text-bg-warning">DRAMA</span></div>

          <div class="col-md-8 text-muted mt-3">In Marvel Studios' Black Panther: Wakanda Forever, Queen Ramonda (Angela Bassett), Shuri (Letitia Wright), M'Baku (Winston Duke), Okoye (Danai Gurira) and the Dora Milaje (including Florence Kasumba) battle after the death of King T'Challa to protect their kingdom.</div>


<?php
    
        $db = new PDO("mysql:host=localhost;dbname=moviemeter", "root", "");
          $query = $db->prepare("SELECT * FROM reviews WHERE movie_id = 1");
            $query->execute();

      $result = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $data) {
          $data["name"];
          $data["review"];  	
        }
?>




<h2 class="col-md-12 my-5 movie-title text-light">Reviews <?php
 echo  "(" . array_sum($data) . ")"; 
 ?> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<button type="button" class="btn btn-warning rounded"><a href="insert.php">Add Review</a></button></h2>


          <div class="card bg-dark shadow">
    <div class="card-body">
          <h3 class="review-text">
          <?php

  try {
      $db = new PDO("mysql:host=localhost;dbname=moviemeter", "root", "");

      $query = $db->prepare("SELECT * FROM reviews WHERE movie_id = 1");
      $query->execute();
      $result = $query->fetchAll(PDO::FETCH_ASSOC);
      foreach($result as $data) {
        echo strtoupper($data["name"]) . " " .  ":" . " ";
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


      <iframe width="560" height="650" src="https://www.youtube.com/embed/_Z3QKkl1WyM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    





          </div>
      </div>
  </div>


  <?php include 'components/footer.php'?>
