<?php
add_action('wp_enqueue_scripts', 'argil_child_styles_enqueue');
function argil_child_styles_enqueue()
{
    // enqueue styles bundle from child
    wp_enqueue_style(
        'argil-child-style',
        get_stylesheet_uri() . '/style.css',
        array('argil'),
        wp_get_theme()->get('Version'), // This only works if you have Version defined in the style header.
        'all'
    );

    wp_enqueue_style(
        'argil-child-bundle',
        get_stylesheet_uri() . '/bundle.css',
        array('argil'),
        wp_get_theme()->get('Version') // This only works if you have Version defined in the style header.
    );

    // wp_enqueue_style('argil-child-styles');
}

function argil_post_meta()
{
    echo 'New post meta from child';
}


// Wordpress Actions Hook Experiments
function after_pagination($x)
{
    echo $x;
    echo 'first action hook ';
}

function after_pagination2()
{
    echo 'from child here';
}
add_action('_argil_after_pagination', 'after_pagination');
add_action('_argil_after_pagination', 'after_pagination2');

add_action('pre_get_posts', 'function_to_add', 10, 1);
function function_to_add($query)
{
    if ($query->is_main_query()) {
        $query->set('posts_per_page', 4);
    }
}
// Wordpress Filters Hook Experiments
function no_posts_texts($text)
{
    return esc_html__('No Posts', 'argil_child');
}
add_filter('_argil_no_posts_text', 'no_posts_text');

// function filter_title($title)
// {
//     return 'Filtered ' . $title;
// }
// add_filter('the_title', 'filter_title');
