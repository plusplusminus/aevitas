<?php

global $post;
/* Work Filter Section */

?>

<?php 

  $category[0] = array('name'=>'Categories','description'=>"Select Category",'terms'=>get_terms( 'category' ));
  
  $taxonomies[0] = array('name'=>'Type','description'=>"Select Type",'terms'=>get_terms( 'type' ));
  $taxonomies[1] = array('name'=>'Location','description'=>"Select Location",'terms'=>get_terms( 'location' ));
  $taxonomies[2] = array('name'=>'Venue','description'=>"Select Venue",'terms'=>get_terms( 'venue' ));
  $taxonomies[3] = array('name'=>'Setting','description'=>"Select Setting",'terms'=>get_terms( 'setting' ));
  $taxonomies[4] = array('name'=>'Style','description'=>"Select Style",'terms'=>get_terms( 'style' ));
  $taxonomies[5] = array('name'=>'Culture/Religion','description'=>"Select Culture/Religion",'terms'=>get_terms( 'culture' ));

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
									$term_link = get_term_link( $term );
	   
								    // If there was an error, continue to the next term.
								    if ( is_wp_error( $term_link ) ) {
								        continue;
								    }

								    // We successfully got a link. Print it out.
								    echo '<li><a href="' . esc_url( $term_link ) . '">' . $term->name . '</a></li>';

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
								 	$term_link = get_term_link( $term );
		   
									    // If there was an error, continue to the next term.
									    if ( is_wp_error( $term_link ) ) {
									        continue;
									    }

									    // We successfully got a link. Print it out.
									    echo '<li><a href="' . esc_url( $term_link ) . '">' . $term->name . '</a></li>';
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