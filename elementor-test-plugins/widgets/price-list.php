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

class Price_List extends Widget_Base {

    public function get_name() {
        return 'PriceList';
    }

    public function get_title() {
        return esc_html__('Price List', 'elementor-test-plugins');
    }

    public function get_icon() {
        return 'eicon-parallax';
    }

    public function get_categories() {
        return ['basic', 'testcategory'];
    }

    public function get_keywords() {
        return ['price', 'lsit'];
    }



    protected function register_controls() {

        $this->start_controls_section(
            'price_list',
            [
                'label' => esc_html__('Content', 'elementor-test-plugins'),
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'elementor-test-plugins'),
                'type' => Controls_Manager::TEXT,
            ],
        );
        // $this->add_control(
        //     'style',
        //     [
        //         'label' => esc_html__('Style', 'elementor-test-plugins'),
        //         'type' => Controls_Manager::SELECT,
        //         'default' => 'default',
        //         'options' => [
        //             'default' => esc_html__('Default Style', 'elementor-test-plugins'),
        //             'blue'  => esc_html__('Blue Style', 'elementor-test-plugins'),
        //         ],
        //     ],
        // );
        // $this->add_control(
        //     'select_hidden',
        //     [
        //         'label' => esc_html__('View', 'elementor-test-plugins'),
        //         'type' => Controls_Manager::HIDDEN,
        //         'default' => 'select_hidden',
        //     ],
        // );
        $repeater = new Repeater();

        $repeater->add_control(
            'featured',
            [
                'label' => esc_html__('Featured', 'elementor-test-plugins'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'false',
            ],
        );

        $repeater->add_control(
            'title',
            [
                'label' => esc_html__('Text', 'elementor-test-plugins'),
                'type' => Controls_Manager::TEXT,
            ],
        );
        $repeater->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'elementor-test-plugins'),
                'type' => Controls_Manager::TEXTAREA,
            ],
        );
        // $repeater->add_control(
        //     'style_items',
        //     [
        //         'label' => esc_html__('Style Items', 'elementor-test-plugins'),
        //         'type' => Controls_Manager::TEXTAREA,
        //         'conditions' => [
        //             'terms' => [
        //                 [
        //                     'name' => 'style',
        //                     'operator' => '==',
        //                     'value' => 'blue',
        //                 ],
        //             ],
        //         ],
        //     ],
        // );
        $repeater->add_control(
            'price_number',
            [
                'label' => esc_html__('Price', 'elementor-test-plugins'),
                'type' => Controls_Manager::TEXT,
            ],
        );
        $repeater->add_control(
            'button_title',
            [
                'label' => esc_html__('Button Title', 'elementor-test-plugins'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Buy Now', 'elementor-test-plugins'),
            ],
        );

        $repeater->add_control(
            'button_url',
            [
                'label' => esc_html__('Button Url', 'elementor-test-plugins'),
                'type' => Controls_Manager::URL,
            ],
        );
        $this->add_control(
            'pricings',
            [
                'label' => esc_html__('price Coloums', 'elementor-test-plugins'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ title }}}',
            ],
        );

        $this->end_controls_section();
    }






    protected function render() {

        $settings = $this->get_settings_for_display();
        $heading = $this->get_settings('title');
        $price = $this->get_settings('pricings');

?>
        <section class="fdb-block" style="background-image: url(<?php  ?>);">
            <div class="container">
                <div class="row text-center">
                    <div class="col">
                        <h1 class="text-white"><?php esc_html__($heading); ?></h1>
                    </div>
                </div>
                <div class="row mt-5 align-items-center">
                    <?php

                    if ($price) {
                        foreach ($price as $price_value) {
                            $button_class = $price_value['featured'] ? 'primary' : 'dark';
                    ?>

                            <div class="col-12 col-sm-10 col-md-8 m-auto col-lg-4 text-center">
                                <div class="fdb-box p-4">
                                    <h2><?php echo esc_html__($price_value['title']); ?></h2>
                                    <p class="lead"><?php echo esc_html__($price_value['description'], 'elementor-test-plugins'); ?></p>

                                    <p class="h1 mt-5 mb-5"><?php echo apply_filters('price_fix','$'); ?><?php echo esc_html__($price_value['price_number']); ?></p>

                                    <p><a href="<?php echo esc_url($price_value['button_url']['url']); ?>" class="btn btn-<?php echo esc_attr__($button_class, 'elementor-test-plugins'); ?>"><?php echo esc_html__($price_value['button_title'], 'elementor-test-plugins'); ?></a></p>
                                </div>
                            </div>

                    <?php
                        }
                    }
                    ?>

                </div>
            </div>
        </section>

<?php

    }
}
