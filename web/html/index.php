<?php
require_once "includes/database.php";
$pageTitle = "Home";
include "includes/header.php";
$sortBy = $_GET['sort'] ?? "Name";
$dir = $_GET['dir'] ?? 'ASC';
include "includes/functions.php";
include "includes/nav.php";


?>
<div class="container">
    <div class="banner">
        <div>
            <h1>Art Prints Shop</h1>
            <a href="products.php"><button type="button" class="btn btn-lg btn-danger banner-btn" >Learn More</button></a>
        </div>
    </div>
    <div class="container-sm body">
        <div class="row">
            <div class="col text">
                <h2 class="text-center">Our Start</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <a href="#" class="btn-primary">Learn More</a>
            </div>
        </div>
    </div>



</div>

</body>
</html>
<?php
