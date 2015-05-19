<?php
global $post;

/* About Section Home Page */

?>
<?php
	$title = get_post_meta( $post->ID, '_ppm_about_title', true );
	$desc = get_post_meta( $post->ID, '_ppm_about_description', true );
	$link = get_post_meta( $post->ID, '_ppm_about_link', true );
?>

<section class="section_about">
	<div class="container">
		<div class="about_content">
			<h2 class="about_content--title"><?php _e($title,'aevitas'); ?></h2>
			<?php
				echo wpautop($desc);
			?>
			<a class="about_content--btn" href="<?php echo link;?>">Read More</a>
		</div>
		<hr class="section_break"/>
	</div>
</section>