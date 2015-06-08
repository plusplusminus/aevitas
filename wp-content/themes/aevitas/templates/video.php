<?php global $post; ?>
<?php echo "DAsdasadsdas"; ?>
<?php $url = get_post_meta($post->ID,'_ppm_video_embed',true); ?>
<?php echo $url; ?>
<?php if (!empty($url)) : ?>
	<aside class="post_video">
		<?php echo wp_oembed_get( $url ); ?>
	</aside>
<?php endif; ?>


