<article id="post-<?php the_ID(); ?>" <?php post_class('article_post clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting"> 
	<div class="container">
		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>
				<div class="post_content">
					<div class="post_entry">
						<?php the_content(); ?>
					</div>
					<?php get_template_part('templates/story/story','related'); ?>
					<?php get_template_part('templates/post/post','social'); ?>
				</div>
			<?php endwhile; ?>
		<?php endif; ?>
		<?php wp_reset_query(); ?>
		<hr class="section_break"/>
	</div>			
</article><?php // end #wrapper ?>