<?php

// Deze code bevat een beveiligingsmechanisme om te controleren of de gebruiker die de pagina probeert te bekijken, een admin is. Als de gebruiker geen admin is, wordt een foutmelding weergegeven. Als de gebruiker wel een admin is, wordt de pagina weergegeven.

//De code haalt vervolgens een specifiek product op uit de database op basis van een meegegeven product-ID. De code haalt ook alle categorieën op uit de database.

//Vervolgens wordt er gecontroleerd of het formulier is verzonden. Als dit het geval is, worden de ingevoerde gegevens opgehaald uit het formulier en wordt er gecontroleerd of de ingevoerde gegevens geldig zijn. Als dit het geval is, wordt het product in de database bijgewerkt. Er wordt ook gecontroleerd of er een bestand is geüpload en of dit bestand van het juiste formaat is. Als er een probleem is met het bestand, wordt er een foutmelding weergegeven. Als alles in orde is, wordt het bestand geüpload en wordt het product in de database bijgewerkt.
require_once 'dbconnectie.php';
include 'logged_in_user.php';
if ($userRole != 'admin') {
  echo "Error: Not Allowed";
} else {
  $productId = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

  $products = $db->prepare("SELECT * FROM `movies` WHERE id = :id");
  $products->bindParam("id", $productId);
  $products->execute();
  $productResult = $products->fetchAll(PDO::FETCH_ASSOC);

  $categories = $db->prepare("SELECT * FROM `categories`");
  $categories->execute();
  $categoriesResult = $categories->fetchAll(PDO::FETCH_ASSOC);

  foreach ($productResult as &$data) {
    $productName = $data["name"];
    $productImage = $data["image"];
    $productDetail = $data["detail"];
    $productCategoryID = $data["category_id"];
  }

  if (isset($_POST["submit"])) {
    $productName = $_POST['productName'];
    $categorySelect = $_POST['categorySelect'];
    $productDetail = $_POST['productDetail'];
    $file_upload = $_FILES["file_upload"];

    $fileName = $_FILES["file_upload"]["name"];
    $fileTmpName = $_FILES["file_upload"]["tmp_name"];
    $fileSize = $_FILES["file_upload"]["size"];
    $fileError = $_FILES["file_upload"]["error"];
    $fileType = $_FILES["file_upload"]["type"];

    $fileExtension = explode(".", $fileName );
    $fileActualExtension = strtolower(end($fileExtension));
    $allowedFileExt = array('jpg', 'jpeg', 'png', 'gif');

    if (in_array($fileActualExtension, $allowedFileExt)) {
      if ($fileError === 0) {
        if ($fileSize < 500000) {
          $fileNewName = uniqid('', true) . "." . $fileActualExtension;
          $fileDir = "img/$fileNewName";
          unlink($productImage);
          move_uploaded_file($fileTmpName, $fileDir);

          if ($productName == '' || $categorySelect == '' || $productDetail == '') {
            $statusAlert = 'alert-warning';
            $statusMessage = 'Velden mogen niet leeg zijn';
          } else {
            $products = $db->prepare("UPDATE moviemeter SET name = name:, image = : image, detail = :detail, category_id = : category_id WHERE id = :id");
            $products->bindParam("name", $productName);
            $products->bindParam("image", $fileDir);
            $products->bindParam("detail", $productDetail);
            $products->bindParam("category_id", $categorySelect);
            $products->bindParam("id", $productId);
            if ($products->execute()) {
              $statusAlert = 'alert-succes';
              $statusMessage = 'Product geupdate!';
            } else {
              $statusAlert = 'alert-danger';
              $statusMessage = 'Er is iets mis gegaan';
            }
          }
        } else {
          $statusAlert = "alert-danger";
          $statusMessage = 'Bestand moet minder dan 500kb zijn!';
        }
      } else {
        $statusAlert = "alert-danger";
        $statusMessage = 'Er is iets foutgegaan!';
      }
    } else {
      $statusAlert = 'alert-danger';
      $statusMessage = 'Bestand niet toegestaan!';
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

      ?>
      <div class="row my-4">
        <?php
        if (isset($statusAlert)) {
          echo "<div class='alert $statusAlert' role='alert'>$statusMessage</div>";
        } else {
          echo '';
        }

        ?>
         <div class="container p-3 my-4">
        <form action="" method="post" enctype="multipart/form-data">
          <div class="row my-4">
            <div class="col">
              <label for="name">Product Naam:</label>
              <input type="text" name="productName" class="form-control" value="<?php echo $productName ?>" placeholder="Product Naam">
            </div>
            <div class="col">
              <label for="category">Category:</label>
              <select class="form-select" name="categorySelect">
                <?php
                foreach ($categoriesResult as &$categoriesData) {
                ?>
                  <option value="<?php echo $categoriesData["id"] ?>" <?php if ($categoriesData["id"] == $productCategoryID) {
                    echo "selected";
                  } ?>><?php echo $categoriesData["name"] ?></option>
                <?php
                }
                ?>
              </select>
            </div>
          </div>
          <div class="row mb-4">
            <div class="col">
              <label for="detail">Beschrijving:</label>
              <textarea type="text" name="productDetail" class="form-control"><?php echo $productDetail ?></textarea>
            </div>
          </div>
          <div class="row mb-4">
            <div class="col">
              <label for="detail">Image bij sportapparaat:</label>
              <div class="input-group mb-3">
                <input type="file" name="file_upload" class="form-control">
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary" name="submit">Edit Product</button>
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
