

<?php
// Exclude categories on the homepage.

$query_args = array(
	'post_type' => 'post', 
	'tag'=>'featured',
	'posts_per_page' => 10
);

query_posts( $query_args );

?>

<section class="section_gallery">  

		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>
				<div class="slide">
				  	<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix css-hover-vertical'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
				    	
				    	<figure class="gallery_image">
				    		<?php the_post_thumbnail('slider',array('class'=>'img-responsive')); ?>
				    		<figcaption class="gallery_content">
				    			<div class="content_inner">
				    				<h3 class="content_inner--title"><span><?php the_title(); ?></span></h3>
				    				<ul class="content_meta">
				    					<li class="meta_item">
				    						<time class="updated" datetime="<?php get_the_time('Y-m-j') ?>">
												<?php echo get_the_time(get_option('date_format')) ?>
											</time>
										</li>
										<?php $location = get_post_meta($post->ID,'_ppm_venue_title',true); ?>
										<?php if (!empty($location)) : ?>
											<li class="meta_item">
												<?php _e($location,'aevitas'); ?>
						    				</li>
						    			<?php endif; ?>
					    				<li class="meta_item">
					    					<?php 
												$category = get_the_category(); 
												if($category[0]){
												echo '<span>'.$category[0]->cat_name.'</span>';
												}
											?>
										</li>
									</ul>
								</div>
							</figcaption>
							<a class="gallery_article--link" href="<?php the_permalink();?>">&nbsp;</a>
						</figure>
					</article>
				</div>
			<?php endwhile; ?>
		<?php endif; ?>
		<?php wp_reset_query(); ?>
			
</section> <?php // end #wrapper ?>