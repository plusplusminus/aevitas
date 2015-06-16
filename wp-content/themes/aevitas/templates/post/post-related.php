<?php 
	global $cpt;
	$myposts = $cpt->related_posts();

?>

<?php $count = 0; ?>

<?php
// Exclude categories on the homepage.

$query_args = array(
	'post_type' => array('post','storytelling'), 
	'posts_per_page'=>3,
	'post__in'=>$myposts,
	'orderby' => 'post__in'
);

query_posts( $query_args );

?>

<section class="section_blog">  
	<div class="container">
		<div class="section_blog--heading">
			<h2 class="section_blog--title">You Might Also Enjoy These</h2>
		</div>
		<?php if ( have_posts() ) : ?>
			<div class="blog_row">
				<?php while ( have_posts() ) : the_post(); ?>
				  	<article id="post-<?php the_ID(); ?>" <?php post_class('blog_article css-hover-vertical clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
				    	
				    	<figure class="blog_image">
				    		<?php the_post_thumbnail('grid',array('class'=>'img-responsive')); ?>
				    		<figcaption class="blog_content">

			    				<h3 class="content_inner--title"><span><?php the_title(); ?></span></h3>

							</figcaption>
							<a class="blog_article--link" href="<?php the_permalink();?>">&nbsp;</a>
						</figure>
					</article>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>
		<?php wp_reset_query(); ?>
		<hr class="section_break"/>
		<div class="clearfix"></div>
	</div>
</section> <?php // end #wrapper ?>