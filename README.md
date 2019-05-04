# control-color

## Installation

First, install the package using composer:

```bash
composer require kirki-framework/control-color
```

Make sure you include the autoloader:
```php
require_once get_parent_theme_file_path( 'vendor/autoload.php' );
```

## Use with the WordPress Customizer API:

To add a control using the customizer API:

```php
/**
 * Add Customizer settings & controls.
 * 
 * @since 1.0
 * @param WP_Customize_Manager $wp_customize The WP_Customize_Manager object.
 * @return void
 */
add_action( 'customize_register', function( $wp_customize ) {

	// Registers the control and whitelists it for JS templating.
	$wp_customize->register_control_type( '\Kirki\Control\Color' );

	// Add setting.
	$wp_customize->add_setting( 'my_control', [
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'default'           => '#fff',
		'transport'         => 'refresh', // Or postMessage.
		'sanitize_callback' => [ '\kirki\Field\Color', 'sanitize' ], // Or a custom sanitization callback.
	] );

	// Add control.
	$wp_customize->add_control( new \Kirki\Control\Color( $wp_customize, 'my_control', [
		'label'   => esc_html__( 'My Color Control', 'theme_textdomain' ),
		'section' => 'colors',
		'choices' => [
			'alpha' => true,
		]
	] ) );
} );
```

## Simplified/Abstracted API

The above control can also be added using a slightly simplified syntax like this:

```php
new \Kirki\Field\Color( [
	'option_type' => 'theme_mod',
	'capability'  => 'edit_theme_options',
	'default'     => '#fff',
	'transport'   => 'refresh', // Or postMessage.
	'label'       => esc_html__( 'My Color Control', 'theme_textdomain' ),
	'section'     => 'colors',
	'choices'     => [
		'alpha' => true,
	]
] );
```

Things to note regarding this abstraction:

* The `Kirki\Field\Color` object will register the control-class, add the setting and the control, all in one step.
* While the default WordPress Customizer API requires hooking in `customize_register`, using the `Kirki\Field\Color` class should not be done inside that hook. There is no need for that, all actions are added automatically by the object itself.
* The sanitization callback is automatically added if left undefined.

## Updating the node modules

```
rm -rf node_modules && npm install --only=production
```