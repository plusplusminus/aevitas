<?php

global $post;
/* Work Filter Section */

?>

<?php 

  $category[0] = array('name'=>'Categories','description'=>"Select Category",'terms'=>get_terms( 'category' ));
  
  $taxonomies[0] = array('name'=>'Location','description'=>"Select Location",'terms'=>get_terms( 'location' ));
  $taxonomies[1] = array('name'=>'Venue','description'=>"Select Venue",'terms'=>get_terms( 'venue' ));
  $taxonomies[2] = array('name'=>'Type','description'=>"Select Type",'terms'=>get_terms( 'type' ));
  $taxonomies[3] = array('name'=>'Style','description'=>"Select Style",'terms'=>get_terms( 'style' ));

?>
<section class="section_search">
	<div class="container">
		<div class="work_filter">
			<ul class="list-inline pull-left">
				<?php foreach ($category as $taxonomy) {
					if ( ! empty( $taxonomy ) && ! is_wp_error( $taxonomy ) ) {
						echo '<li>';
							echo '<div class="btn-group">';
							echo '<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								    '.$taxonomy['name'].' <span class="caret"></span>
								  </button>';
					        echo '<ul class="dropdown-menu" role="menu">';
							foreach ( $taxonomy['terms'] as $term ) {
							 	echo '<li><a href="#">' . $term->name . '</a></li>';
							}
							echo '</ul>';
							echo '</div>';
						echo '</li>';
					}
				}
				?>
			</ul>
			<ul class="list-inline pull-right">
				<?php foreach ($taxonomies as $taxonomy) {
					if ( ! empty( $taxonomy ) && ! is_wp_error( $taxonomy ) ) {
						echo '<li>';
							echo '<div class="btn-group">';
							echo '<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								    '.$taxonomy['name'].' <span class="caret"></span>
								  </button>';
					        echo '<ul class="dropdown-menu" role="menu">';
							foreach ( $taxonomy['terms'] as $term ) {
							 	echo '<li><a href="#">' . $term->name . '</a></li>';
							}
							echo '</ul>';
							echo '</div>';
						echo '</li>';
					}
				}
				?>
			</ul>
			<div class="clearfix"></div>
		</div>
	</div>
</section>