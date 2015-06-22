<?php /* Template Name: Search */ ?>
<?php get_header(); ?>

<?php
	global $cpt; 
	$search = $_POST['search'] ? $_POST['search'] : array();
	$results = $cpt->search_posts($search);
?>

<?php
// Exclude categories on the homepage.

$paged = 1;
if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); }
if ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); }
$paged = intval( $paged );

$query_args = array(
  'post_type' => array('post','storytelling','inspiration'), 
  'post__in'=>$results,
  'orderby' => 'post__in',
  'posts_per_page'=>12,
  'paged' => $paged
);

query_posts( $query_args );

?>

<section class="section_blog">  
	<div class="container">
		<div class="section_blog--heading">
			<h2 class="section_blog--title">Filter Results</h2>
		</div>
		<?php if ( have_posts() ) : ?>
			<div class="blog_row js-infinite-cont">
				<?php while ( have_posts() ) : the_post(); ?>
				  	<article id="post-<?php the_ID(); ?>" <?php post_class('blog_article css-hover-vertical clearfix js-infinite'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
				    	
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

<?php get_template_part('templates/section','work'); ?>

<?php get_footer(); ?>