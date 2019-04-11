<?php
/**
 * Customizer control underscore.js template.
 *
 * @package   kirki-framework/control-color
 * @copyright Copyright (c) 2019, Ari Stathopoulos (@aristath)
 * @license   https://opensource.org/licenses/MIT
 * @since     1.0
 */

?>
<#
data = _.defaults( data, {
	label: '',
	description: '',
	mode: 'full',
	inputAttrs: '',
	'data-palette': data['data-palette'] ? data['data-palette'] : true,
	'data-default-color': data['data-default-color'] ? data['data-default-color'] : '',
	'data-alpha': data['data-alpha'] ? data['data-alpha'] : false,
	value: '',
	'data-id': ''
} );
#>

<div class="kirki-input-container" data-id="{{ data['data-id'] }}" data-has-alpha="{{ data['data-alpha'] }}">
	<label>
		<# if ( data.label ) { #>
			<span class="customize-control-title">{{{ data.label }}}</span>
		<# } #>
		<# if ( data.description ) { #>
			<span class="description customize-control-description">{{{ data.description }}}</span>
		<# } #>
	</label>
	<div class="kirki-color-input-wrapper collapsed mode-{{ data.mode }}">
		<button class="toggle-colorpicker">
			<span class="screen-reader-text"><?php esc_html_e( 'Select Color', 'kirki' ); ?></span>
			<span class="placeholder"></span>
		</button>
		<input
			type="text"
			data-type="{{ data.mode }}"
			{{{ data.inputAttrs }}}
			data-palette="{{ data['data-palette'] }}"
			data-default-color="{{ data['data-default-color'] }}"
			value="{{ data.value }}"
			class="kirki-color-control"
			data-id="{{ data['data-id'] }}"
		/>
		<button class="reset"><?php esc_html_e( 'Reset', 'kirki' ); ?></button>
	</div>
	<div class="kirki-colorpicker-wrapper-palette"></div>
	<div class="kirki-colorpicker-wrapper colorpicker-{{ data['data-id'] }}"></div>
</div>
