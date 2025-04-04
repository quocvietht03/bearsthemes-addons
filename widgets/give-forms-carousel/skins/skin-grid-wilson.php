<?php
namespace BearsthemesAddons\Widgets\Give_Forms_Carousel\Skins;

use Elementor\Widget_Base;
use Elementor\Skin_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Css_Filter;
use Elementor\Group_Control_Typography;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Skin_Grid_Wilson extends Skin_Base {

	protected function _register_controls_actions() {
		add_action( 'elementor/element/be-give-forms-carousel/section_layout/before_section_end', [ $this, 'register_layout_controls' ] );
		add_action( 'elementor/element/be-give-forms-carousel/section_design_layout/before_section_end', [ $this, 'registerd_design_layout_controls' ] );
		add_action( 'elementor/element/be-give-forms-carousel/section_design_layout/after_section_end', [ $this, 'register_design_box_section_controls' ] );
		add_action( 'elementor/element/be-give-forms-carousel/section_design_layout/after_section_end', [ $this, 'register_design_image_section_controls' ] );
		add_action( 'elementor/element/be-give-forms-carousel/section_design_layout/after_section_end', [ $this, 'register_design_content_section_controls' ] );

	}

	public function get_id() {
		return 'skin-grid-wilson';
	}


	public function get_title() {
		return __( 'Grid Wilson', 'bearsthemes-addons' );
	}


	public function register_layout_controls( Widget_Base $widget ) {
		$this->parent = $widget;

		$this->add_responsive_control(
			'sliders_per_view',
			[
				'label' => __( 'Columns', 'bearsthemes-addons' ),
				'type' => Controls_Manager::SELECT,
				'default' => '3',
				'tablet_default' => '2',
				'mobile_default' => '1',
				'options' => [
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
					'5' => '5',
					'6' => '6',
				],
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'posts_count',
			[
				'label' => __( 'Posts Count', 'bearsthemes-addons' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 6,
			]
		);

		$this->add_control(
      'show_thumbnail',
      [
        'label' => __( 'Thumbnail', 'bearsthemes-addons' ),
        'type'  => Controls_Manager::SWITCHER,
        'label_on' => __( 'Show', 'bearsthemes-addons' ),
        'label_off' => __( 'Hide', 'bearsthemes-addons' ),
        'default'  => 'yes',
        'separator' => 'before',
      ]
    );

    $this->add_group_control(
      Group_Control_Image_Size::get_type(),
      [
        'name' => 'thumbnail',
        'default' => 'medium',
        'exclude' => [ 'custom' ],
				'condition' => [
					'skin_grid_wilson_show_thumbnail!'=> '',
				],
      ]
    );

    $this->add_responsive_control(
      'item_ratio',
      [
        'label' => __( 'Image Ratio', 'bearsthemes-addons' ),
        'type' => Controls_Manager::SLIDER,
        'default' => [
          'size' => 0.66,
        ],
        'range' => [
          'px' => [
            'min' => 0.3,
            'max' => 2,
            'step' => 0.01,
          ],
        ],
        'selectors' => [
          '{{WRAPPER}} .give-card__media' => 'padding-bottom: calc( {{SIZE}} * 100% );',
        ],
				'condition' => [
					'skin_grid_wilson_show_thumbnail!'=> '',
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
      ]
    );

		$this->add_control(
			'show_category',
			[
				'label' => __( 'Category', 'bearsthemes-addons' ),
				'type'  => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'bearsthemes-addons' ),
				'label_off' => __( 'Hide', 'bearsthemes-addons'),
				'default' => 'yes',
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


	}

	public function registerd_design_layout_controls( Widget_Base $widget ) {
		$this->parent = $widget;

		$this->add_responsive_control(
			'space_between',
			[
				'label' => __( 'Space Between', 'bearsthemes-addons' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'size' => 30,
				],
				'frontend_available' => true,
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
					'{{WRAPPER}} .elementor-give-form,
					 {{WRAPPER}} .give-card__body' => 'background-color: {{VALUE}}',
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
					'{{WRAPPER}} .elementor-give-form:hover,
					 {{WRAPPER}} .elementor-give-form:hover .give-card__body' => 'background-color: {{VALUE}}',
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
					'skin_grid_wilson_show_thumbnail!' => '',
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
			'heading_category_style',
			[
				'label' => __( 'Category', 'bearsthemes-addons' ),
				'type' => Controls_Manager::HEADING,
				'condition' => [
					'skin_grid_wilson_show_category!' => '',
				],
			]
		);

		$this->add_control(
			'category_color',
			[
				'label' => __( 'Color', 'bearsthemes-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .give-card__category' => 'color: {{VALUE}};',
				],
				'condition' => [
					'skin_grid_wilson_show_category!' => '',
				],
			]
		);

		$this->add_control(
			'category_bg_color',
			[
				'label' => __( 'Background Color', 'bearsthemes-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .give-card__category' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .give-card__media' => 'border-color: {{VALUE}};',
				],
				'condition' => [
					'skin_grid_wilson_show_category!' => '',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'category_typography',
				'label' => __( 'Typography', 'bearsthemes-addons' ),
				'default' => '',
				'selector' => '{{WRAPPER}} .give-card__category',
				'condition' => [
					'skin_grid_wilson_show_category!' => '',
				],
			]
		);

		$this->add_control(
			'heading_title_style',
			[
				'label' => __( 'Title', 'bearsthemes-addons' ),
				'type' => Controls_Manager::HEADING,
				'condition' => [
					'skin_grid_wilson_show_title!' => '',
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
					'skin_grid_wilson_show_title!' => '',
				],
			]
		);

    $this->add_control(
			'title_color_hover',
			[
				'label' => __( 'Color Hover', 'bearsthemes-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					' {{WRAPPER}} .give-card__title a:hover' => 'color: {{VALUE}};',
				],
				'condition' => [
					'skin_grid_wilson_show_title!' => '',
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
					'skin_grid_wilson_show_title!' => '',
				],
			]
		);

    $this->add_control(
			'heading_goal_progress_style',
			[
				'label' => __( 'Goal Progress', 'bearsthemes-addons' ),
				'type' => Controls_Manager::HEADING,
				'condition' => [
					'skin_grid_wilson_show_goal_progress!' => '',
				],
			]
		);

    $this->add_control(
			'goal_progress_primary_color',
			[
				'label' => __( 'Goal Color', 'bearsthemes-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .give-goal-progress .bt-price .bt-goal' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'goal_progress_primary_typography',
				'label' => __( 'Goal Typography', 'bearsthemes-addons' ),
				'default' => '',
				'selector' => '{{WRAPPER}} .give-goal-progress .bt-price .bt-goal',
			]
		);

		$this->add_control(
			'goal_percent_color',
			[
				'label' => __( 'Collected Color', 'bearsthemes-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .give-goal-progress .bt-price .bt-collected' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'goal_percent_typography',
				'label' => __( 'Collected Typography', 'bearsthemes-addons' ),
				'default' => '',
				'selector' => '{{WRAPPER}} .give-goal-progress .bt-price .bt-collected',
			]
		);

    $this->add_control(
      'background_progress_color',
      [
        'label' => __( 'Background Progress', 'bearsthemes-addons' ),
        'type' => Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
          '{{WRAPPER}} .give-goal-progress .bt-progress' => 'background-color: {{VALUE}};',
          '{{WRAPPER}} .give-goal-progress .bt-progress span' => 'border-right-color: {{VALUE}};',
        ],
      ]
    );

    $this->add_control(
      'progress_color',
      [
        'label' => __( 'Progress Color', 'bearsthemes-addons' ),
        'type' => Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
         '{{WRAPPER}} .give-goal-progress .bt-progress .bt-percent' => 'background-color: {{VALUE}}',
        ],
      ]
    );

    $this->add_control(
      'border_progress_color',
      [
        'label' => __( 'Border Progress Color', 'bearsthemes-addons' ),
        'type' => Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
         '{{WRAPPER}} .give-goal-progress .bt-progress' => 'border-color: {{VALUE}}',
        ],
      ]
    );

		$this->end_controls_section();
  }


	protected function render_post() {

		$settings = $this->parent->get_settings_for_display();

		$post_id = get_the_ID();
		$form_id = get_field('give_form', $post_id);

		$form_class = 'elementor-give-form';

    if( '' !== $this->parent->get_instance_value_skin('show_thumbnail') ) {
      $form_class .= ' has-thumbnail';
    }

		?>
      <div class="swiper-slide">
				<article id="post-<?php the_ID();  ?>" <?php post_class( $form_class ); ?> >
					<?php
						if( '' !== $this->parent->get_instance_value_skin( 'show_category' ) ){
							the_terms( $post_id, 'give_posts_category', '<div class="give-card__category">' , ', ', '</div>' );
						}
					?>

					<?php if( '' !== $this->parent->get_instance_value_skin('show_thumbnail') ) { ?>
						<div class="give-card__media">
							<a href="<?php the_permalink(); ?>">
				        <?php
				          // Maybe display the featured image.
				          printf(
				            '%s<div class="give-card__overlay"></div>',
				            get_the_post_thumbnail( $post_id, $this->parent->get_instance_value_skin( 'thumbnail_size' ) )
				          );
				        ?>
							</a>
						</div>
					<?php } ?>

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

                $total_income = give_get_form_earnings_stats( $form_id );
                $goal_amount = give_get_meta( $form_id, '_give_set_goal', true );
                $goal_percentage_completed = ( $total_income < $goal_amount ) ? round( ( $total_income / $goal_amount ) * 100, 0 ) : 100;

                $currency = give_get_currency();
                $currency_symbol = give_currency_symbol( $currency );
                $currency_pos = give_get_currency_position();

                if( 'before' == $currency_pos ) {
                  $total = $currency_symbol . give_format_amount( $total_income );
                  $total_goal = $currency_symbol . number_format( $goal_amount );

                } else {
                  $total = give_format_amount( $total_income ) . $currency_symbol;
                  $total_goal = number_format( $goal_amount ) . $currency_symbol;
                }
                ?>
                <div class="give-goal-progress">
                    <div class="bt-price">
                      <?php
                        echo '<div class="bt-goal">'.$total_goal.'</div>'.
                          '<div class="bt-collected">'.$goal_percentage_completed.esc_html__('% Donation Collected', 'bearsthemes-addons').'</div>';
                      ?>
                    </div>
                    <div class="bt-progress">
                    <span></span><span></span><span></span>
                    <span></span><span></span><span></span>
                    <span></span><span></span><span></span>

                    <?php  echo '<div class="bt-percent" style="width: '.esc_attr($goal_percentage_completed).'%;"> </div>'; ?>
                    </div>

                </div><!-- /.goal-progress -->
                <?php

              }

            ?>
          </div>


				</article>
      </div>
		<?php
	}

	public function render() {

		$query = $this->parent->query_posts();

		if ( $query->have_posts() ) {

			$this->parent->render_loop_header();

				while ( $query->have_posts() ) {
					$query->the_post();

					$this->render_post();

				}

			$this->parent->render_loop_footer();

		} else {
		    // no posts found
		}

		wp_reset_postdata();
	}

	protected function content_template() {

	}

}
