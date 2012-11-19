<?php
# Copyright (c) 2006 Geindre Thierry. All rights
# reserved.
# http://www.code-web.org/
# webmaster@code-web.org

if (!defined('DC_CONTEXT_ADMIN')) exit;

require(dirname(__FILE__).'/geshi/geshi.php');
$core->addBehavior('coreInitWikiPost',array('syntaxeHl','registerFunc'));
$core->addBehavior('adminBlogPreferencesForm',array('syntaxeHl','preferencesForm'));
$core->addBehavior('adminBeforeBlogSettingsUpdate',array('syntaxeHl','updateSettings'));


if (!$core->blog->settings->syntaxehl->syntaxehl_overall_class)
{
      $settings =& $core->blog->settings;
      $settings->addNameSpace('syntaxehl');
      $settings->syntaxehl->put('syntaxehl_overall_class','','string','Overall CSS class',false,true);
      $settings->syntaxehl->put('syntaxehl_enable_klink',false,'boolean','Enable keyword link',false,true);
      $settings->syntaxehl->put('syntaxehl_enable_linenum',false,'boolean','Enable line numbers',false,true);
}

class syntaxeHl
{

	public static function registerFunc($wiki2xhtml)
	{
		$dir = dirname(__FILE__).'/geshi/geshi/';
		$od = opendir($dir);
		while($f = readdir($od))
		{
			if(is_file($dir.$f) && substr($f,-4,4)=='.php')
			{
				$lang = str_replace('.php','',$f);
				$wiki2xhtml->registerFunction('macro:['.$lang.']',array('syntaxeHl','parse'));
			}
		}
	}

	public static function parse($text,$args)
	{
	    global $core;
		$settings = $core->blog->settings->syntaxehl;
       
		$text = trim($text);
		$args = preg_replace("/^(\[(.*)\]$)/","$2",$args);
		$geshi = new GeSHi($text,$args);
		
		if(!$settings->get('syntaxehl_enable_klink'))  $geshi->enable_keyword_links(false);
		if($settings->get('syntaxehl_enable_linenum')) $geshi->enable_line_numbers(GESHI_NORMAL_LINE_NUMBERS);
		
		$overall_class = $settings->get('syntaxehl_overall_class');
		if($overall_class != '') $geshi->set_overall_class($overall_class.' '.$args);
		else  $geshi->set_overall_class($args);
		
		// TO DELETE : Pour hériter de la police de la page
		$geshi->set_overall_style('font-family:inherit');

		return $geshi->parse_code();
	}
	
	public static function preferencesForm($core)
	{
	      $settings = $core->blog->settings->syntaxehl;
            
	      echo
	      '<fieldset><legend>'.__('SyntaxeHl configuration').'</legend>'.
	      
	      '<div class="two-cols">'.
	      '<div class="col">'.
	      
	      '<p><label>'.__('Overall CSS class :').
	      form::field('syntaxehl_overall_class',30,255,html::escapeHTML($settings->get('syntaxehl_overall_class'))).
	      '</label></p>'.
	      '<p class="form-note">'.__('Leave empty to cancel this feature.').'</p>'.
	      
	      '</div>'.
	      '<div class="col">'.
	      
	      '<p><label class="classic">'.
	      form::checkbox('syntaxehl_enable_klink',1,$settings->get('syntaxehl_enable_klink')).
	      __('Enable keyword link').
	      '</label></p>'.
	      
	      '<p><label class="classic">'.form::checkbox('syntaxehl_enable_linenum',1,$settings->get('syntaxehl_enable_linenum')).
	      __('Enable line numbers').
	      '</label></p>'.
	      
	      '</div>'.
	      '</div>'.
	      
	      '</fieldset>';
	}
	
	public static function updateSettings($settings)
    {
            $settings->syntaxehl->put('syntaxehl_overall_class',$_POST['syntaxehl_overall_class']);
            $settings->syntaxehl->put('syntaxehl_enable_klink',!empty($_POST['syntaxehl_enable_klink']));
            $settings->syntaxehl->put('syntaxehl_enable_linenum',!empty($_POST['syntaxehl_enable_linenum']));
	}
}
?>
