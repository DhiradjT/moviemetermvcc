<!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Review - Smile</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
      <link rel="stylesheet" href="style.css">
  </head>
  <body>

  <nav class="navbar navbar-expand-lg ">
    <div class="container-fluid">
      <a class="navbar-brand text-light" href="#">Movie <span class="sep">Meter</span></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">

        <ul class="navbar-nav ms-auto">
          
          <li class="nav-item">
            <a class="nav-link text-light" aria-current="page" href="index.php">Home</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link text-light dropdown-toggle" href="categories.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Categories
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item " href="action.php">Action</a></li>
              <li><a class="dropdown-item" href="comedy.php">Comedy</a></li>
              <li><a class="dropdown-item" href="horror.php">Horror</a></li>
              <li><a class="dropdown-item" href="kids.php">Kids</a></li>
            </ul>
          </li>

          <li class="nav-item">
            <a class="nav-link text-light" href="about.php">About</a>
          </li>

          <li class="nav-item">
            <a class="nav-link text-light" href="contact.php">Contact</a>
          </li>

        </ul>

      </div>
    </div>
  </nav>




  <div class="banner">
  <img src="./movie-banners/smilereview.jpg" class="img-fluid"  alt="blackbanner">
  </div>




  <div class="movie-info">
      <div class="container">
          <div class="row">
              <h2 class="col-md-12 my-3 movie-title text-light">SMILE</h2>
              <div class="col-md-8 text-muted"><i class="bi bi-clock"></i> 116 min <span class="badge rounded-pill text-bg-warning">HORROR</span> <span class="badge rounded-pill text-bg-warning">DRAMA</span></div>

          <div class="col-md-8 text-muted mt-3">After witnessing a bizarre and traumatic incident with a patient, Dr. Rose Cotter (Sosie Bacon) faces ominous events she cannot explain.</div>


<?php
    
        $db = new PDO("mysql:host=localhost;dbname=moviemeter", "root", "");
          $query = $db->prepare("SELECT * FROM reviews WHERE movie_id = 5");
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

      $query = $db->prepare("SELECT * FROM reviews WHERE movie_id = 5");
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


      <iframe width="560" height="650" src="https://www.youtube.com/embed/BcDK7lkzzsU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>



    

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/e0a4ea6349.js" crossorigin="anonymous"></script>
          </div>
      </div>
  </div>



  <div class="footer-section">
    <div class="container">
      <div class="row">

    <div class="col-md-12 text-center text-light"> <div class="sep">HERE TO GIVE YOU THAT LITTLE PUSH</div></div>
    <div class="col-md-12 text-center text-light"><h2 class="brand2">Start sharing your Experience today.</h2></div>
    <div class="col-md-12 mb-5 text-center"><button type="button" class="btn btn-outline-warning rounded">Sign Up</button></div>


  <div class="col-md-3 col-sm-6"><h2 class="brand text-light">Movie <span class="sep">Meter</span></h2><p class="business-text">Copyright	&#169;2022 MovieMeter, <br> All Rights Reserved</p></div>
  <div class="col-md-3 col-sm-6"><span class="text-light help-text">Navigation</span> <br><a href="#">Home</a> &nbsp; &nbsp;<a href="#">Categories</a> <br> <a href="#">Reviews</a> <a href="#">About</a> <br> <a href="#">Contact</a> <a href="#">Sign In</a></div>
  <div class="col-md-3 col-sm-6"><span class="text-light help-text">Terms And Policies</span><br><a href="#">Terms and Conditions</a> <br> <a href="#">Privacy Policy</a> <br> <a href="#">Cookie Policy</a></div>
  <div class="col-md-3 col-sm-6"><span class="text-light help-text">Need Help?</span><br><span class="business-text">
  <a href="mailto:help@movie.co">help@movie.co</a></span><br><a href="https://www.instagram.com/" target="_blank"><i class="bi bi-instagram"></i></a> <a href="https://twitter.com/" target="_blank"><i class="bi bi-twitter"></i></a><a href="https://www.facebook.com/" target="_blank"><i class="bi bi-facebook"></i></a></div>


      </div>
    </div>
  </div>
