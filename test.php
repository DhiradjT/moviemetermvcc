<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MovieMeter - Home</title>
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
            <li><a class="dropdown-item" href="action.php">Action</a></li>
            <li><a class="dropdown-item" href="comedy.php">Comedy</a></li>
            <li><a class="dropdown-item" href="horror.php">Horror</a></li>
            <li><a class="dropdown-item" href="kids.php">Kids</a></li>
          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link text-light" href="reviews.php">Reviews</a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-light" href="about.php">About</a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-light" href="signin.php">Sign In</a>
        </li>

      


      </ul>

    </div>
  </div>
</nav>
</div>
</div>
</div>








<div class="container">
  <div class="col">

  <form method="post" action="">
    <label for="name" class="text-light">Name</label>
    <br>
    <input type="text" id="name" name="name" placeholder="Your Username">
    <br>
    <label for="email" class="text-light">Email</label>
    <br>
    <input type="text" id="email" name="email" placeholder="Your Email">
    <br>
    <label for="password" class="text-light">Password</label>
    <br>
    <input type="password" id="password" name="password" placeholder="Your Password">
    <br>
    <label for="password_confirmation" class="text-light">Repeat Password</label>
    <br>
    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Repeat Password">
    <br>
    <input type="submit" name="login" value="login">
    <input type="submit" name="register" value="register">

  </form>


  
  </div>
  
</div>

<?php

      case 'login':
      $titleSuffix = '| Login';
      if(isset($_POST['login'])) {
        $result = checkLogin();
        // var_dump($result);die;
        switch ($result) {
          case 'ADMIN':
            header("Location: admin.php");
            // include once "../Templates/admin/home.php;"
            break;
          case 'MEMBER':
            header("Location: member.php");
            // include once "../Templates/admin/member.php;"
            break;
          case 'FAILURE':
            $message = "Email of password is niet correct ingevuld!";
            // include once "../Templates/login.php;"
            break;
          case 'INCOMPLETE':
            $message = "Formulier niet volledig ingevuld";
            // include once "../Templates/login.php;"
        }
      }
      else {
          include_once "../Template/login.php";
      }
      break;

      case 'register':
        $titleSuffix = '| Register';

        if(isset($_POST['register'])) {

          $result = makeRegistration();
          switch ($result) {
            case 'SUCCES':
              header("Location: /home");
              break;
            case 'INCOMPLETE':
              header("Location:");
              $message = "Niet alle velden correct ingevuld";
              include_once "../Templates/register.php";
              break;
            case 'EXIST':
              $message = "Gebruikr betaat al";
              include_once "../Templates/register.php";
              break;
          }
        }
        else {
          include_once "../Templates/register.php";
        }
        break;



?>














<div class="footer-section">
  <div class="container">
    <div class="row">

  <div class="col-md-12 text-center text-light"> <div class="sep">HERE TO GIVE YOU THAT LITTLE PUSH</div></div>
  <div class="col-md-12 text-center text-light"><h2 class="brand2">Start sharing your Experience today.</h2></div>
  <div class="col-md-12 mb-5 text-center"><button type="button" class="btn btn-outline-warning rounded">Sign In</button></div>


<div class="col-md-3 col-sm-6"><h2 class="brand text-light">Movie <span class="sep">Meter</span></h2><p class="business-text">Copyright	&#169;2022 MovieMeter, <br> All Rights Reserved</p></div>
<div class="col-md-3 col-sm-6"><span class="text-light help-text">Navigation</span> <br><a href="#">Home</a> &nbsp; &nbsp;<a href="#">Categories</a> <br> <a href="#">Reviews</a> <a href="#">About</a> <br> <a href="#">Contact</a> <a href="#">Sign In</a></div>
<div class="col-md-3 col-sm-6"><span class="text-light help-text">Terms And Policies</span><br><a href="#">Terms and Conditions</a> <br> <a href="#">Privacy Policy</a> <br> <a href="#">Cookie Policy</a></div>
<div class="col-md-3 col-sm-6"><span class="text-light help-text">Need Help?</span><br><span class="business-text">
<a href="mailto:help@movie.co">help@movie.co</a></span><br><a href="https://www.instagram.com/" target="_blank"><i class="bi bi-instagram"></i></a> <a href="https://twitter.com/" target="_blank"><i class="bi bi-twitter"></i></a><a href="https://www.facebook.com/" target="_blank"><i class="bi bi-facebook"></i></a></div>


    </div>
  </div>
</div>


<!-- 
    <form method="post" action="">
        <label>E - mail*</label>
        <br>
        <input type="text" name="email" placeholder="Your Email">
        <br>
        <label>Username*</label>
        <br>
        <input type="text" name="username" placeholder="Your Username">
        <br>
        <label>Password*</label>
        <br>
        <input type="password" name="password" placeholder="Your Password">
        <br>
        <input type="submit" name="verzenden" value="Log In">
    </form> -->