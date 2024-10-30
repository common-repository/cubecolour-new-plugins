<?php
/*
Plugin Name: New Plugins
Plugin URI: http://cubecolour.co.uk/new-plugins
Description: Adds <strong>New</strong> & <strong>Beta Testing</strong> Tabs to the <strong>Add Plugins</strong> page to enable the latest plugins added to the WordPress.org plugins directory to be listed and installed.
Version: 1.2.0
Author: Michael Atkins
Author URI: http://cubecolour.co.uk
License: GPL

  Copyright 2016-2022 Michael Atkins

  Plugin Licenced under the GNU GPL:

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
  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

if ( ! defined( 'ABSPATH' ) ) exit;


/**
* Add Links to the Plugins Table
*
*/
function cc_new_plugins_metalinks( $links, $file ) {

	$plugin = plugin_basename(__FILE__);

	if ( $file == $plugin ) {

		$title	= 'Cubecolour New Plugins';
		$plugslug	= 'cubecolour-new-plugins';

		$supportlink	= 'https://wordpress.org/support/plugin/' . $plugslug;
		$donatelink		= 'http://cubecolour.co.uk/wp';
		$reviewlink		= 'https://wordpress.org/support/view/plugin-reviews/' . $plugslug . '#postform';
		$twitterlink	= 'http://twitter.com/cubecolour';
		$iconstyle		= 'style="-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;font-size: 14px;margin: 4px 0 -4px;"';

		return array_merge( $links, array(
			'<a href="' . $supportlink . '"> <span class="dashicons dashicons-lightbulb" ' . $iconstyle . 'title="' . $title . ' Support"></span></a>',
			'<a href="' . $twitterlink . '"><span class="dashicons dashicons-twitter" ' . $iconstyle . 'title="Follow Cubecolour on Twitter"></span></a>',
			'<a href="' . $reviewlink . '"><span class="dashicons dashicons-star-filled"' . $iconstyle . 'title="Rate and review ' . $title . '"></span></a>',
			'<a href="' . $donatelink . '"><span class="dashicons dashicons-heart"' . $iconstyle . 'title="Donate to the plugin author"></span></a>',
		) );
	}

	return $links;
}

add_filter( 'plugin_row_meta', 'cc_new_plugins_metalinks', 10, 2 );


/**
* Add the New link to the Install Plugins Page
*
*/
function cc_new_plugins( $tabs ) {

	$tabs = array('new' => _x( 'New', 'Plugin Installer' ) ) + $tabs;
	$tabs['beta'] = _x( 'Beta Testing', 'Plugin Installer' );

    return $tabs;
}

add_filter( 'install_plugins_tabs', 'cc_new_plugins' );