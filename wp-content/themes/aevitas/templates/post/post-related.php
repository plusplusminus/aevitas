<section class="single_related">
	<?php 
	global $cpt;
	$myposts = $cpt->search_posts();
	?>

	<?php $count = 0; ?>

	<header class="related_header">
		<hr class="related_header--hr"/>
		<span class="related_header--title"><span>Similar Posts</span></span>
	</header>

	<div class="related_container">

			<?php

				// Exclude categories on the homepage.

				$query_args = array(
				  'post_type' => array('post','storytelling'), 
				  'posts_per_page'=>3,
				  'post__in'=>$myposts,
				  'orderby' => 'post__in'
				);

				query_posts( $query_args );

				// The Loop
				if ( have_posts() ) { $count=0; ?>
					
					<?php while ( have_posts() ) { the_post(); $count++; ?>
						<?php $css = 'css-'.$post->post_type; ?>
						<article id="post-<?php the_ID(); ?>" <?php post_class( 'article related_article clearfix '.$css ); ?> role="article">

							<figure class="blog_image">
					    		<?php the_post_thumbnail('grid',array('class'=>'img-responsive')); ?>
					    		<figcaption class="blog_content">
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
								<a class="blog_article--link" href="<?php the_permalink();?>">&nbsp;</a>
							</figure>

						</article> <?php // end article ?>

					
					<?php } ?>

				<?php 
			}
			wp_reset_postdata();
			?>
	</div>
</section>