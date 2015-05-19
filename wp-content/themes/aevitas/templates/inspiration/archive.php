<?php


$query_args = array(
	'post_type' => 'inspiration', 
	'numberposts' => 3
);

query_posts( $query_args );

?>

<section class="section_blog">  
	<div class="container">
		<div class="section_blog--heading">
			<h2 class="section_blog--title">View Latest Tips & Inspiration</h2>
		</div>
		<?php if ( have_posts() ) : ?>
			<div class="blog_row">
				<?php while ( have_posts() ) : the_post(); ?>
				  	<article id="post-<?php the_ID(); ?>" <?php post_class('blog_article css-hover-vertical clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
				    	
				    	<figure class="blog_image">
				    		<?php the_post_thumbnail('full',array('class'=>'img-responsive')); ?>
				    		<figcaption class="blog_content">

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

							</figcaption>
							<a class="blog_article--link" href="<?php the_permalink();?>">&nbsp;</a>
						</figure>
					</article>
				<?php endwhile; ?>
			</div>
			<nav class="blog_nav">
				<button class="blog_nav--btn">View All</button>
			</nav>
		<?php endif; ?>
		<?php wp_reset_query(); ?>
		<hr class="section_break"/>
	</div>	
</section> <?php // end #wrapper ?>