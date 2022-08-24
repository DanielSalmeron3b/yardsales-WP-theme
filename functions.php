<?php

function plz_assets()
{

    wp_register_style(
        "google-font",
        "https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700",
        array(),
        false,
        "all"
    );
    wp_register_style(
        "google-font-2",
        "https://fonts.googleapis.com/css2?family=Roboto:wght@100;400;500;700&display=swap",
        array(),
        false,
        "all"
    );

    wp_register_style(
        "bootstrap",
        "https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css",
        array(),
        "5.1",
        "all"
    );

    // Estilos y fuentes
    wp_enqueue_style(
        "estilos", 
        get_template_directory_uri() . "/assets/css/style.css", 
        array("google-font", "bootstrap", "google-font-2")
    );

    // JavaScript
    wp_enqueue_script(
        "yardsale-js",
        get_template_directory_uri()."/assets/js/script.js"
    );
};

add_action("wp_enqueue_scripts", "plz_assets");

// Función para insertar html justo después de abrir el body
function plz_analytics()
{
?>
        
    <?php
}

add_action("wp_body_open", "plz_analytics");

function plz_theme_supports()
{
    //Agrega la etiqueta de título del sitio dependiendo de lo que tengamos configurado en WP
    add_theme_support('title-tag');

    // Habilita la opción de imagenes destacadas
    add_theme_support('post-thumbnails');

    // Agregar un logo. Con un array que contiene sus configs
    add_theme_support('custom-logo', array(
        "width" => 170,
        "height" => 35,
        "flex-width" => true,
        "flex-height" => true,
    ));
};

add_action("after_setup_theme", "plz_theme_supports");

// Función para poder configurar el menú desde WP
function plz_add_menus()
{
    register_nav_menus(
        array(
            "menu-principal" => 'Menu Principal',
            'menu-responsive' => 'Menu Responsive',
        )
    );
};

add_action("after_setup_theme", "plz_add_menus");

// Function to create a sidebar
function plz_add_sidebar() {
    register_sidebar(
        array(
            'name' => 'Pie de página',
            'id' => 'pie-pagina',
            // What we want to see before and after the widget
            'before_widget' => '', // Empty string, to avoid unwanted code or characters
            'after_widget' => '',
        )
    );
}

add_action('widgets_init', 'plz_add_sidebar');

// Adding a custom post-type

function plz_add_custom_post_type(){

    $labels = array(
        // Caps and accents marks are important here
        // These are the ones that we'll see in the WP admin.
        'name' => ' Producto',
        'singular_name' => 'Producto',
        'all_items' => 'Todos los productos',
        'add_new' => 'Añadir producto', // <--
    );

    $args = array(
        'labels'             => $labels, // Text to be utilised inside the post type
        'description'        => 'Productos para listar en un catálogos.',
        'public'             => true,
        'publicly_queryable' => true, // Being callable from the code
        'show_in_menu'       => true, // Being able to add as an item to the menu
        'query_var'          => true, // Being able to add reference values to create a query
        'rewrite'            => array( 'slug' => 'producto' ), // The endpoint
        'capability_type'    => 'post', // Permissions needed to create/edit a product
        'has_archive'        => true, // If there's a page where the products can be listed
        'hierarchical'       => false, // If we can add a hierarchy
        'menu_position'      => 5, // In what position we'll be able to visualize it in the admin interf.
        // Supports are important. They define what fields we can add to a product
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail' ),
        'taxonomies'         => array('category'), // How we'll segment a product, with category in this case
        'show_in_rest'       => true, // If it will be generated also in WP's API
        'menu_icon'          => 'dashicons-cart' // Type of icon to be visualized in the admin interf.
    );

    register_post_type('producto', $args);
}

// init hook. When the site is initializing.
add_action('init', 'plz_add_custom_post_type');

function plz_add_to_signin_menu() {
    // Validating if we are logged in or not

    $current_user = wp_get_current_user();

    // If the user is logged in we show it's email. If not we show 'Sign in'
    $msg = is_user_logged_in()? $current_user->user_email : "Sign in";

    echo $msg;
}

add_action("plz_signin", "plz_add_to_signin_menu");

