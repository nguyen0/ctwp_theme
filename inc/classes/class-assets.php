<?php

/**
 * Enqueue theme assets
 *
 * @package Ctwp
 */

namespace CTWP_THEME\Inc;

use CTWP_THEME\Inc\Traits\Singleton;

class Assets
{
	use Singleton;

	protected function __construct()
	{

		// load class.
		$this->setup_hooks();
	}

	protected function setup_hooks()
	{

		/**
		 * Actions.
		 */
		add_action('wp_enqueue_scripts', [$this, 'register_styles']);
		add_action('wp_enqueue_scripts', [$this, 'register_scripts']);
	}

	public function register_styles()
	{
		wp_enqueue_style('ctwp-first-screen', CTWP_BUILD_CSS_URI . '/first.css', array(), '1.0.0', 'all');
		wp_enqueue_style('ctwp-main', CTWP_BUILD_CSS_URI . '/main.min.css', array(), '1.0.0', 'all');
		wp_enqueue_style('ctwp-font-roboto', 'https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
	}

	public function register_scripts()
	{
		if (file_exists(CTWP_BUILD_JS_DIR_PATH . '/vendor.min.js')) {
			wp_enqueue_script('ctwp-vendor', CTWP_BUILD_JS_URI . '/vendor.min.js', array(), '1.0.0', false);
		}
		if (file_exists(CTWP_BUILD_JS_DIR_PATH . '/custom.min.js')) {
			wp_enqueue_script('ctwp-custom', CTWP_BUILD_JS_URI . '/custom.min.js', array(), '1.0.0', false);
		}
	}
}
