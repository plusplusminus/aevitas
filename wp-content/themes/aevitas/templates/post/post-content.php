<article id="post-<?php the_ID(); ?>" <?php post_class('article_post clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting"> 
	<div class="container">
		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>
				<div class="post_content">
					<header class="post_header">
						<h1 class="post_header--title"><?php the_title(); ?></h1>
						<?php get_template_part('templates/content','meta'); ?>
					</header>
					<div class="post_entry">
						<?php the_content(); ?>
					</div>
					<hr class="section_break"/>
					<?php get_template_part('templates/post/post','providers'); ?>
					<?php get_template_part('templates/post/post','social'); ?>
				</div>
			<?php endwhile; ?>
		<?php endif; ?>
		<?php wp_reset_query(); ?>
		<hr class="section_break"/>
	</div>			
</article><?php // end #wrapper ?>