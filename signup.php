<?php
require_once 'dbconnectie.php';

if (isset($_POST["signup"])) {
  $username = filter_input(INPUT_POST, "username");
  $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
  $password = filter_input(INPUT_POST, "password");
  $role = 'member';

// Hier haal je het ingevoerde e-mailadres op uit het formulier en slaat het op in een variabele.
$email = $_POST['email'];
// Dan bereiden we onze query voor door een SELECT statement te maken die controleert of er een e-mailadres is met dezelfde waarde als de variabele $email in de kolom "email" van de tabel "users"
$query = "SELECT email FROM users WHERE email = :email";
$stmt = $db->prepare($query); // Dan de prepare om de variabele email te koppelen met de placeholder :email
$stmt->bindParam(':email', $email);
$stmt->execute(); // Daarna uitvoeren

if($stmt->rowCount() > 0){ // Als de query dan een of meerdere rijen terug geeft dan bestaat het e-mailadres al in de dbase
    echo "<h2>" . "Email already exists in database." . "</h2>";
} else {
    $query = $db->prepare("INSERT INTO users (name, email, password, role) VALUES (:username, :email, :password, :role)");
    $query->bindParam("username", $username);
    $query->bindParam("email", $email);
    $query->bindParam("password", $password);
    $query->bindParam("role", $role);
    if ($query->execute()) {
      $alertStatus = 'alert-success';
      $alertMessage = "Data Registered <a href='./login.php'>Log in!</a>";
    }
  }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'components/head.php'?>
</head>
<body class="signup">

<?php include 'components/navbar.php';
if (isset($alertStatus)) {
  echo "<div class='alert $alertStatus' role='alert'>$alertMessage</div>";
} else {
  echo '';
}
?>



<div class="container">
    <div class="row">
        <div class="col">



<div class="form-card d-flex justify-content-center">

        <div class="card shadow" style="width: 30rem;">
  <div class="card-body">
    <h2 class="card-title form-title text-center">Sign Up</h2>
    <h5 class="card-subtitle form-text mb-2 text-center">Share and chat with people!</h5>
    <p class="card-text">
      
    <form method="post" action="">
    <input type="hidden"  value="register">
            <label for="email"><b>Mail</b></label>
            <br>
            <input type="email" placeholder="mail@website.com" name="email" class="rounded-pill form-control" required>
            <br>
            <label for="username"><b>Username</b></label>
            <br>
            <input type="text"  placeholder="Username" name="username" class="rounded-pill form-control" required>
            <br>
            <label for="password"><b>Password</b></label>
            <br>
            <input type="password"  placeholder="Max. 12 characters" name="password" class="rounded-pill form-control" required>
            <br>
            <br>
            <input type="submit" name="signup" value="Sign Up" class="rounded-pill form-control" required>
        </form>
  
  </p>
  
  <p class="text-center"> Already a user? <br>
  <a class="login" href="./login.php">Login</a>
  </p>
  </div>
</div>

</div>

</body>
</html>








        </div>
    </div>
</div>





<?php include 'components/footer.php'?>