<?php
namespace KB\BookPlugin;

$reviewMeta = BookReviewMeta::getInstance();
$name = $this->getName();
$location = $this->getLocation();
$rating = $this->getRating();
$book = $this->getBook();


$review .= '
<div class="review-meta">
    <h3> '.$name.'</h3>
    <p>'.$location.'</p>
    <p>'.$rating.'</p>
</div>
';