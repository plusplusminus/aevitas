<?php global $post; ?>
<section class="section_post-header">  
	<div class="container">
		<header class="post_header">
			<h1 class="post_header--title"><?php the_title(); ?></h1>
			<?php get_template_part('templates/content','meta'); ?>
		</header>

		<?php $gallery = get_post_meta($post->ID,'_ppm_gallery',true); ?>
		<?php if(!empty($gallery)) : ?>
			<aside class="post_slider">
				<div class="owl-slider">
				<?php foreach ($gallery as $key => $image) {

					$image_attributes_large = wp_get_attachment_image_src( $key,'large' );
					?>
					<div class="item">
						<figure class="slide_image">
							<img src="<?php echo $image_attributes_large[0];?>" class="img-responsive"/>
							<figcaption>
								<h3 class="image_title">Title</h3>
								<small>Content Hello</small>
							</figcaption>
						</figure>
					</div>

				<?php } ?>
				</div>
			</aside>
		<?php else : ?>
			<figure class="post-header_image">
				<?php the_post_thumbnail('full',array('class'=>'img-responsive')); ?>
			</figure>
		<?php endif; ?>
	</div>	
</section> <?php // end #wrapper ?>