<?php
global $post;
$prov=get_post_meta($post->ID,'songs',true);
?>
<?php if (!empty($prov)) : ?>
	<div class="post_providers">
		<?php echo do_shortcode('[show-some-love]'); ?>
	</div>
<?php endif; ?>