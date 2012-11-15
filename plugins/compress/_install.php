<?php
# ***** BEGIN LICENSE BLOCK *****
#
# This file is part of CompreSS.
# Copyright 2008 Moe (http://gniark.net/)
#
# CompreSS is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 3 of the License, or
# (at your option) any later version.
#
# CompreSS is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with this program.  If not, see <http://www.gnu.org/licenses/>.
#
# Icon (icon.png) is from Silk Icons : http://www.famfamfam.com/lab/icons/silk/
#
# ***** END LICENSE BLOCK *****
if (!defined('DC_CONTEXT_ADMIN')) { return; }

# On lit la version du plugin
$m_version = $core->plugins->moduleInfo('compress','version');
 
# On lit la version du plugin dans la table des versions
$i_version = $core->getVersion('compress');

# La version dans la table est supérieure ou égale à
# celle du module, on ne fait rien puisque celui-ci
# est installé
if (version_compare($i_version,$m_version,'>=')) {
	return;
}

# replace old tag with new tag
if (version_compare($i_version,'1.1','<')) {
	require_once(dirname(__FILE__).'/lib.compress.php');
	$themes_list = compress::get_themes_list();
	foreach ($themes_list as $theme)
	{
		$dir_absolute_path = path::real($theme['root']);
		$list_files = scandir($dir_absolute_path);

		foreach ($list_files as $file)
		{
			$file_path = $dir_absolute_path.'/'.$file;

			# old backup
			if (substr($file,-8) == '.css.bak')
			{
				rename($file_path,substr($file_path,0,(strlen($file_path)-8)).'.bak.css');
			}
			# old dated backup 
			elseif ((substr($file,-7) == '.css.gz') AND (substr($file,-11) != '.bak.css.gz'))
			{
				rename($file_path,substr($file_path,0,(strlen($file_path)-7)).'.bak.css.gz');
			}
		}
	}
}

# La procédure d'installation commence vraiment là
$core->setVersion('compress',$m_version);
return true;
?>