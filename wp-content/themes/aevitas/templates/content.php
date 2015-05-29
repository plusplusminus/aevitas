
<section class="section_page">  
	<div class="container">
		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>
				<div class="page_content">
					<h1 class="page_content--title"><?php the_title(); ?></h1>
					<figure class="page_image">
			    		<?php the_post_thumbnail('full',array('class'=>'img-responsive')); ?>
					</figure>
					<?php the_content(); ?>
				</div>
			<?php endwhile; ?>
		<?php endif; ?>
		<?php wp_reset_query(); ?>
	</div>			
</section> <?php // end #wrapper ?>