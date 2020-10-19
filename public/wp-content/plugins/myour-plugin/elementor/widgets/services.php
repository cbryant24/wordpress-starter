<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 
/**
 * Myour About Heading Widget.
 *
 * @since 1.0
 */
class Myour_Services_Widget extends Widget_Base {

	public function get_name() {
		return 'myour-services';
	}

	public function get_title() {
		return esc_html__( 'Services', 'myour-plugin' );
	}

	public function get_icon() {
		return 'fas fa-concierge-bell';
	}

	public function get_categories() {
		return [ 'myour-category' ];
	}

	/**
	 * Register widget controls.
	 *
	 * @since 1.0
	 */
	protected function _register_controls() {

		$this->start_controls_section(
			'title_tab',
			[
				'label' => esc_html__( 'Title', 'myour-plugin' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title',
			[
				'label'       => esc_html__( 'Title', 'myour-plugin' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Enter title', 'myour-plugin' ),
				'default'     => esc_html__( 'Title', 'myour-plugin' ),
			]
		);

		$this->add_control(
			'title_tag',
			[
				'label'       => esc_html__( 'Title Tag', 'myour-plugin' ),
				'type'        => Controls_Manager::SELECT,
				'default' => 'h2',
				'options' => [
					'h1'  => __( 'H1', 'myour-plugin' ),
					'h2' => __( 'H2', 'myour-plugin' ),
					'div' => __( 'DIV', 'myour-plugin' ),
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'subtitles_tab',
			[
				'label' => esc_html__( 'Subtitle', 'myour-plugin' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'subtitle',
			[
				'label'       => esc_html__( 'Subtitle', 'myour-plugin' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Enter subtitle', 'myour-plugin' ),
				'default'     => esc_html__( 'Subtitle', 'myour-plugin' ),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'items_tab',
			[
				'label' => esc_html__( 'Items', 'myour-plugin' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'items',
			[
				'label' => esc_html__( 'Services Items', 'myour-plugin' ),
				'type' => Controls_Manager::REPEATER,
				'prevent_empty' => false,
				'fields' => [
					[
						'name' => 'icon',
						'label'       => esc_html__( 'Icon', 'myour-plugin' ),
						'type'        => Controls_Manager::ICON,
					],
					[
						'name' => 'name',
						'label'       => esc_html__( 'Title', 'myour-plugin' ),
						'type'        => Controls_Manager::TEXTAREA,
						'placeholder' => esc_html__( 'Enter title', 'myour-plugin' ),
						'default'	=> esc_html__( 'Enter title', 'myour-plugin' ),
					],
					[
						'name' => 'desc',
						'label'       => esc_html__( 'Description', 'myour-plugin' ),
						'type'        => Controls_Manager::WYSIWYG,
						'placeholder' => esc_html__( 'Enter description', 'myour-plugin' ),
						'default'	=> esc_html__( 'Enter description', 'myour-plugin' ),
					],
				],
				'title_field' => '{{{ name }}}',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'title_styling',
			[
				'label'     => esc_html__( 'Title', 'myour-plugin' ),
				'tab'       => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label'     => esc_html__( 'Color', 'myour-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .section .titles .title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'title_typography',
				'selector' => '{{WRAPPER}} .section .titles .title',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'subtitle_styling',
			[
				'label'     => esc_html__( 'Subtitle', 'myour-plugin' ),
				'tab'       => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'subtitle_color',
			[
				'label'     => esc_html__( 'Color', 'myour-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .section .titles .subtitle' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'subtitle_typography',
				'selector' => '{{WRAPPER}} .section .titles .subtitle',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'items_styling',
			[
				'label'     => esc_html__( 'Items', 'myour-plugin' ),
				'tab'       => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'item_icon_color',
			[
				'label'     => esc_html__( 'Icon Color', 'myour-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .service-item .icon' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'item_title_color',
			[
				'label'     => esc_html__( 'Title Color', 'myour-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .service-item .name' => 'color: {{VALUE}};',
				],
			]
		);		

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'item_title_typography',
				'label'     => esc_html__( 'Title Typography', 'myour-plugin' ),
				'selector' => '{{WRAPPER}} .service-item .name',
			]
		);

		$this->add_control(
			'item_desc_color',
			[
				'label'     => esc_html__( 'Description Color', 'myour-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .service-item .single-post-text' => 'color: {{VALUE}};',
				],
			]
		);		

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'item_desc_typography',
				'label'     => esc_html__( 'Description Typography', 'myour-plugin' ),
				'selector' => '{{WRAPPER}} .service-item .single-post-text',
			]
		);
		
		$this->end_controls_section();
	}


	/**
	 * Render widget output on the frontend.
	 *
	 * @since 1.0
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		$this->add_inline_editing_attributes( 'title', 'basic' );
		$this->add_inline_editing_attributes( 'subtitle', 'basic' );
		?>

		<!-- Section Service -->
		<div class="section service">
			<div class="content">

				<?php if ( $settings['title'] || $settings['subtitle'] ) : ?>
				<!-- title -->
				<div class="titles">
					<?php if ( $settings['title'] ) : ?>
					<<?php echo esc_attr( $settings['title_tag'] ); ?> class="title">
						<span <?php echo $this->get_render_attribute_string( 'title' ); ?>>
                    		<?php echo wp_kses_post( $settings['title'] ); ?>
                    	</span>
					</<?php echo esc_attr( $settings['title_tag'] ); ?>>
					<?php endif; ?>
					<?php if ( $settings['subtitle'] ) : ?>
					<div class="subtitle">
						<span <?php echo $this->get_render_attribute_string( 'subtitle' ); ?>>
                    		<?php echo wp_kses_post( $settings['subtitle'] ); ?>
                    	</span>
					</div>
					<?php endif; ?>
				</div>
				<?php endif; ?>

				<?php if ( $settings['items'] ) : ?>
				<!-- services items -->
				<div class="service-items">
					<?php foreach ( $settings['items'] as $index => $item ) : 
				    $item_name = $this->get_repeater_setting_key( 'name', 'items', $index );
				    $this->add_inline_editing_attributes( $item_name, 'basic' );

				    $item_desc = $this->get_repeater_setting_key( 'desc', 'items', $index );
				    $this->add_inline_editing_attributes( $item_desc, 'advanced' );
				    ?>
					<div class="service-col">
						<div class="service-item">
							<div class="icon"><i class="<?php echo esc_attr( $item['icon'] ); ?>"></i></div>
							<div class="name">
								<span <?php echo $this->get_render_attribute_string( $item_name ); ?>>
									<?php echo wp_kses_post( $item['name'] ); ?>
								</span>
							</div>
							<div class="single-post-text">
								<div <?php echo $this->get_render_attribute_string( $item_desc ); ?>>
									<?php echo wp_kses_post( $item['desc'] ); ?>
								</div>
							</div>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
				<?php endif; ?>

				<div class="clear"></div>
			</div>
		</div>

		<?php
	}

	/**
	 * Render widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _content_template() {
		?>
		<#
		view.addInlineEditingAttributes( 'title', 'basic' );
		view.addInlineEditingAttributes( 'subtitle', 'basic' );
		#>

		<!-- Section Service -->
		<div class="section service">
			<div class="content">

				<# if ( settings.title || settings.subtitle ) { #>
				<!-- title -->
				<div class="titles">
					<# if ( settings.title ) { #>
					<{{{ settings.title_tag }}} class="title">
						<span {{{ view.getRenderAttributeString( 'title' ) }}}>
                    		{{{ settings.title }}}
                    	</span>
					</{{{ settings.title_tag }}}>
					<# } #>
					<# if ( settings.subtitle ) { #>
					<div class="subtitle">
						<span {{{ view.getRenderAttributeString( 'subtitle' ) }}}>
                    		{{{ settings.subtitle }}}
                    	</span>
					</div>
					<# } #>
				</div>
				<# } #>

				<# if ( settings.items ) { #>
				<!-- services items -->
				<div class="service-items">
				    <# _.each( settings.items, function( item, index ) { 

				    var item_name = view.getRepeaterSettingKey( 'name', 'items', index );
				    view.addInlineEditingAttributes( item_name, 'basic' );

				    var item_desc = view.getRepeaterSettingKey( 'desc', 'items', index );
				    view.addInlineEditingAttributes( item_desc, 'advanced' );

				    #>
					<div class="service-col">
						<div class="service-item">
							<div class="icon"><i class="{{{ item.icon }}}"></i></div>
							<div class="name">
								<span {{{ view.getRenderAttributeString( item_name ) }}}>
									{{{ item.name }}}
								</span>
							</div>
							<div class="single-post-text">
								<div {{{ view.getRenderAttributeString( item_desc ) }}}>
									{{{ item.desc }}}
								</div>
							</div>
						</div>
					</div>
					<# }); #>
				</div>
				<# } #>

				<div class="clear"></div>
			</div>
		</div>

		<?php 
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new Myour_Services_Widget() );