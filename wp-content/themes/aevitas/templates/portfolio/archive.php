<?php
// Exclude categories on the homepage.

$query_args = array(
	'post_type' => 'portfolio', 
	'posts_per_page' => -1
);

query_posts( $query_args );

?>

<section class="section_portfolio">  
	<div class="container">
		<?php if ( have_posts() ) : ?>
			<div class="portfolio_row">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php $array = array(); ?>
				  	<article id="post-<?php the_ID(); ?>" <?php post_class('portfolio_article css-hover-vertical clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
				    	
				    	<figure class="portfolio_image">
				    		<?php the_post_thumbnail('grid-6',array('class'=>'img-responsive')); ?>
				    		<figcaption class="portfolio_content">

			    				<h3 class="content_inner--title"><span><?php the_title(); ?></span></h3>
			    				<ul class="content_meta">
									<?php $location = get_post_meta($post->ID,'_ppm_venue_title',true); ?>
									<?php if (!empty($location)) : ?>
										<li class="meta_item">
											<?php _e($location,'aevitas'); ?>
					    				</li>
					    			<?php endif; ?>
								</ul>

							</figcaption>
							<a rel="gallery-'.$post->ID.'" class="details_article--link fancybox" data-id="<?php echo $post->ID; ?>" href="<?php the_permalink();?>">&nbsp;</a>

							<?php $media = get_post_meta($post->ID,'_ppm_gallery',true); ?>
							<?php if (!empty($media)) : ?>
								<div class="hide">
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

									echo '<a rel="gallery-'.$post->ID.'" href="'.$image_attributes_full[0].'" class="fancybox"></a>';

								} ?>
								</div>
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