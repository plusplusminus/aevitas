<?php global $post; ?>
<?php $url = get_post_meta($post->ID,'_ppm_video_embed',true); ?>
<?php if (!empty($url)) : ?>
	<aside class="post_video">
		<?php $video_heading = get_post_meta($post->ID,'_ppm_video_heading',true); ?>
		
		<div class="post_video--heading">
			<span class="post_video--title"><?php _e($video_heading,'aevitas');?></span>
		</div>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<?php echo wp_oembed_get( $url ); ?>
			</div>
		</div>
		<hr class="section_break"/>
	</aside>
<?php endif; ?>


