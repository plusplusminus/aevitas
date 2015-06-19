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
							<?php
								$thumb_id = get_post_thumbnail_id();
								$thumb_url = wp_get_attachment_image_src($thumb_id,'full', true);
							?>

							<a rel="gallery-<?php echo $post->ID;?>" class="details_article--link fancybox" data-id="<?php echo $post->ID; ?>" href="<?php echo $thumb_url[0];?>">&nbsp;</a>

							<?php $media = get_post_meta($post->ID,'_ppm_gallery',true); ?>
							<?php if (!empty($media)) : ?>
								<div class="hide">
								<?php foreach ($media as $key => $image) {

									$image_attributes_full = wp_get_attachment_image_src( $key,'full' );

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