
<?php

global $post; 

$query_args = array(
	'post_type' => 'page', 
	'posts_per_page' => -1,
	'post_parent' => $post->ID,
);

query_posts( $query_args );

?>

<section class="section_child css-parent-page">  
	<div class="container">
		<?php if ( have_posts() ) : ?>
			<div class="child_row">
				<?php while ( have_posts() ) : the_post(); ?>
				  	<article id="post-<?php the_ID(); ?>" <?php post_class('child_article css-hover-vertical clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
				    	<header class="child_title">
				    		<?php the_title(); ?>
				    	</header>

				    	<?php get_template_part('templates/slider'); ?>

						<div class="child_content">
							<?php the_content(); ?>
							<?php $album_includes = get_post_meta($post->ID,'_ppm_album_includes',true); ?>
							<?php if (!empty($album_includes)) : ?>
								<?php $album_includes_heading = get_post_meta($post->ID,'_ppm_album_includes_heading',true); ?>
								<div class="child_includes">
									<h3 class="includes_title"><?php _e($album_includes_heading,'aevitas'); ?></h3>
									<ul class="includes_list">
										<?php foreach ($album_includes as $item) : ?>
											<li><?php _e($item,'aevitas'); ?></li>
										<?php endforeach; ?>
									</ul>
								</div>
							<?php endif; ?>
						</div>

						
					</article>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>
		<?php wp_reset_query(); ?>
		
	</div>	
</section> <?php // end #wrapper ?>