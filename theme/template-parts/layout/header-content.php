<?php
/**
 * Template part for displaying the header content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Zemira
 */
$site_name = get_option( 'blogname', '' );
$home_url = home_url( '/' );
$logo_id = get_theme_mod( 'custom-logo' );
var_dump($logo_id);
?>

<header id="masthead">

<div class="site-branding">
    <?php if ( class_exists( '\Elementor\Plugin' ) && '' != $logo_id ) {
        $logo_src = wp_get_attachment_image_src( $logo_id, 'full' );


        if ( $logo_src ) {
            $logo_src = $logo_src[0];
        }
        if ( '' != $logo_src ) {
			if(str_contains($logo_src, '.svg')){
				$svg = file_get_contents($logo_src);
				echo '<div class="site-logo"><a href="' . esc_url( $home_url ) . '" itemprop="url">';
				echo $svg ;
				echo '</a></div>';
			}else{
			echo '<div class="site-logo"><a href="' . esc_url( $home_url ) . '" itemprop="url"><img src="' . esc_url( $logo_src ) .'" alt="' . esc_attr( $site_name ) .'" /></a></div>';
			}

        }
    } else { ?>
        <p class="site-title">
            <a href="<?php echo esc_url( $home_url ); ?>" rel="home"><?php echo esc_attr( $site_name ); ?></a>
        </p>
    <?php } ?>
</div>

	<nav id="site-navigation" aria-label="<?php esc_attr_e( 'Main Navigation', 'zemira' ); ?>">
		<button aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'zemira' ); ?></button>

		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
				'items_wrap'     => '<ul id="%1$s" class="%2$s" aria-label="submenu">%3$s</ul>',
			)
		);
		?>
	</nav><!-- #site-navigation -->

</header><!-- #masthead -->
