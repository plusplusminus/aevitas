<?php 

/* Template Name: Blog */

?>

<?php get_header(); ?>

	<?php get_template_part('templates/content'); ?>

	<?php get_template_part('templates/blog/search'); ?>

	<?php get_template_part('templates/blog/archive'); ?>

	<?php get_template_part('templates/section','info'); ?>


<?php get_footer(); ?>
