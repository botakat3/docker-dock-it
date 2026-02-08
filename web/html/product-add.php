<?php
require_once "includes/database.php";

$id = $_GET['id'] ?? '';


$sortBy = $_GET['sort'] ?? "Name";
$query = "SELECT *, Cost, ArtProduct.Name as Product, Cost, ArtRatings.Name as Customer, ArtProduct.ProductID as ID, ROUND(AVG(RatingScore)) as Average
FROM `ArtProduct` 
    JOIN ArtRatings ON ArtProduct.ProductID = ArtRatings.ProductID
        WHERE ArtProduct.ProductID = '$id'";

$reviewQuery = "SELECT *, Cost, ArtProduct.Name as Product, Cost, ArtRatings.Name as Customer, ArtProduct.ProductID as ID  
FROM `ArtProduct` 
    JOIN ArtRatings ON ArtProduct.ProductID = ArtRatings.ProductID
        WHERE ArtProduct.ProductID = '$id'";


$result = mysqli_query($db, $query) or die('Error in query');
$reviewResult = mysqli_query($db, $reviewQuery) or die('Error in query');

$product = mysqli_fetch_array($result, MYSQLI_ASSOC) or die('Product not Found');
$pageTitle = 'Add Product';
if(isset($_POST['submit'])){
    $name = $_POST['title'];
    $cost = $_POST['cost'];


    $query = "INSERT INTO `ArtProduct` 
    (`ProductID`, `Name`, `Description`, `Image`, `Cost`, `Rating`) 
    VALUES (NULL, '$name', '', NULL, '$cost', NULL);
";


    $result = mysqli_query($db, $query) or die('Error in query');
    header('Location: products.php');

}
include "includes/header.php";
include "includes/nav.php";
?>
    <div class="container">
        <p>&#171; <a href="products.php">Back</a></p>

        <form action="" method="post">
        <div class="row product">

            <div class="col">
                <p>
                    <img src="images/placeholder-img.jpg" alt="Placeholder Image">
                </p>
            </div>
            <div class="col product-text">
                <p>
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" value="<?= $pageTitle ?>">
                </p>
              <p>
                  <label for="cost">Cost</label>
                  $<input type="text" name="cost" id="cost" value="<?= $product['Cost']?>">
              </p>
                <button type="submit" class="btn btn-primary" name="submit" id="submit" >Add New Product</button>

            </div>
            </form>
        </div>




    </div> <!-- End of Container -->
    </body>
    </html>
<?php
