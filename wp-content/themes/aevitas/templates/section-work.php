<?php

global $post;
global $cpt;
/* Work Filter Section */

?>

<?php 
  $taxonomies[0] = array('name'=>'Type','description'=>"Select Type",'terms'=>get_terms( 'type' ),'slug'=>'type','opts'=>true);
  $taxonomies[1] = array('name'=>'Location','description'=>"Select Location",'terms'=>get_terms( 'location' ),'slug'=>'location','opts'=>true);
  $taxonomies[2] = array('name'=>'Venue','description'=>"Select Venue",'terms'=>get_terms( 'venue' ),'slug'=>'venue','opts'=>true);
  $taxonomies[3] = array('name'=>'Setting','description'=>"Select Setting",'terms'=>get_terms( 'setting' ),'slug'=>'setting','opts'=>true);
  $taxonomies[4] = array('name'=>'Style','description'=>"Select Style",'terms'=>get_terms( 'style' ),'slug'=>'style','opts'=>true);
  $taxonomies[5] = array('name'=>'Culture/Religion','description'=>"Select Culture/Religion",'terms'=>get_terms( 'culture' ),'slug'=>'culture','opts'=>true);
?>
<section class="section_work">
	<div class="container">
		<div class="section_work--heading">
			<h2 class="section_work--title">View More Work</h2>
		</div>
		
		<figure class="work_image">
		<?php global $tpb_options ?>
			<img src="<?php echo $tpb_options['work_image']['url'];?>" class="img-responsive">
		</figure>
		<form action="<?php echo home_url();?>/search" method="POST">
			<div class="work_filter">

				<ul class="filter_list">
					<?php foreach ($taxonomies as $taxonomy) {
						if ( ! empty( $taxonomy ) && ! is_wp_error( $taxonomy ) ) {

							if ($taxonomy['opts']==true) {
								echo '<li>';
									get_tax_opts($taxonomy['slug']);
								echo '</li>';
							}
						}
					}
					?>
				</ul>
				<div class="filters"></div>
				<div class="filter_submit">
					
						<input name="formdata" type="hidden" value=""/>
						<button type="submit" class="submit_button">Filter</button>
					
				</div>

			</div>
		</form>
		<hr class="section_break"/>
		<script type="text/javascript">
			var items = '<?php echo json_encode($arr,JSON_HEX_APOS); ?>';
		</script>
	</div>
</section>