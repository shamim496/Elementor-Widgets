<?php

use Elementor\Utils;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Image_Size;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Test_Plugins extends Widget_Base {

    public function get_name() {
        return 'test_plugin';
    }

    public function get_title() {
        return esc_html__('Test Widget', 'element-test-plugins');
    }

    public function get_icon() {
        return 'eicon-apps';
    }

    public function get_categories() {
        return ('basic');
    }

    public function get_keywords() {
        return ['qr', 'code'];
    }


    protected function register_controls() {
        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__('Content', 'element-test-plugins'),
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'element-test-plugins'),
                'type' => Controls_Manager::TEXT,
                'placeholder' => esc_html__('Type your title here', 'element-test-plugins'),
            ]
        );
        $this->add_control(
            'heading_description',
            [
                'label' => esc_html__('Type Description', 'element-test-plugins'),
                'type' => Controls_Manager::TEXTAREA,
                'placeholder' => esc_html__('Type Your Description', 'element-test-plugins'),
            ]
        );
        $this->add_control(
            'item_description',
            [
                'label' => esc_html__('Description', 'element-test-plugins'),
                'type' => Controls_Manager::WYSIWYG,
                'placeholder' => esc_html__('Type your description here', 'element-test-plugins'),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section',
            [
                'label' => esc_html__('Position', 'element-test-plugins'),
            ]
        );
        $this->add_control(
            'heading_alignment',
            [
                'label' => esc_html__('Heading Alignment', 'element-test-plugins'),
                'type' => Controls_Manager::SELECT,
                'default' => 'left',
                'options' => [
                    'left' => esc_html__('Left', 'element-test-plugins'),
                    'right'  => esc_html__('Right', 'element-test-plugins'),
                    'center' => esc_html__('Center', 'element-test-plugins'),
                ],
                'selectors' => [
                    '{{WRAPPER}} h2' => 'text-align: {{VALUE}}'
                ],
            ],
        );
        $this->add_control(
            'description_alignment',
            [
                'label' => esc_html__('Description Alignment', 'element-test-plugins'),
                'type' => Controls_Manager::SELECT,
                'default' => 'left',
                'options' => [
                    'left' => esc_html__('Left', 'element-test-plugins'),
                    'right'  => esc_html__('Right', 'element-test-plugins'),
                    'center' => esc_html__('Center', 'element-test-plugins'),
                ],
                'selectors' => [
                    '{{WRAPPER}} p' => 'text-align: {{VALUE}}'
                ],
            ],
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'Section_color',
            [
                'label' => esc_html__('Color', 'element-test-plugins'),
            ],
        );
        $this->add_control(
            'heading_color',
            [
                'label' => esc_html__('Heading Color', 'element-test-plugins'),
                'type' => Controls_Manager::COLOR,
                'default' => '#224400',
                'selectors' => [
                    '{{WRAPPER}} .bdt-text' => 'color: {{VALUE}}',
                ],
            ],
        );
        $this->add_control(
            'description_color',
            [
                'label' => esc_html__('DescriptionColor', 'element-test-plugins'),
                'type' => Controls_Manager::COLOR,
                'default' => '#224400',
                'selectors' => [
                    '{{WRAPPER}} .decription' => 'color: {{VALUE}}',
                ],
            ],
        );
        $this->add_control(
            'P1 Color',
            [
                'label' => esc_html__('P1 Color', 'element-test-plugins'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .p1' => 'color: {{VALUE}}',
                ],
            ],
        );
        $this->add_Control(
            'P2 Color',
            [
                'label' => esc_html__('P2 Color', 'element-test-plugins'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .p2' => 'color: {{VALUE}}',
                ],
            ],
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'image_section',
            [
                'label' => esc_html__('Image', 'element-test-plugins'),
            ],
        );
        $this->add_control(
            'image',
            [
                'label' => esc_html__('Image', 'element-test-plugins'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ],
        );
        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'default' => 'medium',
                'name' => 'imagesize',
            ],
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'demo_section',
            [
                'label' => esc_html__('Control Demo', 'element-test-plugins'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ],
        );
        $this->add_control(
            'demo_selected2',
            [
                'label' => esc_html__('Demo Selected 2', 'element-test-plugins'),
                'type' => Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple' => true,
                'options' => [
                    'BD' => esc_html__('Bangladesh', 'element-test-plugins'),
                    'IN' => esc_html__('India', 'element-test-plugins'),
                    'CN' => esc_html__('China', 'element-test-plugins'),
                    'AU' => esc_html__('Australia', 'element-test-plugins'),
                    'DN' => esc_html__('Denmark', 'element-test-plugins'),
                ],
            ],
        );
        $this->add_control(
            'demo_choose',
            [
                'label' => esc_html__('Demo Choose', 'element-test-plugins'),
                'type' => Controls_Manager::CHOOSE,
                'default' => 'center',
                'toggle' => 'true',
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'element-test-plugins'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'element-test-plugins'),
                        'icon' => 'eicon-h-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'element-test-plugins'),
                        'icon' => 'eicon-h-align-right',
                    ],
                    'justify' => [
                        'title' => esc_html__('Justify', 'element-test-plugins'),
                        'icon' => 'eicon-h-align-justify',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .your_class' => 'text-align: {{VALUE}};',
                ],
            ],
        );
        $this->add_control(
            'demo_dimension',
            [
                'label' => esc_html__('Dimension', 'element-test-plugins'),
                'type' => Controls_Manager::IMAGE_DIMENSIONS,
            ],
        );
        $this->add_control(
            'gallery',
            [
                'label' => esc_html__('Gallery Control', 'element-test-plugins'),
                'type' => Controls_Manager::GALLERY,
            ],
        );
        $this->add_control(
            'demo_icon',
            [
                'label' => esc_html__('Icon', 'element-test-plugins'),
                'type' => Controls_Manager::ICON,
                'label_block' => 'true',
                'default' => 'eicon-facebook',
                'include' => [
                    'eicon-facebook',
                    'eicon-twitter',
                ],
            ],
        );
        $this->add_control(
            'demo_popover',
            [
                'label' => esc_html__('Pop Over', 'element-test-plugins'),
                'type' => Controls_Manager::POPOVER_TOGGLE,
            ],
        );
        $this->start_popover();
        $this->add_control(
            'demo_font',
            [
                'label' => esc_html__('Font', 'element-test-plugins'),
                'type' => Controls_Manager::FONT,
                'default' => "'Open Sans', 'sans-serif'",
                'selectors' => [
                    '{{WRAPPER}} .p1' => 'font-family: {{VALUE}}',
                ],
            ],
        );
        $this->add_control(
            'demo_font2',
            [
                'label' => esc_html__('Font 2', 'element-test-plugins'),
                'type' => Controls_Manager::FONT,
                'default' => "'Open Sans', 'sans-serif'",
                'selectors' => [
                    '{{WRAPPER}} .p2' => 'font-family: {{VALUE}}',
                ],
            ],
        );
        $this->end_popover();

        $this->add_control(
            'demo_slider',
            [
                'label' => esc_html__('Demo Slider', 'element-test-plugins'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 120,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 200,
                        'step' => 10,
                    ],
                ],
                'default' => [
                    'units' => 'px',
                    'size' => 50,
                ],
                'selectors' => [
                    '{{WRAPPER}} .p1' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ],
        );
        $this->add_control(
            'demo_slider2',
            [
                'label' => esc_html__('Slider', 'element-test-plugins'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'rem'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 150,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 200,
                        'step' => 10,
                    ],
                    'rem' => [
                        'min' => 0,
                        'max' => 200,
                        'step' => 10,
                    ],
                ],
                'default' => [
                    'units' => 'px',
                    'size' => 20,
                ],
                'selectors' => [
                    '{{WRAPPER}} .p2' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ],
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Typography P1', 'element-test-plugins'),
                'name' => 'demo_typegrophy',
                'selector' => '{{WRAPPER}} .p1',
                // 'selectors' => ['{{WRAPPER}} .p1', '{{WRAPPER}} .p2'],
            ],

        );
        $this->add_group_Control(
            Group_Control_Typography::get_type(),
            [
                'label' => esc_html__('Typography P2', 'element-test-plugins'),
                'name' => 'P2_typography',
                'selector' => '{{WRAPPER}} .p2',

            ],
        );
        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'label' => esc_html__('Text Shadow', 'element-test-plugins'),
                'name' => 'demo_text_shadow',
                'selector' => '{{WRAPPER}} .p1',
            ],
        );
        $this->add_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'label' => esc_html__('Text Shadow', 'element-test-plugins'),
                'name' => 'demo_text_shadow',
                'selector' => '{{WRAPPER}} .p2',
            ],
        );
        $this->end_controls_section();
    }

    protected function render() {

        $settings = $this->get_settings_for_display();

        $text = $settings['title'];
        $des = $settings['heading_description'];
        $sin = $settings['item_description'];
        $country = $settings['demo_selected2'];
        $choose = $settings['demo_choose'];
        $dimension = $settings['demo_dimension'];
        // print_r($dimension);
        $gallery_images = $settings['gallery'];


        if ($country); {
            echo '<ul';
            foreach ($country as $item) {
                echo '<li>' . $item . '</li>';
            }
            echo '</ul>';
        }

        $this->add_inline_editing_attributes('title', 'basic');
        $this->add_inline_editing_attributes('heading_description', 'advanced');
        $this->add_inline_editing_attributes('item_description', 'none');

        $this->add_render_attribute('title', [
            'class' => "bdt-text"
        ]);
        $this->add_render_attribute('heading_description', [
            'class' => "decription"
        ]);
        $this->add_render_attribute('item_description', [
            'class' => "item"
        ]);


?>
        <h2 <?php echo $this->get_render_attribute_string('title'); ?>>
            <?php echo esc_html($text); ?>
        </h2>
        <p <?php echo $this->get_render_attribute_string('heading_description'); ?>>
            <?php echo wp_kses_post($des); ?>
        </p>
        <div <?php echo $this->get_render_attribute_string('item_description'); ?>>
            <?php echo esc_html($sin); ?>
        </div>
        <!--echo wp_get_attachment_image($settings['image'] ['id'],'medium'); -->
        <?php echo Group_Control_Image_Size::get_attachment_image_html($settings, 'imagesize', 'image'); ?>

        <div class="your_class">

        </div>

        <div>
            <pre>
                <?php
                foreach ($gallery_images as $images) {
                    echo wp_get_attachment_image($images['id'], 'thumbnail');
                }
                ?>
            </pre>
        </div>


        <i class="<?php echo esc_attr($settings['demo_icon']); ?>" aria-hidden="true"></i>

        <div>
            <p class="p1">
                Elementor choose control displays radio buttons styled as groups of buttons with icons for each option.
            </p>
            <p class="p2">
                function is useful if all you want to do is open up a file and read its contents.
            </p>
        </div>



    <?php

    }

    protected function __content_template() {
    ?>

        <!-- <#
        view.addInlineEditingAttributes('title', 'basic' );
        view.addRenderAttribute('title',{'class':'bdt-text'});
        view.addInlineEditingAttributes('heading_description', 'basic' );
        view.addRenderAttribute('heading_description',{'class':'decription' });

        #>

            <h2 {{{ view.getRenderAttributeString('title') }}}>
                {{{settings.title}}}
            </h2>
            <p {{{ view.getRenderAttributeString('heading_description') }}}>
                {{{settings.heading_description}}}
            </p>
            <div class="item">
                {{{settings.item_description}}}
            </div> -->

        <!-- width: {{{settings.demo_dimension.width}}}
            height: {{{settings.demo_dimension.height}}} -->


<?php
    }
}
