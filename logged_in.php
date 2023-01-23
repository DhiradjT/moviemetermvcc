<?php
require_once 'dbconnectie.php';
include 'logged_in_user.php';
?>
<!DOCTYPE html>
<html lang="en">
  <?php  
  include_once 'components/head.php';
  ?>
<body>
    <?php
    include_once 'components/navbar.php';
    ?>
      <div class="container p-3 my-4">
    <div class='row mt-5'>
      <div class="d-flex justify-content-between align-items-center">
        <h2 class="text-light">Welcome <?php echo $userName ?></h2>
        <span class="badge badge-<?php if($userRole == "admin") {echo 'danger';} else {echo 'success';} ?> ms-3"><?php echo strtoupper($userRole) ?></span>
      </div>
      <p class='text-light text-break'>
         Share your thoughts with us!
      </p>
    </div>
  </div>

  <?php
    include_once 'components/footer.php';
    ?>

</body>
</html>