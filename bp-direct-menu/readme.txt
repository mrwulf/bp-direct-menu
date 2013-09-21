=== Plugin Name ===

Contributors: mrwulf

Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=4ZTVEPNJC6PXJ

Tags: menu, link, login, log in, logout, menu, nonce, buddypress

Requires at least: 3.0

Tested up to: 3.6.1

Stable tag: trunk

License: GPLv2

Add real menu items that go directly to buddypress pages! Add a profile dropdown with avatar, message counts, and more- fully customizable.



== Description ==


Completely integrated with the wordpress menu system so your theme's menu menu styling is used.

Basic log in/out and register menu items that are only visible when appropriate.

Awesome custom menu item type will let you link to any page that requires the username as part of the url (example.com/members/<user-id>/messages). Tons of tags can be used to customize the menu text:
* User Info: username, firstname, lastname, displayname
* BuddyPress counts: unreadmessagecount, friendcount, groupcount
* BuddyPress counts that hide when zero: (unreadmessagecount), (friendcount), (groupcount) 
* BuddyPress/WordPress avatar: avatar, avatar-thumb, avatar-mini

This plugin works great with "Menu Items Visibility Control" to only show menu items to certain roles/levels.
Also, try "WP ToolBar Removal" to totally replace the ugly unthemed wordpress/buddypress menu.

== Installation ==



1. Upload the *"bp-direct-menu"* folder into the *"/wp-content/plugins/"* directory

1. Activate the plugin through the *"Plugins"* menu in WordPress

1. Go to Appearance->Menus to add menu items of type BuddyPress Direct Links

1. See the help link for more info.



== Frequently Asked Questions ==



= How does this work? =


Visit your navigation admin menu page, you got a new box including 5 links: 'log in', 'logout', 'log in/logout', 'register', 'custom'.

Add the link you want, for example "Log in|Logout"

1. You can change the 2 titles links, just separate them with a | (pipe)

1. You can add a page for redirection, example #bpmdloginout#index.php This will redirect users on site index.

1. You can add 2 pages for redirection, example #bpmdloginout#login.php|logout.php This will redirect users too.

1. For this redirection you can use the special value %actualpage%, this will redirect the user on the actual page.


= What are the shortcodes? =

You can also add shortcodes in your pages/posts. just do this :

In you posts/pages : `[loginout]`
In your theme : `<?php echo do_shortcode( '[loginout]' ); ?>`


The 4 basic shortcodes are "[bpdm_login]", "[bpdm_logout]" and "[bpdm_loginout]", "[bpdm_register]".

You can set 2 parameters, named "redirect" and "edit_tag".

Redirect: used to redirect the user after the action (log in or out) ; example : "/welcome/" or "index.php"

Edit_tag: used to modify the <a> tag, ; example " class='myclass'" or " id='myid' class='myclass' rel='friend'" etc

You can also modify the title link with [login]Click here to connect[/login] for example

= How does the custom link work? =

* Add it to a menu or using a shortcode just like the other links.
* Put in the end part of the URL after the #bpmdcustom# placeholder or in the url_part parameter. This will be appended to "<site>.com/members/<userid>" (the user's profile page), so to go to a user's messages: "#bpmdcustom#/messages/".
* Use one (or more) of the replacement tags in the menu item title or shortcode text:
  * "Messages %(unreadmessagecount)%"
  * [bpdmcustom url_part="/messages/"]Messages %(unreadmessagecount)%[/bpdmcustom]

= How awesome is the custom link? = 
Totally.

== Screenshots ==

1. The meta box in nav menu admin page

1. An example of a custom profile menu

1. The admin view of the above profile menu


== Changelog ==



= 1.0 =

* 2013-09-21

* First release





== Upgrade Notice ==



None
