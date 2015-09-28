<?php
/* 
* functions.php
* 
* This is the file that contains all the functions for the OCWS Newsbox Shortcode plugin
*/

// Our custom post type function
function fpnews_posttype_init() {
	
	// CPT Options
	$args = array(
				'labels' => array(
					'name' => __( FPNAME_PL , FPSLUG),
					'singular_name' => __( FPNAME_SG , FPSLUG),
					'add_new' => __( 'Add New', FPSLUG ),
					'add_new_item' => __( 'Add New '.FPNAME_SG, FPSLUG ),
					'edit_item' => __( 'Edit '.FPNAME_SG, FPSLUG ),
					'new_item' => __( 'New '.FPNAME_SG, FPSLUG ),
					'view_item' => __( 'View '.FPNAME_SG, FPSLUG ),
					'search_items' => __( 'Search '.FPNAME_PL, FPSLUG ),
					'not_found' => __( 'No '.FPNAME_PL.' found', FPSLUG ),
					'not_found_in_trash' => __( 'No '.FPNAME_PL.' found in Trash', FPSLUG ),
					'parent_item_colon' => __( 'Parent '.FPNAME_SG.':', FPSLUG ),
					'menu_name' => __( FPNAME_PL, FPSLUG ),
				),
				'public' => true,
				'show_ui' => true,
				'capability_type' => 'post',
				'hierarchical' => false,
				'query_var' => true,
				'menu_icon' => OCWSFP_BASE_URL.'/images/'.FP_LOGO16,
				'has_archive' => true,
				'rewrite' => array('slug' => FPSLUG),
				'supports' => array(
					'title',
					'editor',
					'excerpt',
					'trackbacks',
					'custom-fields',
					'revisions',
					'thumbnail',
					'page-attributes',
					),
				/*'taxonomies' => array( 'cachetype' )*/
				);
    register_post_type( FPSLUG,$args);
	add_filter('manage_edit-'.FPSLUG.'_columns', 'add_new_newsbox_columns');
	
} // end function create_posttype

// create a taxonomy based on newsbox-type

function newsbox_type_taxonomy() {
    register_taxonomy(
        'newstype',
        FPSLUG,
        array(
            'hierarchical' => true,
            'label' => 'Newsbox Type',
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'newstype',
                'with_front' => false
				)
			)
    );
}


// Function used to automatically create Newsbox page.
function create_newsbox_pages()  {
   	
   //post status and options
    $post = array(
          'comment_status' => 'open',
          'ping_status' =>  'closed' ,
          'post_date' => date('Y-m-d H:i:s'),
          'post_name' => FPSLUG,
          'post_status' => 'publish' ,
          'post_title' => FPNAME_PL,
          'post_type' => 'page',
    );
    //insert page and save the id
    $newvalue = wp_insert_post( $post, false );
    //save the id in the database
    update_option( 'fppage', $newvalue );
	

} // end function create_newsbox_pages

function add_new_newsbox_columns($columns) {
    $new_columns['cb'] = '<input type="checkbox" />';
     
    
	$new_columns['id'] = __('ID');
    $new_columns['title'] = __('Title');
    $new_columns['shortcode'] = __('Shortcode');
    $new_columns['newsboxtype'] = __('Newsbox Type');
    $new_columns['date'] = _x('Date', 'column name');
 
    return $new_columns;
}

?>