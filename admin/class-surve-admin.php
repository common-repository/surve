<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.surve.nl
 * @since      1.0.0
 *
 * @package    Surve
 * @subpackage Surve/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Surve
 * @subpackage Surve/admin
 * @author     Matthijs Huisman <matthijs@surve.nl>
 */
class Surve_Admin {

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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/surve-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/surve-admin.js', array( 'jquery' ), $this->version, false );

	}

    /**
     * Add Admin menu where user can provide the website ID
     *
     * @since 1.0.0
     */
	public function add_admin_menu() {

        add_options_page( 'Surve', 'Surve', 'manage_options', $this->plugin_name.'-settings', [$this, 'show_admin_page'] );

    }

    /**
     * Show options page
     *
     * @since 1.0.0.
     */
    public function show_admin_page() {

        if ( !current_user_can( 'manage_options' ) )  {
            wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
        }

        include plugin_dir_path( __FILE__ ).'partials/surve-admin-display.php';

    }

    /**
     * Add settings to plugin
     *
     * @since 1.0.0
     */
    public function add_plugin_settings() {

        register_setting($this->plugin_name.'_group', $this->plugin_name.'_website_id');

    }

    /**
     * Add settings URL to plugin page
     *
     * @since 1.0.0
     * @param $links array
     * @return array
     */
    public function add_settings_link_to_plugin_page($links) {

        $settings_link = '<a href="options-general.php?page='.$this->plugin_name.'-settings">' . __('Instellingen') . '</a>';
        array_unshift($links, $settings_link);
        return $links;

    }

    /**
     * Add promo URL to plugin page
     *
     * @since 1.0.0
     * @param $links array
     * @return array
     */
    public function add_promo_link_to_plugin_page($links) {

        $settings_link = '<a href="https://www.surve.nl" target="_blank">' . __('Naar Surve.nl') . '</a>';
        array_unshift($links, $settings_link);
        return $links;

    }

}
