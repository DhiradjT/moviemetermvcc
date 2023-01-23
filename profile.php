<?php
require_once 'dbconnectie.php';
include 'logged_in_user.php';
if (!isset($_SESSION["loggedin_user_id"])) {
  echo "Error: Log in first!";
} else {

  if (isset($_POST["submit"])) {
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm_password"];
    $nameUser = $_POST["username"];
    $emailUser = $_POST["email"];

    if ($password != $confirmPassword) {
      $statusAlert = 'alert-danger';
      $statusMessage = 'Password doesnt match';
    } else {
      if ($password == '' || $confirmPassword == '') {
        $statusAlert = 'alert-danger';
        $statusMessage = 'Fill in all fields';
        $products = $db->prepare("UPDATE users SET name = :name, email = :email WHERE id = :id");
        $products->bindParam("name", $nameUser);
        $products->bindParam("email", $emailUser);
        $products->bindParam("id", $_SESSION['loggedin_user_id']);
        if ($products->execute()) {
          $statusAlert = 'alert-succes';
          $statusMessage = 'Profile updated!';
        }
      } else {
        $products = $db->prepare("UPDATE users SET name = :name, email = :email, password = :password WHERE id = :id");
        $products->bindParam("name", $nameUser);
        $products->bindParam("email", $emailUser);
        $products->bindParam("password", $password);
        $products->bindParam("id", $_SESSION['loggedin_user_id']);
        if ($products->execute()) {
          $statusAlert = 'alert-succes';
          $statusMessage = 'Password updated!';
        } else {
          $statusAlert = 'alert-danger';
          $statusMessage = 'Something went wrong!';
        }
      }
    }
  }
?>
  <!DOCTYPE html>
  <html lang="en">
  <?php
  include_once 'components/head.php';
  ?>

  <body>
      <?php
      include_once 'components/navbar.php';
      if (isset($statusAlert)) {
        echo "<div class='alert $statusAlert' role='alert'>$statusMessage</div>";
      } else {
        echo '';
      }
      ?>
          <div class="container p-3 my-4">
      <div class="col-sm-12 mt-4">
        <h4 class="text-light">Your Profile</h4>
        <form method="POST" action="">
          <input type="hidden" name="form-sort" value="editprofile">
          <div class="row mt-3">
            <div class="col">
              <label for="username" class="text-light">Username</label>
              <input type="text" name="username" class="form-control" value="<?php echo $userName ?>" placeholder="Your Name" required>
            </div>
            <div class="col">
            <label for="email" class="text-light">Email</label>
              <input type="email" name="email" class="form-control" value="<?php echo $userEmail ?>" placeholder="jan@jan.nl" required>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col">
              <label for="password" class="text-light">New Password</label>
              <input type="password" name="password" class="form-control">
              <small class="text-danger">*Leave empty if you don't want changes to happen!</small>
            </div>
            <div class="col">
              <label for="confirm_password" class="text-light">Repeat new Password</label>
              <input type="password" name="confirm_password" class="form-control">
            </div>
          </div>
          <div class="form-group mt-3">
            <button type="submit" name="submit" class="btn btn-outline-danger">Change Profile!</button>
          </div>
        </form>
      </div>
      <?php
      include_once 'components/footer.php';
      ?>
    </div>
  </body>

  </html>
<?php
}
