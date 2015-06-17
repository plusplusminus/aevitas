<?php global $tpb_options; ?>

<section class="section_instagram">
	<div class="container-fluid">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>

		<div class="instagram_follow">
			<a target="_blank" href="<?php echo $tpb_options['instagram_url'];?>" class="btn btn-standard"><span class="fa fa-instagram"></span> Follow Us on Instagram</a>
		</div>

		<hr class="section_break"/>
	</div>
</section>