<?php
/**
Plugin Name:    Additional Image Sizes (zui)
Plugin URI:     http://beingzoe.com/zui/wordpress/additional-image-sizes/
Description:    Library of awesomeness and a "reset" to create a sensible starting point
Version:        0.1
Author:         zoe somebody, Walter Vos
Author URI:     http://beingzoe.com/
License:        MIT
 *
 * @author      Walter Vos
 * @link        http://www.waltervos.com/
 * @author		zoe somebody
 * @link        http://beingzoe.com/zui/wordpress/kitchen_sink/
 * @license		http://en.wikipedia.org/wiki/MIT_License The MIT License
 * @package     ZUI
 * @subpackage  WordPress
 * @uses        ZUI_WpAdditionalImageSizes class
*/

if ( !is_admin() )
    return; // not needed in front end ever - speed things up


/**
 * Class to create and manage additional image sizes for post/pages/custom
 *
 * @since       0.1
 * @uses        ZUI_WpAdminPages
 * @uses        ZUI_FormHelper
 * @see         WpAdminPages.php
 * @see         FormHelper.php
*/
require_once dirname(__FILE__) . '/vendor/beingzoe/zui_php/ZUI/WpAdditionalImageSizes.php';


/**
 * Register hooks and settings for the plugin to run
 *
 * @since       0.1
 * @uses        register_activation_hook() WP function
 * @uses        add_action() WP function
*/
register_activation_hook( __FILE__, 'aiszActivate');
add_action('admin_init', 'registerWpAisSettings');
add_action('admin_menu', 'aiszAddAdmin', 100);
add_action('admin_notices', 'aiszActivationNotice');


/**
 * This function registers the necessary settings/options
 * for this plugin to work with WordPress Settings API
 *
 * @since       0.1
 * @uses        register_setting() WP function
*/
function registerWpAisSettings() {
    register_setting('aisz_options', 'aisz_activated');
}


/**
 * This function runs only when the plugin is activated and sets ais_activated to true so that
 * ais_activation_notice knows that the plugin has just been activated
 *
 * @since       0.1
 * @uses        update_option() WP function
*/
function aiszActivate() {
    update_option('aisz_activated', true);
}


/**
 * This function creates the page to manage the additional image sizes
 *
 * @since       0.1
 * @uses        add_submenu_page() WP function
 * @uses        aiszActivationNotice()
 * @uses        ZUI_WpAdditionalImageSizes::viewOptionsPage() as view page callback
*/
function aiszAddAdmin() {
    add_submenu_page(
        'upload.php',
        'Additional image sizes',
        'Additional image sizes',
        'manage_options',
        'aisz_admin',
        array('ZUI_WpAdditionalImageSizes','viewOptionsPage')
    );
}

function aiszViewOptionsPage() {
    echo "<div class='wrap'>";
    echo "<h2>Additional image sizes</h2>";
    ZUI_WpAdditionalImageSizes::viewOptionsPage();
    echo "</div>";
}


/**
 * Displays the activation notice
 * and provides a link to the new page for first time use
 *
 * @since       0.1
 * @uses        get_option() WP function
 * @uses        admin_url() WP function
 * @uses        delete_option() WP function
*/
function aiszActivationNotice() {
    if (get_option('aisz_activated')) {
        echo '<div class="updated fade" id="message">
        <p><strong>Thank you for using Additional image sizes!</strong> <a href="' . admin_url('upload.php?page=aisz_admin') . '">Go here</a> to add image sizes and to create missing/changed sizes of previously uploaded images.</p></div>';
        delete_option('aisz_activated');
    }
}
