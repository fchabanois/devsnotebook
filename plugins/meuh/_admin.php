<?php
# -- BEGIN LICENSE BLOCK ----------------------------------
#
# This file is part of MEUH,
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

require(dirname(__FILE__).'/class.meuh.php');

# $core->addBehavior('adminAfterPostCreate',array('meuhAdminBehaviors','sanitizeMeuh'));
$core->addBehavior('adminBeforePostUpdate',array('meuhAdminBehaviors','checkPostUrl'));
$core->addBehavior('adminPostFormSidebar',array('meuhAdminBehaviors','history'));

class meuhAdminBehaviors 
{
	public static function checkPostUrl($cur,$post_id) {
		$core =& $GLOBALS['core'];
		$dcMeuh = new dcMeuh($core);
		$rs = $core->blog->getPosts(array('post_id' => $post_id));
		if ($rs->isEmpty())
			return;
		if ($cur->post_url != "" && $rs->post_url !== $cur->post_url) {
			$dcMeuh->addAlias($rs->post_type, $cur->post_url, $rs->post_url);
			$dcMeuh->renamePostUrl ($rs->post_type,$rs->post_url,$cur->post_url);
		}
	}

	public static function history($post)
	{
		$core =& $GLOBALS['core'];
		$dcMeuh = new dcMeuh($core);
		if ($post == null)
			return;
		$rs = $dcMeuh->getAliases($post->post_url);
		if ($rs->isEmpty())
			return;
		echo
		'<h3><label for="post_url_hist">'.__('URL History:').'</label></h3><ul class="metaList">';
		while ($rs->fetch()) {
			echo '<li>'.$rs->meuh_url.
				'&nbsp;<a href="plugin.php?p=meuh&amp;m=remove&amp;post_url='.$post->post_url.
				'&amp;post_type=post'.
				'&amp;meuh_url='.$rs->meuh_url.
				'&amp;xd_check='.$core->getNonce().
				'" title="'.__("Remove").'" class="metaRemove">[x]</a>'.
				'</li>';
		}
		echo '</ul>';
		
	}

}
?>
