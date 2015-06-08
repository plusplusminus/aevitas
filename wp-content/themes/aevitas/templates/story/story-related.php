<?php
global $post;

// Exclude categories on the homepage.
$vendor_related = get_post_meta($post->ID,'_ppm_vendor-related_heading',true);

$connected = new WP_Query( array(
  'connected_type' => 'vendors_to_posts',
  'connected_items' => get_queried_object(),
  'nopaging' => true,
) );

?>

<section class="section_vendor-related">  

		<div class="section_vendor-related--heading">
			<h2 class="section_vendor-related--title"><?php _e($vendor_related,'aevitas');?></h2>
		</div>
		<?php if ( $connected->have_posts() ) : ?>
			<div class="vendor-related_row">
				<?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
				  	<article id="post-<?php the_ID(); ?>" <?php post_class('vendor-related_article css-hover-vertical clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
				    	
				    	<figure class="vendor-related_image">
				    		<?php the_post_thumbnail('full',array('class'=>'img-responsive')); ?>
				    		<figcaption class="vendor-related_content">
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
							<a class="vendor-related_article--link" href="<?php the_permalink();?>">&nbsp;</a>
						</figure>
					</article>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>
		<?php wp_reset_query(); ?>
		<hr class="section_break"/>
</section> <?php // end #wrapper ?>