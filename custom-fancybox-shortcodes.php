<?php
/*
Plugin Name: Custom FancyBox Shortcodes
Plugin URI: http://capturemystery.com
Description: Hard-coded custom FancyBox shortcodes.  Example: [fancybox fa_icon=fa-expand page_id=1234]
Text Domain: custom-fancybox-shortcodes
Domain Path: languages
Version: 1.0
Author: David Frazer
Author URI: http://capturemystery.com
*/

/*  Copyright 2015  David Frazer  (email : capturemystery@gmail.com)

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


function fancybox_handler($attributes) {
    extract( shortcode_atts( array(
        'fa_icon' => '',
        'src' => '',
        'page_id' => ''
    ), $attributes ) );
     //run function that actually does the work of the plugin
     $fancybox_output = fancybox_function($fa_icon, $src, $page_id);
    //send back text to replace shortcode in post
    if($fancybox_output){
        return $fancybox_output;
    }
}

function fancybox_function($fa_icon, $src, $page_id) {
    //process plugin
    $class = 'fancybox-iframe';
    $href = '';
    $id = '';
    if($fa_icon){
        $class .= " fa " . $fa_icon;
    }
    if($src){
        $href = $src;
    }
    if($page_id){
        $href = 'index.php?page_id=' . $page_id;
    }
    $fancybox_input = '<a class="' . $class . '" href="' . $href . '"></a>';
    //send back text to calling function
    return $fancybox_input;
}

add_shortcode("fancybox", "fancybox_handler");