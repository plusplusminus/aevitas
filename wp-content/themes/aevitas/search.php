<?php get_header(); ?>

	<section class="section_page">  
		<div class="container">

			<div class="page_content">

				<h1 class="page_content--title">
					<span><?php _e("Search Results for","aevitas"); ?>:</span> <?php echo esc_attr(get_search_query()); ?></h1>
				</h1>
			</div>

		</div>			
	</section> <?php // end #wrapper ?>

	<?php get_template_part('templates/blog/search'); ?>

	<?php get_template_part('templates/archive'); ?>

	<?php get_template_part('templates/section','info'); ?>


<?php get_footer(); ?>
