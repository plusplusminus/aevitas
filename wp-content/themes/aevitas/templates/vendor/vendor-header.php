<section class="section_story-header">  
	<div class="container">
		<figure class="story-header_image">
			<?php the_post_thumbnail('full',array('class'=>'img-responsive')); ?>
		</figure>
		<header class="post_header">
			<h1 class="post_header--title"><?php the_title(); ?></h1>
			<?php get_template_part('templates/content','meta'); ?>
		</header>
	</div>	
</section> <?php // end #wrapper ?>