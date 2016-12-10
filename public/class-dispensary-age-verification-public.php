<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.wpdispensary.com
 * @since      1.0.0
 *
 * @package    Dispensary_Age_Verification
 * @subpackage Dispensary_Age_Verification/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Dispensary_Age_Verification
 * @subpackage Dispensary_Age_Verification/public
 * @author     WP Dispensary <deviodigital@gmail.com>
 */
class Dispensary_Age_Verification_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Dispensary_Age_Verification_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Dispensary_Age_Verification_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/dispensary-age-verification-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Dispensary_Age_Verification_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Dispensary_Age_Verification_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/dispensary-age-verification-public.js', array( 'jquery' ), $this->version, false );
		$translation_array = array(
			'minAge' => get_theme_mod( 'dav_minAge' ),
			'imgLogo' => get_theme_mod( 'dav_logo' ),
			'title' => get_theme_mod( 'dav_title' ),
			'copy' => get_theme_mod( 'dav_copy' ),
		);
		wp_localize_script( $this->plugin_name, 'object_name', $translation_array );
	}
}

/**
 * Register the JavaScript through wp_footer().
 *
 * @since    1.0.0
 */
function wpd_ageverification() {

?>
<script type="text/javascript">
	(function( $ ) {
		$.ageCheck({
			"imgLogo" : object_name.imgLogo,
			"minAge" : object_name.minAge,
			"title" : object_name.title,
			"copy" : object_name.copy,
    });
	})( jQuery );
</script>
<?php
}
add_action( 'wp_footer', 'wpd_ageverification' );
