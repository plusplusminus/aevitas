<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">
		<?php global $tpb_options; ?>
		<?php // Google Chrome Frame for IE ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title><?php if (is_front_page()) { bloginfo('name'); } else { wp_title(''); } ?></title>

		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-icon-touch.png">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png?v=2">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<?php // or, set /favicon.ico for IE10 win ?>
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<script src="//use.typekit.net/qub1zxv.js"></script>
		<script>try{Typekit.load();}catch(e){}</script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/3.9.3/lodash.min.js"></script>

		<?php // wordpress head functions ?>
		<?php wp_head(); ?>
		<?php // end of wordpress head ?>

		<?php // drop Google Analytics Here ?>
		<?php // end analytics ?>

	</head>

	<body <?php body_class(); ?>>


	    <header class="header">

	      <nav role="navigation">
	        <div class="navbar">
				<div class="container">
				<!-- .navbar-toggle is used as the toggle for collapsed navbar content -->
					<div class="row">
						<div class="col-md-3">
						    <div class="navbar-header">
								<?php if ( ( '' != $tpb_options['site_logo']['url'] ) ) {
								$logo_url = $tpb_options['site_logo']['url'];
								$site_url = get_bloginfo('url');
								$site_name = get_bloginfo('name');
								$site_description = get_bloginfo('description');
								if ( is_ssl() ) $logo_url = str_replace( 'http://', 'https://', $logo_url );
								echo '<a class="logo" href="' . esc_url( $site_url ) . '" title="' . esc_attr( $site_description ) . '"><img class="img-responsive" src="'.$logo_url.'" alt="'.esc_attr($site_name).'"/></a>' . "\n";
								} // End IF Statement */
								?>
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
								<i class="fa fa-bars"></i>
								Menu
								</button>
						    </div>
						</div>
						<div class="col-md-9">
						    <div class="navbar-collapse collapse navbar-responsive-collapse">
						      

								<div class="aev-search" id="aev-search">
							<form method="get" id="searchform" action="http://tympanus.net/codrops/">
								<div class="aev-search-input-wrap">
									<input class="aev-search-input" placeholder="Search on Codrops..." type="text" value="" name="s" id="s"/>
								</div>
								<input type="hidden" name="search-type" value="posts" />
								<input class="aev-search-submit" type="submit" id="go" value=""><span class="aev-icon-search fa fa-search"></span>
							</form>
						</div>
								<?php secondary_nav('secondary-nav','navbar-right secondary_nav'); ?>
						      	<div class="clearfix"></div>
						     	<?php bones_main_nav(); ?>
						    </div>
						    <div class="clearfix"></div>
						</div>
					</div>
				</div>
	        </div> 
	        
	      </nav>

		</header> <?php // end header ?>


