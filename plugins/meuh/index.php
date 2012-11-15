<?php
# -- BEGIN LICENSE BLOCK ----------------------------------
#
# This file is part of meuh,
# a plugin for DotClear2.
#
# Copyright (c) 2008 Bruno Hondelatte and contributors
#
# Licensed under the GPL version 2.0 license.
# See LICENSE file or
# http://www.gnu.org/licenses/gpl-2.0.txt
#
# -- END LICENSE BLOCK ------------------------------------
if (!defined('DC_CONTEXT_ADMIN')) { exit; }

function redirectHome() {
	header("Location: index.php");
	exit;
}

if (empty($_REQUEST['m']) || $_REQUEST['m'] != 'remove') {
	return;
}
if (!$core->checkNonce($_REQUEST['xd_check'])) {
			throw new Exception('Precondition Failed.');
}
$post_url = isset($_GET['post_url'])?$_GET['post_url']:"";
$meuh_url = isset($_GET['meuh_url'])?$_GET['meuh_url']:"";
$post_type = isset($_GET['post_type'])?$_GET['post_type']:"";
$params=array('post_type'=>$post_type,'post_url'=>$post_url);
$rs = $core->blog->getPosts($params);
if ($rs->isEmpty() || !$rs->isEditable())
	redirectHome();

$dcMeuh = new dcMeuh($core);
$dcMeuh->deleteAlias($post_type,$meuh_url,$post_url);

header('Location: '.$core->getPostAdminURL($rs->post_type,$rs->post_id));
exit;
?>