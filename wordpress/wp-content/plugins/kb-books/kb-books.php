<?php
/**
 * Book Plugin
 *
 * @wordpress-plugin
 * Plugin Name: Books
 * Description: Add books
 * Version: 1.0.0
 * Author: Katherine Botabara
 * Text Domain: kb-books
 */

namespace KB\BookPlugin;

const TEXT_DOMAIN = 'kb-books';
//include classes
require_once "classes/Singleton.php";
require_once "classes/BookPostType.php";
require_once "classes/BookGenre.php";
require_once "classes/BookMeta.php";
require_once "classes/BookReview.php";
require_once "classes/BookReviewMeta.php";
require_once "classes/BookSettings.php";


//instantiate singletons
BookPostType::getInstance();
BookGenre::getInstance();
BookMeta::getInstance();
BookReviewMeta::getInstance();
BookSettings::getInstance();

//activation hooks

function activatePlugin()
{
    //register post type
    BookPostType::getInstance()->registerPostType();
    BookGenre::getInstance()->registerGenre();
    BookReview::getInstance()->registerReview();

    //flushing permalink cache
    flush_rewrite_rules();
}

register_activation_hook(__FILE__, 'KB\BookPlugin\activatePlugin');