<?php

function uni_guzang_files()
{
    wp_enqueue_style('uni_guzang_main_styles', get_theme_file_uri('/build/style-index.css'));
    wp_enqueue_style('uni_guzang_extra_styles', get_theme_file_uri('/build/index.css'));
    wp_enqueue_style('font-awesome', "https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css");
    wp_enqueue_style('google-fonts', "https://fonts.googleapis.com/css?family=Open+Sans|Roboto&display=swap");
    wp_enqueue_script('main-uni-guzang-js', get_theme_file_uri('/build/index.js'), array('jquery'), '1.0', true); // loads image slider on home screen
}
add_action('wp_enqueue_scripts', 'uni_guzang_files');

function uni_guzang_features()
{
    add_theme_support('title-tag'); // loads page title
    // register_nav_menu('headerMenuLocation', 'Header Menu Location');
    // register_nav_menu('footerLocation1', 'Footer Location 1');
    // register_nav_menu('footerLocation2', 'Footer Location 2');
}
add_action('after_setup_theme', 'uni_guzang_features');


function uni_guzang_adjust_queries($query)
{
    if (!is_admin() and is_post_type_archive('event') and $query->is_main_query()) {
        $query->set('meta_key', 'event_date');
        $query->set('orderby', 'meta_value_num');
        $query->set('order', 'ASC');
        $query->set('meta_query', array(
            'key' => 'event_date',
            'compare' => ">=",
            'value' => date('Ymd'),
            'type' => 'numeric',
        )
        );
    }
}
;
add_action('pre_get_posts', 'uni_guzang_adjust_queries');


