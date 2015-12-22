<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0
 */

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>
			<?php
				if ( is_category() ) {
					echo 'Category Archive for &quot;'; single_cat_title(); echo '&quot; | '; bloginfo( 'name' );
				} elseif ( is_tag() ) {
					echo 'Tag Archive for &quot;'; single_tag_title(); echo '&quot; | '; bloginfo( 'name' );
				} elseif ( is_archive() ) {
					wp_title( '' ); echo ' Archive | '; bloginfo( 'name' );
				} elseif ( is_search() ) {
					echo 'Search for &quot;'.esc_html( $s ).'&quot; | '; bloginfo( 'name' );
				} elseif ( is_home() || is_front_page() ) {
					bloginfo( 'name' ); echo ' | '; bloginfo( 'description' );
				} elseif ( is_404() ) {
					echo 'Error 404 Not Found | '; bloginfo( 'name' );
				} elseif ( is_single() ) {
					wp_title( '' );
				} else {
					echo wp_title( ' | ', 'false', 'right' ); bloginfo( 'name' );
				}
			?>
		</title>

		<link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icons/favicon.ico" type="image/x-icon">
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icons/apple-touch-icon-144x144-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icons/apple-touch-icon-114x114-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icons/apple-touch-icon-72x72-precomposed.png">
		<link rel="apple-touch-icon-precomposed" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icons/apple-touch-icon-precomposed.png">
		<script src="//use.typekit.net/ogi2ull.js"></script>
		<script>try{Typekit.load();}catch(e){}</script>

		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
	<?php do_action( 'foundationpress_after_body' ); ?>

	<div class="off-canvas-wrap" data-offcanvas>
	<div class="inner-wrap">

	<?php do_action( 'foundationpress_layout_start' ); ?>
	<?php get_template_part( 'parts/off-canvas-menu' ); ?>
		<div class="row">
			<nav class="tab-bar">
				<section class="left-small">
					<a class="left-off-canvas-toggle menu-icon" href="#"><span></span></a>
				</section>
				<section class="middle tab-bar-section">

					<h1 class="title">
						MENU
					</h1>

				</section>
			</nav>
			<div class="columns medium-12">
				<div class="page-wrapper">
					<header class="page-header">
						<div class="page-header-border">
							<div class="row">
								<div class="columns medium-12">
									<div class="logo-wrapper">
										<div class="primary-logo text-center"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="Go to <?php bloginfo('name'); ?> Home Page"><img src="<?php bloginfo('template_url'); ?>/images/karl-monger-logo.jpg" alt="Karl Monger Manuscript Editing" /></a></div>
										<div class="logo-bar">
											<div class="logo-bar-sides"></div>
											<div class="logo-bar-hr"></div>
										</div>
										<div class="row">
											<div class="columns medium-12">
												<nav class="primary-nav hide-for-small">
													<?php foundationpress_top_bar_l(); ?>
										            <?php foundationpress_top_bar_r(); ?>
												</nav>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</header>

					<section class="container" role="document">
						<?php do_action( 'foundationpress_after_header' ); ?>
