<? include('gzip-css.php'); ?>
/*
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
*/
body {
	font : 10pt serif;
	margin: 0;
	color: #000;
	background: #fff;
}

#prelude, #sidebar, .pagination, #comment-form, object {
	display: none;
}

p {
	margin: 0.2em 0 0.8em 0;
	line-height: 1.3em;
}

h1,h2,h3,h4,h5, h6 {
	margin: 1em 0 0.2em 0;
	font-weight: bold;
}
h1 { font-size: 160%; }
h2 { font-size: 140%; }
h3 { font-size: 120%; }
h4 { font-size: 100%; }
h5 { font-size: 90%; }
h6 { font-size: 80%; }

a {
	color: #00f;
	text-decoration: none;
	border-bottom: 1px solid #999;
}

.post-content a[href^="http"]:after, #comments a[href^="http"]:after,
#trackbacks a[href^="http"]:after {
	content: " ("attr(href)") ";
	color: #333;
}