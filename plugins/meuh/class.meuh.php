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

class dcMeuh
{
	protected $core;
	protected $aliases;
	
	public function __construct(&$core)
	{
		$this->core =& $core;
	}
	
	public function getAliases($post_url=null)
	{
		$sql =	'SELECT post_type, post_url, meuh_url, meuh_count, meuh_lastread '.
				'FROM '.$this->core->prefix.'meuh '.
				"WHERE blog_id = '".$this->core->con->escape($this->core->blog->id)."' ";
		if ($post_url != null)
			$sql .= "AND post_url='".$this->core->con->escape($post_url)."' ";
		$rs = $this->core->con->select($sql);
		return $rs;
	}
	
	
	public function addAlias($post_type,$post_url,$alias)
	{
		if (!$post_url) {
			throw new Exception(__('Alias URL is empty.'));
		}
		
		if (!$alias) {
			throw new Exception(__('Alias destination is empty.'));
		}
		
		$cur = $this->core->con->openCursor($this->core->prefix.'meuh');
		$cur->blog_id = (string) $this->core->blog->id;
		$cur->post_type = (string) $post_type;
		$cur->post_url = (string) $post_url;
		$cur->meuh_url = (string) $alias;
		$cur->insert();
	}
	
	public function renamePostUrl($post_type,$old_url,$new_url)
	{
		$this->core->con->execute(
			'UPDATE '.$this->core->prefix.'meuh '.
			"SET post_url = '".$this->core->con->escape($new_url)."' ".
			"WHERE blog_id = '".$this->core->con->escape($this->core->blog->id)."' ".
			"AND post_url='".$this->core->con->escape($old_url)."' "
		);
	}	
	
	public function updateAlias($post_type,$meuh_url) {
		$this->core->con->execute(
			'UPDATE '.$this->core->prefix.'meuh '.
			"SET meuh_count = meuh_count+1, meuh_lastread=now() ".
			"WHERE blog_id = '".$this->core->con->escape($this->core->blog->id)."' ".
			"AND post_type='".$this->core->con->escape($post_type)."' ".
			"AND meuh_url='".$this->core->con->escape($meuh_url)."' "
		);
	}
	public function getPostUrl($post_type,$meuh_url) {
		$sql =	'SELECT post_url '.
				'FROM '.$this->core->prefix.'meuh '.
				"WHERE blog_id = '".$this->core->con->escape($this->core->blog->id)."' ".
				"AND post_type='".$this->core->con->escape($post_type)."' ".
				"AND meuh_url='".$this->core->con->escape($meuh_url)."' ";
		$rs = $this->core->con->select($sql);
		if (!$rs->fetch()) {
			return null;
		}
		return $rs->post_url;
	}
	
	public function deleteAlias($post_type,$meuh_url,$post_url=null)
	{
		$req =
			'DELETE FROM '.$this->core->prefix.'meuh '.
			"WHERE blog_id = '".$this->core->con->escape($this->core->blog->id)."' ".
			" AND post_type='".$this->core->con->escape($post_type)."' ".
			" AND meuh_url='".$this->core->con->escape($meuh_url)."' ";
		if ($post_url != null) 
			$req .= " AND post_url='".$this->core->con->escape($post_url)."' ";

		$this->core->con->execute($req);
	}

}