
<section class="section_page">  
	<div class="container">
		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>
				<div class="page_content">
					<h1 class="page_content--title"><?php the_title(); ?></h1>
					<figure class="page_image">
						<?php $image_header = get_post_meta($post->ID,'_ppm_header_image_id',true); ?>
						<?php if (!empty($image_header)) : ?>
							<?php $image_attributes_large = wp_get_attachment_image_src( $image_header,'full' ); ?>
							<img src="<?php echo $image_attributes_large[0];?>" class="img-responsive"/>
						<?php else: ?>
			    			<?php the_post_thumbnail('slider',array('class'=>'img-responsive')); ?>
			    		<?php endif; ?>
					</figure>
					<?php the_content(); ?>
				</div>
			<?php endwhile; ?>
		<?php endif; ?>
		<?php wp_reset_query(); ?>
	</div>			
</section> <?php // end #wrapper ?>