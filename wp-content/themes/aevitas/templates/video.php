<?php global $post; ?>
<?php $url = get_post_meta($post->ID,'_ppm_video_embed',true); ?>
<?php echo $url; ?>
<?php if (!empty($url)) : ?>
	<aside class="post_video">
		<?php $vendor_related = get_post_meta($post->ID,'_ppm_video_heading',true); ?>
		<span class="post_video--title"><?php _e($vendor_related,'aevitas');?></span>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<?php echo wp_oembed_get( $url ); ?>
			</div>
		</div>
	</aside>
<?php endif; ?>


