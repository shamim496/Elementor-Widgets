<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;


class Elementor_Timer_Widget extends Widget_Base {
    public function get_name() {
        return 'TimerWidget';
    }

    public function get_title() {
        return __('Timer Widget', 'timerelement');
    }

    public function get_icon() {
        return 'eicon-clock';
    }

    public function get_categories() {
        return ['timer', 'basic'];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'timerelement'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'display_type',
            [
                'label' => esc_html__('Display Type', 'timerelement'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'clock' => esc_html__('Clock', 'timerelement'),
                    'timerc' => esc_html__('Time Countdown', 'timerelement'),
                    'gerenic' => esc_html__('Normal Countdown', 'timerelement'),
                ],
                'default' => 'Clock',

            ],
        );
        $this->add_control(
            'clock_format',
            [
                'label' => esc_html__('Clock Format', 'timerelement'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '12' => esc_html__('12 Hours', 'timerelement'),
                    '24' => esc_html__('24 Hours', 'timerelement'),
                ],
                'default' => '12',
                'condition' => [
                    'display_type' => 'clock',
                ],
            ],
        );
        $this->add_control(
            'generic_countdown',
            [
                'label' => esc_html__('CountDown From', 'timerelement'),
                'type' => Controls_Manager::NUMBER,
                'condition' => [
                    'display_type' => 'gerenic',
                ],
                'label_block' => false,
            ],
        );
        $this->add_control(
            'decrement',
            [
                'label' => esc_html__('Decrement By (Millseconds)', 'timerelement'),
                'type' => Controls_Manager::NUMBER,
                'condition' => [
                    'display_type' => 'gerenic',
                ],
                'label_block' => true,
                'default' => 1000,
            ],
        );
        // $this->add_control(
        //     'increment',
        //     [
        //         'label' => esc_html__('Increment (Millseconds)', 'timerelement'),
        //         'type' => Controls_Manager::NUMBER,
        //         'condition' => [
        //             'display_type' => 'timerc',
        //         ],
        //         'label_block' => true,
        //         'default' => 1000,
        //     ],
        // );

        $this->end_controls_section();
    }

    protected function render() {

        $display_type = $this->get_settings('display_type');
        $clock_format = $this->get_settings('clock_format');
        $countdown = $this->get_settings('generic_countdown');
        $decrementmills = $this->get_settings('decrement');
        $incrementmills = $this->get_settings('increment');

        ?>
            <div class="clock"
                data-display-type="<?php echo $display_type ?>"
                data-clock-format="<?php echo $clock_format ?>"
                data-countdown="<?php echo $countdown ?>"
                data-decrement="<?php echo $decrementmills ?>"
                data-increment="<?php echo $incrementmills ?>"
            ></div>
        <?php
    }

    /*protected function _content_template() {

	}*/
}
