
<?php

$page = get_page_by_title('Helpful Information');

$query_args = array(
	'post_type' => 'page', 
	'posts_per_page' => 6,
	'post_parent' => $page->ID,
	'orderby' => 'menu_order',
	'order' => 'ASC'
);

query_posts( $query_args );

?>

<section class="section_info">  
	<div class="container">
		<div class="section_info--heading">
			<h2 class="section_info--title"><?php echo $page->post_title;?></h2>
			<?php echo wpautop($page->post_content);?>
		</div>
		<?php if ( have_posts() ) : ?>
			<div class="info_row">
				<?php while ( have_posts() ) : the_post(); ?>
				  	<article id="post-<?php the_ID(); ?>" <?php post_class('info_article css-hover-vertical clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
				    	
				    	<figure class="info_image">
				    		<?php the_post_thumbnail('full',array('class'=>'img-responsive')); ?>
				    		<figcaption class="info_content">
				    			<div class="content_inner">
				    				<h3 class="content_inner--title"><?php the_title(); ?></h3>
								</div>
							</figcaption>
							<a class="info_article--link" href="<?php the_permalink();?>">&nbsp;</a>
						</figure>
					</article>
				<?php endwhile; ?>
			</div>
		<div class="section_inquire">
			<?php global $tpb_options; ?>
			<button class="section_inquire--btn" data-toggle="modal" data-target="#inquireModal">Inquire Now</a>
		</div>
		<?php endif; ?>
		<?php wp_reset_query(); ?>
		
	</div>	
</section> <?php // end #wrapper ?>

<div class="modal fade" id="inquireModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Inquire Now</h4>
      </div>
      <div class="modal-body">
        <?php gravity_form(1, false, false, false, '', true, 12); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>