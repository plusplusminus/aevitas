
<?php

global $post; 

$query_args = array(
	'post_type' => 'page', 
	'posts_per_page' => -1,
	'post_parent' => $post->ID,
);

query_posts( $query_args );

?>

<section class="section_info css-parent-page">  
	<div class="container">
		<?php if ( have_posts() ) : ?>
			<div class="info_row">
				<?php while ( have_posts() ) : the_post(); ?>
				  	<article id="post-<?php the_ID(); ?>" <?php post_class('info_article css-hover-vertical clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
				    	
				    	<figure class="info_image">
				    		<?php the_post_thumbnail('full',array('class'=>'img-responsive')); ?>
				    		<figcaption class="info_content">
				    			<div class="content_inner">
				    				<h3 class="content_inner--title"><?php the_title(); ?></h3>
								</div>
							</figcaption>
							<a class="info_article--link" href="<?php the_permalink();?>">&nbsp;</a>
						</figure>
					</article>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>
		<?php wp_reset_query(); ?>
		<hr class="section_break"/>
	</div>	
</section> <?php // end #wrapper ?>