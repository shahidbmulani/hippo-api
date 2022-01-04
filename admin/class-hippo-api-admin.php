<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/shahidbmulani
 * @since      1.0.0
 *
 * @package    Hippo_Api
 * @subpackage Hippo_Api/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Hippo_Api
 * @subpackage Hippo_Api/admin
 * @author     Shahid Mulani <shahid.mulani123@gmail.com>
 */
class Hippo_Api_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Hippo_Api_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Hippo_Api_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/hippo-api-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Hippo_Api_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Hippo_Api_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/hippo-api-admin.js', array( 'jquery' ), $this->version, false );

	}

	public function plugin_top_menu(){
		$page_title = 'Hippo API';
		$menu_title = 'Hippo API';
		$capability = 'manage_options';
		$menu_slug = 'hippo-api-dashboard';
		add_menu_page( $page_title, $menu_title, $capability, $menu_slug, [$this, 'main_menu_callback'] );
	}

	public function main_menu_callback(){
		require plugin_dir_path( __FILE__ ) . 'partials/hippo-api-admin-display.php';
	}

	public function register_setting(){
		// general setting section
		add_settings_section(
			'ha_general',
			__('Configuration', 'hippo-api'),
			array($this, 'ha_general_cb'),
			'ha_general_settings'
		);

		add_settings_field(
			'ha_auth_token',
			__('Shipping zones to each location', 'wcmlim'),
			array($this, 'ha_auth_token_callback'),
			'ha_general_set',
			'ha_general_sett',
			array('label_for' => 'ha_auth_token')
		);

		register_setting('ha_general_settings', 'ha_general_setting');

	}

	public function ha_general_cb(){
		echo '<p>' . __('Please enter the details.', 'hippo-api') . '</p>';
	}

	public function ha_auth_token_callback(){
		$authToken = get_option('haauthtoken'); 
	?>                    
		<label for="haauthtoken">Auth Token</label>
		<input type="text" name="haauthtoken" id="haauthtoken" value="<?php esc_attr_e($authToken); ?>">
	<?php
	}

}
