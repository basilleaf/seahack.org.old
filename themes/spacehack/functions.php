<?php

add_theme_support( 'post-thumbnails' );

include('custom_taxonomies.php');
include('custom_taxonomy_defaults.php');


function my_scripts_method() {

    wp_register_script( 'spacehack', get_template_directory_uri().'/js/main.js',array('jquery') );
}

add_action('wp_enqueue_scripts', 'my_scripts_method');


add_action('save_post','add_featured_tags_to_tags', $post_id);


function the_nav_style($cat_slug) {
    if (is_category()) {
        $categories = get_the_category();
        if ($cat_slug == $categories[0]->slug) {
          echo "selected";
        }
    }
}


function add_featured_tags_to_tags($post_id) {

    $new_tag_collection = array();

    $custom_fields = get_post_custom($post_id);
    $featured_tags = explode(',',$custom_fields['Featured Tags'][0]);
    if ($featured_tags) {
      foreach ($featured_tags as $tag) {
        $new_tag_collection[] = trim($tag);
      }
    }

    // pick up the rest of the tags
    $all_tags = wp_get_post_tags($post_id);
    foreach ($all_tags as $tag) {

        $new_tag_collection[] = $tag->name;
    }

    $new_tag_collection = array_unique($new_tag_collection);
    wp_set_post_tags($post_id, implode(',',$new_tag_collection));



}





/********* end hack ***************/



$bodyclasses = array();

function add_body_class($classname) {
    global $bodyclasses;
    $bodyclasses[] = $classname;
}
function get_body_classes() {
    global $bodyclasses;
    return implode(' ', $bodyclasses);
}
function the_body_classes() {
    echo get_body_classes();
}

/** Override of the_content() to not echo the content, but do apply filters. */
function get_parsed_content($more_link_text = null, $stripteaser = 0) {
	$content = get_the_content($more_link_text, $stripteaser);
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
	return $content;
}

function parse_content($text) {
	$content = apply_filters('the_content', $text);
	$content = str_replace(']]>', ']]&gt;', $content);
	return $content;
}



/** Prints the first available, valid string from the array, else nothing */
function contextual_echo(Array $strings, $prefix='', $suffix='', $processors=array()) {

    # Support passing a single function into the processors array:
    if(!is_array($processors)) {
        $processors = array($processors);
    }

    foreach($strings as $s) {
        if(null !== $s && '' !== $s) {

            # Filter the output with processors:
            foreach($processors as $p) {
                if(is_callable($p)) {
                    $s = call_user_func($p, $s);
                }
            }

            echo $prefix . $s . $suffix;
            break;
        }
    }
}

# Don't register widgets
if ( false && function_exists('register_sidebar') ) {
    register_sidebar
    (   array
        (
          'name' => 'Left',
          'before_widget' => '<div class="widgetleft">',
          'after_widget' => '</div>',
          'before_title' => '<h6 class="widgettitle">',
          'after_title' => '</h6>',
        )
    );
    register_sidebar
    (   array
        (
          'name' => 'Middle',
          'before_widget' => '<div class="widgetmiddle">',
          'after_widget' => '</div>',
          'before_title' => '<h6 class="widgettitle">',
          'after_title' => '</h6>',
        )
    );
 register_sidebar
    (   array
        (
          'name' => 'Right',
          'before_widget' => '<div class="widgetright">',
          'after_widget' => '</div>',
          'before_title' => '<h6 class="widgettitle">',
          'after_title' => '</h6>',
        )
    );
}
?>
