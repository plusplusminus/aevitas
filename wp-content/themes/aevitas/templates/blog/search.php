<?php

global $post;
/* Work Filter Section */

?>

<?php 

  $category[0] = array('name'=>'Categories','description'=>"Select Category",'terms'=>get_terms( 'category' ));
  
  $taxonomies[0] = array('slug'=>"type",'name'=>'Type','description'=>"Select Type",'terms'=>get_terms( 'type',array('orderby' => 'name') ));
  $taxonomies[1] = array('slug'=>"location",'name'=>'Location','description'=>"Select Location",'terms'=>get_terms( 'location',array('orderby' => 'name') ));
  $taxonomies[2] = array('slug'=>"venue",'name'=>'Venue','description'=>"Select Venue",'terms'=>get_terms( 'venue',array('orderby' => 'name') ));
  $taxonomies[3] = array('slug'=>"setting",'name'=>'Setting','description'=>"Select Setting",'terms'=>get_terms( 'setting',array('orderby' => 'name') ));
  $taxonomies[4] = array('slug'=>"style",'name'=>'Style','description'=>"Select Style",'terms'=>get_terms( 'style',array('orderby' => 'name') ));
  $taxonomies[5] = array('slug'=>"culture",'name'=>'Culture/Religion','description'=>"Select Culture/Religion",'terms'=>get_terms( 'culture' ));

?>
<section class="section_search">
	<div class="container">
		<div class="work_filter">
			<ul class="list-inline pull-left">
				<?php foreach ($taxonomies as $taxonomy) {
						if ( ! empty( $taxonomy ) && ! is_wp_error( $taxonomy ) ) {

				
								echo '<li>';
									get_tax_opts($taxonomy['slug']);
								echo '</li>';
							
						}
					}
				?>

			</ul>
			
			<div class="clearfix"></div>
		</div>
	</div>
</section>