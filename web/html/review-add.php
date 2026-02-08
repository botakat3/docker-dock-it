<?php
require_once "includes/database.php";

$id = $_GET['id'] ?? '';


$query = "SELECT *, Cost, ArtProduct.Name as Product, Cost, ArtRatings.Name as Customer, ArtProduct.ProductID as ID
FROM `ArtProduct`
    JOIN ArtRatings ON ArtProduct.ProductID = ArtRatings.ProductID
       WHERE ArtProduct.ProductID = '$id'";


$result = mysqli_query($db, $query) or die('Error in query');
//$reviewResult = mysqli_query($db, $query) or die('Error in query');

$product = mysqli_fetch_array($result, MYSQLI_ASSOC) or die('Product not Found');

//$pageTitle = $product['Product'];


include "includes/header.php";
include "includes/nav.php";
$isFormValid = true;

if(isset($_POST['submit'])){
    $nameForm = $_POST['customer'];
    $ratingForm = $_POST['rating'] ?? 0;

    if ($nameForm == null) {
        $nameError = '*Please enter a name.';
        $isFormValid = false;
    }
    if ($ratingForm == null) {
        $ratingError = '*Please enter a rating.';
        $isFormValid = false;
    }
}

if(isset($_POST['submit']) && $isFormValid ) {
    $productId = $_POST['product'];
    $nameForm = $_POST['customer'];
    $ratingForm = $_POST['rating'] ?? 0;
    $commentForm = $_POST['comment'];


$query = "INSERT INTO `ArtRatings`
            (`RatingID`, `ProductID`, `RatingScore`, `Name`, `Comment`)
            VALUES (NULL, '$productId', '$ratingForm', '$nameForm', '$commentForm');";
$result = mysqli_query($db, $query) or die('Error adding review');
header('Location: product.php?id=' . $productId);
};

mysqli_close($db);
?>
    <div class="container">
            <p>&#171; <a href="product.php?id=<?=$product['ID']?>">Back</a></p>
            <form action="" method="post">
                <h5>Add a Review for <?= $product['Product']?></h5>
                <div class="form-group">
                    <input type="hidden" name="product" id="product" value="<?= $product['ID']?>">
                </div>
                <div class="form-group">
                    <p class="text-danger"><?= $nameError ?? ''?></p>
                    <label for="customer">Name</label>
                    <input type="text" name="customer" class="form-control" placeholder="Name" value="">
                </div>

                <p class="text-danger"><?= $ratingError ?? ''?></p>
                <div class="rating form-group">

                    <input id="rating1" type="radio" name="rating" value="1">
                    <label for="rating1">1</label>
                    <input id="rating2" type="radio" name="rating" value="2">
                    <label for="rating2">2</label>
                    <input id="rating3" type="radio" name="rating" value="3">
                    <label for="rating3">3</label>
                    <input id="rating4" type="radio" name="rating" value="4">
                    <label for="rating4">4</label>
                    <input id="rating5" type="radio" name="rating" value="5">
                    <label for="rating5">5</label>
                </div>
                <div class="form-group">
                    <label for="comment">Comments</label>
                    <textarea id="comment" name="comment" class="form-control" placeholder="Comments"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" name="submit" id="submit" class="btnSubmit btn btn-primary">Submit Review</button>
                </div>

            </form>
    </div> <!-- End of Container -->

    </body>
    </html>
<?php
