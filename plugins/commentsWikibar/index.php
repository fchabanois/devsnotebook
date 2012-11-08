<?php
# ***** BEGIN LICENSE BLOCK *****
# This file is part of CommentsWikibar, a plugin for DotClear2.
# Copyright (c) 2006-2008 Pep and contributors. All rights
# reserved.
#
# This plugin is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License, or
# (at your option) any later version.
#
# This plugin is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with this plugin; if not, write to the Free Software
# Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
#
# ***** END LICENSE BLOCK *****
if (!defined('DC_CONTEXT_ADMIN')) { exit; }

$wiki_comments = (boolean)$core->blog->settings->wiki_comments;

// Setting default parameters if missing configuration
if (is_null($core->blog->settings->commentswikibar_active)) {
	try {
		$core->blog->settings->setNameSpace('commentswikibar');

		// Default state is active if the comments are configured to allow wiki syntax
		$core->blog->settings->put('commentswikibar_active',$wiki_comments,'boolean');
		$core->blog->settings->put('commentswikibar_custom_css','','string');
		$core->blog->triggerBlog();
		http::redirect(http::getSelfURI());
	}
	catch (Exception $e) {
		$core->error->add($e->getMessage());
	}
}

// Getting current parameters
$active = (boolean)$core->blog->settings->commentswikibar_active;
$custom_css = (string)$core->blog->settings->commentswikibar_custom_css;

// Saving new configuration
if (!empty($_POST['saveconfig'])) {
	try
	{
		$core->blog->settings->setNameSpace('commentswikibar');

		$active = (empty($_POST['active']))?false:true;
		$custom_css = (empty($_POST['custom_css']))?'':html::sanitizeURL($_POST['custom_css']);
		$core->blog->settings->put('commentswikibar_active',$active,'boolean');
		$core->blog->settings->put('commentswikibar_custom_css',$custom_css,'string');
		
		// Active wikibar enforces wiki syntax in blog comments
		if ($active && !$wiki_comments) {
			$core->blog->settings->setNameSpace('system');
			$core->blog->settings->put('wiki_comments',true,'boolean');
		}
		$core->blog->triggerBlog();

		$msg = __('Configuration successfully updated.');
	}
	catch (Exception $e)
	{
		$core->error->add($e->getMessage());
	}
}
?>
<html>
<head>
	<title><?php echo __('Comments Wikibar'); ?></title>
</head>

<body>
<h2><?php echo html::escapeHTML($core->blog->name); ?> &gt; <?php echo __('Comments Wikibar'); ?></h2>

<?php if (!empty($msg)) echo '<p class="message">'.$msg.'</p>'; ?>

<div id="sitemaps_options">
	<form method="post" action="plugin.php">
	<fieldset>
		<legend><?php echo __('Plugin activation'); ?></legend>
		<p class="field">
			<?php echo form::checkbox('active', 1, $active); ?>
			<label class=" classic" for="active">&nbsp;<?php echo __('Enable Comments Wikibar');?></label>
		</p>
		<p><em><?php echo __('Activating this plugin also enforces wiki syntax in blog comments'); ?></em></p>
	</fieldset>

	<fieldset>
		<legend><?php echo __('Options'); ?></legend>
		<p class="field">
			<label class=" classic"><?php echo __('Use custom CSS') ; ?> : </label>
			<?php echo form::field('custom_css',40,128,$custom_css); ?>
		</p>
		<p><em><?php echo __('You can use a custom CSS by providing its location.'); ?><br />
		<?php echo __('A location beginning with a / is treated as absolute, else it is treated as relative to the blog\'s current theme URL'); ?>
		</em></p>
	</fieldset>

	<p><input type="hidden" name="p" value="commentsWikibar" />
	<?php echo $core->formNonce(); ?>
	<input type="submit" name="saveconfig" value="<?php echo __('Save configuration'); ?>" />
	</p>
	</form>
</div>

</body>
</html>
