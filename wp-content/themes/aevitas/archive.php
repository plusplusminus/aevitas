<?php get_header(); ?>

	<section class="section_page">  
		<div class="container">

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
					    $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );;
					    ?>
						    <h1 class="page_content--title">
								<span><?php _e( $term->name, 'aevitas' ); ?></span>
							</h1>

					<?php } ?>
			</div>

		</div>			
	</section> <?php // end #wrapper ?>

	<?php get_template_part('templates/blog/search'); ?>

	<?php get_template_part('templates/archive'); ?>

	<?php get_template_part('templates/section','info'); ?>


<?php get_footer(); ?>
