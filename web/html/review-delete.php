<?php
require_once "includes/database.php";

$id = $_GET['id'] ?? '';


$query = "SELECT *, ArtProduct.Name as ProductName, ArtProduct.ProductID as Product
FROM `ArtRatings`
    JOIN ArtProduct ON ArtRatings.ProductID = ArtProduct.ProductID 

       WHERE RatingID = '$id'";

$result = mysqli_query($db, $query) or die('Error in query');
//$reviewResult = mysqli_query($db, $query) or die('Error in query');

$artRating = mysqli_fetch_array($result, MYSQLI_ASSOC) or die('Product not Found');

//$pageTitle = $product['Product'];




include "includes/header.php";
include "includes/nav.php";
if(isset($_POST['submit'])) {
    $productId = $_POST['product'];
    $ratingId = $_POST['RatingID'];


$query = "DELETE FROM `ArtRatings`
                    WHERE `ArtRatings`.`RatingID` = $ratingId
                    LIMIT 1;
";
$result = mysqli_query($db, $query) or die('Error adding review');
header('Location: product.php?id=' . $productId);
};

mysqli_close($db);
?>
    <div class="container">
        <p>&#171; <a href="product.php?id=<?=$artRating['Product']?>">Back</a></p>
            <form action="" method="post">
                <h5>Are you sure you want to delete <?= $artRating['ProductName']?> review?</h5>

                <div class="form-group">
                    <input type="hidden" name="product" value="<?= $artRating['ProductID']?>">
                    <input type="hidden" name="RatingID" value="<?= $artRating['RatingID']?>">
                    <button type="submit" name="submit" id="submit" class="btnSubmit btn btn-outline-danger">Delete Review</button>
                </div>

            </form>
    </div> <!-- End of Container -->

    </body>
    </html>
<?php
