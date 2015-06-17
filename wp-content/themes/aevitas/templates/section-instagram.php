<?php global $tpb_options; ?>

<div id="%1$s" class="section_instagram">
	<div class="container">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>

		<div class="instagram_follow">
			<a href="<?php echo $tpb_options['instagram_url'];?>" class="btn btn-standard"><span class="fa fa-instagram"></span> Follow Us on Instagram</a>
		</div>

		<hr class="section_break"/>
	</div>
</div>