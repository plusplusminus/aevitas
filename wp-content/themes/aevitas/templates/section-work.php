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
		<hr class="section_break"/>
		<div class="section_work--heading">
			<h2 class="section_work--title">View More Work</h2>
		</div>
		
		<figure class="work_image">
		<?php global $tpb_options ?>
			<img src="<?php echo $tpb_options['work_image']['url'];?>" class="img-responsive">
		</figure>

		<div class="work_filter">

			<ul class="filter_list">
				<?php foreach ($taxonomies as $taxonomy) {
					if ( ! empty( $taxonomy ) && ! is_wp_error( $taxonomy ) ) {

						if ($taxonomy['opts']==true) {
							echo '<li>';
								get_tax_opts($taxonomy['slug'],$taxonomy['name']);
							echo '</li>';
						} else {
							echo '<li>';
								echo '<div class="btn-group">';
									echo '<button type="button" class="btn btn-default dropdown-toggle css-dropdown" data-toggle="dropdown" aria-expanded="false">
										    '.$taxonomy['name'].' <span class="caret"></span>
										  </button>';
							        echo '<ul id="'.$taxonomy['slug'].'" class="dropdown-menu" role="menu">';
									foreach ( $taxonomy['terms'] as $term ) {
										$term_link = get_term_link( $term );
		   
									    // If there was an error, continue to the next term.
									    if ( is_wp_error( $term_link ) ) {
									        continue;
									    }

									    // We successfully got a link. Print it out.
									    echo '<li><a href="#" class="select-item" data-taxonomy="'.$taxonomy['slug'].'" data-id="'.$term->term_id.'">' . $term->name . '</a></li>';
									    $arr[$term->term_id] = array('name'=>$term->name);
									}
									echo '</ul>';
								echo '</div>';
							
						}
					}
				}
				?>
			</ul>
			<div class="filters"></div>
			<div class="filter_submit">
				<form action="<?php echo home_url();?>/search" method="POST">
					<input name="formdata" type="hidden" value=""/>
					<button type="submit" class="submit_button">Filter</button>
				</form>
			</div>
		</div>
		<hr class="section_break"/>
		<script type="text/javascript">
			var items = '<?php echo json_encode($arr,JSON_HEX_APOS); ?>';
		</script>
	</div>
</section>