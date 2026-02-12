<?php
namespace KB\BookPlugin;

class BookReviewMeta extends Singleton
{

    const NAME = 'name';
    const LOCATION = 'location';
    const RATING = "rating";
    const BOOK = "book";



    protected static $instance;

    public function __construct()
    {
        add_action( 'admin_init', [$this, 'registerMetaBox'], 0 );
        add_action( 'save_post_' . BookReview::POST_TYPE, [$this, 'saveReview'], 0 );
    }


    function registerMetaBox() {
        add_meta_box('book_review_meta',
            'Review',
            [$this, 'bookReviewForm'],
            BookReview::POST_TYPE,
            'normal',
            'core');

    }

    //directions input
    function bookReviewForm(){

        //getting meta
        $name = $this->getName();
        $location = $this->getLocation();
        $rating = $this->getRating();
        $book = $this->getBook();



        ?>
        <p><label>Name: <input type="text" name="<?= self::NAME ?>" value="<?= $name ?>"></label></p>
        <p><label>Location: <input type="text" name="<?= self::LOCATION ?>" value="<?= $location ?>"></label></p>
        <p><label>Rating: <input type="text" name="<?= self::RATING ?>" value="<?= $rating ?>"></label></p>
        <p><label>Book: <input type="text" name="<?= self::BOOK ?>" value="<?= $book ?>" readonly></label></p>
        <?php
    }


    function saveReview(){

        //get values
        $name = $_POST[self::NAME];
        $location = $_POST[self::LOCATION];
        $rating = $_POST[self::RATING];
        $book = $_POST[self::BOOK];



        //sanitize
        $name = sanitize_text_field($name);
        $location = sanitize_text_field($location);
        $rating = sanitize_text_field($rating);
        $book = sanitize_text_field($book);


        //put in database
        $post = get_post();
        update_post_meta($post->ID, self::NAME, $name);
        update_post_meta($post->ID, self::LOCATION, $location);
        update_post_meta($post->ID, self::RATING, $rating);
        update_post_meta($post->ID, self::BOOK, $book);


    }

    public function getName(){
        $post = get_post();
        return get_post_meta($post->ID, self::NAME, true);
    }

    public function getLocation(){
        $post = get_post();
        return get_post_meta($post->ID, self::LOCATION, true);
    }

    public function getRating(){
        $post = get_post();
        return get_post_meta($post->ID, self::RATING, true);
    }

    public function getBook(){
        $post = get_post();
        return get_post_meta($post->ID, self::BOOK, true);
    }

}