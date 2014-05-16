<?php



	function add_custom_taxonomies() {    

    /*
    register_taxonomy('featured_tags', 'post', array( // Hierarchical taxonomy (like categories) 
      'hierarchical' => true, // This array of options controls the labels displayed in the WordPress Admin UI 
      'labels' => array( 
        'name' => _x( 'Featured Tags', 'tags that appear as clickable on the homepage' ), 
        'singular_name' => _x( 'Status', 'Featured Tags' ), 
        'edit_item' => __( 'Edit Featured Tags' ), 
        'update_item' => __( 'Update Featured Tags' ), 
        'add_new_item' => __( 'Add New Featured Tag' ), 
        'new_item_name' => __( 'Featured Tag Name' ), 
        'menu_name' => __( 'Featured Tags' ), 
      ), // Control the slugs used for this taxonomy 
    )); 



    $all_tags = get_tags();
    foreach ($all_tags as $tag) {
        if (!term_exists($tag->term_id, "featured_tags")) {
          $slug = $tag->name;
          wp_insert_term($slug,'featured_tags');
        }
    }
    **/
    
    /*
    register_taxonomy('display_clicky_tags', 'post', array( // Hierarchical taxonomy (like categories) 
      'hierarchical' => true, // This array of options controls the labels displayed in the WordPress Admin UI 
      'labels' => array( 
        'name' => _x( 'Display Clicky Tags', 'for Clicky Tags rollout' ), 
        'singular_name' => _x( 'Clicky Tags', 'taxonomy singular name' ), 
        'edit_item' => __( 'Clicky Tags' ), 
        'update_item' => __( 'Clicky Tags' ), 
        'add_new_item' => __( 'Clicky Tags' ), 
        'new_item_name' => __( 'Clicky Tags' ), 
        'menu_name' => __( 'Clicky Tags' ), 
      ), // Control the slugs used for this taxonomy 
      'rewrite' => array('slug' => 'projects'),
    )); 
    */


		// Add new "Locations" taxonomy to Posts 
		register_taxonomy('status', 'post', array( // Hierarchical taxonomy (like categories) 
			'hierarchical' => true, // This array of options controls the labels displayed in the WordPress Admin UI 
			'labels' => array( 
				'name' => _x( 'Status', 'taxonomy general name' ), 
				'singular_name' => _x( 'Status', 'taxonomy singular name' ), 
				'edit_item' => __( 'Edit Status' ), 
				'update_item' => __( 'Update Status' ), 
				'add_new_item' => __( 'Add New Status' ), 
				'new_item_name' => __( 'New Status Name' ), 
				'menu_name' => __( 'Status' ), 
        ), // Control the slugs used for this taxonomy 
			'rewrite' => array('slug' => 'projects'),
		)); 

	}


add_action( 'init', 'add_custom_taxonomies', 0);  

?>
