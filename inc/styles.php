<?php

function theme_get_customizer_css()
{
  ob_start();

  $background = get_theme_mod('background', '');
  $blog_background = get_theme_mod('blog_background', '');
  $sidebar_background = get_theme_mod('menu_background', '');
  $textColorLight = get_theme_mod('text_color_light', '');
  $textColorDark = get_theme_mod('text_color_dark', '');
  $linkColor = get_theme_mod('link_color', '');
  $linkColorHover = get_theme_mod('link_color_hover', '');
  $linkColorActive = get_theme_mod('link_color_active', '');

?>
  :root {
  --bg: <?php echo ($background !== "") ? $background : "#1a1a1a"; ?>;
  --bg-menu: <?php echo ($sidebar_background !== "") ? $sidebar_background : "#1a1a1a"; ?>;
  --bg-blog: <?php echo ($blog_background !== "") ? $blog_background : "#000000"; ?>;
  --text-color-light: <?php echo ($textColorLight !== "") ? $textColorLight : "#f3f3f3"; ?>;
  --text-color-dark: <?php echo ($textColorDark !== "") ? $textColorDark : "#000000"; ?>;
  --link-color: <?php echo ($linkColor !== "") ? $linkColor : "#f3f3f3"; ?>;
  --link-color-hover: <?php echo ($linkColorHover !== "") ? $linkColorHover : "#000000"; ?>;
  --link-color-active: <?php echo ($linkColorActive !== "") ? $linkColorActive : "#000000"; ?>;
  }

<?php

  $css = ob_get_clean();
  return $css;
}

// Modify our styles registration like so:

function theme_enqueue_styles()
{
  wp_enqueue_style('theme-styles', get_stylesheet_uri()); // This is where you enqueue your theme's main stylesheet
  $custom_css = theme_get_customizer_css();
  wp_add_inline_style('theme-styles', $custom_css);
}

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
