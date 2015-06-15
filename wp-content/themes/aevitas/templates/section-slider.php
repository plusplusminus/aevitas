

<?php
// Exclude categories on the homepage.

$query_args = array(
	'post_type' => array('post','storytelling','inspiration'), 
	'tag'=>'featured',
	'posts_per_page' => 10
);

query_posts( $query_args );

?>


<?php if ( have_posts() ) : ?>
	<div class="owl-slider owl-carousel owl-theme">
		<?php while ( have_posts() ) : the_post(); ?>
				<?php
					$key = get_post_meta($post->ID,'_ppm_header_image_id',true);
					$image_attributes_large = wp_get_attachment_image_src( $key,'full' );
				?>
				<div class="item_gallery css-slider-hover">
					<img src="<?php echo $image_attributes_large[0];?>" class="img-responsive"/>
					<div class="item_caption">
						<h2 class="item_caption--title"><span><?php the_title();?></span></h2>
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
					<a class="item_caption--link" href="<?php the_permalink();?>">&nbsp;</a>
				</div>
	
		<?php endwhile; ?>
	</div>
<?php endif; ?>
<?php wp_reset_query(); ?>