<?php

use Elementor\Utils;
use Elementor\Repeater;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Info_Box extends Widget_Base {

    public function get_name() {
        return 'InfoBox';
    }

    public function get_title() {
        return esc_html__('Info Box', 'elementor-test-plugins');
    }

    public function get_icon() {
        return 'eicon-kit-parts';
    }

    public function get_categories() {
        return ['basic', 'testcategory'];
    }

    public function get_keywords() {
        return ['info', 'box'];
    }



    protected function register_controls() {

        $this->start_controls_section(
            'info_box',
            [
                'label' => esc_html__('Info Box', 'elementor-test-plugins'),
            ]
        );
        $this->add_control(
            'heading',
            [
                'label' => esc_html__('Heading Text', 'elementor-test-plugins'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Features',
            ],
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'image',
            [
                'label' => esc_html__('Feature Image', 'elementor-test-plugins'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ],
        );
        $repeater->add_control(
            'title',
            [
                'label' => esc_html__('Title Text', 'elementor-test-plugins'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Feature', 'elementor-test-plugins')
            ],
        );
        $repeater->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'elemenor-test-plugins'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('This is a simple description', 'elementor-test-plugins')
            ],
        );
        $this->add_control(
            'features',
            [
                'label' => esc_html__('Features', 'elementor-test-plugins'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'label' => esc_html__('Description', 'elementor-test-plugins'),
                        'default' => esc_html__('This is a simple description', 'elementor-test-plugins')
                    ],
                    [
                        'label' => esc_html__('Description', 'elemenor-test-plugins'),
                        'default' => esc_html__('This is a simple description', 'elementor-test-plugins')
                    ],
                    [
                        'label' => esc_html__('Description', 'elemenor-test-plugins'),
                        'default' => esc_html__('This is a simple description', 'elementor-test-plugins')
                    ],
                    [
                        'label' => esc_html__('Description', 'elemenor-test-plugins'),
                        'default' => esc_html__('This is a simple description', 'elementor-test-plugins')
                    ],
                    [
                        'label' => esc_html__('Description', 'elemenor-test-plugins'),
                        'default' => esc_html__('This is a simple description', 'elementor-test-plugins')
                    ],
                    [
                        'label' => esc_html__('Description', 'elemenor-test-plugins'),
                        'default' => esc_html__('This is a simple description', 'elementor-test-plugins')
                    ],
                ],
                'title_field' => '{{{ title }}}',
            ],
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'infoboxcolor',
            [
                'label' => esc_html__('Info Box Color', 'elementor-test-plugins'),
            ],
        );
        $this->add_control(
            'heading_color',
            [
                'label' => esc_html__('Heading Color', 'elementor-test-plugins'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .heading-text' => 'color: {{VALUE}}',
                ]
            ],
        );
        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Title Color', 'elementor-test-plugins'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .title' => 'color: {{VALUE}}',
                ],
            ],
        );
        $this->add_control(
            'description_color',
            [
                'label' => esc_html__('Description Color', 'elementor-test-plugins'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .description' => 'color: {{VALUE}}',
                ],
            ],
        );
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $heading = $this->get_settings('heading');
        $features = $this->get_settings('features');
        // print_r($features);


?>
        <section class="fdb-block">
            <div class="infobox">
                <div class="row text-center infobox">
                    <div class="col-12">
                        <h1 class="heading-text"><?php echo esc_html__($heading, 'elementor-test-plugins'); ?></h1>
                    </div>
                </div>
                <div class="infobox-wrapper">

                    <?php if ($features) :
                        foreach ($features as $key => $feature) {
                    ?>
                            <div class="infobox-item">
                                <img alt="image" class="fdb-icon" src="<?php echo $feature['image']['url']; ?>">
                                <h3><strong class="title"><?php echo $feature['title']; ?></strong></h3>
                                <p class="description"><?php echo $feature['description']; ?></p>
                            </div>
                    <?php
                        }

                    endif; ?>



                </div>
            </div>
        </section>


<?php


    }
}
