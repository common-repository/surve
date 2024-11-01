<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.surve.nl
 * @since      1.0.0
 *
 * @package    Surve
 * @subpackage Surve/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Surve
 * @subpackage Surve/public
 * @author     Matthijs Huisman <matthijs@surve.nl>
 */
class Surve_Public {

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
     * Add Surve script to footer of webpage
     *
     * @since   1.0.0
     */
	public function add_script_to_footer() {
	    //get ID
		$website_id = get_option($this->plugin_name.'_website_id');
		if (!empty($website_id)) {
			?>
			<!-- Implementatiecode van Surve.nl -->
			<script type="text/javascript">
				(function(s,u,r,v,e) {
					var c=s.createElement(u);c.type='text/javascript';c.async=r;
					c.src='https://static.surve.nl/request/'+v;
					e=s.getElementsByTagName(u)[0];e.parentNode.insertBefore(c,e);
				})(document,'script',true,<?php echo $website_id;?>);
			</script>
			<?php
        }
    }
}
