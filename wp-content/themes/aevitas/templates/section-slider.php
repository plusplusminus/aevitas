

<?php
// Exclude categories on the homepage.

$connected = new WP_Query( array(
  'connected_type' => 'page_to_posts',
  'connected_items' => get_queried_object(),
  'nopaging' => true,
) );

?>


<?php if ( $connected->have_posts() ) : ?>
	<div class="home-slider owl-slider owl-carousel owl-theme">
		<?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
				<?php
					$key = get_post_meta($post->ID,'_ppm_header_image_id',true);
					$x = get_post_meta($post->ID,'_ppm_header_x_axis',true);
					$y = get_post_meta($post->ID,'_ppm_header_y_axis',true);
					$image_attributes_large = wp_get_attachment_image_src( $key,'full' );
				?>
				<div class="item_gallery css-slider-hover" data-x="<?php (!empty($x)) ? echo $x; : 'center';?>" data-y="<?php (!empty($y)) ? echo $y; : 'center';?>">
					<img src="<?php echo $image_attributes_large[0];?>" class="img-responsive"/>
					<div class="item_caption">
						<h2 class="item_caption--title"><span><?php the_title();?></span></h2>
					</div>
					<a class="item_caption--link" href="<?php the_permalink();?>">&nbsp;</a>
				</div>
	
		<?php endwhile; ?>
	</div>
<?php endif; ?>
<?php wp_reset_query(); ?>