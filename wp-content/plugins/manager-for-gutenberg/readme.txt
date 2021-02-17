=== Gutenberg Manager ===
Contributors: unCommons
Tags: disable gutenberg,cpt,post type,gutenberg editor,manager,disable,blocks,wp5,
Donate link: https://www.paypal.me/unCommonsTeam
Requires at least: 4.9
Tested up to: 5.0.3
Stable tag: 1.5
Version: 1.5
Requires PHP: 5.3
Text Domain: gutenberg-manager
Domain Path: /languages
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A simple and easy way to manage Gutenberg editor. You can disable/enable it for every post types and restore the Classic Editor. You can remove/add single blocks and more.

== Description ==

Gutenberg is a great editor but sometime you could want to disable it for Pages, Posts or other post types. Gutenberg Manager allow you to enable/disable the editor where you want. Why would you want to disable the editor on pages? Maybe you would like to use a page builder like Visual Composer or Elementor instead!

Gutenberg Editor will be probably included in the next great release of WordPress (5.0) so Gutenberg Manager will be really useful. With the Manager you can also decide to disable specific blocks in the editor if you don't need them.

If you are developing or editing a theme/plugin all features are also available via Hooks so you can include Gutenberg Manager plugin inside your theme and use it without the Option Panel.

**If you like this plugin, please give us 5 star to encourage for future improvement.**

== Installation ==
**WORDPRESS BACKEND**
1. Login to your WordPress website. When you're logged in, you will be in your "Dashboard". On the left-hand side, you will see a menu. In that menu, click on "Plugins".
2. Click on "Add New" near the top of the screen. Type "Gutenberg Manager" in the search bar.
3. This will give you a page of search results. Our plugin should be visible now. Click the "Install Now" link to start installing our plugin.
4. Click the "Activate" button that appeared where the "Install Now" button was previously located.

**FTP**
1. Download Gutenberg Manager zip file from Github (Releases) or WordPress.org repository.
2. "Unzip" the file you just downloaded and you will see a folder called "manager-for-gutenberg".
3. Login to your hosting using your FTP account.
4. Go to the folder /wp-content/plugins/ on your WP installation and upload the "manager-for-gutenberg" folder.
5. Now login your WP backend and in Plugins page "Activate" Gutenberg Manager

== How to use ==
Under "Gutenberg" menu in your dashboard you'll find a new button "Gutenberg Manager". This is the Option Panel of our plugin. For now it includes 4 options areas:

1. Settings
2. Default Blocks
3. Additional Blocks
4. API/Hooks

**SETTINGS**
Here you can globally disable Gutenberg Editor or manage the visibility of editor in the different post types.

**DEFAULT BLOCKS**
Here you can disable the default blocks in the Editor.

**ADDITIONAL BLOCKS**
Here you can enable our additional blocks in the Editor.
*This section is under construction*

**API/HOOKS**
Here you find a list of Hooks to use in your custom Theme/Plugin!
*Note: there is an action to disable the Option Panel of Gutenberg Manager so our plugin will be hidden for the final user but the theme/plugin developer can use all the plugin's features.*

== Screenshots ==
1. Here you can globally disable Gutenberg Editor or manage the visibility of editor in the different post types.
2. Here you can disable the default blocks in the Editor.
3. Here you find a list of Hooks to use in your custom Theme/Plugin!

== Changelog ==
= 1.5 =
* Included the compatibility with WP 5.x
* Updated the list of Default Blocks to disable
* Fixed the languages issue
* Added the check about "Classic Editor" plugin
* Added uninstall feature to remove options if you uninstall the plugin

= 1.0 =
* No changes since this is the first release.