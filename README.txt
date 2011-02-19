=== Additional image sizes (zui) ===
Contributors: waltervos, beingzoe
Donate Link: http://en.wikipedia.org/wiki/Pay_it_forward
Tags: images, image management, image sizes
Requires at least: 3.0
Tested up to: 3.0.5
Stable tag: 0.1

Create additional image sizes for your WordPress site/blog as well resize the predefined WordPress sizes.

== Description ==

Create additional image sizes (in addition to the predefined WordPress
defaults thumbnail, medium and large size that are default) for your WordPress site/blog.

It will also resize the predefined WordPress sizes if the size in Settings > Media has been edited.

This plugin is a fork to fix bugs and enhance the functionality of the original Additional Image Sizes plugin.

== Installation ==

* Upload the `additional-image-sizes-zui` folder to the `/wp-content/plugins/` directory
* OR "Install Plugins" in the WordPress admin "Plugins > Add New" (search for "additional image sizes zui")

1. Activate the plugin through the `Plugins` menu in WordPress
2. Now you'll see a new menu item in the `Media` menu where you can add additional sizes and recreate new/changed sizes

== Screenshots ==

1. First use with no new image sizes created. Menu item added to Media.
2. Just after adding our first additional image size
3. Message output letting us know the progress of creating new sizes
4. Using the new image size in the post media uploader

== Roadmap for future releases ==

* Add the ability to delete the actual images created by the site/blog owner
* Add a link (or maybe the actual generate images button/form) to the Settings > Media page
** Only show if they edit the boxes after the form is submitted
* Text domain


== Frequently Asked Questions ==

None yet!


== Changelog ==

= 0.1 =
* Major rewrite and release of the original additional sizes plugin
* Fixed bug where the plugin was attempting to ask WP to resize sizes that didn't exist
* Fixed bug when WordPress returned an error when the image didn't need resized and the plugin overreacted
* Fixed E_NOTICE errors being issued for undeclared variables
* Updated add_menu_page to use newer role and capabilities instead of older numeric roles
* Separated plugin init/activation from plugin actions so that others could use as stand-alone class
* Added the ability to resize predefined WordPress image sizes if size edited through Settings > Media
* Added the ability to show/hide the skipped images message

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
