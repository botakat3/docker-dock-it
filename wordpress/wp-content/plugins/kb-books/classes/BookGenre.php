<?php

namespace KB\BookPlugin;

class BookGenre extends Singleton
{

    const TAXONOMY = 'book_genre';

    protected static $instance;

    public function __construct()
    {
        add_action( 'init', [$this, 'registerGenre'], 0 );
    }


// Register Custom Taxonomy
    public function registerGenre() {

        $labels = array(
            'name'                       => _x( 'Genres', 'Taxonomy General Name', 'kb-books' ),
            'singular_name'              => _x( 'Genre', 'Taxonomy Singular Name', 'kb-books' ),
            'menu_name'                  => __( 'Genre', 'kb-books' ),
            'all_items'                  => __( 'All Genres', 'kb-books' ),
            'parent_item'                => __( 'Parent Genre', 'kb-books' ),
            'parent_item_colon'          => __( 'Parent Genre:', 'kb-books' ),
            'new_item_name'              => __( 'New Genre Name', 'kb-books' ),
            'add_new_item'               => __( 'Add New Genre', 'kb-books' ),
            'edit_item'                  => __( 'Edit Genre', 'kb-books' ),
            'update_item'                => __( 'Update Genre', 'kb-books' ),
            'view_item'                  => __( 'View Genre', 'kb-books' ),
            'separate_items_with_commas' => __( 'Separate Genre with commas', 'kb-books' ),
            'add_or_remove_items'        => __( 'Add or remove Genres', 'kb-books' ),
            'choose_from_most_used'      => __( 'Choose from the most used', 'kb-books' ),
            'popular_items'              => __( 'Popular Genres', 'kb-books' ),
            'search_items'               => __( 'Search Genres', 'kb-books' ),
            'not_found'                  => __( 'Not Found', 'kb-books' ),
            'no_terms'                   => __( 'No Genres', 'kb-books' ),
            'items_list'                 => __( 'Items Genre', 'kb-books' ),
            'items_list_navigation'      => __( 'Genres list navigation', 'kb-books' ),
        );
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => true,
            'show_in_rest'               => true,
        );
        register_taxonomy( self::TAXONOMY, array( BookPostType::POST_TYPE ), $args );

    }

}