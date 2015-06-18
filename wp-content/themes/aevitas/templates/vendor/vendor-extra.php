

<?php global $post; ?>
<?php $url = get_post_meta($post->ID,'_ppm_extra_info',true); ?>
<?php if (!empty($url)) : ?>
	<aside class="post_extra clearfix">
		<?php $video_heading = get_post_meta($post->ID,'_ppm_video_heading',true); ?>
		
		<div class="post_video--heading">
			<h2 class="post_video--title"><?php _e($video_heading,'aevitas');?></h2>
		</div>
		<div class="post_entry">
			<?php echo ppm_get_wysiwyg_output( '_ppm_extra_info', $post->ID ); ?>
		</div>
		<hr class="section_break"/>
	</aside>
<?php endif; ?>


