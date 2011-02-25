=== Additional image sizes (zui) ===
Contributors: waltervos, beingzoe
Donate Link: http://en.wikipedia.org/wiki/Pay_it_forward
Tags: images, image management, image sizes, create image sizes, delete images
Requires at least: 3.0
Tested up to: 3.1
Stable tag: 0.1.7

Create and delete additional image sizes for your WordPress site/blog as well as resize the predefined WordPress sizes.

== Description ==

Create additional image sizes (in addition to the predefined WordPress
defaults thumbnail, medium and large size that are default) for your WordPress site/blog.
It will also resize the predefined WordPress sizes if the size(s) in Settings > Media have been edited.

Delete images from your upload directory in size(s) you are no longer using.

Simulate creating/deleting images before you actually do it to see what the results will be.

This plugin is a fork to fix bugs and enhance the functionality of the original Additional Image Sizes plugin. If
you were using the original plugin this new version will import your old settings (as of version 0.1.5).

If you are a WordPress developer this plugin is also available as a ready-to-go appliance (module) in the Kitchen Sink HTML 5 Base
platform/framework development plugin. Learn more at github: https://github.com/beingzoe/wpplugin-kitchen-sink-html5-base

== Installation ==

* Upload the `additional-image-sizes-zui` folder to the `/wp-content/plugins/` directory
* OR "Install Plugins" in the WordPress admin "Plugins > Add New" (search for "additional image sizes zui")

1. Activate the plugin through the `Plugins` menu in WordPress
2. Now you'll see a new menu item in the `Media` menu where you can add additional sizes, create new/changed sizes, and delete images in unused sizes


== How to use ==

= Create a new image size =

At the top of the Additional Images Sizes options page you will see a matrix of your custom image sizes.
On first load it will be empty and you will just see a form at the "bottom" of the matrix.

1. Enter a name, width (integer), height (integer), and choose whether it should be cropped
2. Click Save Changes

= Create missing/changed image sizes =

Once you have created a new image size (or edited the predefined WordPress image sizes in Settings > Media) you
will need to create the new image size(s) for previously uploaded images. New images will automatically be created
in all sizes.

1. Click the "Generate copies of new sizes button"

Optionally choose what size(s) to check.

There are other optional settings you can adjust depending on your server, how many new sizes you are attempting to
do at once, and which way the wind is blowing. We have attempted to set these to work optimally for most folks. But
if your setup is a little better than most, only doing one image size at a time, or don't have too many images on the
server already try turning these up. Conversely if you are having problems turn these down. Explanation of these
settings is included on the page.

= Deleting images for deleted sizes =

1. Click "Show form"
2. Click "Delete images of deleted sizes"

By default "Check but don't actually delete" is selected and this will only show you what WOULD be deleted. If you are sure
the results are what you want to delete then uncheck "Check but don't actually delete" and run it again. The physical image
files will be removed from the server and your attachment metadate updated. There is no undo. Use at your own risk.


== Screenshots ==

1. First use with no custom image sizes created. Menu item added to Media.
2. Just after adding our first additional custom image size
3. Settings for creating new/missing image sizes
4. Settings for deleting images for deleted sizes
5. Message output showing progress of creating new sizes (or simulating in this case)
6. Message output showing the images deleted that time around
7. Inserting new image sizes into post/page/custom


== Roadmap for future releases ==

* Add ability to deleted UNUSED images (uploaded but not inserted)
* Add ability to edit your custom sizes
* Ajaxify and see if we can automate a little bit with some javascript
* Add a link (or maybe the actual generate images button/form) to the Settings > Media page
** Only show if they edit the boxes after the form is submitted
* Text domain / Internationalization


== Frequently Asked Questions ==

= What are the italicized undeletable images sizes in my list? e.g. post-thumbnail =

With the addition of the featured image post thumbnail feature WordPress introduced new functions for
theme and plugin developers to use to add new image sizes. Sizes added this way do not show up to
be inserted in posts/pages/custom but are created everytime an image is uploaded. We list them here
to let you know they exist and for now to let you know we are aware of them and will not attempt to
delete or edit them in anyway.

= Is there a way to automate the creation of new image sizes instead of doing batches manually? =

We are looking into this. The problem is that once this script starts running it is incredibly taxing
on the server. It would be inappropriate to let this script run for very long especially on shared hosting.

However because of our fabulous tester Ami who has over 23,000 images on a particular server we are
looking into options to make the creation of new sizes less time consuming.

= Why are there so many images AISZ wants to delete the first time I run "Delete images..." =

The native method of adding images via the WordPress api uses two functions in particular for theme and
plugin developers to add new sizes.  `set_post_thumbnail_size()` and `add_image_size()`. We know the name
of the 'post-thumbnail' size and protect that size by default. However, if you were
using a theme or plugin that used `add_image_size()` but have since switched to a theme or plugin that does
not use those named sizes of image files will still exist on your server but no longer be referenced except in the
attachment metadata. Unfortunately at this time we have no way of telling the difference between those sizes
you may need later and sizes you have created and deleted. If you think you might switch back to one of those
themes or plugins you should not use the delete feature of this plugin OR use on the workaround provided below.

However, there is a simple workaround if you are comfortable editing your theme functions.php. By simply
adding `add_image_size( 'NAME OF IMAGE SIZE', width, height, TRUE|FALSE )` you will effectively hide it from this plugin.
The downside to this method is that you really need to match the original name, width, height, and crop setting for it
to be truly useful if you ever switch back to the theme or plugin that needed those sizes. If these were larger images
then you are needlessly storing excessive image sizes for possibly no reason.

Alternatively you can add that named size to your custom list of sizes and set it to a really small image size (e.g. 10x10 cropped).
This will allow accomplish the same thing as the above workaround except it will only be creating a tiny extra image size.
Then if you ever switch back to the the theme or plugin that uses those sizes (they will appear italicized and undeletable in your
custom size list) you can simply recreate the appropriate sizes for the `add_image_size()` sizes and then delete it from your
custom list again.

Up to you.


== Upgrade Notice ==

= 0.1.7 =

Fixes issue with some installations where attempt to save cookie triggered "headers sent error"

= 0.1.6 =

Protects 'post-thumbnail' size even if not present in current install! Minor bug fixes. Tested up to WP 3.1.

= 0.1.5 =

Major feature additions! Minor bug fixes. This is the tool you REALLY wanted ;)

= 0.1.4 =

Minor/Major bug fixed (depending on how you look at it ;) preventing WordPress sizes from resizing unless a custom size was added.

= 0.1.3 =

Added ability to choose what size(s) are checked instead of just all of them!

= 0.1.2 =

Major improvment to how new image sizes are created.

== Changelog ==

= 0.1.7 =

* Fixed issue with some installations where attempt to save cookie triggered "headers sent error".

= 0.1.6 =

* Fixed minor bug causing E_NOTICE errors when the global $_wp_additional_image_sizes was empty
* Added protection for known size 'post-thumbnail' even if that size is not present in the current install
* Added the name of size being deleted to delete message output

= 0.1.5 =

* Added ability to check but not actually resize images (simulates image_resize)
* Added ability to physically delete images and clean attachment metadata of deleted sizes
* Generate images form saves values (added cookie)
* Added a "continue link" to the messages to make continuing less arduous for lot's of images
* Renamed "RESIZED" to "CREATED" in output log to better express what is happening
* Added ability to "replace" predefined WordPress sizes instead of creating new ones
* Added acknowledgment and protection for set_post_thumbnail_size() and add_image_size() images
* Added an import of old plugin sizes if no sizes exist with new plugin (sorry if you were an early adopter ;)
* Cleaned up page a bit and added javascript to show/hide advanced settings
* Improved readability of media size insert image when many custom sizes are present
* Fixed bug where last inserted image size was not being used as the default next time (thanks Ami)
* Fixed bug where non-numeric values could be entered into width/height
* Added notes about leaving width/height blank for proportional resize/crop
* Optimized code a bit
* Renamed internal class members more consistently
* Abstracted things in preparation for ajaxifying

= 0.1.4 =

* Fixed bug preventing WordPress sizes from resizing unless a custom size was added

= 0.1.3 =

* Added ability to choose what size(s) to check instead of just all (Thanks Ami)
* Improved database cleanup - now removes necessary WP unserialized size options on delete size
* Still more helpful messages to let the site/blog owner know what is going on

= 0.1.2 =

* Changed generate new images to run in "batches" set by the site/blog owner
* Added option to extend the time limit for script processing by up to 60 seconds
* Special thanks to Ami for testing things out with her 23000+ images ;)
* Added more thorough messages to let the site/blog owner know what is going on

= 0.1.1 =

* Updated option that stores the serialized options from a kst namespaced id
* Removed extraneous comments and unused code and other minor cleanup

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

