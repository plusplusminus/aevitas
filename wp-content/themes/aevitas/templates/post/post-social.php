<div class="post_social clearfix">
	<?php 

	$url = get_permalink();
    $title = get_the_title();
    $summary = get_the_excerpt();   

    global $post;

    $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large');

    ?>

	<header class="social_header">
		<h2 class="social_header--title">Share this post</h2>
	</header>
	<div class="social_options">
		<ul class="social_buttons">
			<li class="social_button">
				<a href="#" onclick="window.open('http://www.facebook.com/sharer.php?s=100&p[title]=<?php echo urlencode($title); ?>&p[summary]=<?php echo urlencode($summary); ?>&p[url]=<?php echo urlencode($url); ?>&p[images][0]=<?php echo urlencode($thumb[0]); ?>', 'sharer', 'toolbar=0,status=0,width=626,height=436');return false;" class="social_button--btn css-facebook">
					<span class="fa fa-facebook"></span> Share on Facebook
				</a>
			</li>
			<li class="social_button">
				<a target="_blank" href="https://twitter.com/share/?counturl=<?php the_permalink();?>&amp;url=<?php the_permalink();?>&amp;text=<?php the_title();?>" class="social_button--btn css-twitter">
					<span class="fa fa-twitter"></span>	Share on Twitter
				</a>
			</li>
			<li class="social_button">
				<a target="_blank" onclick="window.open('//pinterest.com/pin/create/button/?url=<?php the_permalink();?>&amp;media=<?php echo $thumb[0];?>', 'sharer', 'toolbar=0,status=0,width=626,height=436');return false;" href="#" class="social_button--btn css-pinterest">
					<span class="fa fa-pinterest"></span> Share on Pinterest
				</a>
			</li>
		</ul>
	</div>
	<hr class="section_break"/>
	<div class="clearfix"></div>
</div>