<?php
/**
 * Minerva functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_Two
 * @since Minerva 1.0
 */


if ( ! function_exists( 'minerva_support' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since Minerva 1.0
	 *
	 * @return void
	 */
	function minerva_support() {

		// Add support for block styles.
		add_theme_support( 'wp-block-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style.css' );

	}

endif;

add_action( 'after_setup_theme', 'minerva_support' );

if ( ! function_exists( 'minerva_styles' ) ) :

	/**
	 * Enqueue styles.
	 *
	 * @since Minerva 1.0
	 *
	 * @return void
	 */
	function minerva_styles() {

		// Register theme stylesheet.
		wp_register_style(
			'minerva-style',
			get_template_directory_uri() . '/style.css',
			array(),
			wp_get_theme()->get( 'Version' )
		);

		// Add styles inline.
		wp_add_inline_style( 'minerva-style', minerva_get_font_face_styles() );

		// Enqueue theme stylesheet.
		wp_enqueue_style( 'minerva-style' );

	}

endif;

add_action( 'wp_enqueue_scripts', 'minerva_styles' );

if ( ! function_exists( 'minerva_editor_styles' ) ) :

	/**
	 * Enqueue editor styles.
	 *
	 * @since Minerva 1.0
	 *
	 * @return void
	 */
	function minerva_editor_styles() {

		// Add styles inline.
		wp_add_inline_style( 'wp-block-library', minerva_get_font_face_styles() );

	}

endif;

add_action( 'admin_init', 'minerva_editor_styles' );


if ( ! function_exists( 'minerva_get_font_face_styles' ) ) :

	/**
	 * Get font face styles.
	 * Called by functions minerva_styles() and minerva_editor_styles() above.
	 *
	 * @since Minerva 1.0
	 *
	 * @return string
	 */
	function minerva_get_font_face_styles() {

		return "
		@font-face {
			font-family: 'Inter var';
			font-weight: 100 900;
			font-display: swap;
			font-style: normal;
			font-named-instance: 'Regular';
			src: url('" . get_theme_file_uri( 'assets/fonts/Inter-roman.var.woff2?v=3.19' ) . "') format('woff2');
		}
		@font-face {
			font-family: 'Inter var';
			font-weight: 100 900;
			font-display: swap;
			font-style: italic;
			font-named-instance: 'Italic';
			src: url('" . get_theme_file_uri( 'assets/fonts/Inter-italic.var.woff2?v=3.19' ) . "') format('woff2');
		}
		";

	}

endif;

if ( ! function_exists( 'minerva_preload_webfonts' ) ) :

	/**
	 * Preloads the main web font to improve performance.
	 *
	 * Only the main web font (font-style: normal) is preloaded here since that font is always relevant (e.g. it used
	 * on every heading). The other font is only needed if there is any applicable content in italic style, and
	 * therefore preloading it would in most cases regress performance when that font would otherwise not be loaded at
	 * all.
	 *
	 * @since Minerva 1.0
	 *
	 * @return void
	 */
	function minerva_preload_webfonts() {
		?>
		<link rel="preload" href="<?php echo esc_url( get_theme_file_uri( 'assets/fonts/Inter-Regular.woff2' ) ); ?>" as="font" type="font/woff2" crossorigin>
		<?php
	}

endif;

add_action( 'wp_head', 'minerva_preload_webfonts' );
