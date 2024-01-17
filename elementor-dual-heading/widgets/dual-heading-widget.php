<?php

use Elementor\Utils;
use Elementor\Repeater;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Image_Size;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Dual_Heading extends Widget_Base {

    public function get_name() {
        return 'DualHeading';
    }

    public function get_title() {
        return esc_html__('Dual Heading', 'elementor-dual-heading');
    }

    public function get_icon() {
        return 'eicon-heading';
    }

    public function get_categories() {
        return ['basic', 'dualheading'];
    }

    public function get_keywords() {
        return ['dual', 'heading'];
    }



    protected function register_controls() {

        $this->register_content_controls();
        $this->register_style_controls();
    }

    function register_content_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'elementor-dual-heading'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ],
        );
        $this->add_control(
            'heading_one',
            [
                'label' => esc_html__('Dual Heading One', 'elementor-dual-heading'),
                'type' => Controls_Manager::TEXT,
                'input' => 'text',
                'placeholder' => esc_html__('Heading One', 'elementor-dual-heading'),
                'default' => esc_html__('Quick Brown Fox', 'elementor=dual-heading'),
            ],
        );
        $this->add_control(
            'heading_two',
            [
                'label' => esc_html__('Dual Heading Two', 'elementor-dual-heading'),
                'type' => Controls_Manager::TEXT,
                'input' => 'text',
                'placeholder' => esc_html__('Heading Two', 'elementor-dual-heading'),
                'default' => esc_html__('Jumo Over The Lazy Dogs', 'elementor-dual-heading'),
            ],
        );
        $this->end_controls_section();
    }

    function register_style_controls() {

        $this->start_controls_section(
            'style_one_section',
            [
                'label' => esc_html__('Heading One Style', 'elemntor-dual-heading'),
                'tab' => Controls_Manager::TAB_STYLE,
            ],
        );
        $this->add_control(
            'heading_one_color',
            [
                'label' => esc_html__('Heading One Color', 'elementor-dual-heading'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .heading-one' => 'color: {{VALUE}}',
                ],
            ],
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'heading_one_typography',
                'label' => esc_html__('Typography One', 'elememtor-dual-heading'),
                'selectors' => '{{WRAPPER}} .heading-one',
            ],
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'style_two_section',
            [
                'label' => esc_html__('Heading Two Style', 'elemntor-dual-heading'),
                'tab' => Controls_Manager::TAB_STYLE,
            ],
        );
        $this->add_control(
            'heading_two_color',
            [
                'label' => esc_html__('Heading Two Color', 'elementor-dual-heading'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .heading-two' => 'color: {{VALUE}}',
                ],
            ],
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'heading_two_typography',
                'label' => esc_html__('Typography Two', 'elememtor-dual-heading'),
                'selectors' => '{{WRAPPER}} .heading-two',
            ],
        );
        $this->end_controls_section();
    }

    protected function render() {
        $headingone = $this->get_settings('heading_one');
        $headingtwo = $this->get_settings('heading_two');

        $this->add_inline_editing_attributes('heading_one', 'basic');
        $this->add_inline_editing_attributes('heading_two', 'advanced');

        $this->add_render_attribute('heading_one', [
            'class' => "heading-one",
        ]);
        $this->add_render_attribute('heading_two', [
            'class' => "heading-two",
        ]);

?>
        <h1>
            <span <?php echo $this->get_render_attribute_string('heading_one'); ?>>
                <?php echo esc_html__($headingone, 'elememtor-dual-heading'); ?>
            </span>
            <span <?php echo $this->get_render_attribute_string('heading_two'); ?>>
                <?php echo esc_html__($headingtwo, 'elememtor-dual-heading'); ?>
            </span>
        </h1>

<?php
    }
}
