<?php global $post; ?>

<?php $media = get_post_meta($post->ID,'_ppm_gallery',true); ?>
<?php if (!empty($media)) : ?>
	<aside class="child_slider">
		<div class="slider">
		<?php foreach ($media as $key => $image) {

			$image_attributes_large = wp_get_attachment_image_src( $key,'large' );
			?>
			<div class="slide">
				<figure class="slide_image">
					<img data-lazy="<?php echo $image_attributes_large[0];?>" class="img-responsive"/>
				</figure>
			</div>

		<?php } ?>
		</div>
	</aside>
<?php endif; ?>