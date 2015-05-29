<?php
// Exclude categories on the homepage.

$query_args = array(
	'post_type' => 'detail', 
	'posts_per_page' => -1
);

query_posts( $query_args );

?>

<section class="section_details">  
	<div class="container">
		<?php if ( have_posts() ) : ?>
			<div class="details_row">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php $array = array(); ?>
				  	<article id="post-<?php the_ID(); ?>" <?php post_class('details_article css-hover-vertical clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
				    	
				    	<figure class="details_image">
				    		<?php the_post_thumbnail('grid-6',array('class'=>'img-responsive')); ?>
				    		<figcaption class="details_content">
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
									</ul>
								</div>
							</figcaption>
							<a class="details_article--link js-gallery-init" data-id="<?php echo $post->ID; ?>" href="<?php the_permalink();?>">&nbsp;</a>

							<?php $media = get_post_meta($post->ID,'_ppm_gallery',true); ?>

							<?php if (!empty($media)) : ?>
								<?php foreach ($media as $key => $image) {

									$image_attributes_large = wp_get_attachment_image_src( $key,'large' );
									$image_attributes_full = wp_get_attachment_image_src( $key,'full' );

									$array[] = array(
										'mediumImage' => array( 
											'src' => $image_attributes_large[0],
											'w' => $image_attributes_large[1],
											'h' => $image_attributes_large[2]
										),
										'originalImage' => array( 
											'src' => $image_attributes_full[0],
											'w' => $image_attributes_full[1],
											'h' => $image_attributes_full[2] 
										)
									);

								} ?>
								<meta name="gallery-<?php echo $post->ID; ?>" content='<?php echo json_encode($array); ?>'>
							<?php endif; ?>
							
						</figure>
					</article>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>
		<?php wp_reset_query(); ?>
		<hr class="section_break"/>
	</div>	
</section> <?php // end #wrapper ?>