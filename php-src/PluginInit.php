<?php
namespace HungryFlamingo\WpAffiliateLinks;

// @codeCoverageIgnoreStart
defined( 'ABSPATH' ) || die(); // Avoid direct file access
// @codeCoverageIgnoreEnd


class PluginInit {

	/**
	 * Initialize admin, enqueue scripts etc.
	 *
	 * @param void
	 * @return void
	 */
	public static function plugin_init() {

		/** Initialize frontend */
		if ( ! is_admin() ) {
			/** Enqueue frontend scripts and styles */
			add_action( 'wp_enqueue_scripts', array( '\HungryFlamingo\WpAffiliateLinks\Enqueue', 'enqueue_frontend_css' ), 10 );
			add_action( 'wp_enqueue_scripts', array( '\HungryFlamingo\WpAffiliateLinks\Enqueue', 'enqueue_frontend_js' ), 10 );

			/** Initialize affiliate link generation */
			$generate_links = new \HungryFlamingo\WpAffiliateLinks\GenerateLinks();
			add_filter( 'the_content', array( $generate_links, 'hungry_flamingo_auto_add_affiliate_links' ), 10 );

		}

		/** Initialize backend */
		if ( is_admin() ) {
			add_action( 'admin_menu', array( '\HungryFlamingo\WpAffiliateLinks\AdminInit', 'admin_init' ), 10 );
		}

		add_action( 'rest_api_init', array( '\HungryFlamingo\WpAffiliateLinks\AdminRestEndpoints', 'admin_rest_init' ), 10 );

		add_action( 'admin_init', array( '\HungryFlamingo\WpAffiliateLinks\PluginInit', 'register_settings' ), 10 );
		add_action( 'rest_api_init', array( '\HungryFlamingo\WpAffiliateLinks\PluginInit', 'register_settings' ), 10 );

	}

	public static function register_settings() {

		register_setting( Utils::$plugin_slug_filtered, Utils::$plugin_slug_filtered . '_affiliates_json' );
	}


}
