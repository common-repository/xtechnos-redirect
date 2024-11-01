<?php
/*
Plugin Name: xTechnos Redirect
Plugin URI: http://www.xtechnos.com
Description: Based on Redirect plugin, xTechnos Redirect plugin Simply redirect using Custom Fields with Homepage redirect bug fix. (How it works?: On the page or post you wish to redirect from, open up the Custom Fields section,Type in 'redirect' for the key, and then any URL for the value,Press Add Field, save the post, and you're done! 
Author: xTechnos
Version: 1.0
Author URI: http://www.xtechnos.com
License: GPL2

 	Copyright 2012 Syed Zagham Naseem (email : zagham.naseem@xtechnos.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

=== How to Use ===
  1. On the page or post you wish to redirect from, open up the Custom Fields section
  2. Type in 'redirect' for the key, and then any URL for the value
  3. Press Add Field, save the post, and you're done!

*/
	
	require_once(ABSPATH . '/wp-config.php');
	add_action('get_header', 'redirect');
	function redirect () {
		global $post;
		if (is_page()) {
			if (get_post_meta($post->ID, 'redirect', true)) {
				header('Location: ' . get_post_meta($post->ID, 'redirect', true));
			}
		}elseif(is_object($post) && !is_front_page()){
			if (get_post_meta($post->ID, 'redirect', true)) {
				header('Location: ' . get_post_meta($post->ID, 'redirect', true));
			}			
		}
	}
	// yeah, that's the whole plugin.
	// great, aint it?
?>