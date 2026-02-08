<?php
require_once "includes/database.php";

$pageTitle = "Products";
include "includes/header.php";

$sortBy = $_GET['sort'] ?? "Name";
$dir = $_GET['dir'] ?? 'ASC';
include "includes/functions.php";
include "includes/nav.php";
    $query = "SELECT *
        FROM ArtProduct 
        ORDER BY $sortBy $dir";



$result = mysqli_query($db, $query) or die('Error in query');

$productCount = mysqli_num_rows($result);


?>
<div class="container">

    <h1>Products</h1>
    <p> Found <?=$productCount?> products.</p>
    <a href="product-add.php"><button class="btn-primary btn">Add New Product</button></a>
    <table class="table">
        <thead>
        <tr>
            <th class="table-heading"><a href="?sort=Name&dir=<?= $sortBy === 'Name' && $dir === 'ASC' ? 'DESC' : 'ASC'?>">Name</a><?= $sortBy === 'Name' ? $arrows : ''?></th>
            <th class="table-heading"><a href="?sort=Cost&dir=<?= $sortBy === 'Cost' && $dir === 'ASC' ? 'DESC' : 'ASC'?>">Cost</a><?= $sortBy === 'Cost' ? $arrows : ''?></th>
            <th class="table-heading"><a href="?sort=Rating&dir=<?= $sortBy === 'Rating' && $dir === 'ASC' ? 'DESC' : 'ASC'?>">Rating</a><?= $sortBy === 'Rating' ? $arrows : ''?></th>
        <th></th>
        </tr>
        </thead>
        <tbody>
        <?php

        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
           ?>
            <tr class="products">
                <td><a href="product.php?id=<?= $row['ProductID']?>" target="_blank"><?= $row['Name']?></a></td>
                <td><a href="product.php?id=<?= $row['ProductID']?>" target="_blank">$<?= $row['Cost']?></a></td>
                <td><a href="product.php?id=<?= $row['ProductID']?>" target="_blank"><?= stars($row['Rating'])?></a></td>
                <td><button><a href="product-delete.php?id=<?= $row['ProductID']?>"><img src="images/trash3-fill.svg" alt="Delete Button"></a></button>
                </td>
            </tr>
            <?php } ?>
        </tbody>

    </table>


</div>

</body>
</html>
<?php
