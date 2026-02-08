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
$averageRating = $product['Average'] ?? 0;
$pageTitle = $product['Product'];
if(isset($averageRating)){
    $query = "UPDATE `ArtProduct` SET 
    `Rating` = '$averageRating' 
    WHERE `ArtProduct`.`ProductID` = $id;";

    $result = mysqli_query($db, $query) or die('Error in query');

}
include "includes/header.php";
include "includes/functions.php";
include "includes/nav.php";
?>
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="products.php">Products</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= $pageTitle?></li>
            </ol>
        </nav>

        <div class="row product">
            <div class="col">
                <p>
                    <img src="images/placeholder-img.jpg" alt="Placeholder Image">
                </p>
            </div>
            <div class="col product-text">
                <h1><?= $pageTitle ?></h1>
                <p>$<?= $product['Cost']?></p>
                <p>Average rating: <?= stars($product['Average']) ?></p>
                <p><a href="product-edit.php?id=<?= $id ?>">Edit</a></p>
            </div>
        </div>
        <div class="container-sm">
        <div class="row">
            <h2>Reviews</h2>

            <?php
            while($row = mysqli_fetch_array($reviewResult, MYSQLI_ASSOC)){

                ?>
              <div class="review">
                  <h6><?= $row['Customer']?></h6>
                  <p><?= stars($row['RatingScore'])?></p>
                  <p><?= $row['Comment']?></p>
                  <div class="edit-delete">
                  <p><a href="review-edit.php?id=<?= $row['RatingID']?>"><img src="images/pencil-square.svg" alt="Edit button"></a></p>
                  <p><a href="review-delete.php?id=<?= $row['RatingID']?>"><img src="images/trash3-fill.svg" alt="Delete Button"></a></p>
                  </div>
              </div>

            <?php
            }
            ?>
        </div>
        <a class="btn btn-primary" href="review-add.php?id=<?= $id ?>">Add review</a>

        </div>
    </div> <!-- End of Container -->
    </body>
    </html>
<?php
