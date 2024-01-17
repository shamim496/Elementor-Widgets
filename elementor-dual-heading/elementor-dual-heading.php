<?php
/*
Plugin Name: Elementor Dual Heading
Plugin URI: https://shamim.netlify.app
Description: Elementor Demo Dual Heading
Version: 1.0
Author: Shamim
Author URI: https://shamim.netlify.app
License: GPLv2 or later
Text Domain: elementor-dual-heading
Domain Path: /languages/
*/


namespace DualHeadingExtension;

// use Dual_Heading;


if (!defined('ABSPATH')) {
    die(__("Direct Access is not allowed", 'elementor-dual-heading'));
}

final class DualHeadingExtension {

    const VERSION = "1.0.0";
    const MINIMUM_ELEMENTOR_VERSION = "2.0.0";
    const MINIMUM_PHP_VERSION = "7.0";

    private static $_instance = null;

    public static function instance() {

        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    public function __construct() {
        add_action('plugins_loaded', [$this, 'init']);
    }

    public function admin_notice_minimum_php_version() {
        if (isset($_GET['activate'])) {
            unset($_GET['activate']);
        }

        $message = sprintf(
            /* translators: 1: Plugin name 2: PHP 3: Required PHP version */
            esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'elementor-dual-heading'),
            '<strong>' . esc_html__('Dual Heading', 'elementor-dual-heading') . '</strong>',
            '<strong>' . esc_html__('PHP', 'elementor-dual-heading') . '</strong>',
            self::MINIMUM_PHP_VERSION
        );

        printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
    }

    public function admin_notice_minimum_elementor_version() {
        if (isset($_GET['activate'])) {
            unset($_GET['activate']);
        }

        $message = sprintf(
            /* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
            esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'elementor-dual-heading'),
            '<strong>' . esc_html__('Dual Heading', 'elementor-dual-heading') . '</strong>',
            '<strong>' . esc_html__('Elementor', 'elementor-dual-heading') . '</strong>',
            self::MINIMUM_ELEMENTOR_VERSION
        );

        printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
    }

    public function admin_notice_missing_main_plugin() {
        if (isset($_GET['activate'])) {
            unset($_GET['activate']);
        }

        $message = sprintf(
            /* translators: 1: Plugin name 2: Elementor */
            esc_html__('"%1$s" requires "%2$s" to be installed and activated.', 'elementor-dual-heading'),
            '<strong>' . esc_html__('Dual Heading', 'elementor-dual-heading') . '</strong>',
            '<strong>' . esc_html__('Elementor', 'elementor-dual-heading') . '</strong>'
        );

        printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
    }

    public function init() {
        load_plugin_textdomain('elementor-dual-heading', false, dirname(__FILE__) . "/languages");

        // Check if Elementor installed and activated
        if (!did_action('elementor/loaded')) {
            add_action('admin_notices', [$this, 'admin_notice_missing_main_plugin']);

            return;
        }

        // Check for required Elementor version
        if (!version_compare(ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=')) {
            add_action('admin_notices', [$this, 'admin_notice_minimum_elementor_version']);

            return;
        }

        // Check for required PHP version
        if (version_compare(PHP_VERSION, self::MINIMUM_PHP_VERSION, '<')) {
            add_action('admin_notices', [$this, 'admin_notice_minimum_php_version']);

            return;
        }

        add_action('elementor/widgets/widgets_registered', [$this, 'init_widgets']);

        add_action('elementor/elements/categories_registered', [$this, 'register_new_category']);

        add_action('elementor/frontend/after_enqueue_styles', [$this, 'frontend_assets_styles']);

        add_action('elementor/frontend/after_enqueue_scripts', [$this, 'frontend_assets_scripts']);
    }

    function frontend_assets_scripts() {

    }



    function frontend_assets_styles() {

    }


    public function register_new_category($manager) {
        $manager->add_category('dualheading', [
            'title' => __('Dual Heading', 'elementor-dual-heading'),
            'icon'  => 'eicon-pojome'
        ]);
    }

    public function init_widgets($widgets_manager) {
        require_once(__DIR__ . "/widgets/dual-heading-widget.php");

        $widgets_manager->register(new \Dual_Heading());
    }

    public function includes() {
    }
}

DualHeadingExtension::instance();
