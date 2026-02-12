<?php

namespace KB\BookPlugin;

class BookReview extends Singleton
{
    const POST_TYPE = 'review';

    protected static $instance;

    public function __construct()
    {
        add_action( 'init', [$this, 'registerReview'], 0 );
        add_filter('the_content', [$this, 'bookReviewContent']);
    }


// Register Custom Post Type
    function registerReview() {

        $labels = array(
            'name'                  => _x( 'Reviews', 'Post Type General Name', 'kb-books' ),
            'singular_name'         => _x( 'Review', 'Post Type Singular Name', 'kb-books' ),
            'menu_name'             => __( 'Review Types', 'kb-books' ),
            'name_admin_bar'        => __( 'Review Type', 'kb-books' ),
            'archives'              => __( 'Review Archives', 'kb-books' ),
            'attributes'            => __( 'Review Attributes', 'kb-books' ),
            'parent_item_colon'     => __( 'Parent Review:', 'kb-books' ),
            'all_items'             => __( 'All Reviews', 'kb-books' ),
            'add_new_item'          => __( 'Add New Review', 'kb-books' ),
            'add_new'               => __( 'Add New', 'kb-books' ),
            'new_item'              => __( 'New Review', 'kb-books' ),
            'edit_item'             => __( 'Edit Review', 'kb-books' ),
            'update_item'           => __( 'Update Review', 'kb-books' ),
            'view_item'             => __( 'View Review', 'kb-books' ),
            'view_items'            => __( 'View Reviews', 'kb-books' ),
            'search_items'          => __( 'Search Review', 'kb-books' ),
            'not_found'             => __( 'Not found', 'kb-books' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'kb-books' ),
            'featured_image'        => __( 'Featured Image', 'kb-books' ),
            'set_featured_image'    => __( 'Set featured Review', 'kb-books' ),
            'remove_featured_image' => __( 'Remove featured image', 'kb-books' ),
            'use_featured_image'    => __( 'Use as featured image', 'kb-books' ),
            'insert_into_item'      => __( 'Insert into Review', 'kb-books' ),
            'uploaded_to_this_item' => __( 'Uploaded to this Review', 'kb-books' ),
            'items_list'            => __( 'Items Review', 'kb-books' ),
            'items_list_navigation' => __( 'Items Review navigation', 'kb-books' ),
            'filter_items_list'     => __( 'Filter Reviews list', 'kb-books' ),
        );
        $args = array(
            'label'                 => __( 'Review', 'kb-books' ),
            'description'           => __( 'Reviews', 'kb-books' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor' ),
            'taxonomies'            => array( 'category', 'post_tag' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'page',
            'show_in_rest'          => true,
        );
        register_post_type( self::POST_TYPE, $args );
    }

    public function bookReviewContent($review)
    {
        //checking post type
        if (get_post_type() == self::POST_TYPE) {

            require_once plugin_dir_path(__FILE__) . "../templates/single-review.php.php";

        }


        return $review;
    }
}