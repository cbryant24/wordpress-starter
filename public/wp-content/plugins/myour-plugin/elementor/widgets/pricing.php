<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 
/**
 * Myour Pricing Widget.
 *
 * @since 1.0
 */
class Myour_Pricing_Widget extends Widget_Base {

	public function get_name() {
		return 'myour-pricing';
	}

	public function get_title() {
		return esc_html__( 'Pricing', 'myour-plugin' );
	}

	public function get_icon() {
		return 'fas fa-dollar-sign';
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
				'label' => esc_html__( 'Pricing Items', 'myour-plugin' ),
				'type' => Controls_Manager::REPEATER,
				'prevent_empty' => false,
				'fields' => [
					[
						'name' => 'icon',
						'label'       => esc_html__( 'Icon', 'myour-plugin' ),
						'type'        => Controls_Manager::ICON,
						'label_block' => true,
					],
					[
						'name' => 'name',
						'label'       => esc_html__( 'Title', 'myour-plugin' ),
						'type'        => Controls_Manager::TEXTAREA,
						'placeholder' => esc_html__( 'Enter title', 'myour-plugin' ),
						'default'	=> esc_html__( 'Enter title', 'myour-plugin' ),
					],
					[
						'name' => 'price',
						'label'       => esc_html__( 'Price', 'myour-plugin' ),
						'label_block' => true,
						'type'        => Controls_Manager::TEXT,
						'placeholder' => 100,
						'default'	=> 100,
					],
					[
						'name' => 'price_before',
						'label'       => esc_html__( 'Price (before)', 'myour-plugin' ),
						'type'        => Controls_Manager::TEXT,
						'placeholder' => esc_html__( '$', 'myour-plugin' ),
						'default'	=> esc_html__( '$', 'myour-plugin' ),
					],
					[
						'name' => 'price_after',
						'label'       => esc_html__( 'Price (after)', 'myour-plugin' ),
						'type'        => Controls_Manager::TEXT,
						'placeholder' => esc_html__( 'hour', 'myour-plugin' ),
						'default'	=> esc_html__( 'hour', 'myour-plugin' ),
					],
					[
						'name' => 'list',
						'label'       => esc_html__( 'List', 'myour-plugin' ),
						'type' => Controls_Manager::WYSIWYG,
					],
					[
						'name' => 'button',
						'label'       => esc_html__( 'Button (title)', 'myour-plugin' ),
						'label_block' => true,
						'type'        => Controls_Manager::TEXT,
						'placeholder' => esc_html__( 'Button', 'myour-plugin' ),
						'default'	=> esc_html__( 'Button', 'myour-plugin' ),
					],
					[
						'name' => 'link',
						'label'       => esc_html__( 'Button (link)', 'myour-plugin' ),
						'type' => Controls_Manager::URL,
						'show_external' => true,
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
					'{{WRAPPER}} .pricing-item .icons' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'item_name_color',
			[
				'label'     => esc_html__( 'Title Color', 'myour-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .pricing-item .name' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'     => esc_html__( 'Title Typography', 'myour-plugin' ),
				'name'     => 'item_name_typography',
				'selector' => '{{WRAPPER}} .pricing-item .name',
			]
		);

		$this->add_control(
			'item_price_color',
			[
				
				'label'     => esc_html__( 'Price Color', 'myour-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .pricing-item .amount .number' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'item_price_typography',
				'label'     => esc_html__( 'Price Typography', 'myour-plugin' ),
				'selector' => '{{WRAPPER}} .pricing-item .amount .number',
			]
		);

		$this->add_control(
			'item_price2_color',
			[
				
				'label'     => esc_html__( 'Price Secondary Color', 'myour-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .pricing-item .amount .number .dollar, {{WRAPPER}} .pricing-item .amount .number .period' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'item_price2_typography',
				'label'     => esc_html__( 'Price Secondary Typography', 'myour-plugin' ),
				'selector' => '{{WRAPPER}} .pricing-item .amount .number .dollar, {{WRAPPER}} .pricing-item .amount .number .period',
			]
		);

		$this->add_control(
			'item_list_color',
			[
				
				'label'     => esc_html__( 'List Color', 'myour-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .pricing-item .feature-list' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'item_list_typography',
				'label'     => esc_html__( 'List Typography', 'myour-plugin' ),
				'selector' => '{{WRAPPER}} .pricing-item .feature-list',
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

		<!-- Section Pricing -->
		<div class="section pricing">
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
				<!-- pricing items -->
				<div class="content-carousel">
					<div class="owl-carousel" data-slidesview="2" data-slidesview_mobile="1">
						<?php foreach ( $settings['items'] as $index => $item ) : 

					    $item_name = $this->get_repeater_setting_key( 'name', 'items', $index );
					    $this->add_inline_editing_attributes( $item_name, 'none' );

					    $item_price = $this->get_repeater_setting_key( 'price', 'items', $index );
					    $this->add_inline_editing_attributes( $item_price, 'none' );

					    $item_price_before = $this->get_repeater_setting_key( 'price_before', 'items', $index );
					    $this->add_inline_editing_attributes( $item_price_before, 'none' );

					    $item_price_after = $this->get_repeater_setting_key( 'price_after', 'items', $index );
					    $this->add_inline_editing_attributes( $item_price_after, 'none' );

					    $item_button = $this->get_repeater_setting_key( 'button', 'items', $index );
					    $this->add_inline_editing_attributes( $item_button, 'none' );

					    ?>
						<div class="item">
							<div class="pricing-item">
								<?php if ( $item['icon'] ) : ?>
								<div class="icons"><i class="<?php echo esc_attr( $item['icon'] ); ?>"></i></div>
								<?php endif; ?>
								<?php if ( $item['name'] ) : ?>
								<div class="name">
									<span <?php echo $this->get_render_attribute_string( $item_name ); ?>>
										<?php echo esc_html( $item['name'] ); ?>
									</span>
								</div>
								<?php endif; ?>
								<?php if ( $item['price'] ) : ?>
								<div class="amount">
									<span class="number">
										<?php if ( $item['price_before'] ) : ?>
										<span <?php echo $this->get_render_attribute_string( $item_price_before ); ?> class="dollar">
											<?php echo esc_html( $item['price_before'] ); ?>
										</span>
										<?php endif; ?>
										<?php if ( $item['price'] ) : ?>
										<span <?php echo $this->get_render_attribute_string( $item_price ); ?>>
											<?php echo esc_html( $item['price'] ); ?>
										</span>
										<?php endif; ?>
										<?php if ( $item['price_after'] ) : ?>
										<span <?php echo $this->get_render_attribute_string( $item_price_after ); ?> class="period">
											<?php echo esc_html( $item['price_after'] ); ?>
										</span>
										<?php endif; ?>
									</span>
								</div>
								<?php endif; ?>
								<?php if ( $item['list'] ) : ?>
								<div class="feature-list">
									<?php echo wp_kses_post( $item['list'] ); ?>
								</div>
								<?php endif; ?>
								<?php if ( $item['button'] ) : ?>
								<a<?php if ( $item['link'] ) : if ( $item['link']['is_external'] ) : ?> target="_blank"<?php endif; ?><?php if ( $item['link']['nofollow'] ) : ?> rel="nofollow"<?php endif; ?> href="<?php echo esc_url( $item['link']['url'] ); ?>"<?php endif; ?> class="btn">
									<span class="animated-button">
										<span <?php echo $this->get_render_attribute_string( $item_button ); ?>>
											<?php echo esc_html( $item['button'] ); ?>
										</span>
									</span>
									<i class="icon fas fa-chevron-right"></i>
								</a>
								<?php endif; ?>
							</div>
						</div>
						<?php endforeach; ?>
					</div>

					<!-- navigation -->
					<div class="navs">
						<span class="prev fas fa-chevron-left"></span>
						<span class="next fas fa-chevron-right"></span>
					</div>

				</div>
				<?php endif; ?>
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

		<!-- Section Pricing -->
		<div class="section pricing">
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
				<!-- pricing items -->
				<div class="content-carousel">
					<div class="owl-carousel" data-slidesview="2" data-slidesview_mobile="1">
						<# _.each( settings.items, function( item, index ) { 

					    var item_name = view.getRepeaterSettingKey( 'name', 'items', index );
					    view.addInlineEditingAttributes( item_name, 'none' );

					    var item_price = view.getRepeaterSettingKey( 'price', 'items', index );
					    view.addInlineEditingAttributes( item_price, 'none' );

					    var item_price_before = view.getRepeaterSettingKey( 'price_before', 'items', index );
					    view.addInlineEditingAttributes( item_price_before, 'none' );

					    var item_price_after = view.getRepeaterSettingKey( 'price_after', 'items', index );
					    view.addInlineEditingAttributes( item_price_after, 'none' );

					    var item_button = view.getRepeaterSettingKey( 'button', 'items', index );
					    view.addInlineEditingAttributes( item_button, 'none' );

					    #>
						<div class="item">
							<div class="pricing-item">
								<# if ( item.icon ) { #>
								<div class="icons"><i class="{{{ item.icon }}}"></i></div>
								<# } #>
								<# if ( item.name ) { #>
								<div class="name">
									<span {{{ view.getRenderAttributeString( item_name ) }}}>
										{{{ item.name }}}
									</span>
								</div>
								<# } #>
								<# if ( item.price ) { #>
								<div class="amount">
									<span class="number">
										<# if ( item.price_before ) { #>
										<span {{{ view.getRenderAttributeString( item_price_before ) }}} class="dollar">
											{{{ item.price_before }}}
										</span>
										<# } #>
										<# if ( item.price ) { #>
										<span {{{ view.getRenderAttributeString( item_price ) }}}>
											{{{ item.price }}}
										</span>
										<# } #>
										<# if ( item.price_after ) { #>
										<span {{{ view.getRenderAttributeString( item_price_after ) }}} class="period">
											{{{ item.price_after }}}
										</span>
										<# } #>
									</span>
								</div>
								<# } #>
								<# if ( item.list ) { #>
								<div class="feature-list">
									{{{ item.list }}}
								</div>
								<# } #>
								<# if ( item.button ) { #>
								<a<# if ( item.link ) { #><# if ( item.link.is_external ) { #> target="_blank"<# } #><# if ( item.link.nofollow ) { #> rel="nofollow"<# } #> href="{{{ item.link.url }}}"<# } #> class="btn">
									<span class="animated-button">
										<span {{{ view.getRenderAttributeString( item_button ) }}}>
											{{{ item.button }}}
										</span>
									</span>
									<i class="icon fas fa-chevron-right"></i>
								</a>
								<# } #>
							</div>
						</div>
						<# }); #>
					</div>

					<!-- navigation -->
					<div class="navs">
						<span class="prev fas fa-chevron-left"></span>
						<span class="next fas fa-chevron-right"></span>
					</div>

				</div>
				<# } #>
			</div>
		</div>

		<?php 
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new Myour_Pricing_Widget() );