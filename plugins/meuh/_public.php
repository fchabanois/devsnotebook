<?php
# -- BEGIN LICENSE BLOCK ----------------------------------
#
# This file is part of Meuh,
# a plugin for DotClear2.
#
# Copyright (c) 2010 Bruno Hondelatte and contributors
#
# Licensed under the GPL version 2.0 license.
# See LICENSE file or
# http://www.gnu.org/licenses/gpl-2.0.txt
#
# -- END LICENSE BLOCK ------------------------------------
if (!defined('DC_RC_PATH')) { return; }

$core->url->registerError(array('meuhPublicBehaviors','redirect'));

class meuhPublicBehaviors
{
	public static function redirect($args,$type,$e) {
		if ($e->getCode() == 404) {
			$core=$GLOBALS['core'];
			$dcMeuh = new dcMeuh($core);
			$post_url = $dcMeuh->getPostUrl($type,$args);
			if ($post_url == null)
				return;
			$params=array('post_type' => $type, 'post_url' => $post_url);
			$rs = $core->blog->getPosts($params);
			if ($rs->fetch()) {
				$dcMeuh->updateAlias($type,$args);

				// ALBATOR : modif pour avoir une redirection 301 au lieu de 302 : http://www.end-of-file.eu/post/dotclear-2-redirection-permanente-meuh
				header("HTTP/1.1 301 Moved Permanently");

				header('Location: '.$rs->getURL());
				$core->callBehavior('publicAfterDocument',$core);
				return true;
			}
		}
	}
}
?>