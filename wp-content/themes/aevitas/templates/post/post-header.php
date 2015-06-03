<?php global $post; ?>
<section class="section_post-header">  
	<div class="container">
		<header class="post_header">
			<h1 class="post_header--title"><?php the_title(); ?></h1>
			<?php get_template_part('templates/content','meta'); ?>
		</header>

		<?php $gallery = get_post_meta($post->ID,'_ppm_gallery',true); ?>
		<?php if(!empty($gallery)) :?>
				<aside class="post_slider">
					<div class="owl-slider owl-carousel owl-theme">
					<?php foreach ($gallery as $key => $image) {

						$image_attributes_large = wp_get_attachment_image_src( $key,'large' );
						$attachment = get_post($key); 
						?>
						<div class="item">
							<figure class="slide_image">
								<img alt="<? _e($attachment->post_title); ?>" src="<?php echo $image_attributes_large[0];?>" class="img-responsive"/>
								<?php if (!empty($attachment->post_excerpt)) : ?>
									<figcaption class="slide_image--caption">
											<h3 class="image_title"><? _e($attachment->post_excerpt); ?></h3>
									</figcaption>
								<?php endif; ?>
							</figure>
						</div>

					<?php } ?>
					</div>
					<div class="post_slider--nav">
					  <a class="js-prev"><span class="fa fa-angle-left fa-2x"></span></a>
					  
					  <a class="js-play"><span class="fa fa-play"></span></a>
					  <a class="js-stop"><span class="fa fa-stop"></span></a>
					  <a class="js-next"><span class="fa fa-angle-right  fa-2x"></span></a>
					</div>
					<div class="clearfix"></div>
				</aside>
		<?php else : ?>
			<figure class="post-header_image">
				<?php the_post_thumbnail('full',array('class'=>'img-responsive')); ?>
			</figure>
		<?php endif; ?>
	</div>	
</section> <?php // end #wrapper ?>