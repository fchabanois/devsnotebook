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

$core->addBehavior('publicHeadContent',array('dcCommentsWikibar','publicHeadContent'));

class dcCommentsWikibar
{
	public static function publicHeadContent()
	{
		global $core;
		
		if ($core->blog->settings->commentswikibar_active && $core->blog->settings->wiki_comments)
		{
			$supported_modes = new ArrayObject(array('post','pages','gal','galitem'));
			$core->callBehavior('initCommentsWikibar',$supported_modes);

			if (in_array($core->url->type,(array)$supported_modes))
			{
				$custom_css = $core->blog->settings->commentswikibar_custom_css;		
				if (!empty($custom_css)) {
					if (strpos('/',$custom_css) === 0) {
						$css = $custom_css;
					}
					else {
						$css =
							$core->blog->settings->themes_url."/".
							$core->blog->settings->theme."/".
							$custom_css;
					}
				}
				else {
					$css = html::stripHostURL($core->blog->getQmarkURL().'pf=commentsWikibar/jsToolBar.comments.css');
				}

				$js = html::stripHostURL($core->blog->getQmarkURL().'pf=commentsWikibar/jsToolBar.comments.js');

				echo 
					'<style type="text/css" media="screen">@import url('.$css.');</style>'."\n".
					'<script type="text/javascript" src="'.$js.'"></script>'."\n".
					'<script type="text/javascript">'."\n".
					"//<![CDATA[\n".
					"addListener(window,'load',function() {\n".
					"jsToolBar.prototype.base_url = '".html::escapeJS($core->blog->host)."'; \n".
					"jsToolBar.prototype.legend_msg = '".html::escapeJS(__('You can use the following shortcuts to format your text.'))."'; \n".
					"jsToolBar.prototype.elements.strong.title = '".html::escapeJS(__('Strong emphasis'))."'; \n".
					"jsToolBar.prototype.elements.em.title = '".html::escapeJS(__('Emphasis'))."'; \n".
					"jsToolBar.prototype.elements.ins.title = '".html::escapeJS(__('Inserted'))."'; \n".
					"jsToolBar.prototype.elements.del.title = '".html::escapeJS(__('Deleted'))."'; \n".
					"jsToolBar.prototype.elements.quote.title = '".html::escapeJS(__('Inline quote'))."'; \n".
					"jsToolBar.prototype.elements.code.title = '".html::escapeJS(__('Code'))."'; \n".
					"jsToolBar.prototype.elements.br.title = '".html::escapeJS(__('Line break'))."'; \n".
					"jsToolBar.prototype.elements.ul.title = '".html::escapeJS(__('Unordered list'))."'; \n".
					"jsToolBar.prototype.elements.ol.title = '".html::escapeJS(__('Ordered list'))."'; \n".
					"jsToolBar.prototype.elements.link.title = '".html::escapeJS(__('Link'))."'; \n".
					"jsToolBar.prototype.elements.link.href_prompt = '".html::escapeJS(__('URL?'))."'; \n".
					"jsToolBar.prototype.elements.link.hreflang_prompt = '".html::escapeJS(__('Language?'))."'; \n\n".
					"if (document.getElementById) { \n".
					"	if (document.getElementById('".html::escapeJS('c_content')."')) { \n".
					"		var commentTb = new jsToolBar(document.getElementById('".html::escapeJS('c_content')."')); \n".
					"		commentTb.draw(); \n".
					"	}\n".
					"}\n".
					"});\n".
					"\n//]]>\n".
					"</script>\n";
			}
		}
	}
}
?>