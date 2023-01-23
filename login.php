<?php
require_once 'dbconnectie.php';
session_start();
if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $users = $db->prepare("SELECT * FROM `users` WHERE password = :password AND email = :email");
  $users->bindParam("password", $password);
  $users->bindParam("email", $email);
  $users->execute();
  $user = $users->fetch(PDO::FETCH_ASSOC);

  if (!$user) {
    $userExists = false;
    $alertMessage = 'alert-warning';
  } else {
    $userExists = true;

    $_SESSION['loggedin_user_id'] = $user['id'];

    header("Location: ./logged_in.php");
  }

  if (($email == '') ||($password == ''))  {
    $alertMessage = 'text-danger';
    $userStatus = 'Velden zijn leeg';
  } else if ($userExists) {
    $alertMessage = 'alert-succes';
    $userStatus = 'Logged In';
  } else {
    $userStatus = 'Email/wachtwoord is incorrect';
  }
} else {
  $email = '';
  $password = '';
  $userStatus = '';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'components/head.php'?>
</head>
<body class="signup">

<?php include 'components/navbar.php'?>


<!-- login html form -->
<div class="container">
    <div class="row">
        <div class="col">
        <?php if ($userStatus) { ?>
      <div class="alert <?php echo $alertMessage; ?>"><?php echo $userStatus ?></div>
      <?php } else {echo '';} ?>

<div class="form-card d-flex justify-content-center">
        <div class="card shadow" style="width: 30rem;">
  <div class="card-body">
    <h2 class="card-title form-title text-center">Login</h2>
    <h5 class="card-subtitle form-text mb-2 text-center">Enter Your Details To Login!</h5>
    <p class="card-text">
    <form method="post" action="">
            <label for="">Mail</label>
            <br>
            <input type="email" placeholder="mail@website.com" name="email" class="rounded-pill form-control" required>
            <br>
            <label for="">Username</label>
            <br>
            <input type="text" placeholder="Username" name="username" class="rounded-pill form-control" required>
            <br>
            <label for="">Password</label>
            <br>
            <input type="password" placeholder="Max. 12 characters" name="password" class="rounded-pill form-control" required>
            <br>
            <br>
            <input type="submit" name="login" value="Login" class="rounded-pill form-control" required>
        </form>
</p>
  <p class="text-center">Not registered yet?
  <a class="login" href="signup.php">Create an Account</a>
  <br>
  <br>
  <a href="forget.php">Forget password?</a>
  </p>
  </div>
</div>
</div>









        <!-- <form method="post" action="">
            <label for="">Mail</label>
            <br>
            <input type="text" placeholder="mail@website.com" name="mail">
            <br>
            <label for="">Username</label>
            <br>
            <input type="text" placeholder="Username" name="mail">
            <br>
            <label for="">Password</label>
            <br>
            <input type="password" placeholder="Max. 12 characters" name="mail">
            <br>
        </form> -->

        </div>
    </div>
</div>

<?php







?>




<?php include 'components/footer.php'?>