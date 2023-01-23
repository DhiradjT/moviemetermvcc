<?php
if (isset($_SESSION["loggedin_user_id"])) {
?>
<nav class="navbar navbar-expand-lg ">
  <div class="container-fluid">
    <a class="navbar-brand text-light" href="#">Movie <span class="sep">Meter</span></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">

      <ul class="navbar-nav ms-auto">
        
        <li class="nav-item">
          <a class="nav-link text-light" aria-current="page" href="./index.php">Home</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link text-light dropdown-toggle" href="categories.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categories
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="./action.php">Action</a></li>
            <li><a class="dropdown-item" href="./comedy.php">Comedy</a></li>
            <li><a class="dropdown-item" href="./horror.php">Horror</a></li>
            <li><a class="dropdown-item" href="./kids.php">Kids</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="about.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="about.php">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="./profile.php">Profile</a>
        </li>
        <?php 
        if ($userRole == 'admin') {
          ?>
        <li class="nav-item">
          <a class="nav-link text-light" href="./admin_dashboard.php">Dashboard</a>
        </li>
          <?php
        }
        ?>
       <li class="nav-item">
          <a class="nav-link text-danger" href="./logout.php">Logout</a>
        </li>

      


      </ul>

    </div>
  </div>
</nav>

<?php
} else {
?>
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
          <a class="nav-link text-light" href="about.php">About</a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-light" href="about.php">Contact</a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-light" href="signup.php">Sign Up</a>
        </li>

      


      </ul>

    </div>
  </div>
</nav>
<?php
}
?>