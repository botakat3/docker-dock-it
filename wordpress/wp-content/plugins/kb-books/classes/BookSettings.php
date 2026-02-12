<?php

namespace KB\BookPlugin;

class BookSettings extends Singleton
{

    const SHOW_PUBLISHER = 'showPublisher';
    const SHOW_PUBLISHED_DATE = 'showPublishedDate';
    const SHOW_PAGE_COUNT = "showPageCount";
    const SHOW_PRICE = "showPrice";
    const SHOW_SERIES = "showSeries";
    const SHOW_BOOK_FORMAT = "showFormat";
    const SHOW_BOOK_DESCRIPTION = "showDescription";


    protected static $instance;

    public function __construct()
    {
        add_action('admin_init', [$this, 'registerSettings'], 0);
        add_action('admin_menu', [$this, 'addMenuPages']);
    }


    function registerSettings()
    {
    }

    public function addMenuPages(){
        add_menu_page(
            'Sample Menu Page',
            'Sample Menu',
            'manage_options',
            'sample-menu-page',
            function(){
                echo "THIS IS THE PAGE CONTENT";
            },
            'dashicons-admin-generic',
             25
        );
    }

    public function settingsPage(){}

    public function addFields()
    {


    }

}