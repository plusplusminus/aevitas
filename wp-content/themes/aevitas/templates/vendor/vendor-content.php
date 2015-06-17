<?php global $post; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('article_post clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting"> 
	<div class="container">
		<div class="post_content">
			<?php if ( have_posts() ) : ?>
				
					<?php while ( have_posts() ) : the_post(); ?>
						
							<div class="post_entry">
								<?php the_content(); ?>
							</div>

					<?php endwhile; ?>

			<?php endif; ?>

			<?php wp_reset_query(); ?>
			
			<?php $media = get_post_meta($post->ID,'_ppm_gallery',true); ?>
			<?php if (!empty($media)) : ?>
				<aside class="child_slider">
					<div class="slider">
					<?php foreach ($media as $key => $image) {

						$image_attributes_large = wp_get_attachment_image_src( $key,'large' );
						?>
						<div class="slide">
							<figure class="slide_image">
								<img data-lazy="<?php echo $image_attributes_large[0];?>" class="img-responsive"/>
							</figure>
							<?php if (!empty($attachment->post_excerpt)) : ?>
								<figcaption class="slide_image--caption">
										<h3 class="image_title"><? _e($attachment->post_excerpt); ?></h3>
								</figcaption>
							<?php endif; ?>
						</div>

					<?php } ?>
					</div>
				</aside>
			<?php endif; ?>
			<hr class="section_break"/>

			<?php get_template_part('templates/video'); ?>

			<?php get_template_part('templates/vendor/vendor','related'); ?>

			<?php get_template_part('templates/post/post','social'); ?>
		</div>
		
	</div>			
</article><?php // end #wrapper ?>