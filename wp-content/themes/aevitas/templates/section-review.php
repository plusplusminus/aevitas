<?php
	/* Testimonials */
?>
<?php global $tpb_options; ?>

<section id="testimonials" class="section_testimonial">
	<div class="container">
		<div class="section_review--heading">
			<h2 class="section_review--title">Reviews</h2>
		</div>
		<div class="js-slider-testimonials">
			<?php
				$args = array('post_type'=>'testimonial','posts_per_page'=>-1,'orderby'=>'menu_order');
				// The Query
				$query = new WP_Query( $args );

				// The Loop
				if ( $query->have_posts() ) { ?>
					<?php while ( $query->have_posts() ) { $query->the_post(); ?>
						<div class="slide">
							<div id="quote-<?php echo $post->ID;?>" class="testimonial_article css-hover-vertical" itemprop="review" itemscope itemtype="http://schema.org/Review">
						    	
						    	<figure class="testimonial_image">
						    		<?php the_post_thumbnail('review',array('class'=>'img-responsive')); ?>
						    		<figcaption class="testimonial_content">
						    			<div class="content_inner--testimonial">
						    				<blockquote class="testimonial_content--blockquote" itemprop="reviewBody">
												<?php the_content(); ?>
											</blockquote>
											<cite class="testimonial_content--author" itemprop="author" itemscope itemtype="http://schema.org/Person">
												<a target="_blank" href="<?php echo get_post_meta($post->ID,'_url',true); ?>"><span itemprop="name"><?php echo get_post_meta($post->ID,'_byline',true); ?></span></a>
											</cite>
											<div class="clearfix">
												<a target="_blank" href="<?php echo $tpb_options['weddingwire_url'];?>" class="testimonial_content--link"> More Reviews</a>
											</div>
										</div>
									</figcaption>
								</figure>
							</div>
						</div>
					<?php } ?>

				<?php } else {
					// no posts found
				}
				/* Restore original Post Data */
				wp_reset_postdata();
			?>
		</div>

		<hr class="section_break"/>
		
	</div>
</section>