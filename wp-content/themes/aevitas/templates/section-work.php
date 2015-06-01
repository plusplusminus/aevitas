<?php

global $post;
global $cpt;
/* Work Filter Section */

?>

<?php 
  $taxonomies[0] = array('name'=>'Type','description'=>"Select Type",'terms'=>get_terms( 'type' ),'slug'=>'type');
  $taxonomies[1] = array('name'=>'Location','description'=>"Select Location",'terms'=>get_terms( 'location' ),'slug'=>'location');
  $taxonomies[2] = array('name'=>'Venue','description'=>"Select Venue",'terms'=>get_terms( 'venue' ),'slug'=>'venue');
  $taxonomies[3] = array('name'=>'Setting','description'=>"Select Setting",'terms'=>get_terms( 'setting' ),'slug'=>'setting');
  $taxonomies[4] = array('name'=>'Style','description'=>"Select Style",'terms'=>get_terms( 'style' ),'slug'=>'style');
  $taxonomies[5] = array('name'=>'Culture/Religion','description'=>"Select Culture/Religion",'terms'=>get_terms( 'culture' ),'slug'=>'culture');
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

		<div class="work_filter">

			<ul class="filter_list">
				<?php foreach ($taxonomies as $taxonomy) {
					if ( ! empty( $taxonomy ) && ! is_wp_error( $taxonomy ) ) {
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
						echo '</li>';
					}
				}
				?>
				<?php /* foreach ($taxonomies as $taxonomy) {
					if ( ! empty( $taxonomy ) && ! is_wp_error( $taxonomy ) ) {
						echo '<li>';
						echo '<select data-name="'.$taxonomy['name'].'" data-placeholder="'.$taxonomy['name'].'" style="width:100%;" tabindex="1">';
				        echo '<option value="">'.$taxonomy['description'].'</option>';
						foreach ( $taxonomy['terms'] as $term ) {
						 	echo '<option value="'.$term->term_id.'">' . $term->name . '</option>';
						}
						echo '</select>';
						echo '</li>';
					}
				}*/
				?>
			</ul>
			<div class="filters"></div>
			<div class="filter_submit">
				<button class="submit_button">Filter</button>
			</div>
		</div>

		<?php $cpt->facet_search_posts(); ?>
		<hr class="section_break"/>
		<script type="text/javascript">
			var items = '<?php echo json_encode($arr); ?>';
		</script>
	</div>
</section>