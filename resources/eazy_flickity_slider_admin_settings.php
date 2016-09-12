<?php
if( is_admin() ) {

function eazy_slider_settings()
{
    add_settings_section("scripts", "Scripts", null, "eazy-slider-settings-");
    add_settings_field("use-cdn", "Load Flickity.js from: ", "cdnjs_buttons", "eazy-slider-settings-", "scripts");  
    register_setting("scripts", "use-cdn");
}

function cdnjs_buttons()
{
   ?>
        <input type="radio" name="use-cdn" value="local" <?php checked('local', get_option('use-cdn'), true); ?>>local
        <input type="radio" name="use-cdn" value="cdnjs" <?php checked('cdnjs', get_option('use-cdn'), true); ?>>cdnjs
   <?php
}

add_action("admin_init", "eazy_slider_settings");

function eazy_slider_settings_page()
{
  ?>
      <div class="wrap">
         <h1>Eazy Flickity Slider</h1>
  
         <form method="post" action="options.php">
            <?php
               settings_fields("scripts");
               do_settings_sections("eazy-slider-settings-");
               submit_button(); 
            ?>
         </form>
      </div>
   <?php
}

function menu_item()
{
  add_submenu_page('edit.php?post_type=eazy_flickity_slide', 'Eazy Flickity Slider Settings', 'Settings', 'edit_posts', 'eazy-slider-settings-', 'eazy_slider_settings_page');
}
 
add_action("admin_menu", "menu_item");   
}
