<?php
require_once "includes/database.php";

$id = $_GET['id'] ?? '';

$query = "SELECT *, ProductID, Name
FROM `ArtProduct` 
WHERE ProductID = '$id'";

$result = mysqli_query($db, $query) or die('Error in query');
$product = mysqli_fetch_array($result, MYSQLI_ASSOC) or die('Product not Found');

$pageTitle = $product['Name'];

if(isset($_POST['submit'])){
    $name = $_POST['product'];



    $query = "DELETE FROM `ArtProduct`
       WHERE `ArtProduct`.`ProductID` = $name;";


    $result = mysqli_query($db, $query) or die('Error in query');
    header('Location: products.php');

}

include "includes/header.php";
include "includes/nav.php";
?>
    <div class="container">
        <p>&#171; <a href="products.php?id=<?= $id ?>">Back</a></p>
        <form action="" method="post">
            <h5>Are you sure you want to delete <?= $product['Name']?>?</h5>

            <div class="form-group">
                <input type="hidden" name="product" value="<?= $product['ProductID']?>">
                <button type="submit" name="submit" id="submit" class="btnSubmit btn btn-outline-danger">Delete Product</button>
            </div>

        </form>

    </div> <!-- End of Container -->
    </body>
    </html>
<?php
