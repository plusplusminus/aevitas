<?php
class tpbCustomPostTypes {

	public function __construct() {

		add_action( 'init', array($this,'aevitas_taxonomies'));

		add_action( 'init', array($this,'aevitas_portfolio'));

		add_action( 'init', array($this,'aevitas_inspiration'));

		add_action( 'init', array($this,'aevitas_details'));

		add_action( 'init', array($this,'aevitas_storytelling'));

		add_action( 'init', array($this,'aevitas_vendors'));

		add_action( 'init', array($this,'aevitas_images'));

		add_action( 'cmb2_init', array($this,'campaign_register_metabox'));


		add_action( 'p2p_init', array($this,'story_connection_types') );

    }

    function story_connection_types() {
	    p2p_register_connection_type( array(
	        'name' => 'story_to_posts',
	        'from' => 'storytelling',
	        'to' => 'post'
	    ) );

	    p2p_register_connection_type( array(
	        'name' => 'vendors_to_posts',
	        'from' => 'vendors',
	        'to' => array('post','storytelling','portfolio','details','inspiration')
	    ) );

	    p2p_register_connection_type( array(
	        'name' => 'page_to_posts',
	        'from' => 'page',
	        'to' => array('post','storytelling','inspiration'),
	        'sortable' => 'any'
	    ) );
	}


    function aevitas_portfolio()
	{
		// Register custom post types
		register_post_type(	'portfolio', 
			array(	'label' 			=> __('Portfolio'),
					'labels' 			=> array(	'name' 					=> __('Portfolio'),
													'singular_name' 		=> __('Portfolio'),
													'add_new' 				=> __('Add New'),
													'add_new_item' 			=> __('Add New Portfolio'),
													'edit' 					=> __('Edit'),
													'edit_item' 			=> __('Edit Portfolio'),
													'new_item' 				=> __('New Portfolio'),
													'view_item'				=> __('View Portfolio'),
													'search_items' 			=> __('Search Portfolio'),
													'not_found' 			=> __('No Portfolios found'),
													'not_found_in_trash' 	=> __('No Portfolios found in trash')	),
					'public' 			=> true,
					'can_export'		=> true,
					'show_ui' 			=> true, // UI in admin panel
					'_builtin' 			=> false, // It's a custom post type, not built in
					'_edit_link' 		=> 'post.php?post=%d',
					'capability_type' 	=> 'post',
					'menu_icon' 		=> 'dashicons-awards',
					'hierarchical' 		=> false,
					'has_archive' 		=> false,
					'rewrite' 			=> array(	"slug" => "portfolio"	), // Permalinks
					'query_var' 		=> "portfolio", // This goes to the WP_Query schema
					'supports' 			=> array(	'title',																
													'editor',
													'thumbnail'
													),
					'show_in_nav_menus'	=> false ,
					'taxonomies'		=> array(	

													)
				)
			);			
	}

	function aevitas_inspiration()
	{
		// Register custom post types
		register_post_type(	'inspiration', 
			array(	'label' 			=> __('inspiration'),
					'labels' 			=> array(	'name' 					=> __('Tips & Inspiration'),
													'singular_name' 		=> __('Tips & Inspiration'),
													'add_new' 				=> __('Add New'),
													'add_new_item' 			=> __('Add New Tips & Inspiration'),
													'edit' 					=> __('Edit'),
													'edit_item' 			=> __('Edit Tips & Inspiration'),
													'new_item' 				=> __('New Tips & Inspiration'),
													'view_item'				=> __('View Tips & Inspiration'),
													'search_items' 			=> __('Search Tips & Inspiration'),
													'not_found' 			=> __('No Tips & Inspiration found'),
													'not_found_in_trash' 	=> __('No Tips & Inspiration found in trash')	),
					'public' 			=> true,
					'can_export'		=> true,
					'show_ui' 			=> true, // UI in admin panel
					'_builtin' 			=> false, // It's a custom post type, not built in
					'_edit_link' 		=> 'post.php?post=%d',
					'capability_type' 	=> 'post',
					'menu_icon' 		=> 'dashicons-awards',
					'hierarchical' 		=> false,
					'has_archive' 		=> true,
					'rewrite' 			=> array(	"slug" => "tips-and-inspiration"	), // Permalinks
					'query_var' 		=> "inspiration", // This goes to the WP_Query schema
					'supports' 			=> array(	'title',																
													'editor',
													'thumbnail'
													),
					'show_in_nav_menus'	=> false ,
					'taxonomies'		=> array(	'post_tag' )
				)
			);			
	}

	function aevitas_details()
	{
		// Register custom post types
		register_post_type(	'detail', 
			array(	'label' 			=> __('Detail'),
					'labels' 			=> array(	'name' 					=> __('Details'),
													'singular_name' 		=> __('Detail'),
													'add_new' 				=> __('Add New'),
													'add_new_item' 			=> __('Add New Detail'),
													'edit' 					=> __('Edit'),
													'edit_item' 			=> __('Edit Detail'),
													'new_item' 				=> __('New Detail'),
													'view_item'				=> __('View Detail'),
													'search_items' 			=> __('Search Detail'),
													'not_found' 			=> __('No Detail found'),
													'not_found_in_trash' 	=> __('No Detail found in trash')	),
					'public' 			=> true,
					'can_export'		=> true,
					'show_ui' 			=> true, // UI in admin panel
					'_builtin' 			=> false, // It's a custom post type, not built in
					'_edit_link' 		=> 'post.php?post=%d',
					'capability_type' 	=> 'post',
					'menu_icon' 		=> 'dashicons-awards',
					'hierarchical' 		=> false,
					'has_archive' 		=> false,
					'rewrite' 			=> array(	"slug" => "details"	), // Permalinks
					'query_var' 		=> "details", // This goes to the WP_Query schema
					'supports' 			=> array(	'title',																
													'editor',
													'thumbnail'
													),
					'show_in_nav_menus'	=> false ,
					'taxonomies'		=> array(	'post_tag' )
				)
			);			
	}

	function aevitas_storytelling()
	{
		// Register custom post types
		register_post_type(	'storytelling', 
			array(	'label' 			=> __('Storytelling'),
					'labels' 			=> array(	'name' 					=> __('Storytelling'),
													'singular_name' 		=> __('Storytelling'),
													'add_new' 				=> __('Add New'),
													'add_new_item' 			=> __('Add New Storytelling'),
													'edit' 					=> __('Edit'),
													'edit_item' 			=> __('Edit Storytelling'),
													'new_item' 				=> __('New Storytelling'),
													'view_item'				=> __('View Storytelling'),
													'search_items' 			=> __('Search Storytelling'),
													'not_found' 			=> __('No Storytelling found'),
													'not_found_in_trash' 	=> __('No Storytelling found in trash')	),
					'public' 			=> true,
					'can_export'		=> true,
					'show_ui' 			=> true, // UI in admin panel
					'_builtin' 			=> false, // It's a custom post type, not built in
					'_edit_link' 		=> 'post.php?post=%d',
					'capability_type' 	=> 'post',
					'menu_icon' 		=> 'dashicons-awards',
					'hierarchical' 		=> false,
					'has_archive' 		=> false,
					'rewrite' 			=> array(	"slug" => "storytelling"	), // Permalinks
					'query_var' 		=> "storytelling", // This goes to the WP_Query schema
					'supports' 			=> array(	'title',																
													'editor',
													'thumbnail'
													),
					'show_in_nav_menus'	=> false ,
					'taxonomies'		=> array(	'post_tag' )
				)
			);			
	}

	function aevitas_vendors()
	{
		// Register custom post types
		register_post_type(	'vendors', 
			array(	'label' 			=> __('Vendors'),
					'labels' 			=> array(	'name' 					=> __('Vendors'),
													'singular_name' 		=> __('Vendors'),
													'add_new' 				=> __('Add New'),
													'add_new_item' 			=> __('Add New Vendors'),
													'edit' 					=> __('Edit'),
													'edit_item' 			=> __('Edit Vendors'),
													'new_item' 				=> __('New Vendors'),
													'view_item'				=> __('View Vendors'),
													'search_items' 			=> __('Search Vendors'),
													'not_found' 			=> __('No Vendors found'),
													'not_found_in_trash' 	=> __('No Vendors found in trash')	),
					'public' 			=> true,
					'can_export'		=> true,
					'show_ui' 			=> true, // UI in admin panel
					'_builtin' 			=> false, // It's a custom post type, not built in
					'_edit_link' 		=> 'post.php?post=%d',
					'capability_type' 	=> 'post',
					'menu_icon' 		=> 'dashicons-awards',
					'hierarchical' 		=> false,
					'has_archive' 		=> false,
					'rewrite' 			=> array(	"slug" => "vendor"	), // Permalinks
					'query_var' 		=> "vendors", // This goes to the WP_Query schema
					'supports' 			=> array(	'title',																
													'editor',
													'thumbnail'
													),
					'show_in_nav_menus'	=> false ,
					'taxonomies'		=> array(	'post_tag' )
				)
			);			
	}

	public function campaign_register_metabox() {

	    // Start with an underscore to hide fields from custom fields list
	    $prefix = '_ppm_';

	    /**
	     * Sample metabox to demonstrate each field type included
	     */
	    $home_meta = new_cmb2_box( array(
	        'id'            => $prefix . 'campaign_metabox',
	        'title'         => __( 'Camapign Meta', 'cmb2' ),
	        'object_types'  => array( 'page', ), // Post type
	        'show_on'      => array( 'key' => 'page-template', 'value' => 'template-home.php' ),
	        'context'       => 'normal',
	        'priority'      => 'high',
	        'show_names'    => true, // Show field names on the left
	        // 'cmb_styles' => false, // false to disable the CMB stylesheet
	        // 'closed'     => true, // true to keep the metabox closed by default
	    ) );

	    $home_meta->add_field( array(
		    'name'    => 'About Section Title',
		    'desc'    => 'enter the title of the about section',
		    'id'      => $prefix . 'about_title',
		    'type'    => 'text'
		) );

		$home_meta->add_field( array(
		    'name'    => 'About Section Description',
		    'desc'    => 'enter the description of the about section',
		    'id'      => $prefix . 'about_description',
		    'type'    => 'textarea_small'
		) );

		$home_meta->add_field( array(
		    'name'    => 'About Section Read More Link',
		    'desc'    => 'enter the read more url',
		    'id'      => $prefix . 'about_link',
		    'type'    => 'text_url'
		) );

		$post_meta = new_cmb2_box( array(
	        'id'            => $prefix . 'post_metabox',
	        'title'         => __( 'Post Meta', 'cmb2' ),
	        'object_types'  => array( 'post','portfolio','detail','vendors'), // Post type
	        'context'       => 'normal',
	        'priority'      => 'high',
	        'show_names'    => true, // Show field names on the left
	        // 'cmb_styles' => false, // false to disable the CMB stylesheet
	        // 'closed'     => true, // true to keep the metabox closed by default
	    ) );

	    $post_meta->add_field( array(
		    'name'    => 'Venue',
		    'desc'    => 'Enter the venue title',
		    'id'      => $prefix . 'venue_title',
		    'type'    => 'text'
		) );

		$post_meta->add_field( array(
		    'name'    => 'Gallery',
		    'desc'    => 'Select your gallery images',
		    'id'      => $prefix . 'gallery',
		    'type'    => 'file_list'
		) );

		$album_meta = new_cmb2_box( array(
	        'id'            => $prefix . 'album_metabox',
	        'title'         => __( 'Album Meta', 'cmb2' ),
	        'object_types'  => array( 'page' ), // Post type
	        'context'       => 'normal',
	        'priority'      => 'high',
	        'show_names'    => true, // Show field names on the left
	        // 'cmb_styles' => false, // false to disable the CMB stylesheet
	        // 'closed'     => true, // true to keep the metabox closed by default
	    ) );

	    $album_meta->add_field( array(
		    'name'    => 'Album Includes Heading',
		    'desc'    => 'Enter the includes table heading',
		    'id'      => $prefix . 'album_includes_heading',
		    'type'    => 'text'
		) );

		$album_meta->add_field( array(
		    'name'    => 'Album Includes',
		    'desc'    => 'Enter what the album includes',
		    'id'      => $prefix . 'album_includes',
		    'type'    => 'text',
		    'repeatable' => true

		) );

		$album_meta->add_field( array(
		    'name'    => 'Gallery',
		    'desc'    => 'Select your gallery images',
		    'id'      => $prefix . 'gallery',
		    'type'    => 'file_list'
		) );

		$story_meta = new_cmb2_box( array(
	        'id'            => $prefix . 'story_metabox',
	        'title'         => __( 'Story Meta', 'cmb2' ),
	        'object_types'  => array( 'storytelling','portfolio' ), // Post type
	        'context'       => 'normal',
	        'priority'      => 'high',
	        'show_names'    => true, // Show field names on the left
	        // 'cmb_styles' => false, // false to disable the CMB stylesheet
	        // 'closed'     => true, // true to keep the metabox closed by default
	    ) );

	    $story_meta->add_field( array(
		    'name'    => 'Story Related Heading',
		    'desc'    => 'Enter the related story heading',
		    'id'      => $prefix . 'story-related_heading',
		    'type'    => 'text'
		) );

	    $vendor_meta = new_cmb2_box( array(
	        'id'            => $prefix . 'vendor_metabox',
	        'title'         => __( 'Vendor Meta', 'cmb2' ),
	        'object_types'  => array( 'vendors' ), // Post type
	        'context'       => 'normal',
	        'priority'      => 'high',
	        'show_names'    => true, // Show field names on the left
	        // 'cmb_styles' => false, // false to disable the CMB stylesheet
	        // 'closed'     => true, // true to keep the metabox closed by default
	    ) );

	    $vendor_meta->add_field( array(
		    'name'    => 'Vendor Related Heading',
		    'desc'    => 'Enter the related vendor heading',
		    'id'      => $prefix . 'vendor-related_heading',
		    'type'    => 'text'
		) );

		$vendor_meta->add_field( array(
		    'name'    => 'Extra Section Heading',
		    'desc'    => 'Enter the extra vendor heading',
		    'id'      => $prefix . 'video_heading',
		    'type'    => 'text'
		) );

		$vendor_meta->add_field( array(
		    'name'    => 'Extra Info',
		    'desc'    => 'field description (optional)',
		    'id'      => $prefix. 'extra_info',
		    'type'    => 'wysiwyg',
		    'options' => array(),
		) );


		$faq_meta = new_cmb2_box( array(
	        'id'            => $prefix . 'faq_metabox',
	        'title'         => __( 'FAQ Meta', 'cmb2' ),
	        'object_types'  => array( 'page'), // Post type
	        'context'       => 'normal',
	        'priority'      => 'high',
	        'show_names'    => true, // Show field names on the left
	        // 'cmb_styles' => false, // false to disable the CMB stylesheet
	        // 'closed'     => true, // true to keep the metabox closed by default
	    ) );

		$group_field_id = $faq_meta->add_field( array(
		    'id'          => $prefix . 'faq_group',
		    'type'        => 'group',
		    'description' => __( 'Generates reusable form entries', 'cmb' ),
		    'options'     => array(
		        'group_title'   => __( 'Entry {#}', 'cmb' ), // since version 1.1.4, {#} gets replaced by row number
		        'add_button'    => __( 'Add Another Entry', 'cmb' ),
		        'remove_button' => __( 'Remove Entry', 'cmb' ),
		        'sortable'      => true, // beta
		    ),
		) );

		// Id's for group's fields only need to be unique for the group. Prefix is not needed.
		$faq_meta->add_group_field( $group_field_id, array(
		    'name' => 'Entry Title',
		    'id'   => 'title',
		    'type' => 'text',
		    // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
		) );

		$faq_meta->add_group_field( $group_field_id, array(
		    'name' => 'Description',
		    'description' => 'Write a short description for this entry',
		    'id'   => 'description',
		    'type' => 'textarea_small',
		) );

		$faq_meta->add_group_field( $group_field_id, array(
		    'name' => 'FAQ Category',
		    'id'   => 'faq_category',
		    'type' => 'text',
		) );

		$image_meta = new_cmb2_box( array(
	        'id'            => $prefix . 'image_metabox',
	        'title'         => __( 'Image Meta', 'cmb2' ),
	        'context'       => 'normal',
	       	'object_types'  => array( 'post','storytelling','page','inspiration'), // Post type
	        'priority'      => 'high',
	        'show_names'    => true, // Show field names on the left
	        // 'cmb_styles' => false, // false to disable the CMB stylesheet
	        // 'closed'     => true, // true to keep the metabox closed by default
	    ) );


		$image_meta->add_field( array(
		    'name'    => 'Home Image',
		    'desc'    => 'Upload an image or enter an URL.',
		    'id'      => $prefix . 'header_image',
		    'type'    => 'file',
		    // Optionally hide the text input for the url:
		    'options' => array(
		        'url' => false,
		    ),
		) );

		$image_meta->add_field( array(
		    'name'             => 'Y Position',
		    'desc'             => 'Select an option',
		    'id'               => $prefix.'header_y_axis',
		    'type'             => 'select',
		    'show_option_none' => true,
		    'default'          => 'none',
		    'options'          => array(
		        'top' => __( 'Top', 'cmb' ),
		        'center'   => __( 'Center', 'cmb' ),
		        'bottom'     => __( 'Bottom', 'cmb' ),
		    ),
		) );

		$image_meta->add_field( array(
		    'name'             => 'X Position',
		    'desc'             => 'Select an option',
		    'id'               => $prefix.'header_x_axis',
		    'type'             => 'select',
		    'show_option_none' => true,
		    'default'          => 'none',
		    'options'          => array(
		        'left' => __( 'Left', 'cmb' ),
		        'right'   => __( 'Right', 'cmb' ),
		        'center'     => __( 'Center', 'cmb' ),
		    ),
		) );

		$image_meta->add_field( array(
		    'name'    => 'Slider Image',
		    'desc'    => 'Upload an image or enter an URL.',
		    'id'      => $prefix . 'slider_image',
		    'type'    => 'file',
		    // Optionally hide the text input for the url:
		    'options' => array(
		        'url' => false,
		    ),
		) );





		

	}

	public function aevitas_images() {
		add_image_size('slider',1600,650,true);
		add_image_size('image-lg',380,253);
		add_image_size('image-md',293,195);
		add_image_size('image-sm',720,480);
		add_image_size('review',1200,800);
		add_image_size('grid-6',585,390);



	}

	public function aevitas_taxonomies() {

		register_taxonomy(	"location", 
			array(	"post"	), 
			array (	"hierarchical" 		=> true, 
					"label" 			=> "Types", 
					'labels' 			=> array(	'name' 				=> __('Locations'),
													'singular_name' 	=> __('Location'),
													'search_items' 		=> __('Search Location'),
													'popular_items' 	=> __('Popular Locations'),
													'all_items' 		=> __('All Locations'),
													'parent_item' 		=> __('Parent Location'),
													'parent_item_colon' => __('Parent Location:'),
													'edit_item' 		=> __('Edit Location'),
													'update_item'		=> __('Update Location'),
													'add_new_item' 		=> __('Add New Location'),
													'new_item_name' 	=> __('New Location Name')	), 
					'public' 			=> true,
					'show_ui' 			=> true,
					"rewrite" 			=> array('slug' => 'location', 'hierarchical' => false)	
				)
		);

		register_taxonomy(	"type", 
			array(	"post"	), 
			array (	"hierarchical" 		=> true, 
					"label" 			=> "Types", 
					'labels' 			=> array(	'name' 				=> __('Types'),
													'singular_name' 	=> __('Type'),
													'search_items' 		=> __('Search Type'),
													'popular_items' 	=> __('Popular Types'),
													'all_items' 		=> __('All Types'),
													'parent_item' 		=> __('Parent Type'),
													'parent_item_colon' => __('Parent Type:'),
													'edit_item' 		=> __('Edit Type'),
													'update_item'		=> __('Update Type'),
													'add_new_item' 		=> __('Add New Type'),
													'new_item_name' 	=> __('New Type Name')	), 
					'public' 			=> true,
					'show_ui' 			=> true,
					"rewrite" 			=> array('slug' => 'type', 'hierarchical' => false)	
				)
		);

		register_taxonomy(	"venue", 
			array(	"post"	), 
			array (	"hierarchical" 		=> true, 
					"label" 			=> "Venues", 
					'labels' 			=> array(	'name' 				=> __('Venues'),
													'singular_name' 	=> __('Venue'),
													'search_items' 		=> __('Search Venue'),
													'popular_items' 	=> __('Popular Venues'),
													'all_items' 		=> __('All Venues'),
													'parent_item' 		=> __('Parent Venue'),
													'parent_item_colon' => __('Parent Venue:'),
													'edit_item' 		=> __('Edit Venue'),
													'update_item'		=> __('Update Venue'),
													'add_new_item' 		=> __('Add New Venue'),
													'new_item_name' 	=> __('New Venue Name')	), 
					'public' 			=> true,
					'show_ui' 			=> true,
					"rewrite" 			=> array('slug' => 'venue', 'hierarchical' => false)	
				)
		);

		register_taxonomy(	"style", 
			array(	"post"	), 
			array (	"hierarchical" 		=> true, 
					"label" 			=> "Styles", 
					'labels' 			=> array(	'name' 				=> __('Styles'),
													'singular_name' 	=> __('Style'),
													'search_items' 		=> __('Search Style'),
													'popular_items' 	=> __('Popular Styles'),
													'all_items' 		=> __('All Styles'),
													'parent_item' 		=> __('Parent Style'),
													'parent_item_colon' => __('Parent Style:'),
													'edit_item' 		=> __('Edit Style'),
													'update_item'		=> __('Update Style'),
													'add_new_item' 		=> __('Add New Style'),
													'new_item_name' 	=> __('New Style Name')	), 
					'public' 			=> true,
					'show_ui' 			=> true,
					"rewrite" 			=> array('slug' => 'style', 'hierarchical' => false)	
				)
		);

		register_taxonomy(	"setting", 
			array(	"post"	), 
			array (	"hierarchical" 		=> true, 
					"label" 			=> "Settings", 
					'labels' 			=> array(	'name' 				=> __('Settings'),
													'singular_name' 	=> __('Setting'),
													'search_items' 		=> __('Search Setting'),
													'popular_items' 	=> __('Popular Settings'),
													'all_items' 		=> __('All Settings'),
													'parent_item' 		=> __('Parent Setting'),
													'parent_item_colon' => __('Parent Setting:'),
													'edit_item' 		=> __('Edit Setting'),
													'update_item'		=> __('Update Setting'),
													'add_new_item' 		=> __('Add New Setting'),
													'new_item_name' 	=> __('New Setting Name')	), 
					'public' 			=> true,
					'show_ui' 			=> true,
					"rewrite" 			=> array('slug' => 'setting', 'hierarchical' => false)	
				)
		);

		register_taxonomy(	"culture", 
			array(	"post"	), 
			array (	"hierarchical" 		=> true, 
					"label" 			=> "Cultures", 
					'labels' 			=> array(	'name' 				=> __('Cultures/Religions'),
													'singular_name' 	=> __('Culture/Religion'),
													'search_items' 		=> __('Search Cultures/Religions'),
													'popular_items' 	=> __('Popular Cultures/Religions'),
													'all_items' 		=> __('All Cultures/Religions'),
													'parent_item' 		=> __('Parent Cultures/Religions'),
													'parent_item_colon' => __('Parent Cultures/Religions:'),
													'edit_item' 		=> __('Edit Cultures/Religions'),
													'update_item'		=> __('Update Cultures/Religions'),
													'add_new_item' 		=> __('Add New Cultures/Religions'),
													'new_item_name' 	=> __('New Cultures/Religions Name')	), 
					'public' 			=> true,
					'show_ui' 			=> true,
					"rewrite" 			=> array('slug' => 'culture-religion', 'hierarchical' => false)	
				)
		);

	}

	public function facet_search_posts($facets) {
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		if ( is_plugin_active( 'swiftype-search/swiftype.php' ) ) {
			try {
				return $this->swiftype_facet_search($facets);
			} catch ( Exception $e ) {}
		}
	}

	public function swiftype_facet_search($facets) {

		global $post;

		$api_key     = get_option( 'swiftype_api_key' );
		$engine_slug = get_option( 'swiftype_engine_slug' );
		$client      = new SwiftypeClient();
		$client->set_api_key( $api_key );

		$stack = array();

		foreach ($facets as $facet) {
			$params['filters[posts]['.$facet['tax'].']'][] = $facet['id'];
		}

		$params['facets[posts]'] = array('type','location','venue','setting','style','culture');

		$params['per_page'] = 12;
		$params['page'] = 1;
		

		$swiftype_result = $client->search($engine_slug, 'posts','', $params);

		return $swiftype_result['info']['posts'];

	}

	public function search_posts($facets=array()) {
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		if ( is_plugin_active( 'swiftype-search/swiftype.php' ) ) {
			try {
				return $this->swiftype_post_search($facets);
			} catch ( Exception $e ) {}
		}
		return $this->wordpress_search( $params );
	}

	public function related_posts($post_type = '') {
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		if ( is_plugin_active( 'swiftype-search/swiftype.php' ) ) {
			try {
				return $this->swiftype_related_search($post_type);
			} catch ( Exception $e ) {}
		}
		return $this->wordpress_search( $params );
	}

	public function swiftype_post_search($facets=array()) {

		global $post;

		$api_key     = get_option( 'swiftype_api_key' );
		$engine_slug = get_option( 'swiftype_engine_slug' );
		$client      = new SwiftypeClient();
		$client->set_api_key( $api_key );

		$stack = array();

		foreach ($facets as $key => $facet) {
			if(!empty($facet))
				$params['filters[posts]['.$key.']'][] = $facet;
		}

		//$params['facets[posts]'] = array('type','location','venue','setting','style','culture');

		$params['per_page'] = 100;
		$params['page'] = 1;

		$swiftype_result = $client->search($engine_slug, 'posts','', $params);

		foreach ( $swiftype_result['records']['posts'] as $rel ) {
			$id = $rel['external_id'];
			$search_posts[] = $id;
		}
		return $search_posts;
	
	}

	public function swiftype_related_search($post_type) {
		global $post;

		$api_key     = get_option( 'swiftype_api_key' );
		$engine_slug = get_option( 'swiftype_engine_slug' );
		$client      = new SwiftypeClient();
		$client->set_api_key( $api_key );


		if (empty($post_type)) {
			$stack = array();

		    $taxonomies[4] = array('name'=>'Location','slug'=>'location' );
		    $taxonomies[3] = array('name'=>'Venue','slug'=>'venue' );
		    $taxonomies[2] = array('name'=>'Setting','slug'=>'setting' );
		    $taxonomies[1] = array('name'=>'Style','slug'=>'style' );


		    foreach ($taxonomies as $taxonomy) {
		    	$terms = wp_get_post_terms($post->ID, $taxonomy['slug'], array("fields" => "ids"));
		    	$stack = array_merge($stack,array_values($terms));
		    }


		    $params['filters[posts][terms]'] = $stack;

			$params['per_page'] = 30;
			$params['page'] = 1;
			$params['fetch_fields[posts]'] = array("external_id");

			$params['functional_boosts[posts]'] = array('terms' => "logarithmic");
	    	$params['search_fields[posts]'] = array( 'terms^3' );

			$swiftype_result = $client->search($engine_slug, 'posts','', $params);
		} else {
			$params['filters[posts][object_type]'] = $post_type;

			$params['per_page'] = 30;
			$params['page'] = 1;
			$params['fetch_fields[posts]'] = array("external_id");

			$swiftype_result = $client->search($engine_slug, 'posts','', $params);
		}

		$related_posts = array();

		foreach ( $swiftype_result['records']['posts'] as $rel ) {
			
			$id = $rel['external_id'];
			if ( $post && $post->ID == $id ) continue;
			$related_posts[] = $id;
		}
		shuffle($related_posts);
		return $related_posts;
	
	}
	
}
global $cpt; 
$cpt = new tpbCustomPostTypes(); 
