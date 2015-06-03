<article id="post-<?php the_ID(); ?>" <?php post_class('article_post clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting"> 
	<div class="container">
		<?php if ( have_posts() ) : ?>
			<div class="post_content">
				<?php while ( have_posts() ) : the_post(); ?>
					
						<div class="post_entry">
							<?php the_content(); ?>
						</div>

				<?php endwhile; ?>
				<hr class="section_break"/>
				<?php get_template_part('templates/story/story','related'); ?>

				<?php get_template_part('templates/post/post','social'); ?>
			</div>
		<?php endif; ?>

		<?php wp_reset_query(); ?>
		
	</div>			
</article><?php // end #wrapper ?>