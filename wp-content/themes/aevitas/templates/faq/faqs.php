<?php

global $post;
/* Work Filter Section */

?>

<?php 

	$faqs = get_post_meta($post->ID,'_ppm_faq_group',true);

	foreach ($faqs as $key => $value) {
		$faq_categories[] = $value['faq_category'];
	}

	$faq_categories = array_unique($faq_categories);


?>

<section class="section_faq">
	<div class="container">
		<div class="faq_filter text-center">
			<div id="filters" class="btn-group">
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Please select faq category	<span class="caret"></span></button>
		        <ul class="dropdown-menu" role="menu">
		        	<li><a data-filter="*" href="#">Show All</a></li>
					<?php foreach ( $faq_categories as $item ) {
					 	echo '<li><a data-filter=".'.camelCase($item).'" href="#">' . $item . '</a></li>';
					} ?>
				</ul>
			</div>
		</div>
		<div class="faq_content">
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				<?php $count = 0; ?>
				<?php foreach ($faqs as $key => $value) : $count++; ?>
					<div class="panel panel-default <?php echo camelCase($value['faq_category']);?>">
				    	<div class="panel-heading" role="tab" id="heading<?php echo $count;?>">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $count;?>" aria-expanded="true" aria-controls="collapse<?php echo $count;?>">
								  <span><?php echo $value['title']; ?></span>
								</a>
							</h4>
				    	</div>
				    	<div id="collapse<?php echo $count;?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo $count;?>">
				      		<div class="panel-body">
				        		<?php echo wpautop($value['description']); ?>
				     		 </div>
				    	</div>
				  	</div>
				<?php endforeach; ?>
			</div>
		</div>
		<hr class="section_break"/>
	</div>
</section>