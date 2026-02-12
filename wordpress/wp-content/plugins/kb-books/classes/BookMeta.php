<?php

namespace KB\BookPlugin;

class BookMeta extends Singleton
{

    const PUBLISHER = 'bookPublisher';
    const PUBLISHED_DATE = 'publishedDate';
    const PAGE_COUNT = "pageCount";
    const PRICE = "price";
    const SERIES = "series";
    const BOOK_FORMAT = "bookFormat";
    const BOOK_DESCRIPTION = "bookDescription";


    protected static $instance;

    public function __construct()
    {
        add_action( 'admin_init', [$this, 'registerMetaBox'], 0 );
        add_action( 'save_post_' . BookPostType::POST_TYPE, [$this, 'saveBookDetails'], 0 );
    }


    function registerMetaBox() {
        add_meta_box('book_details_meta',
            'Details',
            [$this, 'bookDetailsForm'],
            BookPostType::POST_TYPE,
            'normal',
            'core');

    }

    //directions input
    function bookDetailsForm(){

        //getting meta
        $publisher = $this->getPublisher();
        $publishDate = $this->getPublishDate();
        $pageCount = $this->getPageCount();
        $price = $this->getPrice();
        $series = $this->getSeries();
        $bookFormat = $this->getBookFormat();
        $bookDescription = $this->getBookDescription();


        ?>
        <p><label>Publisher: <input type="text" name="<?= self::PUBLISHER ?>" value="<?= $publisher ?>"></label></p>
        <p><label>Published Date: <input type="text" name="<?= self::PUBLISHED_DATE ?>" value="<?= $publishDate ?>"></label></p>
        <p><label>Page Count: <input type="text" name="<?= self::PAGE_COUNT ?>" value="<?= $pageCount ?>"></label></p>
        <p><label>Price: <input type="text" name="<?= self::PRICE ?>" value="<?= $price ?>"></label></p>
        <p><label>Series: <input type="text" name="<?= self::SERIES ?>" value="<?= $series ?>"></label></p>
        <p><label>Book Format: <input type="text" name="<?= self::BOOK_FORMAT ?>" value="<?= $bookFormat ?>"></label></p>
        <p><label>Book Description: <textarea type="text" name="<?= self::BOOK_DESCRIPTION ?>" ><?= $bookDescription ?></textarea></label></p>
        <?php
    }


    function saveBookDetails(){

        //get values
        $publisher = $_POST[self::PUBLISHER];
        $publishDate = $_POST[self::PUBLISHED_DATE];
        $pageCount = $_POST[self::PAGE_COUNT];
        $price = $_POST[self::PRICE];
        $series = $_POST[self::SERIES];
        $bookFormat = $_POST[self::BOOK_FORMAT];
        $bookDescription = $_POST[self::BOOK_DESCRIPTION];


        //sanitize
        $publisher = sanitize_text_field($publisher);
        $publishDate = sanitize_text_field($publishDate);
        $pageCount = sanitize_text_field($pageCount);
        $price = sanitize_text_field($price);
        $series = sanitize_text_field($series);
        $bookFormat = sanitize_text_field($bookFormat);
        $bookDescription = sanitize_text_field($bookDescription);

        //put in database
        $post = get_post();
        update_post_meta($post->ID, self::PUBLISHER, $publisher);
        update_post_meta($post->ID, self::PUBLISHED_DATE, $publishDate);
        update_post_meta($post->ID, self::PAGE_COUNT, $pageCount);
        update_post_meta($post->ID, self::PRICE, $price);
        update_post_meta($post->ID, self::SERIES, $series);
        update_post_meta($post->ID, self::BOOK_FORMAT, $bookFormat);
        update_post_meta($post->ID, self::BOOK_DESCRIPTION, $bookDescription);

    }

    public function getPublisher(){
        $post = get_post();
        return get_post_meta($post->ID, self::PUBLISHER, true);
    }

    public function getPublishDate(){
        $post = get_post();
        return get_post_meta($post->ID, self::PUBLISHED_DATE, true);
    }

    public function getPageCount(){
        $post = get_post();
        return get_post_meta($post->ID, self::PAGE_COUNT, true);
    }

    public function getPrice(){
        $post = get_post();
        return get_post_meta($post->ID, self::PRICE, true);
    }

    public function getSeries(){
        $post = get_post();
        return get_post_meta($post->ID, self::SERIES, true);
    }

    public function getBookFormat(){
        $post = get_post();
        return get_post_meta($post->ID, self::BOOK_FORMAT, true);
    }

    public function getBookDescription(){
        $post = get_post();
        return get_post_meta($post->ID, self::BOOK_DESCRIPTION, true);
    }
}