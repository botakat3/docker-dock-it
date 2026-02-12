<?php

namespace KB\BookPlugin;

class BookPostType extends Singleton
{

    const POST_TYPE = 'book';

    protected static $instance;

    public function __construct()
    {
        add_action( 'init', [$this, 'registerPostType'], 0 );
        add_filter('the_content', [$this, 'bookContent']);
    }


// Register Custom Post Type
    public function registerPostType() {

        $labels = array(
            'name'                  => _x( 'Book', 'Post Type General Name', 'kb-books' ),
            'singular_name'         => _x( 'Book Type', 'Post Type Singular Name', 'kb-books' ),
            'menu_name'             => __( 'Book Types', 'kb-books' ),
            'name_admin_bar'        => __( 'Book Type', 'kb-books' ),
            'archives'              => __( 'Book Archives', 'kb-books' ),
            'attributes'            => __( 'Book Attributes', 'kb-books' ),
            'parent_item_colon'     => __( 'Parent Book:', 'kb-books' ),
            'all_items'             => __( 'All Books', 'kb-books' ),
            'add_new_item'          => __( 'Add New Book', 'kb-books' ),
            'add_new'               => __( 'Add New', 'kb-books' ),
            'new_item'              => __( 'New Book', 'kb-books' ),
            'edit_item'             => __( 'Edit Book', 'kb-books' ),
            'update_item'           => __( 'Update Book', 'kb-books' ),
            'view_item'             => __( 'View Book', 'kb-books' ),
            'view_items'            => __( 'View Books', 'kb-books' ),
            'search_items'          => __( 'Search Book', 'kb-books' ),
            'not_found'             => __( 'Not found', 'kb-books' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'kb-books' ),
            'featured_image'        => __( 'Featured Image', 'kb-books' ),
            'set_featured_image'    => __( 'Set featured image', 'kb-books' ),
            'remove_featured_image' => __( 'Remove featured image', 'kb-books' ),
            'use_featured_image'    => __( 'Use as featured image', 'kb-books' ),
            'insert_into_item'      => __( 'Insert into Book', 'kb-books' ),
            'uploaded_to_this_item' => __( 'Uploaded to this Book', 'kb-books' ),
            'items_list'            => __( 'Books list', 'kb-books' ),
            'items_list_navigation' => __( 'Books list navigation', 'kb-books' ),
            'filter_items_list'     => __( 'Filter Books list', 'kb-books' ),
        );
        $args = array(
            'label'                 => __( 'Book Type', 'kb-books' ),
            'description'           => __( 'Books', 'kb-books' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'revisions', 'custom-fields' ),
            'taxonomies'            => array( BookGenre::TAXONOMY ),
            'hierarchical'          => true,
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

    public function bookContent($content)
    {
        //checking post type
        if (get_post_type() == self::POST_TYPE) {

       require_once plugin_dir_path(__FILE__) . "../templates/single-book.php";

    }


        return $content;
    }

}