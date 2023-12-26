<?php

use Elementor\Utils;
use Elementor\Repeater;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Progress_Bar extends Widget_Base {

    public function get_name() {
        return 'ProgreesBar';
    }

    public function get_title() {
        return esc_html__('Progrees Bar', 'elementor-test-plugins');
    }

    public function get_icon() {
        return 'eicon-spinner';
    }

    public function get_categories() {
        return ['basic', 'testcategory'];
    }

    public function get_keywords() {
        return ['progrees', 'bar'];
    }



    protected function register_controls() {

        $this->start_controls_section(
            'progrees_bar',
            [
                'label' => esc_html__('Content', 'elementor-test-plugins'),
            ]
        );
        $this->add_control(
            'bar_color',
            [
                'label' => esc_html__('Content', 'elementor-test-plugins'),
                'type' => Controls_Manager::COLOR,
                'default' => '#222222',
            ],
        );
        $this->add_control(
            'bar_fill',
            [
                'label' => esc_html__('Fill Bar (%)', 'elementor-test-plugins'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['%'],
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 50,
                ],
            ]
        );
        $this->add_control(
            'bar_height',
            [
                'label' => esc_html__('Fill Height Px', 'elementor-test-plugins'),
                'type' => Controls_Manager::TEXT,
                'default' => '10px',
            ],
        );
    }

    protected function render() {

        $settings = $this->get_settings_for_display();
        $color = $this->get_settings('bar_color');
        $fill = $this->get_settings('bar_fill');
        $height = $this->get_settings('bar_height');
?>

        <div class="progress" data-bar_color="<?php echo $color; ?>" data-bar_fill="<?php echo $fill['size']; ?>" data-bar_height="<?php echo $height; ?>">
        </div>
<?php
    }
}
