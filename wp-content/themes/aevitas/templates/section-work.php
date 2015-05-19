<?php

global $post;
/* Work Filter Section */

?>

<?php 
  $taxonomies[0] = array('name'=>'Type','description'=>"Select Type",'terms'=>get_terms( 'type' ));
  $taxonomies[1] = array('name'=>'Location','description'=>"Select Location",'terms'=>get_terms( 'location' ));
  $taxonomies[2] = array('name'=>'Venue','description'=>"Select Venue",'terms'=>get_terms( 'venue' ));
  $taxonomies[3] = array('name'=>'Setting','description'=>"Select Setting",'terms'=>get_terms( 'setting' ));
  $taxonomies[4] = array('name'=>'Style','description'=>"Select Style",'terms'=>get_terms( 'style' ));
  $taxonomies[5] = array('name'=>'Culture/Religion','description'=>"Select Culture/Religion",'terms'=>get_terms( 'culture' ));
?>
<section class="section_work">
	<div class="container">
		<div class="section_work--heading">
			<h2 class="section_work--title">View More Work</h2>
		</div>
	</div>

	<figure class="work_image">
		<img src="http://placehold.it/1600x500" class="img-responsive">
	</figure>

	<div class="container">
		<div class="work_filter">

			<ul class="filter_list">
				<?php foreach ($taxonomies as $taxonomy) {
					if ( ! empty( $taxonomy ) && ! is_wp_error( $taxonomy ) ) {
						echo '<li>';
						echo '<select data-placeholder="'.$taxonomy['name'].'" style="width:100%;" tabindex="1">';
				        echo '<option value="">'.$taxonomy['description'].'</option>';
						foreach ( $taxonomy['terms'] as $term ) {
						 	echo '<option value="'.$term->term_id.'">' . $term->name . '</option>';
						}
						echo '</select>';
						echo '</li>';
					}
				}
				?>
			</ul>
			<div class="filter_submit">
				<button class="submit_button">Filter</button>
			</div>
		</div>
		<hr class="section_break"/>
	</div>
</section>