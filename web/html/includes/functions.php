<?php

//star function
function stars($rating){
    for($i = 0; $i < 5; $i++){
        if($i < $rating){
            echo "<img src='images/star-fill.svg' alt='Filled in star icon'>";
        } else {
            echo "<img src='images/star.svg' alt='Star icon'>";
        }
    }
}

//arrows
$arrows = ($dir === 'ASC' ? '&#10597;' : '&#10595;');