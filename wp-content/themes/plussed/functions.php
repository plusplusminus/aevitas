<?php
/*
Author: Eddie Machado
URL: htp://themble.com/bones/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, ect.
*/

/************* INCLUDE NEEDED FILES ***************/

require_once( 'library/navwalker.php' ); // needed for bootstrap navigation


// REDUX.  Needed for custom admin panel
// https://github.com/ReduxFramework/ReduxFramework
// WIP

if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/library/admin/ReduxCore/framework.php' ) ) {
	require_once( dirname( __FILE__ ) . '/library/admin/ReduxCore/framework.php' );
}
if ( !isset( $redux_demo ) && file_exists( dirname( __FILE__ ) . '/library/option-config.php' ) ) {
	require_once( dirname( __FILE__ ) . '/library/option-config.php' );
}


// Custom metaboxes and fields
// https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
add_action( 'init', 'be_initialize_cmb_meta_boxes', 9999 );
function be_initialize_cmb_meta_boxes() {
  if ( !class_exists( 'cmb_Meta_Box' ) ) {
    require_once( 'library/metabox/init.php' );
  }
}

require_once( 'library/bones.php' ); // if you remove this, bones will break
require_once( 'library/admin.php' ); // this comes turned off by default

/************* COMMENT LAYOUT *********************/

// Comment Layout
function bones_comments( $comment, $args, $depth ) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="clearfix comment-container">
			<div class="comment-author vcard">
				<?php
					echo get_avatar($comment,$size='32',$default='<path_to_url>' );				?>
				<?php // custom gravatar call ?>
			</div>
      <div class="comment-content">
        <?php printf(__( '<cite class="fn">%s</cite>', 'bonestheme' ), get_comment_author_link()) ?> <small>said on</small>
        <time datetime="<?php echo comment_time('d-m-y'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__( 'm.d.y', 'bonestheme' )); ?> </a></time>
        <?php edit_comment_link(__( '(Edit)', 'bonestheme' ),'  ','') ?>
  			<?php if ($comment->comment_approved == '0') : ?>
  				<div class="alert alert-info">
  					<p><?php _e( 'Your comment is awaiting moderation.', 'bonestheme' ) ?></p>
  				</div>
  			<?php endif; ?>
  			<section class="comment_content clearfix">
  				<?php comment_text() ?>
  			</section>
  			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      </div> <!-- END comment-content -->
		</article>
	<?php // </li> is added by WordPress automatically ?>
<?php
} // don't remove this bracket!

/*************** PINGS LAYOUT **************/

function list_pings( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment; ?>
	<li id="comment-<?php comment_ID(); ?>">
		<span class="pingcontent">
			<?php printf(__('<cite class="fn">%s</cite> <span class="says"></span>'), get_comment_author_link()) ?>
			<?php comment_text(); ?>
		</span>
	</li>
<?php } // end list_pings
?>
