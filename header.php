<?php
/**
* The template for displaying the header
*
* Displays all of the head element and everything up until the "site-content" div.
*
* @package WordPress
* @subpackage Furia_Gaming_Community
* @since Furia Gaming Community 1.0
*/

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="site">

		<header id="mast-head" class="site-header" role="banner">

			<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'furiagamingcommunity' ); ?></a>

			<?php if ( has_nav_menu( 'primary' ) || has_nav_menu( 'social' ) ) : ?>

			<button id="menu-toggle" class="menu-toggle"><?php _e( 'Menu', 'furiagamingcommunity' ); ?></button>

			<div id="site-header-menu" class="site-header-menu">

				<div class="site-header-branding">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo get_template_directory_uri(); ?>/images/navbar.png"/ alt="<?php bloginfo( 'name' ); ?>"></a>
				</div><!-- .site-branding -->

				<?php if ( has_nav_menu( 'primary' ) ) : ?>
				<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'furiagamingcommunity' ); ?>">
					<?php
					wp_nav_menu( array(
						'theme_location' => 'primary',
						'menu_class'     => 'primary-menu',
					) );
					?>
				</nav><!-- .main-navigation -->
				<?php endif; ?>

				<?php get_search_form(); ?>

				<?php if ( has_nav_menu( 'social' ) ) : ?>
				<nav id="social-navigation" class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Social Links Menu', 'furiagamingcommunity' ); ?>">
					<?php
					wp_nav_menu( array(
						'theme_location' => 'social',
						'menu_class'     => 'social-links-menu',
						'depth'          => 1,
						'link_before'    => '<span class="screen-reader-text">',
						'link_after'     => '</span>',
					) );
					?>
				</nav><!-- .social-navigation -->
				<?php endif; ?>

			</div><!-- .site-header-menu -->

			<?php endif; ?>

			<?php if ( is_front_page() && is_home() ) : ?>
			<aside id="secondary" class="showcase widget-area" role="complementary">
				<?php dynamic_sidebar( 'sidebar-4' ); ?>
			</aside>
			<?php endif; // End showcase area check. ?>

			<div class="site-branding">
				<?php furiagamingcommunity_the_custom_logo(); ?>

				<?php if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php endif;

				$description = get_bloginfo( 'description', 'display' );
				if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; ?></p>
				<?php endif; ?>
			</div><!-- .site-branding -->

			<?php if ( get_header_image() ) : ?>

			<?php
			/**
			* Filter the default furiagamingcommunity custom header sizes attribute.
			*
			* @since Furia Gaming Community 1.0
			*
			* @param string $custom_header_sizes sizes attribute
			* for Custom Header. Default '(max-width: 709px) 85vw,
			* (max-width: 909px) 81vw, (max-width: 1362px) 88vw, 1200px'.
			*/
			$custom_header_sizes = apply_filters( 'furiagamingcommunity_custom_header_sizes', '(max-width: 709px) 85vw, (max-width: 909px) 81vw, (max-width: 1362px) 88vw, 1200px' );
			?>
			<div class="header-image">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<img src="<?php header_image(); ?>" srcset="<?php echo esc_attr( wp_get_attachment_image_srcset( get_custom_header()->attachment_id ) ); ?>" sizes="<?php echo esc_attr( $custom_header_sizes ); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
				</a>
			</div><!-- .header-image -->
			<?php endif; // End header image check. ?>

		</header><!-- .site-header -->

		<div class="site-inner">

			<div id="content" class="site-content">
