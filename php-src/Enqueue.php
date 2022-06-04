<?php
namespace HungryFlamingo\WpAffiliateLinks;

// @codeCoverageIgnoreStart
defined( 'ABSPATH' ) || die(); // Avoid direct file access
// @codeCoverageIgnoreEnd

/**
 * Enqueue scripts and styles for the plugin
 */
class Enqueue {

	/**
	 * Enqueue CSS for plugin frontend
	 *
	 * @param void
	 * @return void
	 */
	public static function enqueue_frontend_css() {
		wp_enqueue_style(
			\HungryFlamingo\WpAffiliateLinks\Utils::$plugin_slug,
			\HungryFlamingo\WpAffiliateLinks\Utils::$plugin_url . 'assets/frontend/build/' . \HungryFlamingo\WpAffiliateLinks\Utils::$plugin_slug . '-frontend.css',
			null,
			\HungryFlamingo\WpAffiliateLinks\Utils::$plugin_version
		);
	}

	/**
	 * Enqueue JS for plugin frontend
	 *
	 * @param void
	 * @return void
	 */
	public static function enqueue_frontend_js() {

		$script_meta = array(
			'dependencies' => null,
			'version'      => '0',
		);

		if ( file_exists( \HungryFlamingo\WpAffiliateLinks\Utils::$plugin_path . 'assets/frontend/build/' . \HungryFlamingo\WpAffiliateLinks\Utils::$plugin_slug . '-frontend.min.asset.php' ) ) {
			$script_meta = require \HungryFlamingo\WpAffiliateLinks\Utils::$plugin_path . 'assets/frontend/build/' . \HungryFlamingo\WpAffiliateLinks\Utils::$plugin_slug . '-frontend.min.asset.php';
		}

		wp_enqueue_script(
			\HungryFlamingo\WpAffiliateLinks\Utils::$plugin_slug . '-frontend',
			\HungryFlamingo\WpAffiliateLinks\Utils::$plugin_url . 'assets/frontend/build/' . \HungryFlamingo\WpAffiliateLinks\Utils::$plugin_slug . '-frontend.min.js',
			$script_meta['dependencies'],
			\HungryFlamingo\WpAffiliateLinks\Utils::$plugin_version . '.' . $script_meta['version'],
			true
		);

		wp_localize_script(
			\HungryFlamingo\WpAffiliateLinks\Utils::$plugin_slug . '-frontend',
			'wpEnv',
			array(
				'_wp_ajax_url'     => admin_url( 'admin-ajax.php' ),
				'_wpnonce'         => wp_create_nonce( \HungryFlamingo\WpAffiliateLinks\Utils::$plugin_slug . '-nonce' ),
				'_wp_http_referer' => wp_get_referer(),
				'baseurl'          => get_bloginfo( 'wpurl' ),
				'basepath'         => parse_url( get_bloginfo( 'wpurl' ), PHP_URL_PATH ),
				'public_path'      => \HungryFlamingo\WpAffiliateLinks\Utils::$plugin_url . '/assets/frontend/build/',
			)
		);
	}


	/**
	 * Enqueue CSS for plugin admin backend
	 *
	 * @param void
	 * @return void
	 */
	public static function enqueue_admin_css() {
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die();
		} else {
			wp_enqueue_style(
				\HungryFlamingo\WpAffiliateLinks\Utils::$plugin_slug . '-admin',
				\HungryFlamingo\WpAffiliateLinks\Utils::$plugin_url . 'assets/admin/build/' . \HungryFlamingo\WpAffiliateLinks\Utils::$plugin_slug . '-admin.css',
				null,
				\HungryFlamingo\WpAffiliateLinks\Utils::$plugin_version
			);}
	}

	/**
	 * Enqueue JS for plugin admin backend
	 *
	 * @param void
	 * @return void
	 */
	public static function enqueue_admin_js() {
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die();
		} else {

			$allowed_admin_pages = array(
				'hungry-flamingo',
				'hungry-flamingo-wp-affiliate-links',
			);

			$plugin_page = sanitize_key( $_GET['page'] );

			/** Restrict plugin JS to only allowed pages */
			if ( false === array_search( $plugin_page, $allowed_admin_pages, true ) ) {
				$plugin_page = '';
				return;
			}

			$script_meta = array(
				'dependencies' => null,
				'version'      => '0',
			);

			if ( file_exists( \HungryFlamingo\WpAffiliateLinks\Utils::$plugin_path . 'assets/admin/build/' . \HungryFlamingo\WpAffiliateLinks\Utils::$plugin_slug . '-admin.min.asset.php' ) ) {
				$script_meta = require \HungryFlamingo\WpAffiliateLinks\Utils::$plugin_path . 'assets/admin/build/' . \HungryFlamingo\WpAffiliateLinks\Utils::$plugin_slug . '-admin.min.asset.php';
			}

			wp_enqueue_script(
				\HungryFlamingo\WpAffiliateLinks\Utils::$plugin_slug . '-admin',
				\HungryFlamingo\WpAffiliateLinks\Utils::$plugin_url . 'assets/admin/build/' . \HungryFlamingo\WpAffiliateLinks\Utils::$plugin_slug . '-admin.min.js',
				$script_meta['dependencies'],
				\HungryFlamingo\WpAffiliateLinks\Utils::$plugin_version . '.' . $script_meta['version'],
				true
			);

			wp_localize_script(
				\HungryFlamingo\WpAffiliateLinks\Utils::$plugin_slug . '-admin',
				'wpEnv',
				array(
					'_wp_ajax_url'     => esc_url_raw( admin_url( 'admin-ajax.php' ) ),
					'_wp_rest_url'     => esc_url_raw( rest_url() ),
					'_wpnonce'         => esc_attr( wp_create_nonce( \HungryFlamingo\WpAffiliateLinks\Utils::$plugin_slug . '-nonce' ) ),
					'_wp_rest_nonce'   => esc_attr( wp_create_nonce( 'wp_rest' ) ),
					'_wp_http_referer' => esc_url( wp_get_referer() ),
					'plugin_slug'      => esc_attr( \HungryFlamingo\WpAffiliateLinks\Utils::$plugin_slug ),
					'admin_page'       => esc_attr( $plugin_page ),
					'baseurl'          => esc_url( get_bloginfo( 'wpurl' ) ),
					'basepath'         => esc_url( parse_url( get_bloginfo( 'wpurl' ), PHP_URL_PATH ) ),
					'public_path'      => esc_url( \HungryFlamingo\WpAffiliateLinks\Utils::$plugin_url . '/assets/admin/build/' ),
				)
			);
		}
	}
}

