<?php

$paged = 1;
if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); }
if ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); }
$paged = intval( $paged );

$query_args = array(
	'post_type' => 'storytelling',
	'paged' => $paged,
);

query_posts( $query_args );

?>

<section class="section_storytelling">  
	<div class="container">
		<?php if ( have_posts() ) : ?>
			<div class="story_row js-infinite-cont">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php $array = array(); ?>
				  	<article id="post-<?php the_ID(); ?>" <?php post_class('story_article css-hover-vertical clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
				    	
				    	<figure class="story_image">
				    		<?php the_post_thumbnail('grid-6',array('class'=>'img-responsive')); ?>
				    		<figcaption class="story_content">
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
							<a class="story_article--link" data-id="<?php echo $post->ID; ?>" href="<?php the_permalink();?>">&nbsp;</a>
							
						</figure>
					</article>
				<?php endwhile; ?>
			</div>
			<nav class="wp-prev-next hide">
				<ul class="clearfix">
					<li class="prev-link"><?php next_posts_link( __( '&laquo; Older Entries', 'bonestheme' )) ?></li>
					<li class="next-link"><?php previous_posts_link( __( '&laquo; New Entries', 'bonestheme' )) ?></li>
				</ul>
			</nav>
		<?php endif; ?>
		<?php wp_reset_query(); ?>
		<hr class="section_break"/>
	</div>	
</section> <?php // end #wrapper ?>