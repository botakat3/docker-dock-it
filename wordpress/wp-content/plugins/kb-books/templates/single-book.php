<?php

namespace KB\BookPlugin;


$meta = BookMeta::getInstance();
$publisher = $meta->getPublisher();
$publishDate = $meta->getPublishDate();
$pageCount = $meta->getPageCount();
$price = $meta->getPrice();
$series = $meta->getSeries();
$bookFormat = $meta->getBookFormat();
$bookDescription = $meta->getBookDescription();



$content .= '
        <div class="book-meta">
        <div class="book-description">
         <h3>Description</h3>
        <p>Book Description: ' . $bookDescription . '</p>
        </div>
       
        <div class="book-details">
        <h3>Details</h3>
        <p>Publisher: ' . $publisher . '</p>
        <p>Published Date: ' . $publishDate . '</p>
        <p>Page Count: ' . $pageCount . '</p>
        <p>Price: $' . $price . '</p>
        <p>Series: ' . $series . '</p>
        <p>Book Format: ' . $bookFormat . '</p>
        </div>
        
        ';


