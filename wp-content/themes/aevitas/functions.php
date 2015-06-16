<?php

/*-----------------------------------------------------------------------------------*/
/* Load the theme-specific files, with support for overriding via a child theme.
/*-----------------------------------------------------------------------------------*/


require('classes/theme-cpt.php');

add_action( 'wp_enqueue_scripts', 'ppm_scripts_and_styles', 999 );

function ppm_scripts_and_styles() {
    global $wp_styles; // call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way
    if (!is_admin()) {
        
        wp_register_script( 'isotope', get_stylesheet_directory_uri() . '/library/vendors/isotope/dist/isotope.pkgd.min.js', array('jquery'), '1.0.8',true);
        
        wp_register_script( 'photoswipe', get_stylesheet_directory_uri() . '/library/vendors/photoswipe/dist/photoswipe.min.js', array('jquery'), '1.0.8',true);
        wp_register_script( 'photoswipe-ui', get_stylesheet_directory_uri() . '/library/vendors/photoswipe/dist/photoswipe-ui-default.min.js', array('jquery'), '1.0.8',true);

        wp_register_script( 'slick', get_stylesheet_directory_uri() . '/library/vendors/slick.js/slick/slick.min.js', array('jquery'), '1.0.8',true);
        wp_register_script( 'selectize', get_stylesheet_directory_uri() . '/library/vendors/selectize/dist/js/standalone/selectize.min.js', array('jquery'), '1.0.8',true);
        
        wp_register_script( 'third-party', get_stylesheet_directory_uri() . '/library/js/third-party.js', array('jquery'), '1.0.8',true);
        
        wp_register_script( 'ppm', get_stylesheet_directory_uri() . '/library/js/ppm.js', array('third-party','slick','selectize','jquery'), '1.0.49',true);

        wp_enqueue_script('isotope');

        wp_enqueue_script('photoswipe');
        wp_enqueue_script('photoswipe-ui');

        wp_localize_script( 'ppm', 'myAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));        

        wp_enqueue_script('ppm');



      
    }
}


add_filter('redux/options/tpb_options/sections', 'child_sections');
function child_sections($sections){
    //$sections = array();
    $sections[] = array(
        'icon'          => 'ok',
        'icon_class'    => 'fa fa-gears',
        'title'         => __('Theme Options', 'peadig-framework'),
        'desc'          => __('<p class="description">Theme modifications</p>', 'ppm'),
        'fields' => array(
                array(
                        'id'=>'site_logo',
                        'type' => 'media', 
                        'url'=> true,
                        'title' => __('Site Logo', 'ppm'),
                        'compiler' => 'true',
                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'desc'=> __('Select main logo from media gallery', 'ppm'),
                        'default'=>array('url'=>'http://s.wordpress.org/style/images/codeispoetry.png'),
                        ),
                array(
                        'id'=>'work_image',
                        'type' => 'media', 
                        'url'=> true,
                        'title' => __('Work Section Image', 'ppm'),
                        'compiler' => 'true',
                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'desc'=> __('Select work section image from media gallery', 'ppm'),
                        'default'=>array('url'=>'http://s.wordpress.org/style/images/codeispoetry.png'),
                        ),
 
        )
    );


     $sections[] = array(
        'icon'          => 'ok',
        'icon_class'    => 'fa fa-heart',
        'title'         => __('Social Profiles', 'ppm-framework'),
        'desc'          => __('<p class="description">Social Network URLS</p>', 'ppm'),
        'fields' => array(
            array(
                        'id'=>'weddingwire_url',
                        'type' => 'text',
                        'title' => __('Wedding Wire', 'redux-framework-demo'),
                        'desc' => __('Enter your wedding wire url', 'redux-framework-demo'),
                        ),  
            array(
                        'id'=>'twitter_url',
                        'type' => 'text',
                        'title' => __('Twitter', 'redux-framework-demo'),
                        'desc' => __('Enter your twitter url', 'redux-framework-demo'),
                        ),  
            array(
                        'id'=>'facebook_url',
                        'type' => 'text',
                        'title' => __('Facebook', 'redux-framework-demo'),
                        'desc' => __('Enter your Facebook URL', 'redux-framework-demo'),
                        ),  
            array(
                        'id'=>'pinterest_url',
                        'type' => 'text',
                        'title' => __('pinterest', 'redux-framework-demo'),
                        'desc' => __('Enter your pinterest URL', 'redux-framework-demo'),
                        ),  
            array(
                        'id'=>'instagram_url',
                        'type' => 'text',
                        'title' => __('Instagram', 'redux-framework-demo'),
                        'desc' => __('Enter your Instagram URL', 'redux-framework-demo'),
                        ),  
        )
    );

    

    return $sections;
}

function sergio($str) {
    echo '<pre>';
    print_r($str);
    echo '</pre>';
}

register_nav_menus(
    array(
        'secondary-nav' => __( 'Secondary Navigation', 'bonestheme' ),   // main nav in header
        'footer-nav' => __( 'Footer Nav', 'bonestheme' ),   // main nav in header
    )
);

function secondary_nav($nav = 'secondary-nav',$class='nav_secondary') {
    // display the wp3 menu if available
    wp_nav_menu(array(
        'container' => false,                                       // remove nav container
        'container_class' => 'menu clearfix',                       // class of container (should you choose to use it)
        'menu' => __( 'The Secondary Menu', 'bonestheme' ),              // nav name
        'menu_class' => $class,              // adding custom nav class
        'theme_location' => $nav,                             // where it's located in the theme
        'before' => '',                                             // before the menu
        'after' => '',                                            // after the menu
        'link_before' => '',                                      // before each link
        'link_after' => '',                                       // after each link
        'depth' => 2,                                             // limit the depth of the nav
        'fallback_cb' => 'wp_bootstrap_navwalker::fallback',  // fallback               // for bootstrap nav
    ));
} /* end bones main nav */

function camelCase($str, array $noStrip = [])
{
        // non-alpha and non-numeric characters become spaces
        $str = preg_replace('/[^a-z0-9' . implode("", $noStrip) . ']+/i', ' ', $str);
        $str = trim($str);
        // uppercase the first character of each word
        $str = ucwords($str);
        $str = str_replace(" ", "", $str);
        $str = lcfirst($str);
 
        return $str;
}

add_filter('post_thumbnail_html', 'tpb_thumbnail_attr',10,5);

function tpb_thumbnail_attr($html, $post_id, $post_thumbnail_id, $size, $attr ) {
    if ($size == 'grid') :
        $attr = array('class'=>'img-responsive js-cut');

        $image_lg = wp_get_attachment_image_src( $post_thumbnail_id, 'image-lg');
        $image_md = wp_get_attachment_image_src( $post_thumbnail_id, 'image-md');
        $image_sm = wp_get_attachment_image_src( $post_thumbnail_id, 'image-sm');


        $html =    '<picture class="js-cut">
                        <!--[if IE 9]><video style="display: none;"><![endif]-->
                        <source srcset="'.$image_lg[0].'" media="(min-width: 1200px)" class="img-responsive">
                        <source srcset="'.$image_lg[0].'" media="(min-width: 992px)" class="img-responsive">
                        <source srcset="'.$image_sm[0].'" media="(min-width: 768px)" class="img-responsive">
                        
                        
                         <!--[if IE 9]></video><![endif]-->
                        <img srcset="'.$image_sm[0].'" class="img-responsive">
                    </picture>';
    endif;

    if ($size == 'grid-6') :
        $attr = array('class'=>'img-responsive js-cut');


        $image_lg = wp_get_attachment_image_src( $post_thumbnail_id, 'grid-6');
        $image_md = wp_get_attachment_image_src( $post_thumbnail_id, 'grid-6');
        $image_sm = wp_get_attachment_image_src( $post_thumbnail_id, 'image-sm');


        $html =    '<picture class="js-cut">
                        <!--[if IE 9]><video style="display: none;"><![endif]-->
                        <source srcset="'.$image_lg[0].'" media="(min-width: 1200px)" class="img-responsive">
                        <source srcset="'.$image_lg[0].'" media="(min-width: 992px)" class="img-responsive">
                        <source srcset="'.$image_sm[0].'" media="(min-width: 768px)" class="img-responsive">
                        
                        
                         <!--[if IE 9]></video><![endif]-->
                        <img srcset="'.$image_sm[0].'" class="img-responsive">
                    </picture>';
    endif;

    if ($size == 'slider') :
        $attr = array('class'=>'img-responsive js-cut');

        $header_id = get_post_meta($post_id,'_ppm_header_image_id',true); 

        $image_lg = wp_get_attachment_image_src( $header_id, 'slider');
        $image_md = wp_get_attachment_image_src( $header_id, 'slider');
        $image_sm = wp_get_attachment_image_src( $header_id, 'slider');


        $html =    '<picture class="js-cut">
                        <!--[if IE 9]><video style="display: none;"><![endif]-->
                        <source srcset="'.$image_lg[0].'" media="(min-width: 1200px)" class="img-responsive">
                        <source srcset="'.$image_lg[0].'" media="(min-width: 992px)" class="img-responsive">
                        <source srcset="'.$image_sm[0].'" media="(min-width: 768px)" class="img-responsive">
                        
                        
                         <!--[if IE 9]></video><![endif]-->
                        <img srcset="'.$image_sm[0].'" class="img-responsive">
                    </picture>';
    endif;

    return $html;
}


function filter_ptags_on_images($content){
   return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

add_filter('the_content', 'filter_ptags_on_images');

function give_linked_images_class($html, $id, $caption, $title, $align, $url, $size, $alt = '' ){
    $gallery = wp_get_attachment_image_src($id,'full');
    $img = wp_get_attachment_image_src($id,$size);

    $attachment = get_post( $id );

    $image = '<a class="fancybox" title="'.$attachment->post_title.'" href="'.$gallery[0].'" rel="gallery"><figure class="entry_image"><img class="'.$align.'" src="'.$img[0].'" alt="'.$attachment->post_title.'" width="'.$img[1].'" height="'.$img[2].'" />';
    if (!empty($caption)) 
        $image .= '<figcaption class="entry_image--caption>'.wpautop($caption).'</figcaption>';
    $image .= '</figure></a>';
  
  return $image;
}
add_filter('image_send_to_editor','give_linked_images_class',10,8);

function update_swiftype_document( $document, $post ) {
    $stack = array();

    $taxonomies[0] = array('name'=>'Type','slug'=>'type' );
    $taxonomies[1] = array('name'=>'Location','slug'=>'location' );
    $taxonomies[2] = array('name'=>'Venue','slug'=>'venue' );
    $taxonomies[3] = array('name'=>'Setting','slug'=>'setting' );
    $taxonomies[4] = array('name'=>'Style','slug'=>'style' );
    $taxonomies[5] = array('name'=>'Culture/Religion','slug'=>'culture' );

    foreach ($taxonomies as $taxonomy) {
        $terms = wp_get_post_terms($post->ID, $taxonomy['slug'], array("fields" => "ids"));

        $document['fields'][] = array( 
            'name' => $taxonomy['slug'],
            'type' => 'enum',
            'value' => $terms
        );

        $stack = array_merge($stack, $terms);

    }

    $document['fields'][] = array( 
            'name' => 'terms',
            'type' => 'enum',
            'value' => $stack);

   return $document;
}

add_filter( 'swiftype_document_builder', 'update_swiftype_document', 10, 2 );

add_action("wp_ajax_get_faceted_search", "get_facets");
add_action("wp_ajax_nopriv_get_faceted_search", "get_facets");

function get_facets() {

    global $cpt;
    $facets = isset($_REQUEST["facets"]) ? $_REQUEST["facets"] : array();

    $results = $cpt->facet_search_posts($facets);

    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {


        foreach ($results["facets"] as $key => $terms) {
            foreach ($terms as $id => $count) {
                $item = get_term_by('id', $id, $key);
                $array[$key][] = array('value' => $id,'text'=>$item->name );
            }

        }

        $return = array(
                'message'   => 'Saved',
                'data' => $array,
                'result' => $results
        );

        wp_send_json($return);
    }
    else {
    header("Location: ".$_SERVER["HTTP_REFERER"]);
    }

    die();
}


add_filter('woothemes_testimonials_post_type_args','change_testimonials_to_reviews',10,1);

function change_testimonials_to_reviews($args) {

    $labels = array(
        'name' => _x( 'Reviews', 'post type general name', 'woothemes-reviews' ),
        'singular_name' => _x( 'Review', 'post type singular name', 'woothemes-reviews' ),
        'add_new' => _x( 'Add New', 'review', 'woothemes-reviews' ),
        'add_new_item' => sprintf( __( 'Add New %s', 'woothemes-reviews' ), __( 'Review', 'woothemes-reviews' ) ),
        'edit_item' => sprintf( __( 'Edit %s', 'woothemes-reviews' ), __( 'Review', 'woothemes-reviews' ) ),
        'new_item' => sprintf( __( 'New %s', 'woothemes-reviews' ), __( 'Review', 'woothemes-reviews' ) ),
        'all_items' => sprintf( __( 'All %s', 'woothemes-reviews' ), __( 'Reviews', 'woothemes-reviews' ) ),
        'view_item' => sprintf( __( 'View %s', 'woothemes-reviews' ), __( 'Review', 'woothemes-reviews' ) ),
        'search_items' => sprintf( __( 'Search %a', 'woothemes-reviews' ), __( 'Reviews', 'woothemes-reviews' ) ),
        'not_found' =>  sprintf( __( 'No %s Found', 'woothemes-reviews' ), __( 'Reviews', 'woothemes-reviews' ) ),
        'not_found_in_trash' => sprintf( __( 'No %s Found In Trash', 'woothemes-reviews' ), __( 'Reviews', 'woothemes-reviews' ) ),
        'parent_item_colon' => '',
        'menu_name' => __( 'Reviews', 'woothemes-reviews' )

    );

    $args['labels'] = $labels;
    $args['has_archive'] = false;
    $args['rewrite'] = array( 'slug' => 'review', 'with_front' => false );

    return $args;

}


function get_tax_opts($tax) {
    // Set your custom taxonomy
    $taxonomy = $tax;
     
    // the current selected taxonomy slug ( would come from a QUERY VAR)
    $current_selected = "";
     
    // Get all terms of the chosen taxonomy
    $terms = get_terms($taxonomy, array('orderby' => 'name'));
     
    // our content variable
    $list_of_terms .= '<select class="selectize" id="'.$taxonomy.'-select" name="$taxonomy">';
    
     
    $list_of_terms .= '</select>';

    echo $list_of_terms;


}


add_action("wp_ajax_get_selectize_options", "get_tax_opts_ajax");
add_action("wp_ajax_nopriv_get_selectize_options", "get_tax_opts_ajax");


function get_tax_opts_ajax($tax) {
    // Set your custom taxonomy
    $taxonomy = $_POST['tax'];
     
    // the current selected taxonomy slug ( would come from a QUERY VAR)
    $current_selected = "";
    $optgroups = array();
    $options = array();
     
    // Get all terms of the chosen taxonomy
    $terms = get_terms($taxonomy, array('orderby' => 'name'));
     
    foreach($terms as $term){
             
        $select = ($current_selected == $term->slug) ? "selected" : "";
        $options[] = array('value'=>'','text'=> $taxonomy);
        if ($term->parent == 0 ) {
                 
            // get children of current parent.
            $tchildren = get_term_children($term->term_id, $taxonomy);
             
            $children = array();
            foreach ($tchildren as $child) {
                $cterm = get_term_by( 'id', $child, $taxonomy );
                $children[$cterm->name] = $cterm;
            }
            ksort($children);

                 
            // OPTGROUP FOR PARENTS
            if (count($children) > 0 ) {
                $optgroups[] = array('value'=>$term->slug,'text'=> $term->name);
            } else $options[] = array('value'=>$term->term_id,'text'=> $term->name);
             
             
            // now the CHILDREN.
            foreach($children as $child) {
                $options[] = array('value'=>$child->term_id,'text'=> $child->name,'class'=>$term->slug);
                      
            } //end foreach
     
        }
            
    }
     
    $array = array('opts'=>$options,'optgroups'=>$optgroups);

    wp_send_json($array);;

    die();

}

function swiftype_search_params_filter( $params ) {
    // set the fields to search and their boosts
    $params['search_fields[posts]'] = array( 'title^3', 'tags^2', 'author^2', 'body', 'excerpt' );
    $params['filters[posts][object_type]'] = array( 'post', 'storytelling','portfolio','details','inspiration' );
    return $params;
}

add_filter( 'swiftype_search_params', 'swiftype_search_params_filter', 8, 1 );

function exclude_swiftype_documents( $document, $post ) {
    $excluded_post_types = array('page','testimonial');
    $post_type = get_post_type( $post );

    if ( in_array( $post_type, $excluded_post_types ) ) {
        return NULL;
    }

    return $document;
}

add_filter( 'swiftype_document_builder', 'exclude_swiftype_documents', 10, 2 );



?>