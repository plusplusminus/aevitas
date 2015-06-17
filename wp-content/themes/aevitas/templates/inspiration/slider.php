

<?php
// Exclude categories on the homepage.

$query_args = array(
	'post_type' => 'inspiration', 
	'tag'=>'featured-tai',
	'posts_per_page' => 10
);

query_posts( $query_args );

?>

<section class="section_gallery">  
	<div class="container">
		<?php if ( have_posts() ) : ?>
			<div class="slider">
				<?php while ( have_posts() ) : the_post(); ?>
					<div class="slide">
					  	<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix css-hover-vertical'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
					    	
					    	<figure class="gallery_image">
					    		<?php
									$key = get_post_meta($post->ID,'_ppm_slider_image_id',true);
									$image_attributes_large = wp_get_attachment_image_src( $key,'full' );
								?>
								<img src="<?php echo $image_attributes_large[0];?>" class="img-responsive"/>
					    		<figcaption class="gallery_content">
					    			<div class="content_inner">
					    				<h3 class="content_inner--title"><span><?php the_title(); ?></span></h3>
					    				<ul class="content_meta">
					    					<li class="meta_item">
					    						<time class="updated" datetime="<?php get_the_time('Y-m-j') ?>">
													<?php echo get_the_time(get_option('date_format')) ?>
												</time>
											</li>
										</ul>
									</div>
								</figcaption>
								<a class="gallery_article--link" href="<?php the_permalink();?>">&nbsp;</a>
							</figure>
						</article>
					</div>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>
		<?php wp_reset_query(); ?>
	</div>		
</section> <?php // end #wrapper ?>