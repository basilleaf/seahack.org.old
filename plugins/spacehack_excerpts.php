<?php
/*
Plugin Name: Spacehack Excerpts
Plugin URI: http://spacehack.org
Description: hacks the_excerpt() to include preview image with overlay clicky tags
Version: 1.0
Author: Lisa Ballard
Author URI: http://about.me/lballard
License: GPL2
*/


function excerpt_with_clicky_tags() {


   // is this a previous project?
   $alert = "";
   $status = get_query_var('status');
   if ($status == 'previous') {
      $alert = '<div class = "previous_msg_index">';
      $values = get_post_custom_values("previous_message");
      if (isset($values[0])) {
          $alert .= $values[0].'</div>';
      } else {
          $alert .= 'THE DEADLINE FOR THIS PROJECT HAS PASSED </div>';
      }
   }

    $img_html = '';

    # Render the thumbnail:
    $values = get_post_custom_values("thumbnail");
    if (isset($values[0])) {

    $img_html .= '

        <a href="'.get_permalink().'" rel="bookmark" title="'.get_the_title().'">

            <img src="'.$values[0].'" alt="">
        </a>
        ';
    }

   if ( function_exists('has_post_thumbnail') && has_post_thumbnail($post->ID) ) {

      $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );

      $img_html .= '
          <p class="thumbnail">
          <a href="'.get_permalink().'" rel="bookmark" title="'.get_the_title().'">
              <img class = "alignnone" src = "'.$thumbnail[0].'" width="310" height="150" alt="">
          </a>
      </p>';

   }

  // get clicky tags overlay
  $the_id = get_the_ID();
  $display_clicky_tags = wp_get_post_terms( $the_id, 'display_clicky_tags');
  $spacehack_status = wp_get_post_terms( $the_id, 'status'); // don't show clicky tags for archived projects
  $tags = "";

  $category = get_the_category();

  // $featured_tags = wp_get_post_terms( $the_id, 'featured_tags');
  $custom_fields = get_post_custom($the_id);
  $featured_tags = array_reverse(explode(",",$custom_fields['Featured Tags'][0]));

  $tags = '<div class = "cats_tags">
          <h2 class = "cats sh_'.$category[0]->slug.'">
              <a href = "'.get_permalink().'">
              '.get_the_title().
              '</a>
          </h2>
            <ul class = "tags">';


    foreach ($featured_tags as $tag) {

          $tag = trim($tag);

          if ($tag) {
            $slug = str_replace(" ", "-", $tag);

            $tags .= '<li>
                        <a href = "'.get_bloginfo('url').'/tag/'.strtolower($slug).'">
                          <div>'.$tag.'</div></a>
                      </li>';
            }
          }

    $tags .= '</ul></div> <!-- cats_tags -->';


  // return get_the_excerpt().'<div class = "">hello world</div>';
  return '<div class = "excerpt">'.$tags.$img_html.$alert.'<p>'.get_the_excerpt().'</p></div>';

}


add_filter('the_excerpt', 'excerpt_with_clicky_tags');

?>
