<?php

// Action qui permet de charger des scripts dans notre thème
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles(){
    // Chargement du style.css du thème parent Twenty Twenty
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    // Chargement du css/theme.css pour nos personnalisations
    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/css/theme.css');
}
function add_admin_link_to_menu($items, $args) {
    if (is_user_logged_in ()){
        $menu_items = explode( '</li>', $items);
        $new_item = '<li><a href="' .admin_url() . '">Admin</a></li>';
        array_splice($menu_items, floor(count($menu_items)/2), 0, $new_item);
        $items = implode ('</li>', $menu_items);
    }
    return $items;

    }
add_filter ('wp_nav_menu_items', 'add_admin_link_to_menu', 10, 2);