<?php
/**
 * The header for our theme
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Susty
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

    <?php $template_root_url = get_theme_root_uri() . '/' . get_template(); ?>
    <link rel="preload"
          as="font"
          type="font/woff2"
          href="<?php echo $template_root_url . '/fonts/source-sans-pro-v12-latin-regular.woff2' ?>"
          crossorigin>
    <link rel="preload"
          as="font"
          type="font/woff2"
          href="<?php echo $template_root_url . '/fonts/source-sans-pro-v12-latin-700.woff2' ?>"
          crossorigin>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'susty' ); ?></a>

	<header id="masthead">
        <div class="inner">
		<div class="logo">
			<?php
			if ( has_custom_logo() ) :
				the_custom_logo();
			else :
				?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo file_get_contents( get_stylesheet_directory() . '/images/sunrise.svg' ); ?><span class="screen-reader-text"><?php esc_html_e( 'Home', 'susty' ); ?></span></a>
				<?php
			endif;
			?>
		</div>

		<?php
        $hub_name = trim(str_replace('Sunrise Movement', '', get_bloginfo('name')));
		if ( is_front_page() && is_home() && ! get_query_var( 'menu' ) ) :
			?>
			<h1>
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                <div class="org">Sunrise Movement</div>
                <div class="hub"><?php echo $hub_name; ?></div>
              </a>
            </h1>
			<?php
		else :
			?>
			<div class="name">
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                <div class="org">Sunrise Movement</div>
                <div class="hub"><?php echo $hub_name; ?></div>
              </a>
            </div>
			<?php
		endif;

		if ( has_nav_menu( 'menu-1' ) ) :
            ?>
            <nav class="header-navigation">
                <?php
                    wp_nav_menu(array(
                        'theme_location' => 'menu-1'
                    ));
                ?>
            </nav>
            <?php
			if ( get_query_var( 'menu' ) ) :
				?>
				<a id="susty-back-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">&#x2716;<span class="screen-reader-text"><?php esc_html_e( 'Close menu', 'susty' ); ?></span></a>
				<script>
					var susty_home_url = '<?php echo esc_url( home_url( '/' ) ); ?>';
					if ( 0 === document.referrer.indexOf( susty_home_url ) ) {
						document.getElementById( 'susty-back-link' ).href = document.referrer;
					}
				</script>
				<?php
			else :
				?>
				<a class="header-menu-link" href="<?php echo esc_url( ( get_option( 'permalink_structure' ) ? home_url( '/menu/' ) : home_url( '/?menu' ) ) ); ?>"><?php esc_html_e( 'Menu', 'susty' ); ?></a>
				<?php
			endif;

		endif;
		?>
    </div>
	</header>

	<div id="content">
