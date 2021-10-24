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
      'flex_height' => true, // Flexible Heiht
    )
  ));
}
add_action('customize_register', 'your_theme_new_customizer_settings');

/**
 * Create Color Scheme Settings in Customizer
 *
 * @param [type] $wp_customize
 * @return void
 */
function theme_customize_register($wp_customize)
{
  // Background
  $wp_customize->add_setting('background', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'sanitize_hex_color',
  ));
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'background', array(
    'section' => 'colors',
    'label'   => esc_html__('Background', 'theme'),
  )));

  // Blog background
  $wp_customize->add_setting('blog_background', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'sanitize_hex_color',
  ));
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'blog_background', array(
    'section' => 'colors',
    'label'   => esc_html__('Blog Card Background', 'theme'),
  )));

  // Menu background
  $wp_customize->add_setting('menu_background', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'sanitize_hex_color',
  ));
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'menu_background', array(
    'section' => 'colors',
    'label'   => esc_html__('Menu Background', 'theme'),
  )));

  // Text background Light
  $wp_customize->add_setting('text_color_light', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'sanitize_hex_color',
  ));
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'text_color_light', array(
    'section' => 'colors',
    'label'   => esc_html__('Text Color Light', 'theme'),
  )));

  // Text background Dark
  $wp_customize->add_setting('text_color_dark', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'sanitize_hex_color',
  ));
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'text_color_dark', array(
    'section' => 'colors',
    'label'   => esc_html__('Text Color Dark', 'theme'),
  )));

    // Text background Dark
    $wp_customize->add_setting('link_color', array(
      'default'   => '',
      'transport' => 'refresh',
      'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'link_color', array(
      'section' => 'colors',
      'label'   => esc_html__('Link Color', 'theme'),
    )));

      // Text background Dark
  $wp_customize->add_setting('link_color_hover', array(
    'default'   => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'sanitize_hex_color',
  ));
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'link_color_hover', array(
    'section' => 'colors',
    'label'   => esc_html__('Link Hover', 'theme'),
  )));

    // Text background Dark
    $wp_customize->add_setting('link_color_active', array(
      'default'   => '',
      'transport' => 'refresh',
      'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'link_color_active', array(
      'section' => 'colors',
      'label'   => esc_html__('Link Active', 'theme'),
    )));
}

add_action('customize_register', 'theme_customize_register');
