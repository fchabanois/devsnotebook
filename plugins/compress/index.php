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

	require_once(dirname(__FILE__).'/php-xhtml-table/class.table.php');
	require_once(dirname(__FILE__).'/lib.compress.php');

	$default_tab = 'css_list';
	
	$settings =& $core->blog->settings;
	$keep_comments = $settings->compress_keep_comments;
	$create_backup_every_time = $settings->compress_create_backup_every_time;
	$text_beginning = $settings->compress_text_beginning;

	if ($settings->compress_keep_comments === null)
	{
		try 
		{
			// Default settings
			$settings->setNameSpace('compress');
			$settings->put('compress_keep_comments',false,'boolean',
				'Keep comments when compressing');
			$settings->put('compress_create_backup_every_time',false,
				'boolean',
				'Create an unique backup of CSS file every time a CSS backup file is compressed');
			$settings->put('compress_text_beginning',
				'/* compressed by CompreSS */','text',
				'Text to include at the beginning of the compressed file');
			http::redirect($p_url);
		}
		catch (Exception $e)
		{
			$core->error->add($e->getMessage());
		}
	}

	if (!empty($_POST['saveconfig']))
	{
		try
		{
			$settings->setNameSpace('compress');
			# keep comments
			$keep_comments = (!empty($_POST['compress_keep_comments']));
			$settings->put('compress_keep_comments',$keep_comments,'boolean',
				'Keep comments when compressing');
			# create backup every time
			$create_backup_every_time = (!empty($_POST['compress_create_backup_every_time']));
			$settings->put('compress_create_backup_every_time',
				$create_backup_every_time,'boolean',
				'Create an unique backup of CSS file every time a CSS backup file is compressed');
			# text beginning
			$text_beginning = $_POST['compress_text_beginning'];
			$settings->put('compress_text_beginning',$text_beginning,'text',
				'Text to include at the beginning of the compressed file');

			http::redirect($p_url.'&saveconfig=1&tab=settings');
		}
		catch (Exception $e)
		{
			$core->error->add($e->getMessage());
		}
	}

	try
	{
		if (!is_executable(path::real($core->blog->themes_path)))
		{
			throw new Exception(sprintf(__('%s is not executable'),
				path::real($core->blog->themes_path)));
		}

		# actions
		if ((isset($_POST['compress'])) AND (isset($_POST['file'])))
		{
			$file = $_POST['file'];
			compress::compress_file($file);
			clearstatcache();
			$msg = sprintf(__('The file <code>%1$s</code> has been compressed to %2$s%% of the original file size'),
				$file,compress::percent($file));
		}
		elseif ((isset($_POST['delete'])) AND (isset($_POST['file'])))
		{
			$file = $_POST['file'];
			compress::delete($file);
			$msg = sprintf(__('The backup file <code>%s</code> has been deleted'),$file);
		}
		elseif (isset($_POST['compress_all']))
		{
			compress::compress_all();
			$msg = (__('All CSS files have been compressed'));
	
		}
		elseif (isset($_POST['delete_all_backups']))
		{
			compress::delete_all_backups();
			$msg = (__('All CSS backup files have been deleted'));
	
		}
		elseif (isset($_POST['replace_compressed_files']))
		{
			compress::replace_compressed_files();
			$msg = (__('All CSS compressed files have been replaced'));
		}
	}
	catch (Exception $e)
	{
		$core->error->add($e->getMessage());
	}

	if (isset($_GET['saveconfig']))
	{
		$msg = __('Configuration successfully updated.');
	}

	if (isset($_GET['tab']))
	{
		$default_tab = $_GET['tab'];
	}

?>
<html>
<head>
  <title><?php echo __('CompreSS'); ?></title>
  <?php echo dcPage::jsPageTabs($default_tab); ?>
  <link rel="stylesheet" type="text/css" href="index.php?pf=compress/style.css" title="CompreSS" />
</head>
<body>

	<h2><?php echo html::escapeHTML($core->blog->name); ?> &gt; <?php echo __('CompreSS'); ?></h2>

	<?php if (!empty($msg)) {echo '<p class="message">'.$msg.'</p>';} ?>

	<div class="multi-part" id="css_list" title="<?php echo __('compress CSSs'); ?>">
		<form action="<?php echo($p_url); ?>" method="post">
			<fieldset>
				<legend><?php echo __('All files'); ?></legend>
				<p>
					<input type="submit" name="compress_all" 
						value="<?php echo __('Compress CSS files'); ?>" />
					<input type="submit" name="delete_all_backups" 
						value="<?php echo __('Delete backups files'); ?>" />
					<input type="submit" name="replace_compressed_files" 
						value="<?php echo __('Replace compressed files with original files'); ?>" />
				</p>
			</fieldset>
			<p><?php echo $core->formNonce(); ?></p>
		</form>
		<?php 
			compress::css_table();
		?>
	</div>

	<div class="multi-part" id="settings" title="<?php echo __('settings'); ?>">
		<form method="post" action="<?php echo(http::getSelfURI()); ?>">
			<fieldset>
				<legend><?php echo(__('settings')); ?></legend>
				<?php echo(form::checkbox('compress_keep_comments',1,$keep_comments).
					'&nbsp;<label for="compress_keep_comments">'.__('Keep comments when compressing').'</label>'); ?>
				<br />
				<?php echo(form::checkbox('compress_create_backup_every_time',1,$create_backup_every_time).
					'&nbsp;<label for="compress_create_backup_every_time">'.
					__('Create an unique backup of CSS file every time a CSS backup file is compressed').'</label>'); ?>
				<br />
				<label for="compress_text_beginning">
					<?php echo(__('Text to include at the beginning of the compressed file:').' ('.__('optional').')'); ?>
				</label>
				<br />
				<?php echo(form::field('compress_text_beginning',80,1024,$text_beginning)); ?>
			</fieldset>
			<input type="submit" name="saveconfig" value="<?php echo __('Save configuration'); ?>" />
			<p><?php echo $core->formNonce(); ?></p>
		</form>
	</div>

	<div id="help" title="<?php echo __('Help'); ?>">
		<div class="help-content">
			<h2><?php echo(__('Help')); ?></h2>
			<p><?php echo(__('A copy of the original file (.bak.css) is created when a CSS file is compressed for the first time.')); ?></p>
			<p>
				<?php echo(__('To modify a CSS file, edit the original file (.bak.css), save it and then compress this file by clicking on')); ?> 
				<input type="submit" name="compress" value="<?php echo(__('compress to')); ?>" />
			</p>
			<p><input type="submit" name="delete" value="<?php echo(__('delete')); ?>" /> 
				<?php echo(__('delete the file and replace the compressed file by the original file if the file is original.')); ?>
			</p>
		</div>
	</div>

</body>
</html>