<section class="section_page">  
	<div class="container">
		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>
				<div class="page_content">
					<h1 class="page_content--title"><?php the_title(); ?></h1>
					<?php get_template_part('templates/slider'); ?>
					<?php the_content(); ?>
				</div>
			<?php endwhile; ?>
		<?php endif; ?>
		<?php wp_reset_query(); ?>
	</div>			
</section> <?php // end #wrapper ?>