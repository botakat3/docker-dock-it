<?php
require_once "includes/database.php";

$id = $_GET['id'] ?? '';


$sortBy = $_GET['sort'] ?? "Name";
$dir = $_GET['dir'] ?? 'ASC';
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
$averageRating = $product['Average'];
$pageTitle = $product['Product'];
if(isset($_POST['submit'])){
    $name = $_POST['title'];
    $cost = $_POST['cost'];


    $query = "UPDATE `ArtProduct` SET 
                        `Name` = '$name', 
                        `Cost` = '$cost' 
                    WHERE `ArtProduct`.`ProductID` = $id;";


    $result = mysqli_query($db, $query) or die('Error in query');
    header('Location: product.php?id=' . $id);

}
include "includes/header.php";
include "includes/functions.php";
include "includes/nav.php";
?>
    <div class="container">

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
                <button type="submit" class="btn btn-primary" name="submit" id="submit" >Submit Edit</button>

            </div>
            </form>
        </div>




    </div> <!-- End of Container -->
    </body>
    </html>
<?php
