<?php get_header(); ?>

	<section class="section_page">  
		<div class="container">
			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>
					<div class="page_content">


							<?php if (is_category()) { ?>
								<h1 class="page_content--title">
									<span><?php _e( 'Posts Categorized:', 'aevitas' ); ?></span> <?php single_cat_title(); ?>
								</h1>

							<?php } elseif (is_tag()) { ?>
								<h1 class="page_content--title">
									<span><?php _e( 'Posts Tagged:', 'aevitas' ); ?></span> <?php single_tag_title(); ?>
								</h1>

							<?php } elseif (is_author()) {
								global $post;
								$author_id = $post->post_author;
							?>
								<h1 class="page_content--title">

									<span><?php _e( 'Posts By:', 'aevitas' ); ?></span> <?php the_author_meta('display_name', $author_id); ?>

								</h1>
							<?php } elseif (is_day()) { ?>
								<h1 class="page_content--title">
									<span><?php _e( 'Daily Archives:', 'aevitas' ); ?></span> <?php the_time('l, F j, Y'); ?>
								</h1>

							<?php } elseif (is_month()) { ?>
									<h1 class="page_content--title">
										<span><?php _e( 'Monthly Archives:', 'aevitas' ); ?></span> <?php the_time('F Y'); ?>
									</h1>

							<?php } elseif (is_year()) { ?>
									<h1 class="page_content--title">
										<span><?php _e( 'Yearly Archives:', 'aevitas' ); ?></span> <?php the_time('Y'); ?>
									</h1>

							<?php } elseif (is_post_type_archive()) { ?>
									<h1 class="page_content--title">
										<?php post_type_archive_title(); ?>
									</h1>
							<?php } elseif( is_tax() ) {
							    global $wp_query;
							    $term = $wp_query->get_queried_object();
							    $title = $term->name;
							    ?>
								    <h1 class="page_content--title">
										<span><?php _e( $title, 'aevitas' ); ?></span>
									</h1>

							<?php } ?>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
			<?php wp_reset_query(); ?>
		</div>			
	</section> <?php // end #wrapper ?>

	<?php get_template_part('templates/blog/search'); ?>

	<?php get_template_part('templates/archive'); ?>

	<?php get_template_part('templates/section','info'); ?>


<?php get_footer(); ?>
