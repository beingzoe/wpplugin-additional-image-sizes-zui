=== Additional image sizes (zui) ===
Author: waltervos, beingzoe
Tags: images, image management, image sizes
Requires at least: 2.5
Tested up to: 3.0.5
Stable tag: 0.1

Create additional image sizes for your WordPress site/blog as well resize the predefined WordPress sizes.

== Description ==

Create additional image sizes (in addition to the predefined WordPress
defaults thumbnail, medium and large size that are default) for your WordPress site/blog.
Will also resize the predefined WordPress sizes if the size in Media > Settings has been edited.

== Installation ==

* Upload the `additional-image-sizes-zui` folder to the `/wp-content/plugins/` directory
* OR "Install Plugins" in the WordPress admin "Plugins > Add New" (search for "additional image sizes zui")

1. Activate the plugin through the `Plugins` menu in WordPress
1. Now you'll see a new menu item in the `Media` menu where you can add additional sizes and recreate new/changed sizes

== Changelog ==

= 0.1 =
* Major rewrite and release of the original additional sizes plugin
* Fixed bug where the plugin was attempting to ask WP to resize sizes that didn't exist
* Fixed E_NOTICE errors being issued for undeclared variables
* Updated add_menu_page to use newer role and capabilities instead of older numeric roles
* Separated plugin init/activation from plugin actions so that others could use as stand-alone class
* Added the ability to resize predefined WordPress image sizes if size edited through Settings > Media

== Original plugin changelog ==

= 1.0.2 =
* Minor bugfixes, sorry about all the updates

= 1.0.1 =
* 1.0 didn't preserve image sizes from 0.1 installs, now it does (and recovers those that were lost)

= 1.0 =
* Several small bugfixes
* thumbnail, medium and large can no longer be used as the name for a size (WordPress itself uses those already)
* Width or height can now be left empty
* Slight improvements to the user interface
* Prevent timeouts when regenerating copies of existing sizes

= 0.1 =
Very first release, features are:

*   Adding additional image sizes.
*   Generate copies of additional image sizes.
*   Use the additional sizes in your posts or pages from the `Add an Image` screen.
