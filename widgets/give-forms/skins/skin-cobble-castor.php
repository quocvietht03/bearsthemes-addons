<?php
namespace BearsthemesAddons\Widgets\Give_Forms\Skins;

use Elementor\Widget_Base;
use Elementor\Skin_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Css_Filter;
use Elementor\Group_Control_Typography;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Skin_Cobble_Castor extends Skin_Base {

	protected function _register_controls_actions() {
		add_action( 'elementor/element/be-give-forms/section_layout/before_section_end', [ $this, 'register_layout_controls' ] );
		add_action( 'elementor/element/be-give-forms/section_design_layout/before_section_end', [ $this, 'registerd_design_layout_controls' ] );
    add_action( 'elementor/element/be-give-forms/section_design_layout/after_section_end', [ $this, 'register_design_box_section_controls' ] );
    add_action( 'elementor/element/be-give-forms/section_design_layout/after_section_end', [ $this, 'register_design_image_section_controls' ] );
		add_action( 'elementor/element/be-give-forms/section_design_layout/after_section_end', [ $this, 'register_design_content_section_controls' ] );
		add_action( 'elementor/element/be-give-forms/section_design_layout/after_section_end', [ $this, 'register_design_goal_progress_section_controls' ] );
	}

	public function get_id() {
		return 'skin-cobble-castor';
	}


	public function get_title() {
		return __( 'Cobble Castor', 'bearsthemes-addons' );
	}


	public function register_layout_controls( Widget_Base $widget ) {
		$this->parent = $widget;

		$this->add_control(
			'posts_per_page',
			[
				'label' => __( 'Posts Per Page', 'bearsthemes-addons' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 5,
			]
		);

    $this->add_group_control(
      Group_Control_Image_Size::get_type(),
      [
        'name' => 'thumbnail',
        'default' => 'medium_large',
        'exclude' => [ 'custom' ],
				'condition' => [
					'skin_cobble_castor_show_thumbnail!'=> '',
				],
      ]
    );

    $this->add_responsive_control(
			'image_height',
			[
				'label' => __( 'Image height', 'bearsthemes-addons' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 250,
				],
				'range' => [
					'px' => [
						'min' => 200,
						'max' => 500,
						'step' => 10,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-card__media' => 'min-height: {{SIZE}}{{UNIT}};',
				],
			]
		);

    $this->add_control(
      'show_title',
      [
        'label' => __( 'Title', 'bearsthemes-addons'),
        'type' => Controls_Manager::SWITCHER,
        'label_on' => __( 'Show', 'bearsthemes-addons'),
        'label_off' => __( 'Hide', 'bearsthemes-addons'),
        'default' => 'yes',
        'separator' => 'before',
      ]
    );

    $this->add_control(
      'show_goal_progress',
      [
        'label' => __( 'Goal Progress', 'bearsthemes-addons' ),
        'type' => Controls_Manager::SWITCHER,
        'label_on' => __( 'Show', 'bearsthemes-addons'),
        'label_off' => __( 'Hide', 'bearsthemes-addons'),
        'default' => 'yes',
      ]
    );

    $this->add_control(
			'show_read_more',
			[
				'label' => __( 'Read More', 'bearsthemes-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'bearsthemes-addons' ),
				'label_off' => __( 'Hide', 'bearsthemes-addons' ),
				'default' => 'yes',
			]
		);

	}

	public function registerd_design_layout_controls( Widget_Base $widget ) {
		$this->parent = $widget;

    $this->add_control(
			'column_gap',
			[
				'label' => __( 'Columns Gap', 'bearsthemes-addons' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 30,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}}' => '--grid-column-gap: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_control(
			'row_gap',
			[
				'label' => __( 'Rows Gap', 'bearsthemes-addons' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 35,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}}' => '--grid-row-gap: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_responsive_control(
			'alignment',
			[
				'label' => __( 'Alignment', 'bearsthemes-addons' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'bearsthemes-addons' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'bearsthemes-addons' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'bearsthemes-addons' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-give-form' => 'text-align: {{VALUE}};',
				],
			]
		);

	}

  public function register_design_box_section_controls( Widget_Base $widget) {
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

		$this->add_responsive_control(
			'content_padding',
			[
				'label' => __( 'Content Padding', 'bearsthemes-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .give-card__body' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
				'separator' => 'after',
			]
		);

		$this->start_controls_tabs( 'bg_effects_tabs' );

		$this->start_controls_tab( 'classic_style_normal',
			[
				'label' => __( 'Normal', 'bearsthemes-addons' ),
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'selector' => '{{WRAPPER}} .elementor-give-form',
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

		$this->end_controls_tab();

		$this->start_controls_tab( 'classic_style_hover',
			[
				'label' => __( 'Hover', 'bearsthemes-addons' ),
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow_hover',
				'selector' => '{{WRAPPER}} .elementor-give-form:hover',
			]
		);

		$this->add_control(
			'box_bg_color_hover',
			[
				'label' => __( 'Background Color', 'bearsthemes-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-give-form:hover' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'box_border_color_hover',
			[
				'label' => __( 'Border Color', 'bearsthemes-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-give-form:hover' => 'border-color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

  }

  public function register_design_image_section_controls(Widget_Base $widget) {
    $this->parent = $widget;

    $this->start_controls_section(
			'section_design_image',
			[
				'label' => __( 'Image', 'bearsthemes-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'skin_cobble_castor_show_thumbnail!' => '',
				],
			]
		);

    $this->start_controls_tabs( 'thumbnail_effects_tabs' );

		$this->start_controls_tab( 'normal',
			[
				'label' => __( 'Normal', 'bearsthemes-addons' ),
			]
		);

    $this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name' => 'thumbnail_filters',
				'selector' => '{{WRAPPER}} .give-card__media img',
			]
		);

    $this->end_controls_tab();

		$this->start_controls_tab( 'hover',
			[
				'label' => __( 'Hover', 'bearsthemes-addons' ),
			]
		);

    $this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name' => 'thumbnail_hover_filters',
				'selector' => '{{WRAPPER}} .elementor-give-form:hover .give-card__media img',
			]
		);

    $this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

  }

  public function register_design_content_section_controls(Widget_Base $widget) {
    $this->parent = $widget;

    $this->start_controls_section(
			'section_design_content',
			[
				'label' => __( 'Content', 'bearsthemes-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'heading_title_style',
			[
				'label' => __( 'Title', 'bearsthemes-addons' ),
				'type' => Controls_Manager::HEADING,
				'condition' => [
					'skin_cobble_castor_show_title!' => '',
				],
			]
		);

    $this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'bearsthemes-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .give-card__title' => 'color: {{VALUE}};',
				],
				'condition' => [
					'skin_cobble_castor_show_title!' => '',
				],
			]
		);

    $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'default' => '',
				'selector' => '{{WRAPPER}} .give-card__title',
				'condition' => [
					'skin_cobble_castor_show_title!' => '',
				],
			]
		);

    	$this->add_control(
			'heading_goal_progress_style',
			[
				'label' => __( 'Goal Progress', 'bearsthemes-addons' ),
				'type' => Controls_Manager::HEADING,
				'condition' => [
					'skin_cobble_castor_show_goal_progress!' => '',
				],
			]
		);

		$this->add_control(
			'goal_progress_primary_color',
			[
				'label' => __( 'Primary Color', 'bearsthemes-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .give-goal-progress .income,
					 {{WRAPPER}} .give-goal-progress .goal-text' => 'color: {{VALUE}};',
				],
				'condition' => [
					'skin_cobble_castor_show_goal_progress!' => '',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'goal_progress_primary_typography',
				'label' => __( 'Primary Typography', 'bearsthemes-addons' ),
				'default' => '',
				'selector' => '{{WRAPPER}} .give-goal-progress .income,
				 							 {{WRAPPER}} .give-goal-progress .goal-text',
				'condition' => [
					'skin_cobble_castor_show_goal_progress!' => '',
				],
			]
		);

		$this->add_control(
			'goal_progress_color',
			[
				'label' => __( 'Color', 'bearsthemes-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .give-goal-progress' => 'color: {{VALUE}};',
				],
				'condition' => [
					'skin_cobble_castor_show_goal_progress!' => '',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'goal_progress_typography',
				'label' => __( 'Typography', 'bearsthemes-addons' ),
				'default' => '',
				'selector' => '{{WRAPPER}} .give-goal-progress',
				'condition' => [
					'skin_cobble_castor_show_goal_progress!' => '',
				],
			]
		);

		$this->add_control(
			'heading_read_more_style',
			[
				'label' => __( 'Read More', 'bearsthemes-addons' ),
				'type' => Controls_Manager::HEADING,
				'condition' => [
					'skin_cobble_castor_show_read_more!' => '',
				],
			]
		);

		$this->start_controls_tabs( 'read_more_tabs' );

		$this->start_controls_tab( 'tab_read_more_normal',
			[
				'label' => __( 'Normal', 'bearsthemes-addons' ),
				'condition' => [
					'skin_cobble_castor_show_read_more!' => '',
				],
			]
		);

		$this->add_control(
			'read_more_color',
			[
				'label' => __( 'Color', 'bearsthemes-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .give-card__read-more' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'read_more_bg_color',
			[
				'label' => __( 'Background Color', 'bearsthemes-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .give-card__read-more' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab( 'tab_read_more_hover',
			[
				'label' => __( 'Hover', 'bearsthemes-addons' ),
				'condition' => [
					'skin_cobble_castor_show_read_more!' => '',
				],
			]
		);

		$this->add_control(
			'read_more_hover',
			[
				'label' => __( 'Color', 'bearsthemes-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					' {{WRAPPER}} .give-card__read-more:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'read_more_bg_color_hover',
			[
				'label' => __( 'Background Color', 'bearsthemes-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .give-card__read-more:hover' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();
  }

  public function register_design_goal_progress_section_controls(Widget_Base $widget){

		$this->parent = $widget;

			$this->start_controls_section(
				'section_goal_progress',
				[
					'label' => __( 'Goal Progress', 'bearsthemes-addons' ),
					'tab' => Controls_Manager::TAB_STYLE,
					'condition' => [
						'skin_cobble_castor_show_goal_progress!' => '',
					],
				]
			);

			$this->add_control(
				'custom_goal_progress',
				[
					'label' => __( 'Custom Goal Progress', 'bearsthemes-addons' ),
					'description' => __( 'Check this to custom goal progress in give forms.', 'bearsthemes-addons' ),
					'type' => Controls_Manager::SWITCHER,
					'label_on' => __( 'On', 'bearsthemes-addons' ),
					'label_off' => __( 'Off', 'bearsthemes-addons' ),
					'default' => 'yes',
				]
			);

			$this->add_control(
				'goal_progress_easing',
				[
					'label' => __( 'Easing', 'bearsthemes-addons' ),
					'type' => Controls_Manager::SELECT,
					'default' => 'linear',
					'options' => [
						'linear' => __( 'Linear', 'bearsthemes-addons' ),
						'easeOut' => __( 'EaseOut', 'bearsthemes-addons' ),
						'bounce' => __( 'Bounce', 'bearsthemes-addons' ),
					],
					'condition' => [
						'skin_cobble_castor_custom_goal_progress!' => '',
					],
				]
			);

			$this->add_control(
				'goal_progress_duration',
				[
					'label' => __( 'Duration', 'bearsthemes-addons' ),
					'type' => Controls_Manager::SLIDER,
					'default' => [
						'size' => 800,
					],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 2000,
						],
					],
					'condition' => [
						'skin_cobble_castor_custom_goal_progress!' => '',
					],
				]
			);

			$this->add_control(
				'goal_progress_color_from',
				[
					'label' => __( 'from Color', 'bearsthemes-addons' ),
					'type' => Controls_Manager::COLOR,
					'default' => '#FFEA82',
					'condition' => [
						'skin_cobble_castor_custom_goal_progress!' => '',
					],
				]
			);

			$this->add_control(
				'goal_progress_color_to',
				[
					'label' => __( 'to Color', 'bearsthemes-addons' ),
					'type' => Controls_Manager::COLOR,
					'default' => '#ED6A5A',
					'condition' => [
						'skin_cobble_castor_custom_goal_progress!' => '',
					],
				]
			);

			$this->add_control(
				'goal_progress_trailcolor',
				[
					'label' => __( 'Trail Color', 'bearsthemes-addons' ),
					'type' => Controls_Manager::COLOR,
					'default' => '#EEEEEE',
					'condition' => [
						'skin_cobble_castor_custom_goal_progress!' => '',
					],
				]
			);

			$this->add_control(
				'goal_progress_padding',
				[
					'label' => __( 'Padding', 'bearsthemes-addons' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%' ],
					'selectors' => [
						'{{WRAPPER}} .give-goal-progress svg' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'goal_progress_background',
				[
					'label' => __( 'Background', 'bearsthemes-addons' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .give-goal-progress svg' => 'background: {{VALUE}};',
					]
				]
			);

			$this->end_controls_section();
	}

  protected function render_post_feature( $count ) {

    $settings = $this->parent->get_settings_for_display();

		$form_id = get_the_ID(); // Form ID.

		$form_class = 'elementor-give-form elementor-give-form-feature';

		$form_class .= ' elementor-give-form--' . $count;

		?>
			<article id="post-<?php the_ID();  ?>" <?php post_class( $form_class ); ?> >
				<div class="give-card__media">
	        <?php
	          // Maybe display the featured image.
	          printf(
	            '%s<div class="give-card__overlay"></div>',
	            get_the_post_thumbnail( $form_id, $this->parent->get_instance_value_skin( 'thumbnail_size' ) )
	          );

            if( '' !== $this->parent->get_instance_value_skin( 'show_read_more' ) ) {
              echo '<a class="give-card__read-more" href="' . get_the_permalink() . '">' .
                bearsthemes_addons_get_icon_svg('chevron-right', 16) .
              '</a>';
            }
	        ?>
				</div>

        <div class="give-card__body">
          <?php
	          if( '' !== $this->parent->get_instance_value_skin( 'show_title' ) ){
	            // Maybe display the form title.
	            printf(
	              '<h3 class="give-card__title">
	  							<a href="%s">%s</a>
	  						</h3>',
	  						get_the_permalink(),
	  						get_the_title()
	            );
	          }

            if( '' !== $this->parent->get_instance_value_skin('show_goal_progress') && give_is_setting_enabled( get_post_meta( $form_id, '_give_goal_option', true ) ) ) {
              $args = array(
                'show_text' => true,
                'show_bar' => true,
                'income_text' => __( 'of', 'bearsthemes-addons' ),
                'goal_text' => __( 'raised', 'bearsthemes-addons' ),
                'custom_goal_progress' => $this->parent->get_instance_value_skin('custom_goal_progress'),

              );

              $bar_opts = array(
                'type' => 'line',
                'strokewidth' => 1,
                'easing' => $this->parent->get_instance_value_skin('goal_progress_easing'),
                'duration' => !empty( $this->parent->get_instance_value_skin('goal_progress_duration')['size'] ) ? absint( $this->parent->get_instance_value_skin('goal_progress_duration')['size'] ) : 0,
                'color' => $this->parent->get_instance_value_skin('goal_progress_color_from'),
                'trailcolor' => $this->parent->get_instance_value_skin('goal_progress_trailcolor'),
                'trailwidth' => 1,
                'tocolor' => $this->parent->get_instance_value_skin('goal_progress_color_to'),
                'width' => '100%',
                'height' => '16px',
              );

              bearsthemes_addons_goal_progress( $form_id, $args, $bar_opts );
            }
          ?>
        </div>
			</article>
		<?php
	}

	protected function render_post( $count ) {

    $settings = $this->parent->get_settings_for_display();

		$form_id = get_the_ID(); // Form ID.

		$form_class = 'elementor-give-form';

		$form_class .= ' elementor-give-form--' . $count;

		?>
			<article id="post-<?php the_ID();  ?>" <?php post_class( $form_class ); ?> >
				<div class="give-card__media">
	        <?php
	          // Maybe display the featured image.
	          printf(
	            '%s<div class="give-card__overlay"></div>',
	            get_the_post_thumbnail( $form_id, $this->parent->get_instance_value_skin( 'thumbnail_size' ) )
	          );

            if( '' !== $this->parent->get_instance_value_skin( 'show_read_more' ) ) {
              echo '<a class="give-card__read-more" href="' . get_the_permalink() . '">' .
                bearsthemes_addons_get_icon_svg('chevron-right', 16) .
              '</a>';
            }
	        ?>
				</div>

        <div class="give-card__body">
          <?php
	          if( '' !== $this->parent->get_instance_value_skin( 'show_title' ) ){
	            // Maybe display the form title.
	            printf(
	              '<h3 class="give-card__title">
	  							<a href="%s">%s</a>
	  						</h3>',
	  						get_the_permalink(),
	  						get_the_title()
	            );
	          }
          ?>
        </div>
			</article>
		<?php
	}

	public function render() {

		$query = $this->parent->query_posts();

		if ( $query->have_posts() ) {

      $this->parent->render_loop_header();

        $count = 0;
        while ( $query->have_posts() ) {
          $query->the_post();
          $count ++;

          if( $count == 1 ) {
            $this->render_post_feature( $count );
          } else {
            $this->render_post( $count );
          }

        }

			$this->parent->render_loop_footer();

		} else {
		    // no posts found
		}

		$this->parent->pagination();

		wp_reset_postdata();
	}

	protected function content_template() {

	}

}