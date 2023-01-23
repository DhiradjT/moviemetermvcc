<!DOCTYPE html>
  <html lang="en">
  <head>
  <?php include 'components/head.php'?>
  </head>
  <body>

  <?php include 'components/navbar.php'?>



<div class="container">
    <div class="row">
<div class="col-md-12 d-flex justify-content-center">
  
<form action="insert_review.php" method="post">
    <label for="name">Name:</label>
    <br>
    <input type="text" id="name" name="name" required>
    <br>
    <label for="review">Review:</label>
    <br>
    <textarea id="review" name="review" required></textarea>
    <br>
    <br>
    <input type="submit" value="Submit">
</form>


</div> 
</div>
</div>

