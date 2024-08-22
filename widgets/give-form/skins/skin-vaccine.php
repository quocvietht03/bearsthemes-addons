<?php
namespace BearsthemesAddons\Widgets\Give_Form\Skins;

use Elementor\Widget_Base;
use Elementor\Skin_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Skin_Vaccine extends Skin_Base {

	protected function _register_controls_actions() {
		add_action( 'elementor/element/be-give-form/section_layout/before_section_end', [ $this, 'register_layout_section_controls' ] );
		add_action( 'elementor/element/be-give-form/section_design_layout/after_section_end', [ $this, 'register_design_box_section_controls' ] );
		add_action( 'elementor/element/be-give-form/section_design_layout/after_section_end', [ $this, 'register_design_content_section_controls' ] );

	}

	public function get_id() {
		return 'skin-vaccine';
	}


	public function get_title() {
		return __( 'Vaccine', 'bearsthemes-addons' );
	}


	public function register_layout_section_controls( Widget_Base $widget ) {
		$this->parent = $widget;

		$this->parent->start_injection( [
			'at' => 'before',
			'of' => 'form_id',
		] );

    $this->add_control(
			'header_sub_title',
			[
				'label' => __( 'Sub Title', 'bearsthemes-addons' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( 'Give your sharing', 'bearsthemes-addons' ),
			]
		);

		$this->add_control(
			'header_title',
			[
				'label' => __( 'Title', 'bearsthemes-addons' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Donation for vaccine', 'bearsthemes-addons' ),
			]
		);

		$this->parent->end_injection();

	}

	public function register_design_box_section_controls( Widget_Base $widget ) {
		$this->parent = $widget;

		$this->start_controls_section(
			'section_design_box',
			[
				'label' => __( 'Box', 'bearsthemes-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'box_border_width',
			[
				'label' => __( 'Border Width', 'bearsthemes-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-give-form' => 'border-style: solid; border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);

		$this->add_control(
			'box_border_radius',
			[
				'label' => __( 'Border Radius', 'bearsthemes-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-give-form' => 'border-radius: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_responsive_control(
			'box_padding',
			[
				'label' => __( 'Padding', 'bearsthemes-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-give-form' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);

		$this->add_control(
			'box_bg_color',
			[
				'label' => __( 'Background Color', 'bearsthemes-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-give-form' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'box_border_color',
			[
				'label' => __( 'Border Color', 'bearsthemes-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-give-form' => 'border-color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();
	}

	public function register_design_content_section_controls( Widget_Base $widget ) {
		$this->parent = $widget;

		$this->start_controls_section(
			'section_design_content',
			[
				'label' => __( 'Content', 'bearsthemes-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

    $this->add_control(
			'heading_header_sub_title_style',
			[
				'label' => __( 'Sub Title', 'bearsthemes-addons' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'sub_title_color',
			[
				'label' => __( 'Color', 'bearsthemes-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementor-gf-header__sub-title' => 'color: {{VALUE}};',
				],
			]
		);

    $this->add_control(
			'sub_title_bg_color',
			[
				'label' => __( 'Background Color', 'bearsthemes-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementor-gf-header__sub-title' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'header_sub_title_typography',
				'label' => __( 'Typography', 'bearsthemes-addons' ),
				'default' => '',
				'selector' => '{{WRAPPER}} .elementor-gf-header__sub-title',
			]
		);

		$this->add_control(
			'heading_header_title_style',
			[
				'label' => __( 'Title', 'bearsthemes-addons' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'header_title_color',
			[
				'label' => __( 'Color', 'bearsthemes-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementor-gf-header__title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'header_title_typography',
				'label' => __( 'Typography', 'bearsthemes-addons' ),
				'default' => '',
				'selector' => '{{WRAPPER}} .elementor-gf-header__title',
			]
		);

		$this->add_control(
			'heading_form_style',
			[
				'label' => __( 'Give Form', 'bearsthemes-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'form_main_color',
			[
				'label' => __( 'Main Color', 'bearsthemes-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'.give-form[data-style="elementor-give-form--vaccine"] #give-donation-level-button-wrap .give-btn:not(.give-default-level):hover,
 					 .give-form[data-style="elementor-give-form--vaccine"] #give-gateway-radio-list > li label:hover,
 					 .give-form[data-style="elementor-give-form--vaccine"] #give-gateway-radio-list > li.give-gateway-option-selected label,
 					 .give-form[data-style="elementor-give-form--vaccine"] #give_terms_agreement label:hover,
 					 .give-form[data-style="elementor-give-form--vaccine"] #give_terms_agreement input[type=checkbox]:checked + label,
 					 .give-form[data-style="elementor-give-form--vaccine"] .give_terms_links:hover,
 					 .give-form[data-style="elementor-give-form--vaccine"] #give-final-total-wrap .give-final-total-amount' => 'color: {{VALUE}};',
 					'.give-form[data-style="elementor-give-form--vaccine"] #give-gateway-radio-list > li.give-gateway-option-selected label:after,
 					 .give-form[data-style="elementor-give-form--vaccine"] #give_terms_agreement input[type=checkbox]:checked + label:before,
 					 .give-form[data-style="elementor-give-form--vaccine"] #give-final-total-wrap .give-donation-total-label,
 					 .give-form[data-style="elementor-give-form--vaccine"] .give-submit' => 'background-color: {{VALUE}};',
 					'.give-form[data-style="elementor-give-form--vaccine"] #give_terms_agreement input[type=checkbox]:checked + label:before' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'form_main_color_hover',
			[
				'label' => __( 'Main Color Hover', 'bearsthemes-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'.give-form[data-style="elementor-give-form--vaccine"] .give-submit:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'form_typography',
				'label' => __( 'Typography', 'bearsthemes-addons' ),
				'default' => '',
				'selector' => '{{WRAPPER}} form[id*=give-form],
											 {{WRAPPER}} form[id*=give-form] #give-donation-level-button-wrap .give-btn,
											 .give-form[data-style="elementor-give-form--vaccine"]',
			]
		);

		$this->end_controls_section();
	}

	public function render() {
		$settings = $this->parent->get_settings_for_display();

		$this->parent->render_loop_header();

		?>
		<div class="elementor-gf-header">
			<?php
        if( $this->parent->get_instance_value_skin('header_sub_title') ) {
          echo '<div class="elementor-gf-header__sub-title">' . $this->parent->get_instance_value_skin('header_sub_title') . '</div>';
        }

				if( $this->parent->get_instance_value_skin('header_title') ) {
					echo '<h2 class="elementor-gf-header__title">' . $this->parent->get_instance_value_skin('header_title') . '</h2>';
				}
			?>
		</div>

			<div class="elementor-gf-form">

				<?php
					if( !empty( $settings['form_id'] ) ) {
						// Maybe display the form donate button.
						$atts = array(
							'id' => $settings['form_id'],  // integer.
							'show_title' => false, // boolean.
							'show_goal' => false, // boolean.
							'show_content' => 'none', //above, below, or none
							'display_style' => 'modal', //modal, button, and reveal
							'continue_button_title' => '' //string

						);

						add_filter('give_form_html_tags', function($form_html_tags, $form) {
							$form_html_tags['data-style'] = 'elementor-give-form--vaccine';

							return $form_html_tags;
						}, 10, 2);

						echo give_get_donation_form( $atts );
					}
				?>

			</div>

		<?php

		$this->parent->render_loop_footer();

	}

	protected function content_template() {

	}

}