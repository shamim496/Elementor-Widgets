<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;


if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Protected_Content extends Widget_Base {

    public function get_name() {
        return 'ProtectedContent';
    }

    public function get_title() {
        return esc_html__('Protected Content', 'elementor-protected-content');
    }

    public function get_icon() {
        return 'eicon-heading';
    }

    public function get_categories() {
        return ['basic'];
    }

    public function get_keywords() {
        return ['protected', 'content'];
    }



    protected function register_controls() {


    }
}
