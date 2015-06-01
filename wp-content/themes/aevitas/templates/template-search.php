<?php /* Template Name: Search */ ?>
<?php get_header(); ?>

<?php
	global $cpt; 

	$data = isset($_REQUEST['formdata']) ? $_REQUEST['formdata'] : array();

	$tempData = str_replace("\\", "",$data);
	$tempData = !empty($tempData) ? $tempData : '';
	$facets = json_decode($tempData,true);

	$results = $cpt->search_posts($facets);
?>

<?php
// Exclude categories on the homepage.

$query_args = array(
  'post_type' => array('post','storytelling'), 
  'post__in'=>$results,
  'orderby' => 'post__in',
  'posts_per_page'=>-1
);

query_posts( $query_args );

?>

<section class="section_blog">  
	<div class="container">
		<div class="section_blog--heading">
			<h2 class="section_blog--title">Filter Results</h2>
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
	</div>	
</section> <?php // end #wrapper ?>

<?php get_footer(); ?>