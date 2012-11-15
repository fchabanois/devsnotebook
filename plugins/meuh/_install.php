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

if (!defined('DC_CONTEXT_ADMIN')) { return; }

$version = $core->plugins->moduleInfo('meuh','version');

if (version_compare($core->getVersion('meuh'),$version,'>=')) {
	return;
}

/* Database schema
-------------------------------------------------------- */
$s = new dbStruct($core->con,$core->prefix);

$s->meuh
	->blog_id			('varchar',	32,	false)
	->post_type		('varchar',	32,	false,	"'post'")
	->post_url		('varchar',	255,	false)
	->meuh_url		('varchar',	255,	false)
	->meuh_count		('integer',	0,	false,0)
	->meuh_lastread	('timestamp',	0,	false,	'now()')
	
	->primary('pk_meuh','blog_id','post_type','meuh_url')
	
	->index('idx_meuh_blog_id','btree','blog_id')
	
	->reference('fk_meuh_blog','blog_id','blog','blog_id','cascade','cascade')
	;

# Schema installation
$si = new dbStruct($core->con,$core->prefix);
$changes = $si->synchronize($s);

$core->setVersion('meuh',$version);
return true;
?>
