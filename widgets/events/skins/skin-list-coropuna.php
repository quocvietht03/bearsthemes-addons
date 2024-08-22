<?php
namespace BearsthemesAddons\Widgets\Events\Skins;

use Elementor\Widget_Base;
use Elementor\Skin_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Css_Filter;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Skin_List_Coropuna extends Skin_Base {

	protected function _register_controls_actions() {
		add_action( 'elementor/element/be-events/section_layout/before_section_end', [ $this, 'register_layout_controls' ] );
		add_action( 'elementor/element/be-events/section_design_layout/before_section_end', [ $this, 'registerd_design_layout_controls' ] );
    add_action( 'elementor/element/be-events/section_design_layout/after_section_end', [ $this, 'register_design_box_section_controls' ] );
    add_action( 'elementor/element/be-events/section_design_layout/after_section_end', [ $this, 'register_design_content_section_controls' ] );

	}

	public function get_id() {
		return 'skin-list-coropuna';
	}


	public function get_title() {
		return __( 'List Coropuna', 'bearsthemes-addons' );
	}


	public function register_layout_controls( Widget_Base $widget ) {
		$this->parent = $widget;

		$this->add_control(
			'posts_per_page',
			[
				'label' => __( 'Posts Per Page', 'bearsthemes-addons' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 6,
			]
		);

		$this->add_control(
			'show_title',
			[
				'label' => __( 'Title', 'bearsthemes-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'bearsthemes-addons' ),
				'label_off' => __( 'Hide', 'bearsthemes-addons' ),
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_date',
			[
				'label' => __( 'Date', 'bearsthemes-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'bearsthemes-addons' ),
				'label_off' => __( 'Hide', 'bearsthemes-addons' ),
				'default' => 'yes',
			]
		);

    $this->add_control(
			'show_meta',
			[
				'label' => __( 'Meta', 'bearsthemes-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'bearsthemes-addons' ),
				'label_off' => __( 'Hide', 'bearsthemes-addons' ),
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
					'{{WRAPPER}} .elementor-event:not(:last-child)' => 'margin-bottom: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_control(
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
					'{{WRAPPER}} .elementor-event' => 'text-align: {{VALUE}};',
				],
			]
		);

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
					'{{WRAPPER}} .elementor-event' => 'border-style: solid; border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
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
					'{{WRAPPER}} .elementor-event' => 'border-radius: {{SIZE}}{{UNIT}}',
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
					'{{WRAPPER}} .elementor-event' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
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
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-event__content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
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
				'selector' => '{{WRAPPER}} .elementor-event',
			]
		);

		$this->add_control(
			'box_bg_color',
			[
				'label' => __( 'Background Color', 'bearsthemes-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-event' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'box_border_color',
			[
				'label' => __( 'Border Color', 'bearsthemes-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-event' => 'border-color: {{VALUE}}',
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
				'selector' => '{{WRAPPER}} .elementor-event:hover',
			]
		);

		$this->add_control(
			'box_bg_color_hover',
			[
				'label' => __( 'Background Color', 'bearsthemes-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-event:hover' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'box_border_color_hover',
			[
				'label' => __( 'Border Color', 'bearsthemes-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-event:hover' => 'border-color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

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
			'heading_title_style',
			[
				'label' => __( 'Title', 'bearsthemes-addons' ),
				'type' => Controls_Manager::HEADING,
				'condition' => [
					'skin_list_coropuna_show_title!' => '',
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
					'{{WRAPPER}} .elementor-event__title' => 'color: {{VALUE}};',
				],
				'condition' => [
					'skin_list_coropuna_show_title!' => '',
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
					' {{WRAPPER}} .elementor-event__title a:hover' => 'color: {{VALUE}};',
				],
				'condition' => [
					'skin_list_coropuna_show_title!' => '',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'default' => '',
				'selector' => '{{WRAPPER}} .elementor-event__title',
				'condition' => [
					'skin_list_coropuna_show_title!' => '',
				],
			]
		);

		$this->add_control(
			'heading_date_style',
			[
				'label' => __( 'Date', 'bearsthemes-addons' ),
				'type' => Controls_Manager::HEADING,
				'condition' => [
					'skin_list_coropuna_show_date!' => '',
				],
			]
		);

		$this->add_control(
			'date_parimary_color',
			[
				'label' => __( 'Primary Color', 'bearsthemes-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementor-event__date' => 'color: {{VALUE}};',
					'{{WRAPPER}} .elementor-event__date' => 'border-color: {{VALUE}};',
				],
				'condition' => [
					'skin_list_coropuna_show_date!' => '',
				],
			]
		);

		$this->add_control(
			'date_secondary_color',
			[
				'label' => __( 'Secondary Color', 'bearsthemes-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementor-event__date:before' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'skin_list_coropuna_show_date!' => '',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'date_typography',
				'label' => __( 'Date Typography', 'bearsthemes-addons' ),
				'default' => '',
				'selector' => '{{WRAPPER}} .elementor-event__date',
				'condition' => [
					'skin_list_coropuna_show_date!' => '',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'month_typography',
				'label' => __( 'Month Typography', 'bearsthemes-addons' ),
				'default' => '',
				'selector' => '{{WRAPPER}} .elementor-event__date .month',
				'condition' => [
					'skin_list_coropuna_show_date!' => '',
				],
			]
		);

		$this->add_control(
			'heading_meta_style',
			[
				'label' => __( 'Meta', 'bearsthemes-addons' ),
				'type' => Controls_Manager::HEADING,
				'condition' => [
					'skin_list_coropuna_show_meta!' => '',
				],
			]
		);

		$this->add_control(
			'meta_color',
			[
				'label' => __( 'Color', 'bearsthemes-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementor-event__meta li' => 'color: {{VALUE}};',
				],
				'condition' => [
					'skin_list_coropuna_show_meta!' => '',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'meta_typography',
				'default' => '',
				'selector' => '{{WRAPPER}} .elementor-event__meta li',
				'condition' => [
					'skin_list_coropuna_show_meta!' => '',
				],
			]
		);

		$this->add_control(
			'heading_read_more_style',
			[
				'label' => __( 'Read More', 'bearsthemes-addons' ),
				'type' => Controls_Manager::HEADING,
				'condition' => [
					'skin_list_coropuna_show_read_more!' => '',
				],
			]
		);

    	$this->start_controls_tabs( 'read_more_tabs');

		$this->start_controls_tab( 'read_more_normal',
			[
				'label' => __( 'Normal', 'bearsthemes-addons' ),
        	'condition' => [
					'skin_list_coropuna_show_read_more!' => '',
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
					'{{WRAPPER}} .elementor-event__read-more svg' => 'fill: {{VALUE}};',
				],
        	'condition' => [
					'skin_list_coropuna_show_read_more!' => '',
				],
			]
		);

    	$this->add_control(
			'read_more_bg_color',
			[
				'label' => __( 'Background Color', 'bearsthemes-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-event__read-more' => 'background-color: {{VALUE}}',
				],
        	'condition' => [
					'skin_list_coropuna_show_read_more!' => '',
				],
			]
		);

    	$this->end_controls_tab();

		$this->start_controls_tab( 'read_more_hover',
			[
				'label' => __( 'Hover', 'bearsthemes-addons' ),
        	'condition' => [
					'skin_list_coropuna_show_read_more!' => '',
				],
			]
		);

    	$this->add_control(
			'read_more_color_hover',
			[
				'label' => __( 'Color', 'bearsthemes-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					' {{WRAPPER}} .elementor-event__read-more:hover svg' => 'fill: {{VALUE}};',
				],
        	'condition' => [
					'skin_list_coropuna_show_read_more!' => '',
				],
			]
		);

		$this->add_control(
			'read_more_bg_color_hover',
			[
				'label' => __( 'Background Color Hover', 'bearsthemes-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-event__read-more:hover' => 'background-color: {{VALUE}}',
				],
        	'condition' => [
					'skin_list_coropuna_show_read_more!' => '',
				],
			]
		);

    	$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();
	}

	protected function render_post() {
		$settings = $this->parent->get_settings_for_display();

		$post_classes = 'elementor-event';

		if( '' !== $this->parent->get_instance_value_skin( 'show_date' ) ) {
			$post_classes .= ' has-date';
		}

		if( '' !== $this->parent->get_instance_value_skin( 'show_read_more' ) ) {
			$post_classes .= ' has-read-more';
		}

		?>
			<article id="post-<?php the_ID();  ?>" <?php post_class( $post_classes ); ?> >
        <?php
        if( '' !== $this->parent->get_instance_value_skin( 'show_date' ) ) {
          echo '<div class="elementor-event__date">
                  <span class="date">' . tribe_get_start_date( get_the_ID(), false, 'd' ) . '</span>
                  <span class="month">' . tribe_get_start_date( get_the_ID(), false, 'M' ) . '</span>
                </div>';
        }
        ?>

  			<div class="elementor-event__content">
          <?php
            if( '' !== $this->parent->get_instance_value_skin( 'show_title' ) ) {
              the_title( '<h3 class="elementor-event__title"><a href="' . get_the_permalink() . '">', '</a></h3>' );
            }
          ?>

					<?php if( '' !== $this->parent->get_instance_value_skin( 'show_meta' ) ) { ?>
	          <ul class="elementor-event__meta">
	    				<?php
                $time_format = get_option( 'time_format' );
                echo '<li class="time">'  . bearsthemes_addons_get_icon_svg( 'clock', 14 ) . tribe_get_start_date( get_the_ID(), false, $time_format ) . '</li>';

	              $venue_id = get_post_meta( get_the_ID(), '_EventVenueID', true);
	              if( $venue_id ) {
	                echo '<li class="address">' . bearsthemes_addons_get_icon_svg( 'location', 14 );
	                  $this->parent->event_addres( $venue_id );
	                echo '</li>';
	              }

	    				?>
	          </ul>
					<?php } ?>

          <?php
            if( '' !== $this->parent->get_instance_value_skin( 'show_read_more' ) ) {
              echo '<a class="elementor-event__read-more" href="' . get_the_permalink() . '">' . bearsthemes_addons_get_icon_svg( 'arrow-long-right', 26 ) . '</a>';
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

				while ( $query->have_posts() ) {
					$query->the_post();

					$this->render_post();

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
