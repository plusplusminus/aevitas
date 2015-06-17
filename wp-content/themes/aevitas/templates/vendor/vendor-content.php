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
			<?php global $post; ?>

			<?php $media = get_post_meta($post->ID,'_ppm_gallery',true); ?>
			<?php if (!empty($media)) : ?>
				<aside class="post_slider">
					<div class="owl-slider owl-carousel owl-theme">
					<?php foreach ($gallery as $key => $image) {

						$image_attributes_large = wp_get_attachment_image_src( $key,'large' );
						$image_attributes_full = wp_get_attachment_image_src( $key,'full' );
						$attachment = get_post($key); 
						?>
						<div class="item">
							<figure class="slide_image">
			
								<img alt="<? _e($attachment->post_title); ?>" src="<?php echo $image_attributes_large[0];?>" class="img-responsive"/>
								
								<?php if (!empty($attachment->post_excerpt)) : ?>
									<figcaption class="slide_image--caption">
											<h3 class="image_title"><? _e($attachment->post_excerpt); ?></h3>
									</figcaption>
									<div class="slider_image--info">
										<span class="fa fa-info-circle"></span>
									</div>
								<?php endif; ?>
								<a class="css-full-screen-link fancybox" data-title="<? _e($attachment->post_excerpt); ?>" href="<?php echo $image_attributes_full[0];?>" rel="gallery"><span class="fa fa-expand"></span></a>
							</figure>
						</div>

					<?php } ?>
					</div>
					<div class="clearfix"></div>
				</aside>
			<?php endif; ?>
			<hr class="section_break"/>

			<?php get_template_part('templates/video'); ?>

			<?php get_template_part('templates/vendor/vendor','related'); ?>

			<?php get_template_part('templates/post/post','social'); ?>
		</div>
		
	</div>			
</article><?php // end #wrapper ?>