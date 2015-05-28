
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
		<?php endif; ?>
		<?php wp_reset_query(); ?>
		
	</div>	
</section> <?php // end #wrapper ?>