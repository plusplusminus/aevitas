<?php global $post; ?>
<ul class="post_meta">
	<li class="meta_item">
		<time class="updated" datetime="<?php get_the_time('Y-m-j') ?>">
			<?php echo get_the_time(get_option('date_format')) ?>
		</time>
	</li>
	<?php $location = get_post_meta($post->ID,'_ppm_venue_title',true); ?>
	<?php if (!empty($location)) : ?>
		<li class="meta_item">
			<?php _e($location,'aevitas'); ?>
		</li>
	<?php endif; ?>
	<?php if (is_singular('post')) : ?>
		<li class="meta_item">
			<?php 
				$category = get_the_category(); 
				if($category[0]){
				echo '<span>'.$category[0]->cat_name.'</span>';
				}
			?>
		</li>
	<?php endif; ?>
</ul>