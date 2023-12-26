<?php
/*
 * Plugin Name: Elementor Test Plugins
 * Plugin URI: https://shamim.netlify.app
 * Description: Elementor Demo Plugin
 * Version: 1.0.0
 * Author: Shamim
 * Author URI: https://shamim.netlify.app
 * License: GPLv3
 * Text Domain: elementor-test-plugins
 * Domain Path: /languages/
 */

namespace Elementor;

use Test_Plugins;
use Price_List;
use Progress_Bar;
use Info_Box;



if (!defined('ABSPATH')) {
   exit(__('Direct Access is not allowed', 'elementor-test-plugins'));
}

final class ElementTest {

   const VERSION                   = '1.0.0';
   const MINIMUM_ELEMENTOR_VERSION = '3.0.0';
   const MINIMUM_PHP_VERSION       = '7.0';

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
         /* translators: 1: Elementor Demo 2: PHP 3: Required PHP version */
         esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'elementor-test-plugins'),
         '<strong>' . esc_html__('Elementor Test Plugin', 'elementor-test-plugins') . '</strong>',
         '<strong>' . esc_html__('PHP', 'elementor-test-plugins') . '</strong>',
         self::MINIMUM_PHP_VERSION
      );
      printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
   }

   public function admin_notice_minimum_elementor_version() {

      if (isset($_GET['activate'])) {
         unset($_GET['activate']);
      }

      $message = sprintf(
         /* translators: 1: Elementor Demo 2: Elementor 3: Required Elementor version */
         esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'elementor-test-plugins'),
         '<strong>' . esc_html__('Elementor Test Plugin', 'elementor-test-plugins') . '</strong>',
         '<strong>' . esc_html__('Elementor', 'elementor-test-plugins') . '</strong>',
         self::MINIMUM_ELEMENTOR_VERSION
      );
      printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
   }

   public function admin_notice_missing_main_plugin() {

      if (isset($_GET['activate'])) {
         unset($_GET['activate']);
      }

      $message = sprintf(
         /* translators: 1: Elementor Demo 2: Elementor */
         esc_html__('"%1$s" requires "%2$s" to be installed and activated.', 'elementor-test-plugins'),
         '<strong>' . esc_html__('Elementor Test Plugin', 'elementor-test-plugins') . '</strong>',
         '<strong>' . esc_html__('Elementor', 'elementor-test-plugins') . '</strong>'
      );
      printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
   }

   public function init() {
      load_plugin_textdomain('elementor-test-plugins', false, plugin_dir_path(__FILE__) . '/languages');

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

      // Register Widget
      add_action('elementor/widgets/register', [$this, 'init_widgets']);

      add_action('elementor/elements/categories_registered', [$this, 'register_new_category']);

      add_action('elementor/frontend/after_enqueue_styles', [$this, 'widget_styles']);

      add_action('elementor/editor/after_enqueue_scripts', [$this, 'pricing_script']);

      add_action('elementor/frontend/after_enqueue_scripts', [$this, 'prograssbar_script']);
   }

   /**
    * !Register Categories
    */
   public function register_new_category($elements_manager) {
      $elements_manager->add_category(
         'testcategory',
         [
            'title' => __('Element Pack', 'elementor-test-plugins'),
            'icon' => 'eicon-parallax',
         ],
      );
   }

   /**
    * !enqueue style
    */
   public function widget_styles() {
      wp_enqueue_style('froala-css', '//cdnjs.cloudflare.com/ajax/libs/froala-design-blocks/2.0.1/css/froala_blocks.min.css');
      wp_enqueue_style('bootstrap', '//cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css');
      wp_enqueue_style('infobox', plugins_url('assets/css/style.css', __FILE__), [], time());
   }

   /**
    *  !enqueue scripts
    */
   public function pricing_script() {
      wp_enqueue_script('pricing-js', plugins_url('/assets/js/pricing.js', __FILE__), array(), time(), true);
   }

   public function prograssbar_script() {
      wp_enqueue_script('progreesbar-js', plugins_url('assets/js/progressbar.min.js', __FILE__), array(), time(), true);
      wp_enqueue_script('progressbar-helper-js', plugins_url('/assets/js/script.js', __FILE__), array(), time(), true);
   }

   /**
    * ! Widgets Init
    */

   public function init_widgets($widgets_manager) {
      require_once __DIR__ . '/widgets/test-widget.php';
      require_once __DIR__ . '/widgets/price-list.php';
      require_once __DIR__ . '/widgets/progress-bar.php';
      require_once __DIR__ . '/widgets/infobox.php';


      $widgets_manager->register(new Test_Plugins());
      $widgets_manager->register(new Price_List());
      $widgets_manager->register(new Progress_Bar());
      $widgets_manager->register(new Info_Box());
   }
}

ElementTest::instance();
