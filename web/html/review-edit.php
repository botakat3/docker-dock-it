<?php
require_once "includes/database.php";

$id = $_GET['id'] ?? '';


$query = "SELECT *
FROM `ArtRatings`
       WHERE RatingID = '$id'";

$result = mysqli_query($db, $query) or die('Error in query');
//$reviewResult = mysqli_query($db, $query) or die('Error in query');

$artRating = mysqli_fetch_array($result, MYSQLI_ASSOC) or die('Product not Found');

$pageTitle = 'Edit Review';




include "includes/header.php";
include "includes/nav.php";
$isFormValid = true;

if(isset($_POST['submit']) ) {
    $productId = $_POST['product'];
    $nameForm = $_POST['customer'];
    $ratingForm = $_POST['rating'] ?? 0;
    $commentForm = $_POST['comment'];
    $ratingId = $_POST['RatingID'];

    if ($nameForm == null) {
        $nameError = '*Please enter a name.';
        $isFormValid = false;
    }
    if ($ratingForm == null) {
        $ratingError = '*Please enter a rating.';
        $isFormValid = false;
    }


};

if (isset($_POST['submit']) && $isFormValid) {
    $productId = $_POST['product'];
    $nameForm = $_POST['customer'];
    $ratingForm = $_POST['rating'] ?? 0;
    $commentForm = $_POST['comment'];
    $ratingId = $_POST['RatingID'];

    $query = "UPDATE `ArtRatings` SET 
                        `RatingID` = '$ratingId', 
                        `RatingScore` = '$ratingForm', 
                        `Name` = '$nameForm', 
                        `Comment` = '$commentForm' 
                    WHERE `ArtRatings`.`RatingID` = $ratingId;
";
    $result = mysqli_query($db, $query) or die('Error adding review');
    header('Location: product.php?id=' . $productId);
};
mysqli_close($db);
?>
    <div class="container">
        <p>&#171; <a href="product.php?id=<?=$artRating['ProductID']?>">Back</a></p>

            <form action="" method="post">
                <h5>Edit Review for <?= $artRating['Name']?></h5>
                <div class="form-group">
                    <input type="hidden" name="product" id="product" value="<?= $artRating['ProductID']?>">
                </div>
                <div class="form-group">
                    <p class="text-danger"><?= $nameError ?? ''?></p>
                    <label for="customer">Name</label>
                    <input type="text" name="customer" class="form-control" placeholder="Name" value="<?= $artRating['Name']?>">
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
                    <textarea id="comment" name="comment" class="form-control" placeholder="Comments"><?= $artRating['Comment']?></textarea>
                </div>
                <div class="form-group">
                    <input type="hidden" name="RatingID" value="<?= $artRating['RatingID']?>">
                    <button type="submit" name="submit" id="submit" class="btnSubmit btn btn-primary">Edit Review</button>
                </div>

            </form>
    </div> <!-- End of Container -->

    </body>
    </html>
<?php
