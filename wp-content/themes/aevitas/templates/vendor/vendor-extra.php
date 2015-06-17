

<?php global $post; ?>
<?php $url = get_post_meta($post->ID,'_ppm_extra_info',true); ?>
<?php if (!empty($url)) : ?>
	<aside class="post_extra clearfix">
		<?php $video_heading = get_post_meta($post->ID,'_ppm_video_heading',true); ?>
		
		<div class="post_video--heading">
			<span class="post_video--title"><?php _e($video_heading,'aevitas');?></span>
		</div>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<?php echo ppm_get_wysiwyg_output( '_ppm_extra_info', $post->ID ); ?>
			</div>
		</div>
		<hr class="section_break"/>
	</aside>
<?php endif; ?>


