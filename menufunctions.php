<?php

// set up the menu
// these next 2 functions need editing
if(!function_exists('find_my_menu_item')) {
  function find_my_menu_item($handle, $sub = false) {
    if(!is_admin() || (defined('DOING_AJAX') && DOING_AJAX)) {
      return false;
    }
    global $menu, $submenu;
    $check_menu = $sub ? $submenu : $menu;
    if(empty($check_menu)) {
      return false;
    }
    foreach($check_menu as $k => $item) {
      if($sub) {
        foreach($item as $sm) {
          if($handle == $sm[2]) {
            return true;
          }
        }
      } 
      else {
        if($handle == $item[2]) {
          return true;
        }
      }
    }
    return false;
  }
}

if(!function_exists('wpg_add_parent_page')) {
  function wpg_add_parent_page() {
    if(!find_my_menu_item('main_item_slug')) {
      add_menu_page('Main Item Page Title','Main Item Menu Title', 'activate_plugins', 'main_item_slug', 'main_item_function', THISPLUGIN_PATH.'images/menu-icon.png');
    }
    if(!function_exists('remove_submenu_page')) {
      unset($GLOBALS['submenu']['main_item_slug'][0]);
    }
    else {
      remove_submenu_page('main_item_slug','main_item_slug');
    }
  }
  add_action('admin_menu', 'wpg_add_parent_page');
}
if(!function_exists('wpg_add_thisplugin_page')) {
  function wpg_add_thisplugin_settings_page() {
    add_submenu_page('main_item_slug', 'ThisPlugin Settings', 'ThisPlugin Menu Item', 'activate_plugins', 'this_plugin_slug', 'wpg_thisplugin_function');
  }
  add_action('admin_menu', 'wpg_add_thisplugin_page');
}
// end stuff to be amended

?>