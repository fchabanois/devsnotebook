<?php
// ALBATOR : ajout pour cacher les images
 Header("Cache-Control: must-revalidate");

 $offset = 60 * 60 * 24 * 3;
 $ExpStr = "Expires: " . gmdate("D, d M Y H:i:s", time() + $offset) . " GMT";
 Header($ExpStr);
?>
<?php if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start(); ?>
<?php
# -- BEGIN LICENSE BLOCK ----------------------------------
#
# This file is part of Dotclear 2.
#
# Copyright (c) 2003-2009 Olivier Meunier and contributors
# Licensed under the GPL version 2.0 license.
# See LICENSE file or
# http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
#
# -- END LICENSE BLOCK ------------------------------------

if (isset($_SERVER['DC_BLOG_ID'])) {
	define('DC_BLOG_ID',$_SERVER['DC_BLOG_ID']);
} if (isset($_SERVER['REDIRECT_DC_BLOG_ID'])) {
	define('DC_BLOG_ID',$_SERVER['REDIRECT_DC_BLOG_ID']);
}else {
	# Define your blog here
	define('DC_BLOG_ID','default');
}

require dirname(__FILE__).'/inc/public/prepend.php';
?>