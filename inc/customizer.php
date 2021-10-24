<?php

/**
 * Create Logo Setting and Upload Control
 */
function your_theme_new_customizer_settings($wp_customize)
{
  // add a setting for the site logo
  $wp_customize->add_setting('your_theme_logo');
  // Add a control to upload the logo
  $wp_customize->add_control(new WP_Customize_Cropped_Image_Control(
    $wp_customize,
    'your_theme_logo',
    array(
      'label' => 'Upload Logo',
      'section' => 'title_tagline',
      'settings'   => 'your_theme_logo',
      'height' => 100, // cropper Height
      'width' => 100, // Cropper Width
      'flex_width' => true, //Flexible Width
      'flex_height' => true, // Flexible Height
    )
  ));
}
add_action('customize_register', 'your_theme_new_customizer_settings');

function addColorSetting($wp_customize, $settingName, $settingLabel) {
  $wp_customize->add_setting($settingName, array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'sanitize_hex_color',
  ));
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $settingName, array(
    'section' => 'colors',
    'label'   => esc_html__($settingLabel, 'theme'),
  )));
}

/**
 * Create Color Scheme Settings in Customizer
 *
 * @param [type] $wp_customize
 * @return void
 */
function theme_customize_register($wp_customize) {
  $controlsArray = array(
    "background" => "Background",
    "blog_background" => "Blog Card Background",
    "menu_background" => "Menu Background",
    "text_color_light" => "Text Color Light",
    "text_color_dark" => "Text Color Dark",
    "link_color" => "Link Color",
    "link_color_hover" => "Link Hover",
    "link_color_active" => "Link Active"
  );
  foreach ($controlsArray as $key => $value) {
    addColorSetting($wp_customize, $key, $value);
  }
}

add_action('customize_register', 'theme_customize_register');
