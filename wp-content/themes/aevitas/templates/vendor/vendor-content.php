<article id="post-<?php the_ID(); ?>" <?php post_class('article_post clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting"> 
	<div class="container">
		<div class="post_content">
			<?php if ( have_posts() ) : ?>
				
					<?php while ( have_posts() ) : the_post(); ?>
						
							<div class="post_entry">
								<?php the_content(); ?>
							</div>

					<?php endwhile; ?>

			<?php endif; ?>

			<?php wp_reset_query(); ?>
			<?php get_template_part('templates/slider'); ?>
			<hr class="section_break"/>

			<?php get_template_part('template/video'); ?>
			
			<?php get_template_part('templates/story/story','related'); ?>

			<?php get_template_part('templates/post/post','social'); ?>
		</div>
		
	</div>			
</article><?php // end #wrapper ?>